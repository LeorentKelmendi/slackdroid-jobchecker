<?php

namespace Leo\DroidJobMonitor;

use Illuminate\Support\ServiceProvider;
use Leo\DroidJobMonitor\BootNotifier;

class BootJobMonitorServiceProvider extends ServiceProvider
{

    public function boot()
    {

        // $this->publishes([
        //     __DIR__ . '/../config/boot-job-monitor.php' => config_path('boot-job-monitor.php'),
        // ], 'config');

        $this->app->make(BootNotifier::class)->register();
    }

    public function register()
    {

        // $this->mergeConfigFrom(
        //     __DIR__ . '/../config/boot-job-monitor.php', 'boot-job-monitor'
        // );

        // $this->app->singleton(BootNotifier::class);
    }

}
