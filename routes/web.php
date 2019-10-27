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

Auth::routes();//появляется после команды   php artisan ui:auth
//Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

// /home -страница,
	// HomeController - контроллер из папки app/Http/Controllers/HomeController.php
	//@index - public function index() - каую вьюху отдать
	

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
	Route::resource('posts', 'PostController')->names('blog-posts');
});
//Аналогичная запись без namespace - это путь до папки c PostController
//	Route::group(['prefix' => 'blog'], function () {
//		Route::resource('posts', 'Blog/PostController')->names('blog-posts');
//	});
//	prefix' => 'blog' - url будет заканчиваться на blog/posts (или без префикса Route::resource('blogp/osts'))

Route::get('/home', 'HomeController@index')->name('home'); //после успешной авторизации нас перекидывает на HomeController метод @index'

////создаем маршрут, который является ресурсом с названием rest (название URL), за этот ресурс отвечает RestTestController, restTest - имя маршрута
//Route::resource('rest', 'RestTestController')->names('restTest');

//Админка Блога
$groupData = [
	'namespace' => 'Blog\Admin', //там будут контроллеры отвечающие за управление категориями
	'prefix' => 'admin/blog' //url
];
Route::group($groupData, function (){ //группа маршрутов
	//BlockCategory
	$methods = ['index', 'edit', 'update', 'create', 'store']; //методы для создания, редактирования
	// (index - список категорий, edit - страница редактирования..., store - отрабатывает при создании) нет show и destroy
	Route::resource('categories', 'CategoryController') //создать ресурсный маршрут. Ресурс которым мы будем управлять - является категорией(categories), отвечает за это CategoryController
		->only($methods) //белый список для создания ресурсов ; //для каких методов надо создать маршруты ['index', 'edit', 'store', 'update', 'create', ]
		->names('blog.admin.categories'); //наименование маршрута
});
