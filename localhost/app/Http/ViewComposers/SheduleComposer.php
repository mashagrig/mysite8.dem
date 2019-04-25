<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 16:00
 */

namespace App\Http\ViewComposers;


use App\Shedule;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\View\View;

//use Illuminate\Support\Facades\View;

class SheduleComposer
{
        public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $request = $this->request;

//-------------------------------------

            if(empty($data)){
                $max_date_select = '';
                $program_select = '';
                $trainers_select ='';
                $shedule_for_date ='';
                $period_select ='';
                $check_shedule_id ='';
            }else{
                $max_date_select = $data->max_date_select;
                $program_select = $data->program_select;
                $trainers_select =$data->trainers_select;
                $shedule_for_date = $data->shedule_for_date;
                $period_select = $data->period_select;
                $check_shedule_id = $data->check_shedule_id;
            }




            $today = date('Y-m-d');
            try {
                $date = new DateTime(date('Y-m-d'));
            } catch (\Exception $e) {
            }
            $count_month = 1;
            $last_date = date_modify($date, "+{$count_month} month")->format('Y-m-d');

            if(isset($request->period))
            {
                $period_select = $request->period;

                switch ( $request->period) {
                    case "today":
                        $max_date_select = date("Y-m-d");
                        break;
                    case "tomorrow":
                        $max_date_select = date('Y-m-d', time() + 86400);
                        break;
                    case "week":
                        $max_date_select = date('Y-m-d', time() + 86400*7);
                        break;
                    case "month":
                        $max_date_select = date('Y-m-d', time() + 86400*31);
                        break;
//                case "month":
//                    $max_date_select =  date_modify(new DateTime(date('Y-m-d')), "+{$count_month} month")->format('Y-m-d');
//                    break;
                }

                if(isset($request->programs))
                {
                    $program_select = $request->programs;


                }
                if(isset($request->trainers))
                {
                    $trainers_select = $request->trainers;
                }
                //только если выбран период для фильтра расписания!!!
                view()->share('shedule_for_date',
                    $shedule_for_date = Shedule::select(
                        'shedules.id as shedule_id',
                        'shedules.date_training as date_training',

                        'shedules.trainingtime_id as trainingtime_id',
                        'trainingtimes.start_training as start_training',
                        'trainingtimes.stop_training as stop_training',

                        'shedules.user_id as trainer_id',
                        'personalinfos.name as trainer_name',

                        'shedules.section_id as section_id',
                        'sections.title as section_title',

                        'shedules.gym_id as gym_id',
                        'gyms.number as gym_number'
                    )
                        ->join('users', function ($join) {
                            $join->on('users.id', '=', 'shedules.user_id');
                        })
                        ->join('roles', function ($join) {
                            $join->on('roles.id', '=', 'users.role_id')
                                ->where('roles.title', 'like', '%trainer%');
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
                        ->where('shedules.date_training', '<=', "{$max_date_select}")
                        ->where('shedules.date_training', '>=', "{$today}")
                        ->where('sections.title', 'like', "%{$program_select}%")
                        ->where('users.id', 'like', "%{$trainers_select}%")
                        ->oldest('date_training')
                        ->oldest('start_training')
//                ->groupby('shedules.date_training')
//                ->distinct()
                        ->get()
                );





                $max_date_select = $shedule_for_date
                    ->unique('date_training')
                    ->pluck('date_training')
                    ->toArray();

                //тренеры
//            $all_morning_programs_trainers_id = $shedule_for_date
//                ->unique('trainer_id')
//                ->where('sections.title', 'like', "%morning_programs%")
//                ->pluck('trainer_id','trainer_name')
//                ->toArray();



            }


            if(isset($request->check_shedule_id) && (!empty($request->check_shedule_id)))
            {
                $check_shedule_id = $request->check_shedule_id;
            }



//-------------------------------------

            return $view->with([
                'max_date_select' => $max_date_select,
                'program_select' => $program_select,
                'trainers_select' => $trainers_select,
                'shedule_for_date' => $shedule_for_date,
                'period_select' => $period_select,
                'check_shedule_id'=>$check_shedule_id
            ]);
    }
}
