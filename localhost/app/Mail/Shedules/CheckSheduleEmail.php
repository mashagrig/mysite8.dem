<?php

namespace App\Mail\Shedules;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckSheduleEmail extends Mailable  implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $shedule_id;

    public function __construct($shedule_id)
    {
        $this->shedule_id = $shedule_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //необходимо указывать от кого точно, иначе не будет отправляться - требование яндекса

        $shedule_id = $this->shedule_id;

        return $this->markdown('emails.shedules.check_shedule', ['shedule_id' => $shedule_id])
            ->subject(  "SportFit: Запись на тренировку" )
            ->from("m-a-grigoreva@yandex.ru");
    }
}
