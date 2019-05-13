<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 14:29
 */

namespace App\Http\ViewComposers\IconBlocks;


use App\Section;
use Illuminate\View\View;

class IconPogramsComposer
{
    public function compose(View $view)
    {

        $arr = array();

        $arr = [
            [
                'icon' => 'flaticon-gym-5',
                'program_id' => Section::where('title', 'like', '%morning_programs%')->first()->id,
                'title' => 'Утренние программы',
                'title_bd' => 'morning_programs',
                'text' => 'Занятия на разогрев или занятия на кардио-тренажерах',
                'link' => 'morning_programs',
            ],
            [
                'icon' => 'flaticon-gym-3',
                'program_id' => Section::where('title', 'like', '%body_building%')->first()->id,
                'title' => 'Боди билдинг',
                'title_bd' => 'body_building',
                'text' => 'Тяжелые силовые тренировки со свободными весами',
                'link' => 'body_building',
            ],
            [
                'icon' => 'flaticon-stretching-exercises',
                'program_id' => Section::where('title','like', '%stretching%')->first()->id,
                'title' => 'Стретчинг',
                'title_bd' => 'stretching',
                'text' => 'Похудеть и сесть на шпагат возможно в любом возрасте',
                'link' => 'stretching',
            ],
            [
                'icon' => 'flaticon-gym-7',
                'program_id' => Section::where('title', 'like', '%fitness%')->first()->id,
                'title' => 'Фитнес',
                'title_bd' => 'fitness',
                'text' => 'Акцент на эффективную функциональную подготовку',
                'link' => 'fitness',
            ],
            [
                'icon' => 'flaticon-religion',
                'program_id' => Section::where('title', 'like', '%yoga%')->first()->id,
                'title' => 'Йога',
                'title_bd' => 'yoga',
                'text' => 'Искомый эффект в виде физического и духовного совершенствования',
                'link' => 'yoga',
            ],
            [
                'icon' => 'flaticon-fast',
                'program_id' => Section::where('title', 'like', '%child_programs%')->first()->id,
                'title' => 'Детсткие программы',
                'title_bd' => 'child_programs',
                'text' => 'При участии родителей или под руководством опытного инструктора',
                'link' => 'child_programs',
            ],

        ];
        return $view->with([
            'icon_blocks_id'=>'programs',
            'title_page'=>'Программы нашего клуба',
            'arr_icon'=>$arr,
        ]);
    }
}
