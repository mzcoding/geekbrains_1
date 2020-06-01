<?php
use Illuminate\Support\Facades\Route;


Route::get('/', 'IndexController@index')->name('index');
Route::get('/image', 'Articles\IndexController@getProfileImage');
Route::get('/experience', 'IndexController@experience')->name('experience');
Route::get('/education', 'IndexController@education')->name('education');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/articles.html',       'Articles\IndexController@listArticles')
	    ->name('articles');
    Route::get('/articles/{id}.html',  'Articles\IndexController@getArticle')
	   ->name('article');

    Route::post('/articles.html', 'Articles\IndexController@saveArticle');

    //news
	Route::resource('/categories', 'News\CategoryController');
	Route::resource('/news', 'News\NewsController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
