<?php

use App\Review;
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

//Route::get('create_pr', function() {
//    Product::create(['name' => 'some', 'sku' => 'JH516', 'base_price' => 199.588]);
//});
//
//Route::get('/create_rev', function() {
//    Review::create(['review_content' => "antras antras", 'product_id' => 2]);
//});

//Route::get('/rev/{product}', function($product) {
//   return Product::find($product)->review->review_content;
//});
//
//Route::get('/product/{rev}', function($rev) {
//    return Review::find($rev)->product->name;
//});

//Route::get('/reviews/{product}', function($product) {
//    $reviews = Product::find($product)->reviews;
//
//    foreach ($reviews as $review) {
//        echo $review->review_content . '<br>';
//    }
//});

Route::get('/create/{id}', function($id) {
    Product::findOrfail($id)->reviews()->save(new Review(['title' => 'meh', 'content' => 'it\'s good but it\'s really expensive']));
});

Route::get('/read/{id}' ,function($id) {
   $product =Product::findOrfail($id);
   foreach ($product->reviews as $review) {
       echo $review->title . " : " . $review->content . "<br>";
   }
});

Route::get('/update/{id}', function($id) {
    $product = Product::findOrfail($id);

    $product->reviews()->whereId(1)->update(['title' => 'it\'s an ok phone']);
});

Route::get('/delete', function() {
   Product::findOrfail(4)->delete();
});