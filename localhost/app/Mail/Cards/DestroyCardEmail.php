<?php

namespace App\Mail\Cards;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DestroyCardEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;//не $email_arr, т.к. отправка письма для каждого емейла
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
        $card_id = $this->card_id;

        return $this->markdown('emails.cards.destroy_card', ['card_id'=>$card_id])
            ->subject(  "SportFit: Отмена заказа клубной карты")
            //необходимо указывать от кого точно, иначе не будет отправляться - требование яндекса
            ->from("m-a-grigoreva@yandex.ru");
        //->from(config('mail.from.address')) и  env('APP_NAME') не работает тут;
    }
}
