<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SheduleUser extends Pivot
{
    protected $table = 'shedule_user';
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'shedule_id',
        'status'=> 'awaiting',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->status = 'awaiting';
        });
    }
}
