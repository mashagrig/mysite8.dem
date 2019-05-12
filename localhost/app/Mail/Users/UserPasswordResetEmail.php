<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserPasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;//не $email_arr, т.к. отправка письма для каждого емейла
    public $token;

    public function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // $email = $this->email;
        $token = $this->token;

        return $this->markdown('emails.users.user_password_reset', [
            'token'=>$token,
        ])
            ->subject(  "SportFit: Сброс пароля")
            ->from("m-a-grigoreva@yandex.ru");
    }
}
