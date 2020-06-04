<?php
use Illuminate\Support\Facades\Route;


Route::get('/', 'IndexController@index')->name('index');
Route::get('/image', 'Articles\IndexController@getProfileImage');
Route::get('/experience', 'IndexController@experience')->name('experience');
Route::get('/education', 'IndexController@education')->name('education');

Route::group(['middleware' =>  'auth'], function(){
  //for auth routes

  //for admin routes
  Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
  	Route::get('/', function() {
  		echo "Привет, я админ";
	})->name('admin');
    Route::get('/articles.html',       'Articles\IndexController@listArticles')
	    ->name('articles');
    Route::get('/articles/{id}.html',  'Articles\IndexController@getArticle')
	   ->name('article');

    Route::post('/articles.html', 'Articles\IndexController@saveArticle');

    //news
	Route::resource('/categories', 'News\CategoryController');
	Route::resource('/news', 'News\NewsController');
  });
});


Auth::routes();

//networks
Route::get('/auth/vk', 'Auth\VkController@login')->name('vk.login');
Route::get('/auth/callback', 'Auth\VkController@response')->name('vk.callback');




Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', function() {
	$xml = \XmlParser::load('https://www.cbsnews.com/latest/rss/world');
    $parse = $xml->parse([
    	'title' => [
    		'uses' => 'channel.item[title,link]'
		]
	]);
	dd($parse);
});
Route::get('/logout', function() {
	Auth::logout();
	return redirect('/');
});