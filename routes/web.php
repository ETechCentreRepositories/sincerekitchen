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
Route::get('/salesorder', 'PagesController@salesorder');
Route::get('/addsalesorder','PagesController@addsalesorder');
Route::get('/addsalesorder','SalesOrdersController@getData');
Route::get('/supplier','PagesController@supplier');
Route::get('/addsupplier','PagesController@addsupplier');

Route::get('/purchaseorder','PagesController@purchaseorder');
Route::get('/addpurchaseorder','PagesController@addpurchaseorder');
Route::get('/addpurchaseorder','PurchaseOrdersController@getData');




//Route::post('/salesorder/addtodatabase/{productID}/{quantity}/{price}/{amount}','SalesOrdersController@storetoDatabase');



Route::get('/retrieve-product-by-product-name/{productName}','ProductsController@getProductsbyProductName');
Route::get('/autocomplete-search', array('as'=>'autocomplete','uses'=>'SalesOrdersController@autocomplete'));


Route::post('/addpurchaseorder','ProductsController@AddNewItem');
Route::post('/viewpurchaseorder','PurchaseOrdersController@uploadFile');


Route::resource('product', 'ProductsController');
Route::resource('customer','CustomersController');
Route::resource('employee','UserController');
Route::resource('inventory','InventoryController');
Route::resource('salesorder','SalesOrdersController');
Route::resource('supplier','SupplierController');
Route::resource('purchaseorder','PurchaseOrdersController');



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
