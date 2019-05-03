<?php

namespace App\Mail\Contacts;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactsEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contacts.send_question')
            ->subject(  "SportFit: Вопрос на сайт")
            //необходимо указывать от кого точно, иначе не будет отправляться - требование яндекса
            ->from("m-a-grigoreva@yandex.ru");
        //->from(config('mail.from.address')) и  env('APP_NAME') не работает тут;
    }
}
