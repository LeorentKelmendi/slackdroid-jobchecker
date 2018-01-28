<?php

namespace Leo\DroidJobMonitor;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackAttachment;
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
