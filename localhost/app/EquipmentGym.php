<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EquipmentGym extends Pivot
{
    protected $table = 'equipment_gym';
    protected $guarded = [];
}
