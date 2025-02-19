<?php

namespace Nowendwell\AppAnalytics;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Nowendwell\AppAnalytics\Commands\AppAnalyticsCommand;

class AppAnalyticsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('app-analytics')
            ->hasConfigFile()
            ->hasMigration('create_app_analytics_tables');
    }
}
