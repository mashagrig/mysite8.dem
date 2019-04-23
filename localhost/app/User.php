<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable  implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'users';//вторая связываемая таблица
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'personalinfo_id', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //m-1 (ед)
    //---------------------------------------

    public function personalinfo(){
        return $this->belongsTo("App\Personalinfo", "personalinfo_id", "id");
    }

    public function role(){
        return $this->belongsTo("App\Role", "role_id", "id");
    }


    //m-m (мн)-
    //--------------------------------------------

//    public function binaryfiles()
//    {
//        return $this->belongsToMany("App\Binaryfile");
//
//   //это вторая связываемая таблица, поэтому связующую таблицу не указываем при создании связи
//    }
//
//    public function contents()
//    {
//        return $this->belongsToMany("App\Content");
//        //это вторая связываемая таблица
//    }

//    public function cards()
//    {
//        return $this->belongsToMany("App\Card");
//   //это вторая связываемая таблица
//    }


//    public function shedules(){
//        return $this->belongsToMany("App\Shedule");
//        //это вторая связываемая таблица
//    }





}
