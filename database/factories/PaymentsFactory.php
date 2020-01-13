<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    $random_number = mt_rand(1, 100);

    return [
        //
        'amount' => $faker->numberBetween($min = 1200, $max = 50000),
        'status' => $faker->randomElement(['paid', 'notpaid']),
        'customer_id' => $faker->unique()->numberBetween($min = 1, $max = 100),
        
    ];
});
