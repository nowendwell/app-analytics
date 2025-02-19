<?php

namespace Nowendwell\AppAnalytics\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Nowendwell\AppAnalytics\Event;
use Nowendwell\AppAnalytics\Facades\AppAnalytics;
use Nowendwell\AppAnalytics\Session;
use Symfony\Component\HttpFoundation\Response;

class TrackAnalyticsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function terminate(Request $request, Response $response)
    {
        if(config('app-analytics.enabled') !== true){
            return;
        }

        // skip if if's in the ignore path
        $ignored_paths = config('app-analytics.ignored_paths', []);
        foreach($ignored_paths as $path){
            if(Str::is($path, $request->path())){
                return;
            }
        }

        $session_id = rescue(fn() => $request->session()->getId(), Str::random(12), false);

        $session = Session::firstOrCreate([
            'session_id' => $session_id,
        ], [
            'user_id' => auth()?->id(),
            'started_at' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $payload = $request->except(['password', 'password_confirmation']);

        $session->actions()->create([
            'method' => $request->method(),
            'uri' => $request->path(),
            'payload' => !empty($payload) ? $payload : null,
            // 'ip_address' => $request->ip(),
            // 'user_agent' => $request->userAgent(),
            'status' => $response->status(),
            // 'response_payload' => $response->getContent(),
            // 'response_headers' => $response->headers,
            'duration' => (microtime(true) - LARAVEL_START) * 1000,
        ]);

        if($events = AppAnalytics::getEvents()){
            $session->events()->createMany($events);
        }
    }
}
