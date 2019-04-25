<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 14:02
 */

namespace App\Http\ViewComposers\Sliders;


use Illuminate\View\View;

class SliderTrainersComposer
{
    public function compose(View $view)
    {
        return $view->with([
            'slider_id'=>'trainers',
            'title_page'=>'Тренеры нашего клуба',
            'route'=>'trainers'
        ]);
    }
}
