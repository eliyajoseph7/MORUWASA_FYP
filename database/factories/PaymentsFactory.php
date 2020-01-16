<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;


$factory->define(Payment::class, function (Faker $faker) {
    // $autoIncrement = autoIncrement();

    // $autoIncrement->next();
    static $number = 1;

    return [
        //
        'amount' => $faker->numberBetween($min = 1200, $max = 50000),
        'status' => $faker->randomElement(['paid', 'notpaid']),
        'customer_id' => $number++
        // 'customer_id' => $autoIncrement->current(),
        
    ];
});
// function autoIncrement()
// {
//     for ($i = 0; $i < 1000; $i++) {
//         yield $i;
//     }
// }