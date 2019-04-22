<?php

namespace App\Providers;

use App\Personalinfo;
use App\Shedule;
use App\User;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //                View::share([
//                    'contents'=>Content::orderBy('updated_at', 'desc')->first()
//                        ->users()
//                ]);
//            'titleMain' => 'Фитнес-клуб "СПОРТ"',
//            'titleGym' => ' - Тренажерные залы"',
//            'titleEquipment' => ' - Оборудование"',
        // 'trainers_info' => action('trainers\TrainersController@index'),
        // 'contr' => action('GymController@index'),
        //"gyms_all" => Gym::all(),
        //   "equipment" => Equipment::all(),
        //   "gym" => Gym::all()

        view()->share('trainers_info',
            $trainers_info = Personalinfo::select(
                'users.email as users_email',
                'users.id as users_id',
                'users.name as users_name',//login

                'roles.title as roles_title',
                'roles.text as roles_text',

                'personalinfos.login as personalinfos_login',
                'personalinfos.name as personalinfos_name',
                'personalinfos.surname as personalinfos_surname',
                'personalinfos.middle_name as personalinfos_middle_name',
                'personalinfos.email as personalinfos_email',
                'personalinfos.telephone as personalinfos_telephone',
                'personalinfos.birthdate as personalinfos_birthdate',
                'personalinfos.text as personalinfos_text',

                'binaryfiles.title as binaryfiles_title',
                'binaryfiles.file_src as binaryfiles_file_src',
                'binaryfiles.text as binaryfiles_text',

                'contents.id as contents_id',
                'contents.title as contents_title',
                'contents.slug as contents_slug',
                'contents.text as contents_text',
                'contents.created_at as contents_created_at',
                'contents.updated_at as contents_updated_at'
            )
                ->join('users', 'users.personalinfo_id', '=', 'personalinfos.id', 'inner')
                ->join('roles', 'roles.id', '=', 'users.role_id', 'inner')

                ->join('binaryfile_user', 'binaryfile_user.user_id', '=', 'users.id', 'inner')
                ->join('binaryfiles', 'binaryfiles.id', '=','binaryfile_user.binaryfile_id',  'inner')

                ->join('content_user', 'content_user.user_id', '=', 'users.id', 'inner')
                ->join('contents', 'contents.id', '=','content_user.content_id',  'inner')

                ->where('roles.title', 'like', '%trainer%')
                ->get());



        view()->share('guests',
            $guests = User::select(
                'users.id as users_id',
                'users.email as users_email',
                'users.name as users_name',//login

                'roles.title as roles_title',
                'roles.text as roles_text',

                'personalinfos.login as personalinfos_login',
                'personalinfos.name as personalinfos_name',
                'personalinfos.surname as personalinfos_surname',
                'personalinfos.middle_name as personalinfos_middle_name',
                'personalinfos.email as personalinfos_email',
                'personalinfos.telephone as personalinfos_telephone',
                'personalinfos.birthdate as personalinfos_birthdate',
                'personalinfos.text as personalinfos_text',

                'binaryfiles.title as binaryfiles_title',
                'binaryfiles.file_src as binaryfiles_file_src',
                'binaryfiles.text as binaryfiles_text',

                'contents.id as contents_id',
                'contents.title as contents_title',
                'contents.slug as contents_slug',
                'contents.text as contents_text',
                'contents.created_at as contents_created_at',
                'contents.updated_at as contents_updated_at',

                'card_user.first_date_subscription as first_date_subscription',
                'cards.title as contents_title',
                'cards.count_month as contents_count_month',
                'cards.count_day as contents_count_day',
                'cards.price as contents_price',

                'shedules.id as shedules_id',
                'shedules.date_training as shedules_date_training',
                'shedules.trainingtime_id as shedules_trainingtime_id',
                'shedules.user_id as shedules_trainer_id',
                'shedules.section_id as shedules_section_id',
                'shedules.gym_id as shedules_gym_id'
            )

                ->join('roles', function ($join) {
                    $join->on('roles.id', '=', 'users.role_id');
                     //   ->where('roles.title', 'like', '%guest%');
                })
                ->join('personalinfos', function ($join) {
                    $join->on('personalinfos.id', '=', 'users.personalinfo_id');
                })

                ->join('binaryfile_user', 'binaryfile_user.user_id', '=', 'users.id', 'inner')
                ->join('binaryfiles', 'binaryfiles.id', '=','binaryfile_user.binaryfile_id',  'inner')

                ->join('content_user', 'content_user.user_id', '=', 'users.id', 'inner')
                ->join('contents', 'contents.id', '=','content_user.content_id',  'inner')

                ->join('card_user', 'card_user.user_id', '=', 'users.id', 'inner')
                ->join('cards', 'cards.id', '=','card_user.card_id',  'inner')

                ->join('shedule_user', 'shedule_user.user_id', '=', 'users.id', 'inner')
                ->join('shedules', 'shedules.id', '=','shedule_user.shedule_id',  'inner')

                ->where('roles.title', 'like', '%guest%')
                ->get());








//        View::composers('*', function ($view){
//            $trainers_info = Personalinfo::select(
//                'roles.title',
//                'users.email',
//                'users.id as id',
//                'personalinfos.name as person',
//                'users.name as user',
//                'binaryfiles.file_src as file_src',
//                'personalinfos.info'
//            )
//                ->join('users', 'users.personalinfo_id', '=', 'personalinfos.id', 'inner')
//                ->join('roles', 'roles.id', '=', 'users.role_id', 'inner')
//                ->join('contents', 'contents.user_id', '=', 'users.id', 'inner')
//                ->join('binaryfiles', 'binaryfiles.id', '=', 'contents.binaryfile_id', 'inner')
//                ->where('roles.title','like', '%trainer%')
//                //->orderBy("personalinfos.id")
//                ->get();
////            view('trainers.page_trainers', [
////                'trainers_info'=> $trainers_info,
////            ]);
//           return $view->with('trainers_info', $trainers_info);
//
//
//        });

    }
}
