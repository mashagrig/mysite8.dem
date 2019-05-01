<?php

namespace App\Listeners\Cards;

use App\Events\Cards\CheckCardEvent;
use App\Mail\Cards\CheckCardEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

//use App\Notifications\InfoNotification;
class CheckCardSendNotification
{
    //--------------------------------
 //   use Notifiable;
    //--------------------------------
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        ////нельзя передавать никакие парпметры в конструктор, даже если в событие передаются!!!
    }


    //--------------------------------

//    public $slack_webhook_url = 'https://sportfitworkspace.slack.com';
//
//    public function routeNotificationForSlack()
//    {
//        return $this->slack_webhook_url;
//    }

//    /**
//     * Получить представление уведомления для Slack.
//     *
//     * @param  mixed  $notifiable
//     * @return InfoNotification
//     */
//    public function toSlack($notifiable)
//    {
//
//        return (new InfoNotification)
//            ->content('Один из ваших счетов оплачен!');
//    }

    //--------------------------------------------
    /**
     * Handle the event.
     *
     * @param  CheckCardEvent  $event
     * @return void
     */
    public function handle(CheckCardEvent $event)
    {
        try{
    Mail::to($event->email)->queue(new CheckCardEmail($event->email, $event->card_id));//send
    }  catch(Swift_TransportException $e)
        {
            redirect()->back()->with(['message'=>'нет подключения к интернету']);
        }
    }
}
