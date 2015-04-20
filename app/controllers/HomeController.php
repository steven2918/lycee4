<?php

class HomeController extends BaseController {

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
	

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showHome(){
		$posts=Post::lastPosts();

		return View::make('public.home',[
			'first'=> $posts['first'], 
			'data'=> $posts['two_other'], 
			]); 
	}

	public function showNews(){

		$posts=Post::publish()->paginate(5);

		return View::make('public.actualites',[
			'data'=> $posts, 
			]); 
	}

	public function search(){


	
		$req=Input::get('search');
	
		

		$posts=Post::search($req)->paginate(3);

		return View::make('public.search',[
			'data'=> $posts, 
			'mot'=> $req, 
			]); 
	}


	public function showPostsUser($id){
		$user=User::find($id);
		var_dump($user);
	}


	public function showPostCategorie($id){
		$category=Category::findOrFail($id);
		return View::make('blog.category',[
			'categories'=> $category,
			'posts'=> $category->posts,
			'title'=>$category->title,
			'active'=>$category->id,
			'breadcrumbs'=>$category->title,
			]); 
	}

	public function getContact(){

	return View::make('public.contact');
	}

	//Contact Form
	public function getContactUsForm(){

	//Get all the data and store it inside Store Variable
	$data = Input::all();

	//Validation rules
	$rules = array (
	'sujet' => 'required',
	'email' => 'required|email',
	'message' => 'required'
	);
	
	$validator = Validator::make ($data, $rules);

	if ($validator -> passes()){
	/*
	Mail::send('emails.hello', $data, function($message) use ($data)
	{
	$message->from($data['email'] , $data['sujet']);
	$message->to('me@gmail.com', 'mr prof de math')->cc('me@gmail.com')->subject('contact request');

	});
	*/
	Session::flash('message', "<p style='color:#01DF01;font-size:18px;text-align:center;'>Votre E-mail a été envoyé</p>");
	return View::make('public.contact');
	}else{
	Session::flash('message', "<p style='color:#F00;font-size:18px;text-align:center;'>Veuillez compléter les champs obligatoire</p>");
	return Redirect::to('/contact'); //->withErrors($validator);
	}
	}
}
