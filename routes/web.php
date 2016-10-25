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

Route::get('/news/{news}', ['as' => 'news.show', 'uses' => 'newsController@showNews']);

//Route::get('/news/{id}', ['as'=>'news.show', 'uses' => 'newsController@showNews']);


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
//Route::resource('/admin/news', 'NewsController');
//Route::resource('/admin/news/show', 'NewsController');
//Route::resource('/admin/news/edit', 'NewsController');

// Reactie route
Route::post('/createpost', [
    'uses' => 'CommentsController@postCreateComment',
    'as' => 'comment.create']);



Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', 'pageController@admin');

    // Nieuwsbericht maken
    Route::get('/addnews', ['uses' => 'NewsController@getAddNews']);
    Route::post('/createnews', ['as' => 'news.create', 'uses' => 'NewsController@createNews']);

// Nieuwsbericht wijzigen
    Route::get('/editnews/{news}', ['as' => 'news.edit', 'uses' => 'NewsController@editNewsItem']);

// Nieuwsbericht verwijderen
    Route::get('/deletenews/{news}', ['as' => 'news.delete', 'uses' => 'NewsController@deleteNewsItem']);

// Nieuwsberichten overview
    Route::get('/newsoverview', 'newsController@overviewNews');

// Nieuwsberichten overview
    Route::get('/useroverview', 'AdminController@overviewUsers');

});

















