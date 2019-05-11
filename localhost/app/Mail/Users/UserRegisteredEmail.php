<?php

namespace App\Mail\Users;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisteredEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;//не $email_arr, т.к. отправка письма для каждого емейла
    public $user;
    public $password;

    public function __construct($email, User $user, $password)
    {
        $this->email = $email;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $password = $this->password;

        return $this->markdown('emails.users.user_registered', [
            'user'=>$user,
            'password'=>$password,
        ])
            ->subject(  "SportFit: Регистрация на сайте")
            //необходимо указывать от кого точно, иначе не будет отправляться - требование яндекса
            ->from("m-a-grigoreva@yandex.ru");
        //->from(config('mail.from.address')) и  env('APP_NAME') не работает тут;
    }
}
