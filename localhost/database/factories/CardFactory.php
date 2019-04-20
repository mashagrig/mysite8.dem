<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title' => $faker->text(100),
        'count_month' => $m = rand(1,12),
        'count_day' => $d = rand(1,365),
        'price' => $m * 10000,
    ];
});


