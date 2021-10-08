<?php

// namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Usage;
use Faker\Generator as Faker;

$factory->define(Usage::class, function (Faker $faker) {
    return [
        //
        'customer_id' => $faker -> numberBetween($min = 1, $max = 500),


    ];
});
