<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CardUser extends Model
{
    protected $table = 'card_user';
    protected $guarded = [];
}
