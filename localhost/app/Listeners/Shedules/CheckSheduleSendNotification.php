<?php

namespace App\Listeners\Shedules;

use App\Events\Shedules\CheckSheduleEvent;
use App\Mail\Shedules\CheckSheduleEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class CheckSheduleSendNotification
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
     * @param  CheckSheduleEvent  $event
     * @return void
     */
    public function handle(CheckSheduleEvent $event)
    {
        Mail::to($event->email)->queue(new CheckSheduleEmail($event->email));//send
    }
}
