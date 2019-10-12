<?php
//use Auth;
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
    return view('admin.dashboard.index');
});
Route::get('getdata','ProductsController@index');
Route::get('getBrakes','ProductsController@fetchBrakes');
Route::get('getEngines','ProductsController@fetchEngines');
Route::get('getLighting','ProductsController@fetchLighting');
Route::get('getWheels','ProductsController@fetchWheels');
Route::get('getModels','ProductsController@fetchModels');
Route::get('getSpecificModels/{mod}','ProductsController@fetchSpecificModels');
Route::get('getSpecials','ProductsController@fetchSpecials');
Route::get('bodyparts','ProductsController@fetchBodyParts');
Route::get('fetchSingle/{id}','ProductsController@fetchSingleProduct');
Route::resource('spares','SparesController');
Route::resource('suppliers','SuppliersController');
Route::resource('sites','SitesController');
Route::resource('bills','BillsController');
Route::get('printExcel','BillsController@printExcel');
Route::get('exportExcel/{supplier}','BillsController@exportExcel');
Route::get('SupplierData','BillsController@SupplierData');
Route::get('fetchvat','BillsController@fetchVat');
Route::get('fetchtotal','BillsController@fetchTotal');
Route::post('updateBill','BillsController@update');
Route::post('addPayment','BillsController@addPayment');
Route::post('view','BillsController@viewPayment');
Route::get('pending','BillsController@pending');
Route::get('allBills','BillsController@allBills');
Route::get('printData','BillsController@printData');
Route::get('dynamic_pdf/{supplier}','BillsController@convert_customer_data_to_html');
Route::get('paid','BillsController@paid');
Route::get('paymultiple','BillsController@payMultiple');
Route::resource('materials','MaterialsController');
Route::get('fetchMaterials','MaterialsController@fetchMaterials');

Route::get('fetchDescription','MaterialsController@fetchDescription');

Route::get('fetchSuppliers','SuppliersController@fetchSuppliers');
Route::get('userproducts',function(){
    return view('userpanel');
});
Route::get('signup',function(){
    return view('auth.register');
});
Route::get('signin',function(){
    return view('auth.login');
});
Route::post('/updateProduct','SparesController@updateProduct');
Route::get('fetchSites','SitesController@fetchSites');

Route::delete('bill/{id}','BillsController@destroy')->name('bills.destroy');
Route::delete('material/{id}','MaterialsController@destroy')->name('materials.destroy');
Auth::routes();
require_once('admin.php');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
