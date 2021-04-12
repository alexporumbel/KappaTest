<?php

namespace App\Providers;

use App\Channels\SmsChannel;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Notification::extend('sms', function ($app) {
            return new SmsChannel();
        });
    }
}
