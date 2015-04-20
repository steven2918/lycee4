<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function connexion()
	{
		
		if(Input::server('REQUEST_METHOD')=='POST'){

			$rules=[
			'username'=>'required',
			'password'=>'required',
			];

			$validator=Validator::make(Input::all(), $rules);
			

			if($validator->fails()){
				//die("error");
				return Redirect::back()->withInput()->withErrors($validator);

			}else{


				if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
				{
					Session::flash('message', "<p style='color:aqua;'>Connecion réussie.</p>");
					// return Redirect::to("admin/index");

					if ( Auth::user()->role == "teacher") {
						# code...
					return Redirect::to("admPost");
					}else{
					return Redirect::to("student");

					}


				}else{
					
					Session::flash('message', "<p style='color:red;'>Mauvais identifiants.</p>");
					return Redirect::back()->withInput()->withErrors($validator);
					// var_dump(Input::get('username'), Input::get('password'));
				}	
			}
		}
	}


	public function index()
	{
		return View::make('admin.index'); 
	}

}
