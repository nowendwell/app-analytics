<?php

namespace Nowendwell\AppAnalytics\Commands;

use Illuminate\Console\Command;

class AppAnalyticsCommand extends Command
{
    public $signature = 'app-analytics';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
