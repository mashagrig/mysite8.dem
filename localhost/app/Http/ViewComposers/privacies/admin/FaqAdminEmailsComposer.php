<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 17.05.19
 * Time: 13:38
 */

namespace App\Http\ViewComposers\privacies\admin;


use App\Content;
use App\User;
use Illuminate\View\View;

class FaqAdminEmailsComposer
{
    public function compose(View $view)
    {
        //от зареганных
        $que = User::select(
            'users.email as users_email',
            'contents.status as status_content'//,//тут данные от анонимных пользователей
        )
            ->join('content_user', function ($join) {
                $join->on('users.id', '=', 'content_user.user_id');
            })
            ->join('contents', function ($join) {
                $join->on('contents.id', '=', 'content_user.content_id');
            })
            ->where('contents.title', 'like', '%question_from_contacts%')
            ->orderBy('contents.updated_at', 'desc')
            ->groupBy('contents.id')
            ->get();
//от незареганных
        $not_auth = Content::select('contents.status as status_content')
            ->where('contents.status', 'like', "%@%")
            ->get();

        $new_emails = [];
        foreach ($que as $q) {
            array_push($new_emails, $q->users_email);
        }
        foreach ($not_auth as $not) {
            array_push($new_emails, $not->status_content);
        }

        $new_emails_unique = array_unique($new_emails);//все почты каких-либо собщателей))

        return $view->with('new_emails_unique', $new_emails_unique);
    }
}
