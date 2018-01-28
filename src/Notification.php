<?php

namespace Leo\DroidJobMonitor;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;

class Notification extends Notification
{
     use Queueable;

     protected $event;


     public function setEvent(JobFailed $event){


     }

}
