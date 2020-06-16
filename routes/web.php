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
Route::get('/generate', 'Invoice\BillsGenerationController@generateBill');

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
Route::any('/waterBill', 'WaterBillController@index')->name('waterBill');
Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/meter', 'MeterController@meters')->name('meter');
Route::post('/addCustomer', 'CustomerController@add');
Route::post('/addMeter', 'MeterController@add');
Route::post('/registerStaff', 'Auth\SetupController@add');


// Route::get('/data', 'Chart\ChartDataController@getMonthlyConsumptionData');
// Route::get('/get-categories', 'Chart\CustomerCategoryChartController@getTotalCategoryData');
// Route::get('/get-consumption', 'Chart\CategoryConsumptionChartController@getMonthlyConsumptionData');

    /*
    *      controllers for charts 
    */
Route::get('/get-categories', [
     'as'  => 'categories',
     'uses' => 'Chart\CustomerCategoryChartController@getTotalCategoryData'
]);
Route::get('/get-consumption', [
     'as'  => 'consumptions',
     'uses' => 'Chart\CategoryConsumptionChartController@getMonthlyConsumptionData'
]);
                
Route::get('/data',[
    'as' => 'data.show',
    'uses' => 'Chart\ChartDataController@getMonthlyConsumptionData'
]);
Route::get('/units',[
    'as' => 'units.show',
    'uses' => 'Chart\InteractiveConsumptionChartController@getAllLiveConsumption'
]);
Route::get('view/trends/{id}',[
    'as' => 'trends',
    'uses' => 'Chart\TrendsChartController@getAllDaysData'
]);

Route::get('/view/{id}', 'actions\ActionToCustomerController@view');
Route::post('/updateCustomer/{id}', 'actions\UpdateCustomerController@update');
Route::get('/delete/{id}', 'actions\UpdateCustomerController@delete');

// editing user's profile
Route::get('/profile/{id}', 'actions\UpdateStaffProfileController@edit');
Route::post('/updateProfile/{id}', 'actions\UpdateStaffProfileController@update');

// Editing meter
Route::get('/editMeter/{id}', 'actions\EditMeterController@meter');
Route::post('/updateMeter/{id}', 'actions\EditMeterController@updateMeter');