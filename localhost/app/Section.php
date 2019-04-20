<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = "sections";
    protected $guarded = [];

    //1-m
    public function shedules(){
        return $this->hasMany("App\Shedule", "section_id", "id");
    }
}
