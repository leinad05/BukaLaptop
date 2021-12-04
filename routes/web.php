<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//halo
Route::middleware(['auth'])->group(function(){
    Route::resource('products', 'ProductController');
    Route::get('product/getEditFormOnly/', 'ProductController@getEditFormOnly')->name('products.getEditFormOnly');
    Route::put('product/{product}', 'ProductController@update2')->name('products.update2');
    //Route::get('product/getEditFormOnly', 'ProductController@getEditFormOnly')->name('products.getEditFormOnly');

    Route::resource('categories', 'CategoryController');
    Route::post('category/getDataFirst/', 'CategoryController@getDataFirst')->name('categories.getDataFirst');
    Route::post('category/simpan_edit_category/', 'CategoryController@simpan_edit_category')->name('categories.simpan_edit_category');
    Route::post('category/delete_data_category_ajax/', 'CategoryController@delete_data_category_ajax')->name('categories.delete_data_category_ajax');

    Route::resource('transactions', 'TransactionController');
    Route::resource('transactions.index', 'TransactionController@index');
    Route::post('transactions/showDataAjax/', 'TransactionController@showAjax')->name('transaction.showAjax');
    
    Route::resource('brands', 'BrandController');
    Route::post('brand/getDataFirst/', 'BrandController@getDataFirst')->name('brands.getDataFirst');
    Route::post('brand/simpan_edit_brand/', 'BrandController@simpan_edit_brand')->name('brands.simpan_edit_brand');
    Route::post('brand/delete_data_brand_ajax/', 'BrandController@delete_data_brand_ajax')->name('brands.delete_data_brand_ajax');
});

<<<<<<< HEAD
=======
Route::resource('products', 'ProductController');
Route::get('product/getEditFormOnly/', 'ProductController@getEditFormOnly')->name('products.getEditFormOnly');
Route::put('product/{product}', 'ProductController@update2')->name('products.update2');
Route::get('product/getEditFormOnly', 'ProductController@getEditFormOnly')->name('products.getEditFormOnly');

Route::resource('categories', 'CategoryController');
Route::post('category/getDataFirst/', 'CategoryController@getDataFirst')->name('categories.getDataFirst');
Route::post('category/simpan_edit_category/', 'CategoryController@simpan_edit_category')->name('categories.simpan_edit_category');
Route::post('category/delete_data_category_ajax/', 'CategoryController@delete_data_category_ajax')->name('categories.delete_data_category_ajax');

Route::resource('transactions', 'TransactionController');
Route::post('transactions/showDataAjax/', 'TransactionController@showAjax')->name('transaction.showAjax');
Route::get('transactions/acceptTransaction/{transaction}', 'TransactionController@acceptTransaction')->name('transaction.acceptTransaction');

Route::resource('brands', 'BrandController');
Route::post('brand/getDataFirst/', 'BrandController@getDataFirst')->name('brands.getDataFirst');
Route::post('brand/simpan_edit_brand/', 'BrandController@simpan_edit_brand')->name('brands.simpan_edit_brand');
Route::post('brand/delete_data_brand_ajax/', 'BrandController@delete_data_brand_ajax')->name('brands.delete_data_brand_ajax');
>>>>>>> ed4754a9d20a20cd386061a56310567f59885c26


Route::get('/', 'ProductController@front_index');
Route::get('add-to-cart/{id}', 'ProductController@addToCart');
Route::get('cart', 'ProductController@cart');
Route::get('submitcheckout', 'TransactionController@submitcheckout')->name('submitcheckout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
