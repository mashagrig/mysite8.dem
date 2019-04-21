<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{

    protected $table = "shedules";
    protected $guarded = [];

    //m-1 (ед)
    //----------------------------------
    public function trainingtime(){
        return $this->belongsTo("App\Trainingtime", "trainingtime_id", "id");
    }

    public function section(){
        return $this->belongsTo("App\Section", "section_id", "id");
    }

    public function gym(){
        return $this->belongsTo("App\Gym", "gym_id", "id");
    }


    //m-m
    //------------------------------------
    public function users(){

//        return $this->belongsToMany("App\User", "shedule_user", "shedule_id", "user_id");

        return $this->belongsToMany('App\User', 'shedule_user')
            ->withPivot('created_at', 'updated_at')
            ->using('App\SheduleUser');
        //это первая связываемая таблица, поэтому прописываем связующую таблицу, поле первой (первой_id), поле второй (имя имя второй_id)
    }
}
