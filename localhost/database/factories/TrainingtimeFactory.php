<?php

use Faker\Generator as Faker;

$factory->define(App\Trainingtime::class, function (Faker $faker) {
    $t = rand(4, 10)*2;
    $t2 = $t + 2;
    return [
        'start_training' => $t . ":00:00",
        'stop_training' => $t2 . ":00:00",
    ];
});





$factory->defineAs(App\Trainingtime::class, '1', function (Faker $faker) {
    return [
        'start_training' => '8:00',
        'stop_training' => '10:00',
    ];
});

$factory->defineAs(App\Trainingtime::class, '2', function (Faker $faker) {
    return [
        'start_training' => '10:00',
        'stop_training' => '12:00',
    ];
});

$factory->defineAs(App\Trainingtime::class, '3', function (Faker $faker) {
    return [
        'start_training' => '12:00',
        'stop_training' => '14:00',
    ];
});

$factory->defineAs(App\Trainingtime::class, '4', function (Faker $faker) {
    return [
        'start_training' => '14:00',
        'stop_training' => '16:00',
    ];
});

$factory->defineAs(App\Trainingtime::class, '5', function (Faker $faker) {
    return [
        'start_training' => '16:00',
        'stop_training' => '18:00',
    ];
});

$factory->defineAs(App\Trainingtime::class, '6', function (Faker $faker) {
    return [
        'start_training' => '18:00',
        'stop_training' => '20:00',
    ];
});
$factory->defineAs(App\Trainingtime::class, '7', function (Faker $faker) {
    return [
        'start_training' => '20:00',
        'stop_training' => '22:00',
    ];
});
