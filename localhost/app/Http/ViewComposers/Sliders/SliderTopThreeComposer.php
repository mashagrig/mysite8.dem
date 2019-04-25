<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 13:39
 */

namespace App\Http\ViewComposers\Sliders;


use Illuminate\View\View;

class SliderTopThreeComposer
{
    public function compose(View $view)
    {
        return $view->with([
            'bg_1'=>'hero_b1_1.jpg',
            'top_slider_h1_1'=>'Фитнес клуб Sport',
            'top_slider_test_1'=>'Лучшие тренеры Москвы',
            'bg_2'=>'hero_bg_2.jpg',
            'top_slider_h1_2'=>'Эффективные тренировки',
            'top_slider_test_2'=>'Мы ценим Ваше время',
            'bg_3'=>'hero_bg_3.jpg',
            'top_slider_h1_3'=>'Цели достижимы',
            'top_slider_test_3'=>'Мы помогаем Вам на пути к успеху'
        ]);
    }
}
