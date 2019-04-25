<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 25.04.19
 * Time: 13:47
 */

namespace App\Http\ViewComposers;


use App\Personalinfo;
use Illuminate\View\View;

class TrainerComposer
{
//    public function __construct(array $data)
//    {
//        $this->data = $data;
//    }

    public function compose(View $view)
    {
//        $data = $this->data;



        return $view->with('trainers_info',
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
                ->get()
        );
    }
}
