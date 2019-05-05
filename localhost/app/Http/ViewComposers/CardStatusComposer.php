<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 05.05.19
 * Time: 2:18
 */

namespace App\Http\ViewComposers;


use App\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CardStatusComposer
{

    public function compose(View $view)
    {
        $status_card = array();

        $current_user = '';

        if(Auth::user() !== null){
            $current_user = Auth::user()->getAuthIdentifier();
        }

        //--------------------------------------------------------

      //  array_push($each_check_card_info,
            $status_card =  Card::select(
                'cards.id as status_card_id',
//                'cards.title as card_title',
//                'cards.count_month as card_count_month',
//                'cards.count_day as card_count_day',
//                'cards.price as card_price',
//                'card_user.first_date_subscription as first_date_subscription',//
//                //  'card_user.user_id as user_id',
//                'personalinfos.name as user_name',
                'card_user.status as status_card'
            )

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
                ->orderby('card_id')
                ->oldest('card_user.first_date_subscription')
                ->get();
       //);
        //--------------------------------------------------------


        return $view->with([
            'status_card' => $status_card,
        ]);

    }
}
