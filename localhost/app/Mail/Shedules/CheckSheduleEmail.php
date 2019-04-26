<?php

namespace App\Mail\Shedules;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckSheduleEmail extends Mailable
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
        //необходимо указывать от кого точно, иначе не будет отправляться - требование яндекса

        return $this->markdown('emails.shedules.check_shedule')
            ->subject(  "SportFit: Запись на тренировку" )
            ->from("m-a-grigoreva@yandex.ru");
    }
}
