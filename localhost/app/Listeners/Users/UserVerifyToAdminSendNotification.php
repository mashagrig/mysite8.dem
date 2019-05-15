<?php

namespace App\Listeners\Users;

use App\Events\Users\UserVerifyToAdminEvent;
use App\Mail\Users\UserVerifyToAdminEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class UserVerifyToAdminSendNotification
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
     * @param  UserVerifyToAdminEvent  $event
     * @return void
     */
    public function handle(UserVerifyToAdminEvent $event)
    {
        foreach ($event->email_arr as $email){
            try{
                Mail::to($email)->queue(new UserVerifyToAdminEmail($event->user));//send
            }  catch(Swift_TransportException $e)
            {
                redirect()->back();//->with(['message'=>'нет подключения к интернету']);
            }
        }
    }
}
