<?php

namespace App\Providers;

use App\Content;
use App\Events\Cards\CheckCardEvent;
use App\Listeners\Cards\CheckCardSendNotification;
use App\Observers\ContentObserver;
use App\Personalinfo;
use App\Shedule;
use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    //------------------------------------
    use Notifiable;
    /**
     * Route notifications for the Slack channel.
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return 'https://sportfitworkspace.slack.com';
    }

    //------------------------------------



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        }
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Content::observe(ContentObserver::class);

        //-------------------------------
//        Queue::failing(function (CheckCardEvent $event) {
//            // Notify team of failing job
//            $when = Carbon::now()->addSeconds(10);
//            $this->notify((new CheckCardSendNotification()));
//        });
        //-------------------------------
    }
}
