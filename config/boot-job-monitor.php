<?php

/*
 * The channels web-hook to which the notification will be sent.
 */
return [

    'slack' => [
        'webhook_url' => env('FAILED_JOB_SLACK_WEBHOOK_URL'),
    ],

]

?>
