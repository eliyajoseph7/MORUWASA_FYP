<?php

// namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Meter;
use Faker\Generator as Faker;

$factory->define(Meter::class, function (Faker $faker) {
    static $number = 1;
    $result = '';
    for($i = 0; $i < 8; $i++) {
        $result .= mt_rand(0, 9);
    }
    return [
        
               
        'meter_no' => $result,
        'customer_id' => $number++,
        'type' => $faker->randomElement(['prepaid', 'postpaid']),
        // 'customer_id' => $faker->unique()->numberBetween($min = 1, $max = 10000),

        
        // 'customer_id' => 
        // function () {
        //     return factory(App\Models\Customer::class)->create()->id;
        // }


    ];
});
