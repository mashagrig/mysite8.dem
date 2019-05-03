<?php

namespace App\Providers;

use App\Events\Cards\CheckCardEvent;
use App\Listeners\Cards\CheckCardSendNotification;
use App\Events\Shedules\CheckSheduleEvent;
use App\Listeners\Shedules\CheckSheduleSendNotification;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        //отправка писем при заказе карты
        'App\Events\Cards\CheckCardEvent' => [
       // CheckCardSendNotification::class => [
            'App\Listeners\Cards\CheckCardSendNotification',
        ],
        //отправка писем при записи на тренировку
        'App\Events\Shedules\CheckSheduleEvent' => [
            'App\Listeners\Shedules\CheckSheduleSendNotification',
        ],
        //отправка писем при обращении на сайт через форму контактов
        'App\Events\Contacts\ContactsEvent' => [
            'App\Listeners\Contacts\ContactsSendNotification',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
