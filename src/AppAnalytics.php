<?php

namespace Nowendwell\AppAnalytics;

class AppAnalytics {
    protected $events = [];

    public function event(string $name, array $data = [], string $category = null): void
    {
        $this->events[] = [
            'name' => $name,
            'category' => $category,
            'data' => $data,
            'source_file' => str_replace(base_path(), '', debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['file']),
            'source_line' => debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['line'],
        ];
    }

    public function getEvents(): array
    {
        return $this->events;
    }
}
