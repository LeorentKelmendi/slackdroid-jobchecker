<?php

namespace Leo\DroidJobMonitor;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Notifications\Messages\SlackAttachment;
use Illuminate\Notifications\Messages\SlackMessage;

class Notification extends Notification
{
     use Queueable;

     protected $event;


     public function setEvent(JobFailed $event){

        $this->event = $event;

        return $this;
     }

     public function via($notifiable){

        return ['slack'];
     }

     public function toSlack(){

            return (new SlackMessage)
                    ->error()
                    ->content('A job failed at ' . config('app.url'))
                    ->attachment(function (SlackAttachment $attachment) {
                        $attachment->fields([
                            'Exception message' => $this->event->exception->getMessage(),
                            'Job class'         => $this->event->job->resolveName(),
                            'Job body'          => $this->event->job->getRawBody(),
                            'Exception'         => $this->event->exception->getTraceAsString(),
                        ]);
                    });
     }

}
