<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BinaryfileUser extends Pivot
{
    protected $table = 'binaryfile_user';
    protected $guarded = [];


}
