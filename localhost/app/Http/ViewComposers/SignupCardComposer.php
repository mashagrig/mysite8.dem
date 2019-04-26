<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 26.04.19
 * Time: 15:51
 */

namespace App\Http\ViewComposers;


use App\Card;
use App\User;
use Auth;
use Illuminate\View\View;

class SignupCardComposer
{
    public function compose(View $view)
    {
        $check_card_id = array();
        $max_date_select = array();
        $each_check_card_info = array();

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
      //  $max_date = date('Y-m-d', time() + 86400*31);

        array_push($each_check_card_info,
            Card::select(
                'cards.id as card_id',
                'cards.title as card_title',
                'cards.count_month as card_count_month',
                'cards.count_day as card_count_day',
                'cards.price as card_price',

                'card_user.first_date_subscription as first_date_subscription',

              //  'card_user.user_id as user_id',
                'personalinfos.name as user_name'
            )

//                ->whereHas('users', function ($q) use($current_user){
//                    $q->where('users.id', '=', "{$current_user}");
//                })

                //это только для Model, не для Pivot
                ->join('card_user', function ($join) use($current_user) {
                    $join->on('cards.id', '=', 'card_user.card_id');
                })
                ->join('users', function ($join) use($current_user) {
                    $join->on('cards.id', '=','card_user.card_id' );
                    $join->on('card_user.user_id', '=', 'users.id')
                        ->where('card_user.user_id', '=', "{$current_user}");
                })



                //-----------------
                ->join('personalinfos', function ($join) {
                    $join->on('personalinfos.id', '=', 'users.personalinfo_id');
                })
                //-----------------
               // ->where('shedules.date_training', '<=', "{$max_date}")
              //  ->where('shedules.date_training', '>=', "{$today}")
                ->groupby('card_id')
                ->oldest('card_user.first_date_subscription')
                ->get()
        );

        foreach ($each_check_card_info as $kk => $singup) {
            foreach ($singup as $k => $v) {
                array_push(
                    $max_date_select,
                    $singup[$k]['first_date_subscription']);
            }
        }
        $max_date_select = array_unique($max_date_select);
        //--------------------------------------------------------


        return $view->with([
            'check_card_id' => $check_card_id,
            'max_date_select' => $max_date_select,
            'each_check_card_info' => $each_check_card_info,
        ]);

    }
}
