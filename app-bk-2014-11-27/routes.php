<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*

Route::get('/', function()
{
	return View::make('hello');
});

*/

Route::get('/','HomeController@showHome');
Route::get('/actualites','HomeController@showNews');
Route::post('/search','HomeController@search');


Route::get('post/{id}',function($id)
{
	$posts=Post::find($id);

	return View::make('public.single',['posts'=> $posts]); 
});



Route::get('contact', function(){
	return View::make('public.contact');
});

Route::get('mentions-legales', function(){
	return View::make('public.mentions_legales');
});


Route::get('presentation', function(){
	return View::make('public.presentation');
});







Route::get('login', function(){
	return View::make('admin.login');
});

Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/');
});

Route::post("admin",'AdminController@connexion');

Route::group(['prefix'=>'admin', 'before' => 'auth'], function(){

	Route::get("/index",'AdminController@index');
	// Route::resource('admPost', 'AdmPostController');
});


Route::group(['before' => 'auth'], function() {
// Admin des posts RESTful gestion des posts
	Route::get("/student",'StudentController@index');
	Route::resource('admPost', 'AdmPostController');
	Route::get('change/{id}', 'AdmPostController@changeStatus');

});




/* Gestion du menu actif */

HTML::macro('clever_link', function($route, $text) {
	if( Request::path() == $route ) {
		$active = "class = 'active'";
	}
	else {
		$active = '';
	}

	return '<li ' . $active . '>' . link_to($route, $text) . '</li>';
}); 