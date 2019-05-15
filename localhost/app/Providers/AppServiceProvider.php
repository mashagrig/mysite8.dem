<?php

namespace App\Providers;

use App\Content;
use App\Events\Cards\CheckCardEvent;
use App\Listeners\Cards\CheckCardSendNotification;
use App\Observers\ContentObserver;
use App\Observers\UserObserver;
use App\Personalinfo;
use App\Shedule;
use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        //создание слага по добавлению в бд
       // Content::observe(ContentObserver::class);
        User::observe(UserObserver::class);

        //-------------------------------
//        Queue::failing(function (CheckCardEvent $event) {
//            // Notify team of failing job
//            $when = Carbon::now()->addSeconds(10);
//            $this->notify((new CheckCardSendNotification()));
//        });
        //-------------------------------
//        Blade::directive('trainer', function() {
//            return auth()->check() && Auth::user()->isTrainer();
//        });

        Blade::if('admin', function() {
            return auth()->check() && Auth::user()->isAdmin();
        });
        Blade::if('guestCheckAuth', function() {
            return auth()->check() && Auth::user()->isGuest();//возможно добавить и isAdmin()
        });
        Blade::if('trainer', function() {
            return auth()->check() && Auth::user()->isTrainer();
        });
        Blade::if('support', function() {
            return auth()->check() && Auth::user()->isSupport();
        });
        Blade::if('content', function() {
            return auth()->check() && Auth::user()->isContent();
        });

    }
}
