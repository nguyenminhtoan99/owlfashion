<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('login', 'auth\AdminController@getLogin')->name('admin.login');
Route::post('login', 'auth\AdminController@postLogin')->name('admin.login');
Route::get('logout', 'auth\AdminController@logout')->name('admin.logout');;

Route::group(['prefix'=>'/admin','middleware' => ['login']], function () {
    //DANH MUC
    Route::get('category/create','admin\CategoryController@create')->name('category.create');
    Route::post('category/create','admin\CategoryController@store')->name('category.store');
    Route::get('category/','admin\CategoryController@index')->name('category.index');
    Route::get('category/edit/{id}','admin\CategoryController@edit')->name('category.edit');
    Route::put('category/update/{id}','admin\CategoryController@update')->name('category.update');
    Route::get('category/delete/{id}','admin\CategoryController@destroy')->name('category.destroy');

     //NHA SAN XUAT
     Route::get('brand/create','admin\BrandController@create')->name('brand.create');
     Route::post('brand/create','admin\BrandController@store')->name('brand.store');
     Route::get('brand/','admin\BrandController@index')->name('brand.index');
     Route::get('brand/edit/{id}','admin\BrandController@edit')->name('brand.edit');
     Route::put('brand/update/{id}','admin\BrandController@update')->name('brand.update');
     Route::get('brand/delete/{id}','admin\BrandController@destroy')->name('brand.destroy');

     //SAN PHAM
     Route::get('product/create','admin\ProductController@create')->name('product.create');
     Route::post('product/create','admin\ProductController@store')->name('product.store');
     Route::get('product/','admin\ProductController@index')->name('product.index');
     Route::get('product/edit/{id}','admin\ProductController@edit')->name('product.edit');
     Route::put('product/update/{id}','admin\ProductController@update')->name('product.update');
     Route::get('product/delete/{id}','admin\ProductController@destroy')->name('product.destroy');
});


