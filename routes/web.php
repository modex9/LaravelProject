<?php

use App\Review;
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

Route::get('/create', function() {
    Review::create(['review_content' => "test" . rand(1,10), 'product' => rand(55, 666)]);
});

Route::get('/delete', function() {
//    Review::where('id', 1)->delete();
    Review::destroy([2, 4, 6, 8]);
});