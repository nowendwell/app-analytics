<?php

namespace Nowendwell\AppAnalytics\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nowendwell\AppAnalytics\AppAnalytics
 */
class AppAnalytics extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Nowendwell\AppAnalytics\AppAnalytics::class;
    }
}
