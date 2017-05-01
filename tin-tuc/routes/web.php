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

// Route::get('/', function () {
//     return view('fontend.home');
// });
Route::group(['prefix'=>'/'],function(){
	Route::get('',function(){
		return view('fontend.home');
	});
});
Route::resource('category','CategoryController');
Route::group(['middleware'=>'auth'],function(){
	Route::group(['prefix'=>'admin'],function(){
		Route::get('/','CheckController@index');
		Route::get('/{type}/{action}',function($type,$action){
			return view("backend.$type.$action");
		});

		});
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');