<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consuption;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Consuption::class, function (Faker $faker) {
    return [
        //
        'consuption' => $faker -> randomDigit($min=1, $max=100),
        'created_at' => $faker -> date(),
    ];
});