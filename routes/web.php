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

//use Illuminate\Support\Facades\Route;

/*                  HOMEPAGE */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'NewsController@homepageNews');
Route::get('/reviews', 'NewsController@reviewNews');
Route::get('/previews', 'NewsController@previewNews');
Route::get('/nieuws', 'NewsController@nieuwsNews');
Route::get('/news/{news}', ['as' => 'news.show', 'uses' => 'NewsController@showNews']);
Route::get('/search', 'searchController@searchPage');
//Route::get('/searchresults', 'searchController@searchPage');
Route::post('/search', ['as' => 'search.search', 'uses' => 'SearchController@search']);




/*               AUTHENTICATION */

// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('logout', array('uses' => 'HomeController@doLogout'));


/*                  PROFIEL */

Route::get('password_edit', function () {
    return view('password_edit');
});

Route::get('user_edit', function () {
    return view('user_edit');
});


// Reactie route
Route::post('/createpost', [
    'uses' => 'CommentsController@postCreateComment',
    'as' => 'comment.create']);



Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', 'pageController@admin');

    // Nieuwsbericht maken
    Route::get('/addnews', ['uses' => 'NewsController@getAddNews']);
    Route::post('/createnews', ['uses' => 'NewsController@createNews']);

// Nieuwsbericht wijzigen
    Route::get('/editnews/{news}', ['as' => 'news.edit', 'uses' => 'NewsController@editNewsItem']);
    Route::post('/editnewsitem', ['uses' => 'NewsController@editNews']);

// Nieuwsbericht verwijderen
    Route::get('/deletenews/{news}', ['as' => 'news.delete', 'uses' => 'NewsController@deleteNewsItem']);
    Route::post('/deletenewsitem', ['uses' => 'NewsController@deleteNews']);

// Nieuwsberichten overview
    Route::get('/newsoverview', 'newsController@overviewNews');
    Route::post('/makeactive', 'newsController@makeActive');

// Nieuwsberichten overview
    Route::get('/useroverview', 'AdminController@overviewUsers');

// Gebruiker admin maken (en andersom)
    Route::post('/makeadmin', ['uses' => 'AdminController@makeAdmin']);

});

















