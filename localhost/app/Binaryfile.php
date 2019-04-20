<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binaryfile extends Model
{
    protected $table = "binaryfiles";
    protected $guarded = [];

    //1-m
    public function users(){
        return $this->belongsToMany("App\User", "binaryfile_user", "binaryfile_id", "user_id");

//        return $this->belongsToMany('App\User', 'binaryfile_user')
//            ->withPivot('created_at', 'updated_at')
//            ->using('App\BinaryfileUser');

        //это первая связываемая таблица, поэтому прописываем связующую таблицу, поле первой (первой_id), поле второй (имя имя второй_id)
    }
}

//
//
//public function regions()
//{
//    return $this->belongsToMany('App\Region', 'banner_regions')
//        ->withPivot('for_customers', 'active')
//        ->using('App\BannerRegion');
//}
//
//
//{
//    return $this->belongsToMany(Team::class, 'team_user')
//        ->using(Role::class)
//        ->as('role')
//        ->withPivot('role');
//}
