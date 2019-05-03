<?php

namespace App\Listeners\Shedules;

use App\Events\Shedules\CheckSheduleEvent;
use App\Mail\Shedules\CheckSheduleEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class CheckSheduleSendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    public function __construct()
    {
      //нельзя передавать никакие парпметры в конструктор, даже если в событие передаются!!!
    }

    /**
     * Handle the event.
     *
     * @param  CheckSheduleEvent  $event
     * @return void
     */
    public function handle(CheckSheduleEvent $event)
    {
        foreach ($event->email_arr as $email){
            try{
                Mail::to($email)->queue(new CheckSheduleEmail($event->shedule_id));//send
            }  catch(Swift_TransportException $e)
            {
                redirect()->back();//->with(['message'=>'нет подключения к интернету']);
            }
        }
    }
}
