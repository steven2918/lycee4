<?php

class AdmStudentController extends \BaseController {


	private function upload(){


		$file = Input::file('photo')->getClientOriginalName();
		return md5($file);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		// $posts=Post::all();
		$students=User::students()->orderBy('created_at', 'desc')->paginate(5);


		// return View::make("admin.admin", ['posts'=>$posts]);
		return View::make("admin.crudeleveadmin", ['students'=>$students]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make("admin.newStudent");

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$user = new User;

		$user->username=$_POST['username'];
		$user->password=  Hash::make($_POST['password']);
		$user->role=$_POST['role'];

		$user->save();

		Session::flash('message', "<p style='color:#01DF01;font-size:18px;text-align:center;'>Éleve ajouté(e)</p>");

		return Redirect::to("admStudent");

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$users=User::find($id);

		return View::make("admin.show", ['users'=>$users]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		$user = User::find($id);

		return View::make("admin.editstudent", ['student'=>$user]);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		

		try{

			$post = User::find($id);
			$data = $_POST;


			DB::transaction(function() use ($post, $data){

				$post->title=$data['titre'];
				$post->content=$data['content'];


				if (Input::hasFile('photo'))
				{
					if (Input::file('photo')->isValid())
					{

						$destinationPath=public_path()."\assets\images";

						$extention= Input::file('photo')->getClientOriginalExtension();
						($fileName=$this->upload()) or $fileName='';


						try {

							Input::file('photo')->move($destinationPath, $fileName.".".$extention);

						} catch(Exception $e) {

						}

						$post->url_thumbnail=$fileName.".".$extention;

					}
				}
				else{
					$post->url_thumbnail="";			
				}

				$post->save();


			});
			return Redirect::to("admPost");

		}catch(Exception $ex){

			var_dump($ex);

		}


	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		User::destroy($id);

		return Redirect::to("admStudent");
	}


}