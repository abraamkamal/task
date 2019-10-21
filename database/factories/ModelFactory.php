<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Crud::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'image' => $faker->image(),
        'screen_name' => $faker->randomLetter,
        'content' => $faker->text(150),
        'description' => $faker->text(150),
        'user_name' => $faker->userName,
        'date' => $faker->date(),
        'status' => $faker->boolean
    ];

});
