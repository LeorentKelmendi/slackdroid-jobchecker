<?php
namespace Leo\DroidJobMonitor;

use Illuminate\Notifications\Notifiable as NotifiableTrait;

class Notifable
{
    use NotifiableTrait;

    public function routeNotificationForSlack(): string
    {
        return 'https://hooks.slack.com/services/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';
    }

}
