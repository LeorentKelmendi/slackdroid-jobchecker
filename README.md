# Get a slack notification when a job fails.



This package sends notifications to a slack web-hook if a queued job fails. It leverages [Laravel 5.5 notification capabilities](https://laravel.com/docs/5.5/notifications).



## Installation

You can install the package via composer:

``` bash
composer require
```
In order to use slack notification you must install guzzle first.

``` bash
composer require guzzlehttp/guzzle
```

The service provider will automatically be registered.

Next, you must publish the config file:

```bash
php artisan vendor:publish --provider="Leo\DroidJobMonitor\BootJobMonitorServiceProvider"
```

After vendor publish a new file will be generated under `config` folder, named `boot-job-monitor.php` that contains slack web-hook url provided through env file.

```<?php

/*
 * The channels web-hook to which the notification will be sent.
 */
return [

    'slack' => [
        'webhook_url' => env('FAILED_JOB_SLACK_WEBHOOK_URL'),
    ],

]

?>

```

## Configuration


### Customizing the notification

The default notification class provided by this package has support for mail and Slack.

If you want to to customize the notification you can specify your own notification class in the config file.


## Usage

If you configured web-hook url correctly. You'll receive a notification when a queued job fails.

## Testing
TODO

## License

N/A
