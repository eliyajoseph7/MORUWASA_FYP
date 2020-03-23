<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'street' => $faker->randomElement(['Bigwa', 'Boma', 'Msanvu', 'Kihonda', 'Mazimbu', 'Mbuyuni', 'Mindu', 'Sabasaba', 'Mzinga']),
        'gender' => $faker->randomElement(['M', 'F']),
        'phone' => $faker->phoneNumber,
        'category' => $faker->randomElement(['domestic', 'industry', 'institution', 'commercial', 'tank','kiosk']),
        

        
    ];
});
