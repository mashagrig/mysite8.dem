<?php

namespace App\Listeners\Users;

use App\Events\Users\UserRegisteredEvent;
use App\Mail\Users\UserRegisteredEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class UserRegisteredSendNotification
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
     * @param  UserRegisteredEvent  $event
     * @return void
     */
    public function handle(UserRegisteredEvent $event)
    {

        foreach ($event->email_arr as $email){
            try{
                Mail::to($email)->queue(new UserRegisteredEmail($email, $event->user, $event->password));//send
            }  catch(Swift_TransportException $e)
            {
                redirect()->back();//->with(['message'=>'нет подключения к интернету']);
            }
        }
    }
}
