<?php

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
    return view('auth.login');
});

Route::get('/', 'PagesController@dashboard');
Route::get('/inventory', 'PagesController@inventory');
Route::get('/product', 'PagesController@product');
Route::get('/addproduct', 'PagesController@addproduct');
Route::get('/editproduct', 'PagesController@editproduct');
Route::get('/customer', 'PagesController@customer');
Route::get('/employee', 'PagesController@employee');
Route::get('/addemployee', 'PagesController@addemployee');
Route::get('/addcustomer', 'PagesController@addcustomer'); 
//Route::get('/editemployee', 'PagesController@editemployee');
Route::get('/salesorder', 'PagesController@salesorder');
Route::get('/editsalesorder','PagesController@editsalesorder');
Route::get('/addsalesorder','PagesController@addsalesorder');
Route::get('/addsalesorder','SalesOrdersController@getData');


// Route::resource('inventorys@index'.'InventoryController');
Route::resource('product', 'ProductsController');
Route::resource('customer','CustomersController');

Route::resource('employee','UserController');
Route::resource('inventory','InventoryController');
Route::resource('salesorder','SalesOrdersController');
// Route::get('/','InventoryController');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
