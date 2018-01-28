<?php

namespace Leo\DroidJobMonitor;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification as LaravelNotification;
use Illuminate\Queue\Events\JobFailed;

class Notification extends LaravelNotification
{
    use Queueable;

    /**
     * @var mixed
     */
    protected $event;

    /**
     * @param JobFailed $event
     * @return mixed
     */
    public function setEvent(JobFailed $event)
    {

        $this->event = $event;

        return $this;
    }

    /**
     * @param $notifiable
     */
    public function via($notifiable)
    {
        return ['slack'];
    }
    /**
     * @return mixed
     */
    public function getEvent()
    {

        return $this->event;
    }
    /**
     * @param $notifiable
     */
    public function toSlack($notifiable)
    {

        return (new SlackMessage)
            ->success()
            ->content('A job is failing 23 service provider LEOOOOOOOOOOOOOOOOOOOOOOO');
    }

}
