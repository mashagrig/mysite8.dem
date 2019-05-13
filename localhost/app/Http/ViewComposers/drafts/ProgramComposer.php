<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 14:55
 */

namespace App\Http\ViewComposers;


use App\Section;
use Illuminate\View\View;

class ProgramComposer
{
    public function compose(View $view)
    {
        $arr = array();

        $arr = [
            [
                'file' => 'images/img_1.jpg',
                'program_id' => Section::where('title', 'like', '%morning_programs%')->first()->id,
                'title' => 'Утренние программы',
                'title_bd' => 'morning_programs',
                'text' => 'Занятия на разогрев или занятия на кардио-тренажерах',
                'link' => 'morning_programs',
            ],
            [
                'file' => 'images/img_2.jpg',
                'program_id' => Section::where('title', 'like', '%body_building%')->first()->id,
                'title' => 'Боди билдинг',
                'title_bd' => 'body_building',
                'text' => 'Тяжелые силовые тренировки со свободными весами',
                'link' => 'body_building',
            ],
            [
                'file' => 'images/img_3.jpg',
                'program_id' => Section::where('title','like', '%stretching%')->first()->id,
                'title' => 'Стретчинг',
                'title_bd' => 'stretching',
                'text' => 'Похудеть и сесть на шпагат возможно в любом возрасте',
                'link' => 'stretching',
            ],
            [
                'file' => 'images/img_4.jpg',
                'program_id' => Section::where('title', 'like', '%fitness%')->first()->id,
                'title' => 'Фитнес',
                'title_bd' => 'fitness',
                'text' => 'Акцент на эффективную функциональную подготовку',
                'link' => 'fitness',
            ],
            [
                'file' => 'images/img_5.jpg',
                'program_id' => Section::where('title', 'like', '%yoga%')->first()->id,
                'title' => 'Йога',
                'title_bd' => 'yoga',
                'text' => 'Искомый эффект в виде физического и духовного совершенствования',
                'link' => 'yoga',
            ],
            [
                'file' => 'images/img_6.jpg',
                'program_id' => Section::where('title', 'like', '%child_programs%')->first()->id,
                'title' => 'Детсткие программы',
                'title_bd' => 'child_programs',
                'text' => 'При участии родителей или под руководством опытного инструктора',
                'link' => 'child_programs',
            ],

        ];
        return $view->with([
            'arr'=>$arr,
        ]);
    }
}
