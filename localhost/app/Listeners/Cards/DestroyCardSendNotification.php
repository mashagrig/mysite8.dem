<?php

namespace App\Listeners\Cards;

use App\Events\Cards\DestroyCardEvent;
use App\Mail\Cards\DestroyCardEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class DestroyCardSendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //нельзя передавать никакие параметры в конструктор, даже если в событие передаются!!!
    }

    /**
     * Handle the event.
     *
     * @param  DestroyCardEvent  $event
     * @return void
     */
    public function handle(DestroyCardEvent $event)
    {
        foreach ($event->email_arr as $email){
            try{
                Mail::to($email)->queue(new DestroyCardEmail($email, $event->card_id));//send
            }  catch(Swift_TransportException $e)
            {
                redirect()->back();//->with(['message'=>'нет подключения к интернету']);
            }
        }
    }
}
