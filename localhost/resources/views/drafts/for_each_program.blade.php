
<?php

$arr = array();

$arr = [
    [
        'file' => 'images/img_1.jpg',
        'title' => 'Утренние программы',
        'text' => 'Занятия на разогрев или занятия на кардио-тренажерах',
        'link' => 'morning_programs',
    ],
    [
        'file' => 'images/img_2.jpg',
        'title' => 'Боди билдинг',
        'text' => 'Тяжелые силовые тренировки со свободными весами',
        'link' => 'body_building',
    ],
    [
        'file' => 'images/img_3.jpg',
        'title' => 'Стретчинг',
        'text' => 'Похудеть и сесть на шпагат возможно в любом возрасте',
        'link' => 'stretching',
    ],
    [
        'file' => 'images/img_4.jpg',
        'title' => 'Фитнес',
        'text' => 'Акцент на эффективную функциональную подготовку',
        'link' => 'fitness',
    ],
    [
        'file' => 'images/img_5.jpg',
        'title' => 'Йога',
        'text' => 'Искомый эффект в виде физического и духовного совершенствования',
        'link' => 'yoga',
    ],
    [
        'file' => 'images/img_6.jpg',
        'title' => 'Детсткие программы',
        'text' => 'При участии родителей или под руководством опытного инструктора',
        'link' => 'child_programs',
    ],

];


?>


@include('programs.each_program', [
'arr'=>$arr,
])

