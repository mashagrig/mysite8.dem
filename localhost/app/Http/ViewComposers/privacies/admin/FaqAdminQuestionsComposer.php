<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 16.05.19
 * Time: 19:32
 */

namespace App\Http\ViewComposers\privacies\admin;


use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqAdminQuestionsComposer
{
   // public $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $email = '';

//        if($this->request !== null){
//            $request = $this->request;
//            $email = $request->email_user;
//        }
        $request = $this->request;
        $email = $request->email_user;
     //   $email = "m-a-grigoreva@yandex.ru";

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
              //  ->where('users.email', "{$email}")
                ->where('users.email', 'like', "%{$email}%")
                ->orderBy('contents.updated_at', 'desc')
                ->groupBy('contents.id')
                ->get();

        return $view->with('question_from_contacts_all',$question_from_contacts_all);
    }
}
