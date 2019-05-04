<?php

namespace App\Providers;

use App\Http\ViewComposers\CardComposer;
use App\Http\ViewComposers\ContactsComposer;
use App\Http\ViewComposers\DestroySheduleComposer;
use App\Http\ViewComposers\GuestComposer;
use App\Http\ViewComposers\IconBlocks\IconCardsComposer;
use App\Http\ViewComposers\IconBlocks\IconPartnersComposer;
use App\Http\ViewComposers\IconBlocks\IconPogramsComposer;
use App\Http\ViewComposers\MessageComposer;
use App\Http\ViewComposers\ProgramComposer;
use App\Http\ViewComposers\SheduleComposer;
use App\Http\ViewComposers\SignupCardComposer;
use App\Http\ViewComposers\SignupComposer;
use App\Http\ViewComposers\Sliders\SliderCommentsComposer;
use App\Http\ViewComposers\Sliders\SliderPhotoGalleryComposer;
use App\Http\ViewComposers\Sliders\SliderProgramsComposer;
use App\Http\ViewComposers\Sliders\SliderTopThreeComposer;
use App\Http\ViewComposers\Sliders\SliderTrainersComposer;
use App\Http\ViewComposers\TrainerComposer;
use App\Personalinfo;
use App\Shedule;
use App\User;
use Illuminate\Support\Facades\View;
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

        view()->composer([
            'home',
            'welcome',
            'about.page_about',
            'trainers.page_trainers',
        ], TrainerComposer::class);

        view()->composer([
            'home',
            'welcome',
            'about.page_about',
        ], GuestComposer::class);

        view()->composer([
            'shedule.for_shedule_table',
        ], SheduleComposer::class);

        view()->composer([
            'signup.success_signup_list',
            'emails.shedules.check_shedule',//письмо о записи на тренировку
        ], SignupComposer::class);

        view()->composer([
            'emails.shedules.destroy_shedule',//письмо об отмене записи на тренировку
        ], DestroySheduleComposer::class);

//данные для уведомлений передаем напрямую через конструкторы и CardComposer
        view()->composer([
            'signup.success_signup_card_list',
        ], SignupCardComposer::class);


//
//        View::composer([
//            'contacts.page_contacts',
//            'contacts.contacts',
//        ],  'App\Http\ViewComposers\ContactsComposer'
//        );

//        view()->composer([
//            'contacts.page_contacts',
//            'contacts.contacts',
//        ], ContactsComposer::class);


//данные для уведомлений передаем напрямую через конструкторы и CardComposer
        //for_each_description page--------------------
        view()->composer([
            'cards.each_card',
            'emails.cards.check_card',//письмо о заявке на карту
            'emails.cards.destroy_card',//письмо оо отмене заявки на карту
        ], CardComposer::class);

        view()->composer([
            'programs.each_program',
        ], ProgramComposer::class);


        //MessageComposer--------------------------------------

//        view()->composer([
//          //  'signup.success_signup_list',
//            'signup.success_signup_card_list',
//        ], MessageComposer::class);


        //sliders--------------------------------------
        view()->composer([
            'sliders.slider_top_three',
        ], SliderTopThreeComposer::class);

        view()->composer([
            'sliders.slider_photo_gallery',
        ], SliderPhotoGalleryComposer::class);

        view()->composer([
            'sliders.slider_trainers',
        ], SliderTrainersComposer::class);

        //нигде не используется!!!
//        view()->composer([
//            'sliders.slider_programs',
//        ], SliderProgramsComposer::class);

        view()->composer([
            'sliders.slider_comments',
        ], SliderCommentsComposer::class);

        //icons--------------------------------------

        view()->composer([
            'icon_blocks.icon_blocks_programs',
        ], IconPogramsComposer::class);

        view()->composer([
            'icon_blocks.icon_blocks_cards',
        ], IconCardsComposer::class);

        view()->composer([
            'icon_blocks.icon_blocks_partners',
        ], IconPartnersComposer::class);







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

