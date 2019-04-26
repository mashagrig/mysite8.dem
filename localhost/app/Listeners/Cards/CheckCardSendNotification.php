<?php

namespace App\Listeners\Cards;

use App\Events\Cards\CheckCardEvent;
use App\Mail\Cards\CheckCardEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class CheckCardSendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        ////нельзя передавать никакие парпметры в конструктор, даже если в событие передаются!!!
    }

    /**
     * Handle the event.
     *
     * @param  CheckCardEvent  $event
     * @return void
     */
    public function handle(CheckCardEvent $event)
    {
        Mail::to($event->email)->queue(new CheckCardEmail($event->email, $event->card_id));//send
    }
}
