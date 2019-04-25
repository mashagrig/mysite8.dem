
<?php

$arr = array();

$arr = [
    [
        'icon' => 'flaticon-gym-5',
        'price' => 'от 120 000 руб.',
        'title' => 'Годовой абонемент',
        'text' => 'На 3 занятия в неделю по любой программе',
        'link' => 'cards_year',
    ],
    [
        'icon' => 'flaticon-stretching-exercises',
        'price' => 'от 60 000 руб.',
        'title' => '6 месяцев',
        'text' => 'На 3 занятия в неделю по любой программе',
        'link' => 'cards_six_month',
    ],
    [
        'icon' => 'flaticon-gym-7',
        'price' => 'от 30 000 руб.',
        'title' => '3 месяца',
        'text' => 'На 3 занятия в неделю по любой программе',
        'link' => 'cards_three_month',
    ],
    [
        'icon' => 'flaticon-religion',
        'price' => 'от 10 000 руб.',
        'title' => '1 месяц',
        'text' => 'На 3 занятия в неделю по любой программе',
        'link' => 'cards_one_month',
    ],
    [
        'icon' => 'flaticon-fast',
        'price' => 'от 50 000 руб.',
        'title' => 'Персональная карта',
        'text' => 'Индивидуальный подбор количества занятий и программ',
        'link' => 'cards_personal',
    ],
    [
        'icon' => 'flaticon-fast',
        'price' => 'от 40 000 руб.',
        'title' => 'Детские карты',
        'text' => 'Индивидуальный подбор количества занятий и программ',
        'link' => 'cards_child',
    ],

];


?>


@include('icon_blocks.icon_blocks_cards', [
'icon_blocks_id'=>'cards',
'title_page'=>'Клубные карты нашего клуба',
'arr'=>$arr,
])

