<?php

namespace App\Http\Controllers;

use App\Shedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SingupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check_shedule_id = array();
        $max_date_select = array();
        $each_check_shedule_info = array();

        //--------------------------------------------------------

        //определяем поьзоватея (в роли гостя)
        $current_user = Auth::user()->getAuthIdentifier();
//
//        $trainer_id = User::select(
//            'users.id as trainer_id',
//            'personalinfos.text as trainer_text'
//        )
//            ->join('roles', function ($join) {
//                $join->on('roles.id', '=', 'users.role_id');
//            })
//
//            ->join('personalinfos', function ($join) {
//                $join->on('personalinfos.id', '=', 'users.personalinfo_id');
//            })
//            ->where('roles.title', 'like', '%trainer%')
//            ->get('id');//[0]->id;

        $today = date("Y-m-d");
        $max_date = date('Y-m-d', time() + 86400*31);

        array_push($each_check_shedule_info,
            Shedule::select(
            'shedules.id as shedule_id',
            'shedules.date_training as date_training',
            'shedules.user_id as trainer_id',
            'personalinfos.name as trainer_name',
            'sections.title as section_title',
            'trainingtimes.start_training as start_training',
            'trainingtimes.stop_training as stop_training',
            'shedules.section_id as section_id',
            'shedules.gym_id as gym_id',
             'gyms.number as gym_number'
        )
                //trainer
                ->join('users', function ($join) {
                $join->on('users.id', '=', 'shedules.user_id');
            })
                //user
                    //это только для Model, не для Pivot
//                ->join('shedule_user', function ($join) use($current_user) {
//                    $join->on('shedule_user.shedule_id', '=', 'shedules.id');
//                    $join->on('shedule_user.user_id', '=', 'users.id')
//                        ->where('shedule_user.user_id', '=', "{$current_user}");
//            })
                ->whereHas('users', function ($q) use($current_user){
                    $q->where('users.id', '=', "{$current_user}");
                })
                //-----------------
                ->join('roles', function ($join) {
                    $join->on('roles.id', '=', 'users.role_id')
                     //   ->where('roles.title', 'like', '%trainer%')
                    ;
                })
                ->join('personalinfos', function ($join) {
                    $join->on('personalinfos.id', '=', 'users.personalinfo_id');
                })
            //-----------------
            ->join('trainingtimes', function ($join) {
                $join->on('trainingtimes.id', '=', 'shedules.trainingtime_id');
            })
            ->join('sections', function ($join) {
                $join->on("sections.id", '=', 'shedules.section_id');
            })
            ->join('gyms', function ($join) {
                $join->on('gyms.id', '=', 'shedules.gym_id');
            })
            ->where('shedules.date_training', '<=', "{$max_date}")
            ->where('shedules.date_training', '>=', "{$today}")
            ->groupby('shedule_id')
            ->oldest('date_training')
            ->oldest('start_training')
            ->get()
        );

        foreach ($each_check_shedule_info as $kk => $singup) {

            foreach ($singup as $k => $v) {

                array_push(
                    $max_date_select,
                    $singup[$k]['date_training']);
            }
        }
        $max_date_select = array_unique($max_date_select);
        //--------------------------------------------------------


        return view('singup.success_singup_list', [
            'check_shedule_id' => $check_shedule_id,
            'max_date_select' => $max_date_select,
            'each_check_shedule_info' => $each_check_shedule_info,
        ]);
