<?php

namespace App\Listeners\Cards;

use App\Events\Cards\CheckCardEvent;
use App\Mail\Cards\CheckCardEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class CheckCardSendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckCardEvent  $event
     * @return void
     */
    public function handle(CheckCardEvent $event)
    {
        Mail::to($event->email)->send(new CheckCardEmail($event->email, $event->card_id));
    }
}
