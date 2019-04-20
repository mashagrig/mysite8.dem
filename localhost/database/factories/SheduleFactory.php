<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Shedule;
use Faker\Generator as Faker;

$factory->define(Shedule::class, function (Faker $faker) {
    return [
        'date_training' => $faker->date()
    ];
});
