<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SheduleUser extends Pivot
{
    protected $table = 'shedule_user';
    protected $guarded = [];
}
