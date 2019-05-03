<?php

namespace App\Mail\Contacts;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactsEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    //--------------------------
    // implements ShouldQueue
    //--------------------------
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;//не $email_arr, т.к. отправка письма для каждого емейла
    public $question;

    public function __construct($question)
    {
     //   $this->email = $email;
        $this->question = $question;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $question = $this->question;

        return $this->markdown('emails.contacts.send_question', ['question'=>$question])
            ->subject(  "SportFit: Вопрос на сайт")
            ->from("m-a-grigoreva@yandex.ru");
    }
}
