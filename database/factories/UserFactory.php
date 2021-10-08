<?php

// namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $result = '';
    for($i = 0; $i < 9; $i++) {
        $result .= mt_rand(0, 9);
    }
    return [
        'firstname' => $faker->FirstName,
        'lastname' => $faker->LastName,
        'username' => $faker->userName,
        'permission' => $faker->randomElement(['user']),
        'occupation' => $faker->randomElement(['bill officer']),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'gender' => $faker->randomElement(['M', 'F']),
        'phone' => '+255'.$result,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
