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
use App\Post;

use App\Category;

Route::get('/', function () {

	$categories = Category::all();
    return view('home',compact('categories'));
});


Route::get('/posts/{post}', 'HomeController@show');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/jewelry', function(){
// 	return view('jewelry');
// });

Route::get('/jewelry', 'HomeController@jewelry');
Route::get('/painting', 'HomeController@painting');
Route::get('/sculpture', 'HomeController@sculpture');
Route::get('/wooden_toy', 'HomeController@wooden_toy');

Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/remove/{id}', 'CartController@destroy');


?>