<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

//$factory = app(Factory::class);



$factory->defineAs(App\Role::class, 'admin', function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title' => 'admin',
        'text' => $faker->text(100)
    ];
});
$factory->defineAs(App\Role::class, 'guest', function (Faker $faker) {

    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title' => 'guest',
        'text' => $faker->text(100)
    ];
});
$factory->defineAs(App\Role::class, 'trainer', function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title' => 'trainer',
        'text' => $faker->text(100)
    ];
});
$factory->defineAs(App\Role::class, 'support', function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title' => 'support',
        'text' => $faker->text(100)
    ];
});
$factory->defineAs(App\Role::class, 'content', function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title' => 'content',
        'text' => $faker->text(100)
    ];
});
