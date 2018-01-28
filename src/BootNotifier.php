<?php

namespace Leo\DroidJobMonitor;

use Illuminate\Queue\Events\JobFailed;
use Leo\DroidJobMonitor\Notification;
use Queue;

class BootNotifier
{

    public function boot()
    {

        Queue::failing(function (JobFailed $event) {

            (new Notification)->setEvent($event);
        });
    }
}
