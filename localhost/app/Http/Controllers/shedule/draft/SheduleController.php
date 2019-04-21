<?php

namespace App\Http\Controllers\shedule;

use App\Section;
use App\Trainingshedule;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $max_date_select = '';
        $program_select = '';
        $trainers_select ='';
        $shedule_for_date ='';
        $period_select ='';
        return view('shedule.page_shedule', [
            'max_date_select' => $max_date_select,
            'program_select' => $program_select,
            'trainers_select' => $trainers_select,
            'shedule_for_date' => $shedule_for_date,
            'period_select' => $period_select,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max_date_select = '';
        $program_select = '';
        $trainers_select ='';
        $shedule_for_date ='';
        $period_select ='';


        $today = date('Y-m-d');
        $date = new DateTime(date('Y-m-d'));
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

                if(isset($request->trainers))
                {
                    $trainers_select = $request->trainers;
                }
            }

            //только если выбран период для фильтра расписания!!!

            $shedule_for_date =Trainingshedule::select(
                'trainingshedules.date_training as date_training',
                'trainingtimes.start_training as start_training',
                'trainingtimes.stop_training as stop_training',
                'trainingshedules.user_id as user_id',
                'personalinfos.name as personalinfos_name',
                'trainingshedules.section_id as section_id',
                'sections.title as section_title',
                'trainingshedules.gym_id as gym_id'
            )
                ->join('users', function ($join) {
                    $join->on('users.id', '=', 'trainingshedules.user_id');
                })
                ->join('personalinfos', function ($join) {
                    $join->on('personalinfos.id', '=', 'users.personalinfo_id');
                })
                ->join('roles', function ($join) {
                    $join->on('roles.id', '=', 'users.role_id');
                })
                ->join('trainingtimes', function ($join) {
                    $join->on('trainingtimes.id', '=', 'trainingshedules.trainingtime_id');
                })

                ->join('sections', function ($join) {
                    $join->on("sections.id", '=', 'trainingshedules.section_id');
                })
                ->join('gyms', function ($join) {
                    $join->on('gyms.id', '=', 'trainingshedules.gym_id');
                })
//            ->join('sections', function ($join) use ($program_select) {
//                $join->on('sections.id', '=', 'trainingshedules.section_id')
//                    ->union(
//                        Section::select('sections.id')
//                            ->where('sections.title', 'like', "{$program_select}")
//                    )
//                ;
//            })

                ->where('roles.title', 'like', '%trainer%')
                // ->groupby('trainingshedules.date_training')
                ->where('trainingshedules.date_training', '<=', "{$max_date_select}")
                ->where('trainingshedules.date_training', '>=', "{$today}")
                ->where('sections.title', 'like', "%{$program_select}%")
                ->oldest('date_training')
                ->oldest('start_training')
                ->get();


            $max_date_select = $shedule_for_date
                ->unique('date_training')
                ->pluck('date_training')
                ->toArray();

            //тренеры
            $all_fitness_trainers_id = $shedule_for_date
                ->where('sections.title', 'like', "%fitness%")
                ->pluck(['trainingshedules.user_id', 'personalinfos.name'])
                ->toArray();



        }


        return view('shedule.page_shedule', [
            'max_date_select' => $max_date_select,
            'program_select' => $program_select,
            'trainers_select' => $trainers_select,
            'shedule_for_date' => $shedule_for_date,
            'period_select' => $period_select,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('shedule.page_shedule');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
