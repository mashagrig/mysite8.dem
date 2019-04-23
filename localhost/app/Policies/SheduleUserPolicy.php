<?php

namespace App\Policies;

use App\Role;
use App\User;
use App\SheduleUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class SheduleUserPolicy
{
    use HandlesAuthorization;

    public function manipulate(User $user)
    {
        $admin = Role::has('users')->where('title', '=', 'admin')->first();
        $guest = Role::has('users')->where('title', '=', 'guest')->first();

        if (($user->role_id === $admin->id) || ($user->role_id === $guest->id)) {
            return true;
        } else return false;
    }
    /**
     * Determine whether the user can view the shedule user.
     *
     * @param  \App\User  $user
     * @param  \App\SheduleUser  $sheduleUser
     * @return mixed
     */
    public function view(User $user, SheduleUser $sheduleUser)
    {
        return true;
    }

    /**
     * Determine whether the user can create shedule users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the shedule user.
     *
     * @param  \App\User  $user
     * @param  \App\SheduleUser  $sheduleUser
     * @return mixed
     */
    public function update(User $user, SheduleUser $sheduleUser)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the shedule user.
     *
     * @param  \App\User  $user
     * @param  \App\SheduleUser  $sheduleUser
     * @return mixed
     */
    public function delete(User $user, SheduleUser $sheduleUser)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the shedule user.
     *
     * @param  \App\User  $user
     * @param  \App\SheduleUser  $sheduleUser
     * @return mixed
     */
    public function restore(User $user, SheduleUser $sheduleUser)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the shedule user.
     *
     * @param  \App\User  $user
     * @param  \App\SheduleUser  $sheduleUser
     * @return mixed
     */
    public function forceDelete(User $user, SheduleUser $sheduleUser)
    {
        return true;
    }
}
