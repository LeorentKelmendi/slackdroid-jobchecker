<?php
namespace Leo\DroidJobMonitor;

use Illuminate\Notifications\Notifiable as NotifiableTrait;

class Notifable
{
    use NotifiableTrait;

    public function routeNotificationForSlack(): string
    {
        return config('boot-job-monitor.slack');
    }

}
