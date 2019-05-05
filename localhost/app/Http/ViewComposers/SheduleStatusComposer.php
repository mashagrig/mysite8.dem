<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 05.05.19
 * Time: 2:13
 */

namespace App\Http\ViewComposers;


use App\Shedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SheduleStatusComposer
{
    public function compose(View $view)
    {
        //  $request = $this->request;


        $status_shedule = array();

        //--------------------------------------------------------
        $current_user = Auth::user()->getAuthIdentifier();


       // array_push($status_shedule,
            $status_shedule = Shedule::select(
                'shedules.id as status_shedule_id',
//                'shedules.date_training as date_training',
//                'shedules.user_id as trainer_id',
//                'personalinfos.name as trainer_name',
//                'sections.title as section_title',
//                'trainingtimes.start_training as start_training',
//                'trainingtimes.stop_training as stop_training',
//                'shedules.section_id as section_id',
//                'shedules.gym_id as gym_id',
//                'gyms.number as gym_number',
                'shedule_user.status as status_shedule'
            )
                //trainer
                ->join('users', function ($join) {
                    $join->on('users.id', '=', 'shedules.user_id');
                })
                //-----------------
                //user
                ->whereHas('users', function ($q) use($current_user){
                    $q->where('users.id', '=', "{$current_user}");
                })

                ->join('shedule_user', function ($join) use($current_user) {
                    $join->on('shedules.id', '=', 'shedule_user.shedule_id');
                })
                //-----------------
                ->join('roles', function ($join) {
                    $join->on('roles.id', '=', 'users.role_id')
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
//                ->where('shedules.date_training', '<=', "{$max_date}")
//                ->where('shedules.date_training', '>=', "{$today}")
                ->groupby('shedule_id')
                ->oldest('date_training')
                ->oldest('start_training')
                ->get();
       // );
        //--------------------------------------------------------

        return $view->with([
            'status_shedule' => $status_shedule,
        ]);

    }
}
