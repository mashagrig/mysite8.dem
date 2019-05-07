<?php

namespace App\Mail\Comments;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddCommentEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $comment = $this->comment;

        return $this->markdown('emails.comments.add_comment', ['comment'=>$comment])
            ->subject(  "SportFit: Ваш отзыв о клубе")
            ->from("m-a-grigoreva@yandex.ru");
    }
}
