<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('12345'),
        'gender' => $faker->randomElement(['Male', 'Female']),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'role' => $faker->randomElement(['User','Mod']),
        'status' => $faker->randomElement(['Active', 'Deactive']),
        'remember_token' => str_random(10),
    ];
});
