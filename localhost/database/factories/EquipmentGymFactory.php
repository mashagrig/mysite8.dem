<?php

use Faker\Generator as Faker;

$factory->define(App\EquipmentGym::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'count_equipment' => $faker->numberBetween(10, 200),
    ];
});
