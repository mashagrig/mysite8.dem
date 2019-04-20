<?php

use Faker\Generator as Faker;

$factory->define(App\Personalinfo::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'login' => $faker->text(10),
        'name' => $faker->name,
        'surname' => $faker->lastName,
        'middle_name' => $faker->firstName,
        'email' => $faker->email,
        'telephone' => $faker->phoneNumber,
        'birthdate' => $faker->date(),
        'text' => $faker->text(100),
    ];
});
