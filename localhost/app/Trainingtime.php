<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainingtime extends Model
{
    protected $table = "trainingtimes";
    protected $guarded = [];

    //1-m
    public function shedules(){
        return $this->hasMany("App\Shedule", "trainingtime_id", "id");
    }
}
