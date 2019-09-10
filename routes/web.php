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

/*  Api Resource Collection

	use App\Comment;
	use App\Http\Resources\CommentCollection;

	Route::get('/comments', function () {
	    //return new CommentCollection(Comment::all()->keyBy->message); // preserveKeys
	    return new CommentCollection(Comment::paginate()); // Pagination
	});
*/

/*	Assigning Middleware To Routes

	Route::resource('comments', 'CommentController')->middleware('check.age');
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', 'PostController');

Route::resource('countries', 'CountryController');
//Route::get('/posts/getPostById/{id}', 'PostController@getPostById');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
