<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CardUser extends Pivot
{
    protected $table = 'card_user';
    protected $guarded = [];
}
