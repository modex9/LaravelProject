<?php

use App\Product;
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

Auth::routes(['reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/insert', function() {
   Product::create(['name' => "iPhone 6", 'sku' => 'KH1564', 'status' => 1, 'base_price' => 159.9488, 'image' => 'http://imgur.com/fbggfdjnfrdse', 'description' => 'Old, but reliable phone.']);

});