//        view()->share('trainers_info',
//            $trainers_info = Personalinfo::select(
//                'users.email as users_email',
//                'users.id as users_id',
//                'users.name as users_name',//login
//
//                'roles.title as roles_title',
//                'roles.text as roles_text',
//
//                'personalinfos.login as personalinfos_login',
//                'personalinfos.name as personalinfos_name',
//                'personalinfos.surname as personalinfos_surname',
//                'personalinfos.middle_name as personalinfos_middle_name',
//                'personalinfos.email as personalinfos_email',
//                'personalinfos.telephone as personalinfos_telephone',
//                'personalinfos.birthdate as personalinfos_birthdate',
//                'personalinfos.text as personalinfos_text',
//
//                'binaryfiles.title as binaryfiles_title',
//                'binaryfiles.file_src as binaryfiles_file_src',
//                'binaryfiles.text as binaryfiles_text',
//
//                'contents.id as contents_id',
//                'contents.title as contents_title',
//                'contents.slug as contents_slug',
//                'contents.text as contents_text',
//                'contents.created_at as contents_created_at',
//                'contents.updated_at as contents_updated_at'
//            )
//                ->join('users', 'users.personalinfo_id', '=', 'personalinfos.id', 'inner')
//                ->join('roles', 'roles.id', '=', 'users.role_id', 'inner')
//
//                ->join('binaryfile_user', 'binaryfile_user.user_id', '=', 'users.id', 'inner')
//                ->join('binaryfiles', 'binaryfiles.id', '=','binaryfile_user.binaryfile_id',  'inner')
//
//                ->join('content_user', 'content_user.user_id', '=', 'users.id', 'inner')
//                ->join('contents', 'contents.id', '=','content_user.content_id',  'inner')
//
//                ->where('roles.title', 'like', '%trainer%')
//                ->get());


//
//        view()->share('guests',
//            $guests = User::select(
//                'users.id as users_id',
//                'users.email as users_email',
//                'users.name as users_name',//login
//
//                'roles.title as roles_title',
//                'roles.text as roles_text',
//
//                'personalinfos.login as personalinfos_login',
//                'personalinfos.name as personalinfos_name',
//                'personalinfos.surname as personalinfos_surname',
//                'personalinfos.middle_name as personalinfos_middle_name',
//                'personalinfos.email as personalinfos_email',
//                'personalinfos.telephone as personalinfos_telephone',
//                'personalinfos.birthdate as personalinfos_birthdate',
//                'personalinfos.text as personalinfos_text',
//
//                'binaryfiles.title as binaryfiles_title',
//                'binaryfiles.file_src as binaryfiles_file_src',
//                'binaryfiles.text as binaryfiles_text',
//
//                'contents.id as contents_id',
//                'contents.title as contents_title',
//                'contents.slug as contents_slug',
//                'contents.text as contents_text',
//                'contents.created_at as contents_created_at',
//                'contents.updated_at as contents_updated_at',
//
//                'card_user.first_date_subscription as first_date_subscription',
//                'cards.title as contents_title',
//                'cards.count_month as contents_count_month',
//                'cards.count_day as contents_count_day',
//                'cards.price as contents_price',
//
//                'shedules.id as shedules_id',
//                'shedules.date_training as shedules_date_training',
//                'shedules.trainingtime_id as shedules_trainingtime_id',
//                'shedules.user_id as shedules_trainer_id',
//                'shedules.section_id as shedules_section_id',
//                'shedules.gym_id as shedules_gym_id'
//            )
//
//                ->join('roles', function ($join) {
//                    $join->on('roles.id', '=', 'users.role_id');
//                     //   ->where('roles.title', 'like', '%guest%');
//                })
//                ->join('personalinfos', function ($join) {
//                    $join->on('personalinfos.id', '=', 'users.personalinfo_id');
//                })
//
//                ->join('binaryfile_user', 'binaryfile_user.user_id', '=', 'users.id', 'inner')
//                ->join('binaryfiles', 'binaryfiles.id', '=','binaryfile_user.binaryfile_id',  'inner')
//
//                ->join('content_user', 'content_user.user_id', '=', 'users.id', 'inner')
//                ->join('contents', 'contents.id', '=','content_user.content_id',  'inner')
//
//                ->join('card_user', 'card_user.user_id', '=', 'users.id', 'inner')
//                ->join('cards', 'cards.id', '=','card_user.card_id',  'inner')
//
//                ->join('shedule_user', 'shedule_user.user_id', '=', 'users.id', 'inner')
//                ->join('shedules', 'shedules.id', '=','shedule_user.shedule_id',  'inner')
//
//                ->where('roles.title', 'like', '%guest%')
//                ->get());



    }
}
