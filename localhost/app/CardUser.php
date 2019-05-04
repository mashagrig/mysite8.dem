<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CardUser extends Pivot
{
    protected $table = 'card_user';
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'card_id',
        'first_date_subscription',
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
