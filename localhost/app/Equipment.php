<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';//первая связываемая таблица
    protected $guarded = [];

    public function gyms(){

        return $this->belongsToMany('App\Gym', 'equipment_gym')
            ->withPivot('count_equipment','created_at', 'updated_at')
            ->using('App\EquipmentGym');

        //  return $this->belongsToMany("App\Gym", "equipment_gym");

//        return $this->belongsToMany("App\Gym", "equipment_gym", "equipment_id", "gym_id");

        //это первая связываемая таблица, поэтому прописываем связующую таблицу, поле первой (имя второй_id), поле второй (имя первой_id) - не верно в книге
        //это первая связываемая таблица, поэтому прописываем связующую таблицу, поле первой (первой_id), поле второй (имя имя второй_id)
    }
}
