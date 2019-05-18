<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 16.05.19
 * Time: 19:32
 */

namespace App\Http\ViewComposers\privacies\admin;


use App\Content;
use App\Section;
use App\Shedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShedulesAdminComposer
{
    public $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $request = $this->request;

      //  $date_training = $request->date_training;
      //  $time_id = $request->time_id;
       // $admin_gyms = $request->admin_gyms;
       // $admin_programs = $request->admin_programs;
      //  $admin_trainers = $request->admin_trainers;


        //default
        $today = date('Y-m-d');
        $max_date = date('Y-m-d', time() + 86400*1);
        $max_period = "1";

        $shedule_for_period = [];


            //за какой период расписание показать
            if($request->max_period !== null){
                $max_period = $request->max_period;//в формате "31"
            }

        switch ($max_period) {
            case "1":
                $max_date = date('Y-m-d', time() + 86400*1);
                break;
            case "7":
                $max_date = date('Y-m-d', time() + 86400*7);
                break;
            case "31":
                $max_date = date('Y-m-d', time() + 86400*31);
                break;
        }


//        if(!empty($request->admin_programs) || $request->admin_programs === '' || $request->admin_programs === null || $request->admin_programs === 'null'  ){
//            $admin_programs = null;
//        }else if($request->admin_programs !== '' && $request->admin_programs !== null ){
//            $admin_programs =  Section::where('title', 'like', "%{$request->admin_programs}%")
//                ->first()->id;
//        }
//
//        if($request->admin_trainers === '' || $request->admin_trainers === null ){
//            $admin_trainers = null;
//        }else if($request->admin_trainers !== '' && $request->admin_trainers !== null ){
//            $admin_trainers = $request->admin_trainers;
//        }
//

            //если заполнили поля (все!)
//            if(
//                $request->date_training !== null
//            && $request->time_id !== null
//            && $request->admin_gyms !== null
//            && $request->admin_programs !== null
//            && $request->admin_trainers !== null
//            ){
//                $date_training = $request->date_training;
//                $time_id = $request->time_id;
//                $admin_gyms = $request->admin_gyms;
//                $admin_programs = $request->admin_programs;
//                $admin_trainers = $request->admin_trainers;
  //          }






        //----------------------------------------------------
        //окончательно выводим - передаем в шаблон
        $shedule_for_period = Shedule::select(
            'shedules.id as shedule_id',
            'shedules.date_training as date_training',

            'shedules.trainingtime_id as trainingtime_id',
            'trainingtimes.start_training as start_training',
            'trainingtimes.stop_training as stop_training',

            'shedules.user_id as trainer_id',
            'personalinfos.surname as trainer_surname',
            'personalinfos.name as trainer_name',
            'personalinfos.middle_name as trainer_middle_name',

            'shedules.section_id as section_id',
            'sections.title as section_title',

            'shedules.gym_id as gym_id',
            'gyms.number as gym_number'
        )
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'shedules.user_id');
            })
            ->join('roles', function ($join) {
                $join->on('roles.id', '=', 'users.role_id');
                  //  ->where('roles.title', 'like', '%trainer%');
            })
            ->join('personalinfos', function ($join) {
                $join->on('personalinfos.id', '=', 'users.personalinfo_id');
            })

            ->join('trainingtimes', function ($join) {
                $join->on('trainingtimes.id', '=', 'shedules.trainingtime_id');
            })
            ->join('sections', function ($join) {
                $join->on('sections.id', '=', 'shedules.section_id');
            })
            ->join('gyms', function ($join) {
                $join->on('gyms.id', '=', 'shedules.gym_id');
            })
            ->where('roles.title', 'like', '%trainer%')
            ->where('shedules.date_training', '<=', "{$max_date}")
            ->where('shedules.date_training', '>=', "{$today}")
          //  ->where('sections.title', 'like', "%{$admin_programs}%")
          //  ->where('users.id', 'like', "%{$admin_trainers}%")
            ->oldest('date_training')
            ->oldest('start_training')
//                ->groupby('shedules.date_training')
//                ->distinct()
            ->get()
            ->toArray();//МАССИВ!!!
        //----------------------------------------------------

//-------------------------------------

        return $view->with([
            'shedule_for_period' => $shedule_for_period,
            'max_period'=>$max_period ,
        ]);
    }
}
