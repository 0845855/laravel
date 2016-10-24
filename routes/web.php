<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Route;

/*                  HOMEPAGE */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'newsController@homepageNews');

Route::get('/reviews', 'newsController@reviewNews');
Route::get('/previews', 'newsController@previewNews');
Route::get('/nieuws', 'newsController@nieuwsNews');

Route::get('/news/{id}', 'newsController@showNews');

Route::get('article/{news}', ['as'=>'news.show', 'uses' => 'newsController@showNews']);



/*               AUTHENTICATION */

// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('logout', array('uses' => 'HomeController@doLogout'));
//END MAKE::AUTH


/*                  PROFIEL */

Route::get('password_edit', function () {
    return view('password_edit');
});

Route::get('user_edit', function () {
    return view('user_edit');
});

/*              ADMIN SECTIE */

// Nieuws routes
Route::resource('/admin/news', 'NewsController');
Route::resource('/admin/news/show', 'NewsController');
Route::resource('/admin/news/edit', 'NewsController');

// Reactie route
Route::post('/createpost', [
    'uses' => 'CommentsController@postCreateComment',
    'as' => 'comment.create']);






















Route::group(['middleware' => 'auth'], function(){
    Route::get('/loginSuccess', 'HomeController@index');
    Route::get('/profile', 'pageController@profile');
    Route::get('/admin', 'pageController@admin');
    Route::get('/addNews', 'pageController@addNews');
    Route::post('/createNews', ['uses' => 'NewsController@createNews', 'as' => 'news.create']);
});