//        return view('singup.success_singup_list', [
//            'check_shedule_id' => $check_shedule_id,
//            'max_date_select' => $max_date_select,
//            'each_check_shedule_info' => $each_check_shedule_info,
//        ]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_shedule_id = array();
        $max_date_select = array();
        $each_check_shedule_info = array();

        //определяем поьзоватея (в роли гостя)
        $current_user = Auth::user()->getAuthIdentifier();
        $user = User::find($current_user);

        //для всех выбранных позиций в расписании
        if (isset($request->check_shedule_id) && (!empty($request->check_shedule_id))) {

            $check_shedule_id = $request->check_shedule_id;

            foreach ($check_shedule_id as $k=>$id) {

                $training_arr =  Shedule::
                whereHas('users', function ($q) use($id){
                    $q->where('shedules.id', '=', "{$id}");
                })
                    ->pluck('id')
                    ->toArray();

                $user_arr =  Shedule::
                whereHas('users', function ($q) use($current_user){
                    $q->where('users.id', '=', "{$current_user}");
                })
                    ->pluck('id')
                    ->toArray();

                //запись в базу запрошенных UNIQUE тренировок на пользователя
                if(!(in_array( $id, $training_arr) && in_array( $id, $user_arr))){
                    Shedule::find($id)
                        ->users()
                        ->attach($user);
                }


                //вывод запрашиваемых запией на тренировки
                //вывод сохраненных??? запией на тренировки
                array_push($each_check_shedule_info,
                    //______________________________________
                   Shedule::select(
                       'shedules.id as shedule_id',
                       'shedules.date_training as date_training',
                       'shedules.user_id as trainer_id',
                       'personalinfos.name as trainer_name',
                       'sections.title as section_title',
                       'trainingtimes.start_training as start_training',
                       'trainingtimes.stop_training as stop_training',
                       'shedules.section_id as section_id',
                       'shedules.gym_id as gym_id',
                       'gyms.number as gym_number'
                   )
                       //trainer
                       ->join('users', function ($join) {
                           $join->on('users.id', '=', 'shedules.user_id');
                       })
                       //user
//                       ->join('shedule_user', function ($join) use($current_user) {
//                           $join->on('shedule_user.shedule_id', '=', 'shedules.id');
//                           $join->on('shedule_user.user_id', '=', 'users.id')
//                               ->where('shedule_user.user_id', '=', "{$current_user}");
//                       })
                       ->whereHas('users', function ($q) use($current_user){
                           $q->where('users.id', '=', "{$current_user}");
                       })
                       //-----------------
                       ->join('roles', function ($join) {
                           $join->on('roles.id', '=', 'users.role_id');
                            //   ->where('roles.title', 'like', '%trainer%');
                       })
                       ->join('personalinfos', function ($join) {
                           $join->on('personalinfos.id', '=', 'users.personalinfo_id');
                       })
                       //-----------------
                       ->join('trainingtimes', function ($join) {
                           $join->on('trainingtimes.id', '=', 'shedules.trainingtime_id');
                       })
                       ->join('sections', function ($join) {
                           $join->on("sections.id", '=', 'shedules.section_id');
                       })
                       ->join('gyms', function ($join) {
                           $join->on('gyms.id', '=', 'shedules.gym_id');
                       })
                   ->where('shedules.id', '=', "{$id}")
                       ->oldest('date_training')
                       ->oldest('start_training')
                       ->get()
                    //______________________________________
                );
            }
        }
                foreach ($each_check_shedule_info as $kk => $singup) {

                    foreach ($singup as $k => $v) {

                        array_push(
                            $max_date_select,
                            $singup[$k]['date_training']);
                    }
                }
        $max_date_select = array_unique($max_date_select);

//        array_push(
//            $max_date_select,
//            array_unique( array_column($each_check_shedule_info, 'date_training')) )  ;

        return redirect()->action('SingupController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //определяем поьзоватея (в роли гостя)
        $current_user = Auth::user()->getAuthIdentifier();
        $user = User::find($current_user);

        //для всех выбранных позиций в расписании
        if (isset($request->check_shedule_id) && (!empty($request->check_shedule_id))) {
            $check_shedule_id = $request->check_shedule_id;

            foreach ($check_shedule_id as $k => $id) {

                //удаление из базы запрошенных тренировок на пользователя
                Shedule::find($id)
                    ->users()
                    ->detach($user);

            }}
        return redirect()->action('SingupController@index');


    }
}
