<?php

namespace Leo\DroidJobMonitor;

use Illuminate\Queue\Events\JobFailed;
use Leo\DroidJobMonitor\Notifable;
use Leo\DroidJobMonitor\Notification;
use Queue;

class BootNotifier
{

    public function register()
    {

        Queue::failing(function (JobFailed $event) {

            $notifable = new Notifable;

            $notifable->notify((new Notification)->setEvent($event));
        });
    }

}
