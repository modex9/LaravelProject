<?php

use App\Review;
use App\Product;
use App\User;
use App\Role;
use App\Country;
use App\Photo;
use App\Post;
use App\Video;
use App\Tag;
use App\Taggable;
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


//Route::get('/admin', function () {
//   return view('admin_panel');
//});
Auth::routes(['reset' => false]);

Route::get('/admin', 'AdminController@index')->name('admin');

//Route::get('create_pr', function() {
//    Product::create(['name' => 'some', 'sku' => 'JH516', 'base_price' => 199.588]);
//});
//
//Route::get('/create_rev', function() {
//    Review::create(['review_content' => "antras antras", 'product_id' => 2]);
//});

//Route::get('/rev/{products}', function($products) {
//   return Product::find($products)->review->review_content;
//});
//
//Route::get('/products/{rev}', function($rev) {
//    return Review::find($rev)->products->name;
//});

//Route::get('/reviews/{products}', function($products) {
//    $reviews = Product::find($products)->reviews;
//
//    foreach ($reviews as $review) {
//        echo $review->review_content . '<br>';
//    }
//});

//Route::get('/create/{id}', function($id) {
//    Product::findOrfail($id)->reviews()->save(new Review(['title' => 'meh', 'content' => 'it\'s good but it\'s really expensive']));
//});
//
//Route::get('/read/{id}' ,function($id) {
//   $products =Product::findOrfail($id);
//   foreach ($products->reviews as $review) {
//       echo $review->title . " : " . $review->content . "<br>";
//   }
//});
//
//Route::get('/update/{id}', function($id) {
//    $products = Product::findOrfail($id);
//
//    $products->reviews()->whereId(1)->update(['title' => 'it\'s an ok phone']);
//});
//
//Route::get('/delete', function() {
//   Product::findOrfail(4)->delete();
//});

Route::get('/whatever/{id}', function($id) {
   $user = User::find($id);
    $user_roles = $user->roles;
    foreach($user_roles as $role) {
        echo $user->username . ' '.$role->name . "<br>";
    }
});


Route::get('/country/{id}/users', function($id) {
    $country = Country::find($id);
    $country_users = $country->users;
    foreach($country_users as $user) {
        echo $country->name . " " . $user->username. "<br>";
    }
});


Route::get('/country/{id}/roles',function($id) {
   $country = Country::find($id);
    $country_posts = $country->posts;
    foreach($country_posts as $post) {
        echo $country->name . " " .$post->user->username . " " . $post->content. "<br>";
    }
});

Route::get('/photos/post/{id}', function($id) {
   $post = Post::find($id);
    $photos = $post->photos;
    foreach($photos as $photo) {
        echo $post->content . " " . $photo->photoable . "<br>";
    }
});

Route::get('/photos/user/{id}', function($id) {
   $user = User::find($id);
    $photos = $user->photos;
    foreach($photos as $photo) {
        echo $user->username . " " . $photo->description . "<br>";
    }
});

Route::get('/tags', function() {
    $videos = Video::all();
    $posts = Post::all();
    $tags = Tag::all();
    
    foreach($videos as $video) {
        echo $video->name;
        echo $video->tags;
        echo "<br>";
    }
    
    foreach($posts as $post) {
        echo $post->name;
        echo $post->tags;
        echo "<br>";
    }
    
    foreach($tags as $tag) {
        echo $tag->name;
        echo $tag->videos;
        echo $tag->posts;
        echo "<br>";
    }
});

Route::post('/products/changestatus', 'ProductsController@changeProductStatus');
Route::post('/products/deleteseveral', 'ProductsController@deleteSelectedProducts')->name('products.destroySelected');
//Route::get('products/changeProductStatus', 'ProductsController@changeProductStatusGet');
//Route::resource('/reviews', 'ReviewsController');

Route::resources(['products' => 'ProductsController', 'reviews' => 'ReviewsController',
'options' => 'OptionsController']);