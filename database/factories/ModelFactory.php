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

$factory->define(App\Models\Administration\ReceptionCenter::class, function ($faker) {

    return [

        'name'        => $faker->catchPhrase,

        'province_id' => $faker->numberBetween($min = 1, $max = 36),

        'city'        => $faker->city,

        'address'     => $faker->address,
    ];

});

$factory->define(App\Models\Credentials\People::class, function ($faker) {

    return [

        'first_name'  => $faker->firstName,

        'last_name'   => $faker->lastName,

        'dni'         => $faker->unique()->ean8,

        'phone_c'     => $faker->e164PhoneNumber,

        'phone_h'     => $faker->e164PhoneNumber,

        'province_id' => $faker->numberBetween($min = 1, $max = 36),

        'city'        => $faker->city,

        'address'     => $faker->address,
    ];

});

$factory->define(App\Models\Credentials\User::class, function ($faker) {

    return [

        'email'        => $faker->unique()->email,

        'password'     => bcrypt('gt123456'),

        'profile_id'   => $faker->randomElement($array = array (3)),

        'people_id'    => $faker->unique()->numberBetween($min = 6, $max = 25),

        'reception_id' => $faker->numberBetween($min = 2, $max = 3),
    ];

});
