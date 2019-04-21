<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = "cards";
    protected $guarded = [];

    //1-m
    public function users(){

//        return $this->belongsToMany("App\User", "card_user", "card_id", "user_id");

        //это первая связываемая таблица, поэтому прописываем связующую таблицу, поле первой (первой_id), поле второй (имя имя второй_id)


       return $this->belongsToMany('App\User', 'card_user')
            ->withPivot('first_date_subscription','created_at', 'updated_at')
            ->using('App\CardUser');
    }
}
