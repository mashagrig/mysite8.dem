<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserVerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;//не $email_arr, т.к. отправка письма для каждого емейла

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
        // $email = $this->email;

        return $this->markdown('emails.users.user_verification', [
          //  'token'=>$token,
        ])
            ->subject(  "SportFit: Регистрация на сайте - верификация")
            ->from("m-a-grigoreva@yandex.ru");
    }
}
