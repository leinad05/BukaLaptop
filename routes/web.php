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

Route::resource('products', 'ProductController');

Route::resource('categories', 'CategoryController');
Route::post('category/getDataFirst/', 'CategoryController@getDataFirst')->name('categories.getDataFirst');
Route::post('category/simpan_edit_category/', 'CategoryController@simpan_edit_category')->name('categories.simpan_edit_category');
Route::post('category/delete_data_category_ajax/', 'CategoryController@delete_data_category_ajax')->name('categories.delete_data_category_ajax');

Route::resource('transactions', 'TransactionController');
Route::post('transactions/showDataAjax/', 'TransactionController@showAjax')->name('transaction.showAjax');

Route::resource('brands', 'BrandController');
Route::post('brand/getDataFirst/', 'BrandController@getDataFirst')->name('brands.getDataFirst');
Route::post('brand/simpan_edit_brand/', 'BrandController@simpan_edit_brand')->name('brands.simpan_edit_brand');
Route::post('brand/delete_data_brand_ajax/', 'BrandController@delete_data_brand_ajax')->name('brands.delete_data_brand_ajax');

Route::middleware(['auth'])->group(function () {
});

Route::get('/', 'ProductController@front_index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
