<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 26.04.19
 * Time: 15:51
 */

namespace App\Http\ViewComposers;


use Illuminate\View\View;

class SignupCardComposer
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
