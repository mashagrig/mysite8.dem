<?php

namespace App\Mail\Cards;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckCardEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $email;
    public $card_id;

    public function __construct($email, $card_id)
    {
        $this->email = $email;
        $this->card_id = $card_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.cards.check_card')
            ->subject(config('app.name') . ": Checked Card")
            ->from(config('mail.from.address'));
    }
}
