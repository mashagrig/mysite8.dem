<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $table = 'gyms';//вторая связываемая таблица
    protected $guarded = [];

    //1-m (мн)
    public function equipments(){
        return $this->belongsToMany("App\Equipment");

        //это вторая связываемая таблица, поэтому связующую таблицу не указываем при создании связи (первая связываемая таблица - equipments)
    }



    //1-m (мн)
    public function shedules(){
        return $this->hasMany("App\Shedule", "gym_id", "id");
    }
}
