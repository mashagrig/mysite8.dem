<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 16.05.19
 * Time: 19:32
 */

namespace App\Http\ViewComposers\privacies\admin;


use App\User;
use Illuminate\View\View;

class FaqAdminQuestionsComposer
{
    public function compose(View $view)
    {
        return $view->with('question_from_contacts_all',
            $question_from_contacts_all =
                User::select(
                    'users.id as users_id',
                    'users.email as users_email',
                    'personalinfos.name as personalinfos_name',
                    'personalinfos.surname as personalinfos_surname',
                    'personalinfos.middle_name as personalinfos_middle_name',
                    'contents.id as contents_id',
                    'contents.title as contents_title',
                    'contents.status as status_content',//тут данные от анонимных пользователей
                    'contents.text as contents_text',
                    'contents.created_at as contents_created_at',
                    'contents.updated_at as contents_updated_at'
                )
                    ->join('personalinfos', function ($join) {
                        $join->on('personalinfos.id', '=', 'users.personalinfo_id');
                    })

                    ->join('content_user', function ($join) {
                        $join->on('users.id', '=', 'content_user.user_id');
                    })
                    ->join('contents', function ($join) {
                        $join->on('contents.id', '=', 'content_user.content_id');
                    })
                    ->where('contents.title', 'like', '%question_from_contacts%')
                    ->orderBy('contents.updated_at', 'desc')
                    ->groupBy('contents.id')
                    ->get()

    );











////        $current_user = '';
////
////        if(Auth::user() !== null){
////            $current_user = Auth::user()->getAuthIdentifier();
////        }
//
//
//        return $view->with('question_from_contacts_all',
//            $question_from_contacts_all =
//                User::select(
//            'users.id as users_id',
//            'users.email as users_email',
//         //   'users.name as users_name',//login
//
//       //     'personalinfos.login as personalinfos_login',
//            'personalinfos.name as personalinfos_name',
//            'personalinfos.surname as personalinfos_surname',
//            'personalinfos.middle_name as personalinfos_middle_name',
////            'personalinfos.email as personalinfos_email',
////            'personalinfos.telephone as personalinfos_telephone',
////            'personalinfos.birthdate as personalinfos_birthdate',
////            'personalinfos.text as personalinfos_text',
//
////            'binaryfiles.title as binaryfiles_title',
////            'binaryfiles.file_src as binaryfiles_file_src',
////            'binaryfiles.text as binaryfiles_text',
//
//            'contents.id as contents_id',
//            'contents.title as contents_title',
//            'contents.status as status_content',//тут данные от анонимных пользователей
//            'contents.text as contents_text',
//            'contents.created_at as contents_created_at',
//            'contents.updated_at as contents_updated_at'
////
////            'card_user.first_date_subscription as first_date_subscription',
////            'card_user.status as status_card',
////
////            'cards.title as contents_title',
////            'cards.count_month as contents_count_month',
////            'cards.count_day as contents_count_day',
////            'cards.price as contents_price',
////
////            'shedules.id as shedules_id',
////            'shedules.date_training as shedules_date_training',
////            'shedules.trainingtime_id as shedules_trainingtime_id',
////            'shedules.user_id as shedules_trainer_id',
////            'shedules.section_id as shedules_section_id',
////            'shedules.gym_id as shedules_gym_id'
//        )
////
////            ->join('roles', function ($join) {
////                $join->on('roles.id', '=', 'users.role_id');
////            })
//            ->join('personalinfos', function ($join) {
//                $join->on('personalinfos.id', '=', 'users.personalinfo_id');
//            })
////
////            ->join('binaryfile_user', 'binaryfile_user.user_id', '=', 'users.id', 'inner')
////            ->join('binaryfiles', 'binaryfiles.id', '=','binaryfile_user.binaryfile_id',  'inner')
//
//            ->join('content_user', 'content_user.user_id', '=', 'users.id', 'inner')
//            ->join('contents', 'contents.id', '=','content_user.content_id',  'inner')
//
////            ->join('card_user', 'card_user.user_id', '=', 'users.id', 'inner')
////            ->join('cards', 'cards.id', '=','card_user.card_id',  'inner')
////
////            ->join('shedule_user', 'shedule_user.user_id', '=', 'users.id', 'inner')
////            ->join('shedules', 'shedules.id', '=','shedule_user.shedule_id',  'inner')
//
//        //    ->where('content_user.user_id', "{$current_user}")
//            // ->where('roles.title', 'like', '%guest%')
//            ->where('contents.title', 'like', '%question_from_contacts%')
//            //    ->where('contents.status', 'like', '%public%')
//            //  ->where('contents.status', 'like', '%moderating%', "or")
//            ->orderBy('contents.updated_at', 'desc')
//            ->groupBy('contents.id')
//        //  ->get()
 //       );
    }
}
