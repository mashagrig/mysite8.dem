<?php

namespace App\Listeners\Comments;

use App\Events\Comments\AddCommentEvent;
use App\Mail\Comments\AddCommentEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class AddCommentSendNotification
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
     * @param  AddCommentEvent  $event
     * @return void
     */
    public function handle(AddCommentEvent $event)
    {
        foreach ($event->email_arr as $email){
            try{
                Mail::to($email)->queue(new AddCommentEmail($event->comment));//send
            }  catch(Swift_TransportException $e)
            {
                redirect()->back();//->with(['message'=>'нет подключения к интернету']);
            }
        }
    }
}
