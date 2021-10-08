<?php

// namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Consumption;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Consumption::class, function (Faker $faker) {
    return [
        //
        'consumption' => $faker -> randomDigit($min=1, $max=100),
        'created_at' => '2020-'.$faker -> date('m-d H:i:s'),
    ];
});
