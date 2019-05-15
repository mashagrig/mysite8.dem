<?php

namespace App\Observers;

use App\Binaryfile;
use App\Events\Users\UserVerifyToAdminEvent;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $current_user_id = '';
        $current_user_db = '';
        $current_user_id = '';

           // $current_user_id =Auth::user()->getAuthIdentifier(); //null!!!!
            $current_user_id =User::all()
                ->reverse()->first()->id;

            $current_user_db = User::where('id', (int)$current_user_id)->get();

        Binaryfile::create([
            'title' => 'avatar',
            'file_src' => "images/guest_avatar_light.png",
            'text' =>  '',
        ])
            ->users()->attach($current_user_db);
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        if($user->email_verified_at !== null){
            //отправляем уведомление-----------------------
            $email_admin = 'm-a-grigoreva@yandex.ru';
            $email_arr = [
                //   $email,
                $email_admin
            ];
            event(new UserVerifyToAdminEvent($email_arr, $user));
            //----------------------------------------------------------------------
        }

    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
