<?php

namespace App\Mail\Users;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserVerifyToAdminEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $email = $this->email;
         $user = $this->user;

        return $this->markdown('emails.users.user_verify_to_admin', [
              'id'=>$user->id,
              'email'=>$user->email,
        ])
            ->subject(  "SportFit: Верификация email пользователя")
            ->from("m-a-grigoreva@yandex.ru");
    }
}
