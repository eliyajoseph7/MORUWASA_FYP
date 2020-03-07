<?php

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
        factory(App\Customer::class, 1000)->create()->each(function($customers){
            $customers->save();
            });

        factory(App\Meter::class, 1000)->create()->each(function($meters){
            $meters->save();
            });

        factory(App\Payment::class, 1000)->create()->each(function($payments){
            $payments->save();
            });

        factory(App\Usage::class, 1000)->create()->each(function($usage){
            $usage->save();
            });

        factory(App\Consuption::class, 1000)->create()->each(function($consuption){
            $consuption->save();
            });
    }
}
