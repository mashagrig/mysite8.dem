<?php

use Faker\Generator as Faker;

$factory->define(App\Gym::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title' => $faker->text(100),
        'slug' => $faker->slug('title'),
        'number' => rand(100, 108),
    ];
});
