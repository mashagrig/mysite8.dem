<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 13:54
 */

namespace App\Http\ViewComposers\Sliders;


use Illuminate\View\View;

class SliderPhotoGalleryComposer
{
    public function compose(View $view)
    {
        $arr = [
    [
        'file' => 'images/img_1.jpg',
        'title' => 'Тренажерный зал',
        'text' => 'Занятия на разогрев или занятия на кардио-тренажерах',
        'link' => 'programs',
    ],
    [
        'file' => 'images/img_2.jpg',
        'title' => 'Боди билдинг',
        'text' => 'Тяжелые силовые тренировки со свободными весами',
        'link' => 'programs',
    ],
    [
        'file' => 'images/img_3.jpg',
        'title' => 'Персональный тренер',
        'text' => 'Похудеть и сесть на шпагат возможно в любом возрасте',
        'link' => 'programs',
    ],
    [
        'file' => 'images/img_4.jpg',
        'title' => 'Силовые нагрузки',
        'text' => 'Акцент на эффективную функциональную подготовку',
        'link' => 'programs',
    ],
    [
        'file' => 'images/img_5.jpg',
        'title' => 'Эффективные тренировки',
        'text' => 'Искомый эффект в виде физического и духовного совершенствования',
        'link' => 'programs',
    ],
    [
        'file' => 'images/img_6.jpg',
        'title' => 'Качественное оборудование',
        'text' => 'Лучшая тренерская команда в фитнес-клубе Sport',
        'link' => 'programs',
    ],

];


        return $view->with([
            'slider_id'=>'photo_gallery',
            'title_page'=>'Фото нашего клуба',
            'arr'=>$arr,
            ]
        );
    }
}
