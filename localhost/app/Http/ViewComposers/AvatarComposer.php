<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 09.05.19
 * Time: 19:53
 */

namespace App\Http\ViewComposers;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AvatarComposer
{
    public function compose(View $view)
    {
        $avatar_src = '';
        if (Auth::user() !== null) {
            $current_user_id = Auth::user()->getAuthIdentifier();

            $b_id_arr = \App\Binaryfile::
            whereHas('users', function ($q) use ($current_user_id) {
                $q->where('users.id', '=', "{$current_user_id}");
            })
                ->where('title', 'like', "%avatar%")
                ->pluck('file_src')
                ->toArray();
            if (!empty($b_id_arr)) {
                $avatar_src = $b_id_arr[0];
            }
        }
        return $view->with('avatar_src', $avatar_src );
    }
}
