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
use App\User;
use App\Appointment_pilates;
use App\Appointment_kangoojumps;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->firstName . ' ' . $faker->lastName,
        'CNP' => $faker->CNP,
        'created' => $faker->dateTime,
    ];
});
$factory->define(Appointment_pilates::class, function (Faker $faker) {
    return [
        'user_id' => rand(User::first()->id, User::count()),
        'time_interval' => $faker->dateTimeBetween(),
    ];
});
$factory->define(Appointment_kangoojumps::class, function (Faker $faker) {
    return [
        'user_id' => rand(User::first()->id, User::count()),
        'time_interval' => $faker->dateTimeBetween(),
    ];
});