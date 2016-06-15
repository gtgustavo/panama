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

$factory->define(App\Models\Credentials\User::class, function ($faker) {

    return [
        'first_name'   => $faker->firstName,
        'last_name'    => $faker->lastName,
        'dni'          => $faker->unique()->ean8,
        'phone_c'      => '04161234567',
        'phone_h'      => '02431234567',
        'email'        => $faker->unique()->email,
        'profile_id'   => 2,
        'reception_id' => 1,
    ];

});
