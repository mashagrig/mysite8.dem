<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 27.04.19
 * Time: 16:31
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class MessageComposer
{
    public $message;

    public function __construct()
    {
      //  $this->message=$message;
    }

    public function  compose (View $view) {
     //    $message = $this->message;
        $message = 'Вам на почту было выслано письмо с информацие о Вашей заявки на получение клубной карты';
            return $view->with('message', $message);

    }
}

