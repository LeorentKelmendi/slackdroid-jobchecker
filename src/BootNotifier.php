<?php

namespace Leo\DroidJobMonitor;

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
