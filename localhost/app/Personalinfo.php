<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personalinfo extends Model
{
    protected $table = "personalinfos";
    protected $guarded = [];

    //1-m
    public function users(){
        return $this->hasMany("App\User", "personalinfo_id", "id");
    }
}
