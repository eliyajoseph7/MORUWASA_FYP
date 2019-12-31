<?php

use App\Customer;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth/login');
});
// Route::get('/customer/{id}/payment', function ($id) {
     
//     return Customer::find($id)->payments;
    
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customers', 'CustomerController@index')->name('customers');

