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
		// return View::make('blog.home', ['data'=>'Hello world']); 

		// $posts=DB::table('posts')->get();
		// $posts=Post::all();

		// $posts=Post::publish()->paginate(2);
		$posts=Post::lastPosts();

		

		return View::make('public.home',[
			'first'=> $posts['first'], 
			'data'=> $posts['two_other'], 
			]); 
	}

	public function showNews(){

		$posts=Post::publish()->paginate(2);

		return View::make('public.actualites',[
			'data'=> $posts, 
			]); 
	}

	public function search(){


		if(Input::server('REQUEST_METHOD')=='POST'){

		$req=Input::get('search');
	
		}

		$posts=Post::search($req)->paginate(2);

		return View::make('public.search',[
			'data'=> $posts, 
			'mot'=> $req, 
			]); 
	}




	public function showPostsUser($id){
		

		$user=User::find($id);
		// return View::make('blog.user',['user'=> $user]);

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
}
