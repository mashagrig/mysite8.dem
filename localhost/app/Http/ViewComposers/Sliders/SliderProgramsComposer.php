<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 14:21
 */

namespace App\Http\ViewComposers\Sliders;


use Illuminate\View\View;

class SliderProgramsComposer
{
    public function compose(View $view)
    {

        $arr = array();
        for ($i=1; $i< 7; $i++)  {
            $arr['file'][$i] = "images/img_".$i.".jpg" ;
        }

        $arr['title'] = [
            '1'=>'Тренажерный зал',
            '2'=>'Боди билдинг',
            '3'=>'Персональный тренер',
            '4'=>'Силовые нагрузки',
            '5'=>'Эффективные тренировки',
            '6'=>'Качественное оборудование',
        ];
        $arr['text'] = [
            '1'=>'Занятия на разогрев или занятия на кардио-тренажерах',
            '2'=>'Тяжелые силовые тренировки со свободными весами',
            '3'=>'Похудеть и сесть на шпагат возможно в любом возрасте',
            '4'=>'Акцент на эффективную функциональную подготовку',
            '5'=>'Искомый эффект в виде физического и духовного совершенствования',
            '6'=>'Лучшая тренерская команда в фитнес-клубе Sport',
        ];
        $arr['link'] = [
            '1'=>'programs',
            '2'=>'programs',
            '3'=>'programs',
            '4'=>'programs',
            '5'=>'programs',
            '6'=>'programs',
        ];

        return $view->with(['arr'=>$arr ]);
    }
}
