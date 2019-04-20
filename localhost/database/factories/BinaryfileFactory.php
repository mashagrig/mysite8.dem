<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Binaryfile::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
         'title' => Str::random(10),
         'file_src' => $faker->file('/home/masha/Изображения/'),
         'text' => $faker->text(255),
    ];
});
