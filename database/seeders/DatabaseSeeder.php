<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Models\Customer::class, 500)->create()->each(function($customers){
            $customers->save();
            });

        factory(App\Models\Meter::class, 500)->create()->each(function($meters){
            $meters->save();
            });

        factory(App\Models\Payment::class, 500)->create()->each(function($payments){
            $payments->save();
            });

        factory(App\Models\Usage::class, 2000)->create()->each(function($usage){
            $usage->save();
            });

        factory(App\Models\Consumption::class, 2000)->create()->each(function($consumption){
            $consumption->save();
            });
    }
}
