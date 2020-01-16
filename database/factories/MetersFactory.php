<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meter;
use Faker\Generator as Faker;

$factory->define(Meter::class, function (Faker $faker) {
    static $number = 1;

    return [
        //
               
        'meter_no' => $faker->unique()->numberBetween($min = 1, $max = 50000000),
        'customer_id' => $number++
        // 'customer_id' => $faker->unique()->numberBetween($min = 1, $max = 10000),

        
        // 'customer_id' => 
        // function () {
        //     return factory(App\Customer::class)->create()->id;
        // }


    ];
});
