<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ContentUser extends Model
{
    protected $table = 'content_user';
    protected $guarded = [];
}
