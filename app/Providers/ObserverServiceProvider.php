<?php

namespace App\Providers;
use App\Customer;
use App\Observers\CustomerObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Customer::observe(CustomerObserver::class);
    }
}
