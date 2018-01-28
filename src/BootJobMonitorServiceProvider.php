<?php

namespace Leo\DroidJobMonitor;

use Illuminate\Support\ServiceProvider;

class BootJobMonitorServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../config/boot-job-monitor.php' => config_path('boot-job-monitor.php'),
        ], 'config');

        $this->app->make(BootNotifier::class)->register();
    }

}
