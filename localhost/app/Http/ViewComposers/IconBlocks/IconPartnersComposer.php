<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 14:46
 */

namespace App\Http\ViewComposers\IconBlocks;


use Illuminate\View\View;

class IconPartnersComposer
{
    public function compose(View $view)
    {

        $arr = array();

        $arr = [
            [
                'file' => 'images/img_1.jpg',
                'title' => 'ГАЗПРОМ',
                'text' => 'Партнер клуба',
                'link' => 'www.gazprom.ru',
            ],
            [
                'file' => 'images/img_2.jpg',
                'title' => 'FIFA',
                'text' => 'Партнер клуба',
                'link' => 'www.gazprom.ru',
            ],
            [
                'file' => 'images/img_3.jpg',
                'title' => 'WADA',
                'text' => 'Партнер клуба',
                'link' => 'www.gazprom.ru',
            ],
            [
                'file' => 'images/img_4.jpg',
                'title' => 'СПАРТАК',
                'text' => 'Партнер клуба',
                'link' => 'www.gazprom.ru',
            ],
            [
                'file' => 'images/img_5.jpg',
                'title' => 'ЦСКА',
                'text' => 'Партнер клуба',
                'link' => 'www.gazprom.ru',
            ],
            [
                'file' => 'images/img_6.jpg',
                'title' => 'ДИНАМО',
                'text' => 'Партнер клуба',
                'link' => 'www.gazprom.ru',
            ],

        ];

        return $view->with([
            'icon_blocks_id'=>'partners',
            'title_page'=>'Партнеры нашего клуба',
            'arr'=>$arr,
        ]);
    }
}
