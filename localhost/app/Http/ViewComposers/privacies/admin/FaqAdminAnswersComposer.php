<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 16.05.19
 * Time: 19:31
 */

namespace App\Http\ViewComposers\privacies\admin;


use App\User;
use Illuminate\View\View;

class FaqAdminAnswersComposer
{
    public function compose(View $view)
    {
        return $view->with('answers_admin_all',
            $answers_admin_all = User::select(
            'users.id as users_id',
            'users.email as users_email',
            'contents.id as contents_id',
            'contents.title as contents_title',
               'contents.status as status_content',
            'contents.text as contents_text',
            'contents.created_at as contents_created_at',
            'contents.updated_at as contents_updated_at'
        )
            ->join('content_user', 'content_user.user_id', '=', 'users.id', 'inner')
            ->join('contents', 'contents.id', '=','content_user.content_id',  'inner')
            ->where('contents.title', 'like', '%answer%')
            ->orderBy('contents.updated_at', 'desc')
            ->groupBy('contents.id')
            ->get()
        );
    }
}
