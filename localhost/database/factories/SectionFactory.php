<?php

use Faker\Generator as Faker;


$section = [
    '0' => 'morning_programs',
    '1' => 'body_building',
    '2' => 'stretching',
    '3' => 'fitness',
    '4' => 'yoga',
    '5' => 'child_programs'
];
    $factory->define(App\Section::class, function (Faker $faker) use ($section) {
        $s = $section[rand(0, (count($section)-1))];
        return
            [
                'title' => $s,
                'slug' => $faker->slug('title'),
            ];
    });


$factory->defineAs(App\Section::class, 'morning_programs', function (Faker $faker) {
    return [
        'title' => 'morning_programs',
        'slug' => $faker->slug('title'),
    ];
});
$factory->defineAs(App\Section::class, 'body_building', function (Faker $faker) {
    return [
        'title' => 'body_building',
        'slug' => $faker->slug('title'),
    ];
});
$factory->defineAs(App\Section::class, 'stretching', function (Faker $faker) {
    return [
        'title' => 'stretching',
        'slug' => $faker->slug('title'),
    ];
});
$factory->defineAs(App\Section::class, 'fitness', function (Faker $faker) {
    return [
        'title' => 'fitness',
        'slug' => $faker->slug('title'),
    ];
});
$factory->defineAs(App\Section::class, 'yoga', function (Faker $faker) {
    return [
        'title' => 'yoga',
        'slug' => $faker->slug('title'),
    ];
});
$factory->defineAs(App\Section::class, 'child_programs', function (Faker $faker) {
    return [
        'title' => 'child_programs',
        'slug' => $faker->slug('title'),
    ];
});

