<?php

namespace App\Observers;

use App\Binaryfile;
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
        $current_user_id = '282';

         //   $current_user_id =User::all()
         //       ->reverse()->first()[0]->id+1;

            $current_user_db = User::where('id', $current_user_id)->get();
            $email = $current_user_db[0]->email;
            $name = $current_user_db[0]->name;


//            $current_user_id = User::all()
//                ->reverse()->first()->id+1;
//
//            $current_user_db = User::where('id', $current_user_id)->get();

        Binaryfile::create([
            'title' => 'avatar',
            'file_src' => "images/person_1.jpg",
            'text' =>  $name,
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
        //
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
