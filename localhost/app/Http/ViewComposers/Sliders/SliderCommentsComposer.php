<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 14:12
 */

namespace App\Http\ViewComposers\Sliders;


use Illuminate\View\View;

class SliderCommentsComposer
{
    public function compose(View $view)
    {
        return $view->with([
            'slider_id'=>'comments',
            'title_page'=>'Отзывы гостей нашего клуба',
            'route'=>'comments'
        ]);
    }
}
