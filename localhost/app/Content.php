<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = "contents";
    protected $guarded = [];

    //1-m
    public function users(){
//        return $this->belongsToMany("App\User", "content_user", "content_id", "user_id");

        return $this->belongsToMany('App\User', 'content_user')
            ->withPivot('created_at', 'updated_at')
            ->using('App\ContentUser');

        //это первая связываемая таблица, поэтому прописываем связующую таблицу, поле первой (первой_id), поле второй (имя имя второй_id)
    }
}
