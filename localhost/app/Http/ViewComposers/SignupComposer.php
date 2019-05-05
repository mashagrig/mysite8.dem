<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 26.04.19
 * Time: 2:23
 */

namespace App\Http\ViewComposers;


use App\Shedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SignupComposer
{
//    public function __construct(Request $request)
//    {
//        $this->request = $request;
//    }

    public function compose(View $view)
    {
      //  $request = $this->request;


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
                'gyms.number as gym_number',
                'shedule_user.status as status'
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
                //-----------------
                //user
                ->whereHas('users', function ($q) use($current_user){
                    $q->where('users.id', '=', "{$current_user}");
                })


                ->join('shedule_user', function ($join) use($current_user) {
                    $join->on('shedules.id', '=', 'shedule_user.shedule_id');
                })
//                ->join('users', function ($join) use($current_user) {
//                    $join->on('shedules.id', '=','shedule_user.shedule_id' );
//                    $join->on('shedule_user.user_id', '=', 'users.id');
//                      //  ->where('shedule_user.user_id', '=', "{$current_user}");
//                })

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


        return $view->with([
            'check_shedule_id' => $check_shedule_id,
            'max_date_select' => $max_date_select,
            'each_check_shedule_info' => $each_check_shedule_info,
        ]);

    }
}
