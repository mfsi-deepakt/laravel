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
Route::group(['middleware' => ['auth.basic']], function () {
	Route::view('/about', 'about')->name('about');

	Route::get('/feedback', 'FeedbackController@index')->name('feedback');

	Route::post('/feedback', 'FeedbackController@store')->name('feedback');

	Route::get('/feedback/create', 'FeedbackController@create')->name("createFeedback");

	Route::get('/feedback/{feedback}', 'FeedbackController@show')->name('feedbackShow');

	Route::get('/feedback/{feedback}/update', 'FeedbackController@update');

	Route::post('/feedback/{feedback}/comment', 'CommentController@store')->name('addcomment');

	Route::get('/user/{user}', 'UserController@index')->name('user-profile');

	Route::get('/download/{feedback}', 'FeedbackController@download')->name('download'); 
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/blog/public', 'HomeController@index')->name('homeDemo');