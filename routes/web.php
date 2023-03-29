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

Route::get('/', 'BidController@index')->name('main');

Route::get('/login', 'UserController@login')->name('login');

Route::get('/register', 'UserController@register')->name('register');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/client', 'ClientController@index')
	->name('client.index');
});

Route::post('/auth', 'UserController@auth')->name('auth');

Route::group(['middleware' => 'auth'], function() {
	Route::post('/logout', 'UserController@logout')
	->name('logout');
});

Route::group(['middleware' => 'auth'], function() {

	Route::get('/master', 'AdminController@index')
	->name('admin.index');
});

Route::post('/user/store', 'UserController@store')->name('user.store');


Route::get('/master/category/create', 'AdminController@newCategory')
	->name('admin.new_category');

Route::post('/master/category/store', 'CategoryController@store')
	->name('category.store');

Route::delete('/master/category/delete', 'CategoryController@destroy')
	->name('category.destroy');

Route::get('/client/bid', 'ClientController@newBid')
	->name('client.new_bid');

Route::post('/client/bid/store', 'BidController@store')
	->name('bid.store');

Route::delete('/client/bid/{id}/delete', 'BidController@destroy')
	->name('bid.destroy');

Route::patch('/master/bid/{id}/repairing', 'BidController@sendForRepair')
	->name('bid.send_for_repair');

Route::patch('/master/bid/{id}/renovate', 'BidController@renovate')
	->name('bid.renovate');

Route::get('/bids/successful', 'BidController@successfulBids');

