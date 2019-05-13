<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;

class InfoNotification extends Notification
{
    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }

        $r = $this->verificationUrl($notifiable);
           //     Mail::to($email)->queue(new UserVerificationEmail($email, $event->user, $event->password));//send

//        return (new MailMessage)
//            ->subject(Lang::getFromJson('Verbjhbjhbjbify Email Address'))
//            ->line(Lang::getFromJson('Please click the button below to verify your email address.'))
//            ->action(
//                Lang::getFromJson('Verify Email Address'),
//                $this->verificationUrl($notifiable)
//            )
//            ->line(Lang::getFromJson('If you did not create an account, no further action is required.'));

        return  (new MailMessage)
        ->markdown('emails.users.user_verification', [
              'route'=>$r,
        ])
            ->subject(  "SportFit: Регистрация на сайте - верификсмсмация")
            ->from("m-a-grigoreva@yandex.ru");
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            ['id' => $notifiable->getKey()]
        );
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
//    use Queueable;
//
//    /**
//     * Create a new notification instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        //
//    }
//
//    /**
//     * Get the notification's delivery channels.
//     *
//     * @param  mixed  $notifiable
//     * @return array
//     */
//    public function via($notifiable)
//    {
//        return ['slack'];
//    }
//    /**
//     * Получить представление уведомления для Slack.
//     *
//     * @param  mixed  $notifiable
//     * @return InfoNotification
//     */
////    public function toSlack($notifiable)
////    {
////
////        return (new SlackMessage)
////            ->content('Один из ваших счетов оплачен!');
////    }
//
////    public function toSlack($notifiable)
////    {
////        return (new SlackMessage)
////            ->from($this->username, $this->icon)
////            ->to($this->channel)
////            ->content($this->message);
////    }
//    /**
//     * Get the mail representation of the notification.
//     *
//     * @param  mixed  $notifiable
//     * @return \Illuminate\Notifications\Messages\MailMessage
//     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }
//
//    /**
//     * Get the array representation of the notification.
//     *
//     * @param  mixed  $notifiable
//     * @return array
//     */
//    public function toArray($notifiable)
//    {
//        return [
//            //
//        ];
//    }
}
