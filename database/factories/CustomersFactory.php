<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $result = '';
    for($i = 0; $i < 9; $i++) {
        $result .= mt_rand(0, 9);
    }
    return [
        //
        'name' => $faker->name,
        'street' => $faker->randomElement(['Bigwa', 'Boma', 'Msanvu', 'Kihonda', 'Mazimbu', 'Mbuyuni', 'Mindu', 'Sabasaba', 'Mzinga']),
        'gender' => $faker->randomElement(['M', 'F']),
        'phone' => '+255'.$result,
        'category' => $faker->randomElement(['domestic', 'industry', 'institution', 'commercial', 'tank','kiosk']),
        'api_token' => bin2hex(openssl_random_pseudo_bytes(30))
        

        
    ];
});
