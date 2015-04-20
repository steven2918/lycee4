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
// Route::post('/search','HomeController@search');

Route::match(array('GET', 'POST'),'search', 'HomeController@search');


Route::get('post/{id}',function($id)
{
	$posts=Post::find($id);

	return View::make('public.single',['posts'=> $posts]); 
});

Route::group(['before'=>'csrf'], function(){
	Route::post('comment',  'CommentController@putComment');
});


Route::get('testAkismet', function() {
	$apiKey = Config::get('app.akismet_api_key');
	$siteURL = Config::get('app.url');
	$akismet = new Akismet($siteURL, $apiKey);
	if ($akismet->isKeyValid()) { echo 'valid!'; } else { echo 'error!'; }
});


Route::get('contact', 'HomeController@getcontact');

Route::post('contact_request', 'HomeController@getContactUsForm');

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
	Route::get("/student/qcm",'StudentController@qcm');
	Route::get("/student/qcm/response/{id}",'StudentController@response');
	Route::get("/student/qcm/view/{id}",'StudentController@view');

	Route::post("/score",'ScoreController@index');


	Route::resource('admPost', 'AdmPostController');
	Route::get('change/{id}', 'AdmPostController@changeStatus');
	// Route::get('/articles', 'AdmPostController@index');
	Route::post('admPost/action', 'AdmPostController@action');

	Route::resource('admQCM', 'AdmQCMController');
	Route::resource('admQCM/action', 'AdmQCMController@action');
	Route::get('changeQCM/{id}', 'AdmQCMController@changeStatus');
	Route::resource('admStudent', 'AdmStudentController');
	Route::resource('admChoice', 'AdmChoiceController');

	Route::get('dashboard', 'AdminController@index' );


});




/* Gestion du menu actif */

HTML::macro('clever_link', function($route, $text, $icon) {
	// if( Request::path() == $route ) 
	if( strstr(Request::path(), $route)){
		$active = "class = 'active'";
	}
	else {
		$active = "";
	}

	return '<li ' . $active . '>' .$icon. link_to($route, $text) . '</li>';
}); 