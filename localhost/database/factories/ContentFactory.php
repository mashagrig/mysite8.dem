<?php

use Faker\Generator as Faker;

$factory->define(App\Content::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title' => $faker->text(100),
        'slug' => $faker->slug,
        'text' => $faker->text(255),
    ];
});
