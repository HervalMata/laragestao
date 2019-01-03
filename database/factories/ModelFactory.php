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
$factory->define(GestaoTrocas\Models\Unit::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->word,
        'sector' => $faker->word,
        'state' => collect(\GestaoTrocas\Models\State::$states)->random(),
        'city' => $faker->city,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(GestaoTrocas\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    $repository = app(\GestaoTrocas\Repositories\UnitRepository::class);
    /** @var \Illuminate\Database\Eloquent\Collection $units */
    $unitId = $repository->all()->random()->id;

    return [
        'enrolment' => str_random(4),
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'unit_id' => $unitId,
        'remember_token' => str_random(10),
    ];
});
