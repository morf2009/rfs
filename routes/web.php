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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

//
//Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// /home -страница,
	// HomeController - контроллер из папки app/Http/Controllers/HomeController.php
	//@index - public function index() - каую вьюху отдать

Auth::routes();//появляется после команды   php artisan ui:auth

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
	Route::resource('posts', 'PostController')->names('blog-posts');
});
//Аналогичная запись без namespace - это путь до папки c PostController
//	Route::group(['prefix' => 'blog'], function () {
//		Route::resource('posts', 'Blog/PostController')->names('blog-posts');
//	});
//	prefix' => 'blog' - url будет заканчиваться на blog/posts (или без префикса Route::resource('blogp/osts'))

Route::get('/home', 'HomeController@index')->name('home'); //после успешной авторизации нас перекидывает на HomeController метод @index'

//создаем маршрут, который является ресурсом с названием rest (название URL), за этот ресурс отвечает RestTestController, restTest - имя маршрута
Route::resource('rest', 'RestTestController')->names('restTest');
