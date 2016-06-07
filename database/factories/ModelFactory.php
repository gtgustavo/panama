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

$factory->define(App\Models\User::class, function ($faker) {

    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'ced_id'     => $faker->unique()->ean8,
        'phone'      => '04161234567',
        'email'      => $faker->unique()->email,
        'role_id'    => '2',
    ];

});
