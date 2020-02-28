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

Route::get('/domestic', function() {
    return view('customerType/domestic');
});
Route::get('/industry', function() {
    return view('customerType/industry');
});
Route::get('/institution', function() {
    return view('customerType/institution');
});
Route::get('/commercial', function() {
    return view('customerType/commercial');
});
Route::get('/tank', function() {
    return view('customerType/tank');
});
// Route::get('/customer/{id}/payment', function ($id) {
     
//     return Customer::find($id)->payments;
    
// });

// Route::get('/customer/{id}/meter', function($id){
//     return Customer::find($id)->meter;
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customers', 'CustomerController@index')->name('customers');

