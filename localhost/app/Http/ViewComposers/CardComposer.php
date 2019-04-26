<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 14:54
 */

namespace App\Http\ViewComposers;


use App\Card;
use Illuminate\View\View;

class CardComposer
{
    public function compose(View $view)
    {
        $card_arr = array();

        array_push($card_arr,
         Card::select(
            'cards.id as card_id',
            'cards.title as card_title',
            'cards.count_month as card_count_month',
            'cards.count_day as card_count_day',
            'cards.price as card_price'
        )
            ->groupby('card_id')
            ->get());



        $arr = array();

        $arr = [
            [
                'card_id' => 1,
                'file' => 'images/img_1.jpg',
                'price' => 'от 120 000 руб.',
                'title' => 'Годовой абонемент',
                'text' => 'На 3 занятия в неделю по любой программе',
                'link' => 'cards_year',
            ],
            [
                'card_id' => 2,
                'file' => 'images/img_2.jpg',
                'price' => 'от 60 000 руб.',
                'title' => '6 месяцев',
                'text' => 'На 3 занятия в неделю по любой программе',
                'link' => 'cards_six_month',
            ],
            [
                'card_id' => 3,
                'file' => 'images/img_3.jpg',
                'price' => 'от 30 000 руб.',
                'title' => '3 месяца',
                'text' => 'На 3 занятия в неделю по любой программе',
                'link' => 'cards_three_month',
            ],
            [
                'card_id' => 4,
                'file' => 'images/img_4.jpg',
                'price' => 'от 10 000 руб.',
                'title' => '1 месяц',
                'text' => 'На 3 занятия в неделю по любой программе',
                'link' => 'cards_one_month',
            ],
            [
                'card_id' => 5,
                'file' => 'images/img_5.jpg',
                'price' => 'от 50 000 руб.',
                'title' => 'Персональная карта',
                'text' => 'Индивидуальный подбор количества занятий и программ',
                'link' => 'cards_personal',
            ],
            [
                'card_id' => 6,
                'file' => 'images/img_6.jpg',
                'price' => 'от 40 000 руб.',
                'title' => 'Детские карты',
                'text' => 'Индивидуальный подбор количества занятий и программ',
                'link' => 'cards_child',
            ],

        ];
        return $view->with([
            'arr'=>$arr,
            'card_arr'=>$card_arr,
        ]);
    }
}
