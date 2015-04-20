<?php

class AdminController extends BaseController {


	public function connexion()
	{
		
		if(Input::server('REQUEST_METHOD')=='POST'){

			$rules=[
			'username'=>'required',
			'password'=>'required',
			];

			$userData=[
			'username' => Input::get('username'),
			'password' => Input::get('password'),

			];

			$validator=Validator::make($userData, $rules);
			

			if($validator->fails()){
				return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));

			}else{

				if (Auth::attempt($userData))
				{
					Session::flash('message', "<p style='color:#01DF01;font-size:18px;text-align:center;'>Connexion réussie</p>");

					if ( Auth::user()->role == "teacher") {
						return Redirect::to("admin/index");		
					}else{
						return Redirect::to("student");
					}

				}else{
					
					Session::flash('message', "<p style='color:#F00;font-size:18px;text-align:center;'>Identifiants incorrects</p>");
					return Redirect::back()->withInput()->withErrors($validator);
				}	
			}
		}
	}


	public function index()
	{

		$nbTotal['commentaires'] = count(Comment::all());
		$nbTotal['fiches'] = count(Question::all());
		$nbTotal['eleves'] = count(User::all());

		$lastPosts = Post::GetPosts(3);
		$lastStudents = User::GetStudents(3);
		$lastQcms = Question::GetQuestions(3);

		return View::make('admin.dashboardadmin', ['nbTotal'=>$nbTotal, "lastPosts" => $lastPosts, "lastStudents" => $lastStudents, "lastQcms" => $lastQcms]); 
	}

}
