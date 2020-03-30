<?php

use App\Customer;
use App\Meter;
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

Route::get('/setup', function () {
    return view('staff/registerStaff');
});
Route::get('/invoices', 'Invoice\InvoiceController@invoice');

// Route::get('/domestic', function() {
//     return view('customerType/domestic');
// });
// Route::get('/industry', function() {
//     return view('customerType/industry');
// });
// Route::get('/institution', function() {
//     return view('customerType/institution');
// });
// Route::get('/commercial', function() {
//     return view('customerType/commercial');
// });
// Route::get('/tank', function() {
//     return view('customerType/tank');
// });
// Route::get('/customer/{id}/payment', function ($id) {
     
//     return Customer::find($id)->payments;
    
// });

Route::get('/meter/{id}/customer', function($id){
    return Meter::find($id)->customer->name;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/waterBill', 'WaterBillController@index')->name('waterBill');
Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/meter', 'MeterController@meters')->name('meter');
Route::post('/addCustomer', 'CustomerController@add');
Route::post('/addMeter', 'MeterController@add');
Route::post('/registerStaff', 'Auth\SetupController@add');


// Route::get('/data', 'Chart\ChartDataController@getMonthlyConsuptionData');
// Route::get('/get-categories', 'Chart\CustomerCategoryChartController@getTotalCategoryData');
// Route::get('/get-consuption', 'Chart\CategoryConsuptionChartController@getMonthlyConsuptionData');

    /*
    *      controllers for charts 
    */
Route::get('/get-categories', [
     'as'  => 'categories',
     'uses' => 'Chart\CustomerCategoryChartController@getTotalCategoryData'
]);
Route::get('/get-consuption', [
     'as'  => 'consumptions',
     'uses' => 'Chart\CategoryConsuptionChartController@getMonthlyConsuptionData'
]);
                
Route::get('/data',[
    'as' => 'data.show',
    'uses' => 'Chart\ChartDataController@getMonthlyConsuptionData'
]);
Route::get('/units',[
    'as' => 'units.show',
    'uses' => 'Chart\InteractiveConsuptionChartController@getAllLiveConsuption'
]);
Route::get('view/trends/{id}',[
    'as' => 'trends',
    'uses' => 'Chart\TrendsChartController@getAllDaysData'
]);

Route::get('/view/{id}', 'actions\ActionToCustomerController@view');
Route::post('/updateCustomer/{id}', 'actions\UpdateCustomerController@update');
Route::get('/delete/{id}', 'actions\UpdateCustomerController@delete');
