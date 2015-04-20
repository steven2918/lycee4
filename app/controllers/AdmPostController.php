<?php

class AdmPostController extends \BaseController {


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
		$posts=Post::orderBy('created_at', 'desc')->paginate(5);

		return View::make("admin.articleadmin", ['posts'=>$posts]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("admin.newPost");

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$rules=[
		'titre'=>'required',
		'abstract'=>'required',
		'content'=>'required',
		];

		$userData=[
		'titre' => Input::get('titre'),
		'abstract' => Input::get('abstract'),
		'content' => Input::get('content'),

		];

		$validator=Validator::make($userData, $rules);


		if($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput();

		}else{

			$post = new Post;

			$args = array(
				'titre'   => FILTER_SANITIZE_SPECIAL_CHARS,
				'abstract'   => FILTER_SANITIZE_SPECIAL_CHARS,
				'content'   => FILTER_SANITIZE_SPECIAL_CHARS,
				);

			$myinputs = filter_input_array(INPUT_POST, $args);

			$post->title=$myinputs['titre'];
			$post->abstract=$myinputs['abstract'];
			$post->content=$_POST['content'];


			if (Input::hasFile('photo'))
			{

				if (Input::file('photo')->isValid())
				{

					$destinationPath = '.'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'/images';

					$extention= Input::file('photo')->getClientOriginalExtension();
					($fileName=$this->upload()) or $fileName='';

					try {

						Input::file('photo')->move($destinationPath, $fileName.".".$extention);
						chmod($destinationPath.DIRECTORY_SEPARATOR.$fileName.".".$extention, 0777);

					} catch(Exception $e) { }

					$post->url_thumbnail=$fileName.".".$extention;

				}
			}
			else{
				$post->url_thumbnail="";			
			}

			$post->status='unpublish';
			$post->user_id=Auth::user()->id;
			$post->save();

			Session::flash('message', "<p style='color:#01DF01;font-size:18px;text-align:center;'>Article ajouté</p>");
			return Redirect::to("admPost");

		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$posts=Post::find($id);

		return View::make("admin.show", ['posts'=>$posts]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		$post = Post::find($id);
		$checked[]=0;

		return View::make("admin.edit", ['post'=>$post]);

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

			$post = Post::find($id);
			$data = $_POST;


			$post->title=$data['titre'];
			$post->abstract=$_POST['abstract'];
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
						chmod($destinationPath.DIRECTORY_SEPARATOR.$fileName.".".$extention, 0777);

					} catch(Exception $e) {

					}

					$post->url_thumbnail=$fileName.".".$extention;

				}
			}
			else{
				$post->url_thumbnail="";			
			}

			$post->save();


			Session::flash('message', "<p style='color:#01DF01;font-size:18px;text-align:center;'>Article modifié</p>");

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
		
		Post::destroy($id);
		Session::flash('message', "<p style='color:#f00;font-size:18px;text-align:center;'>Article supprimé</p>");
		
		return Redirect::to("admPost");
	}

	public function changeStatus($id)
	{
		$post = Post::find($id);

		if($post->status=="publish"){
			$post->status = 'unpublish';
		}else{
			$post->status = 'publish';

		}
		$post->save();

		return Redirect::to("admPost");

	}

	public function action()
	{

		if(isset($_POST['check'])){

			if ($_POST['action'] == 'publish') {

				foreach($_POST['check'] as $id)
				{
					$post = Post::find($id);
					$post->status = 'publish';
					$post->save();

				}
				return Redirect::to("admPost");

			}elseif($_POST['action'] == 'unpublish'){

				foreach($_POST['check'] as $id)
				{
					$post = Post::find($id);
					$post->status = 'unpublish';
					$post->save();

				}
				return Redirect::to("admPost");		

			}elseif($_POST['action'] == 'delete'){

				foreach($_POST['check'] as $id)
				{

					Post::destroy($id);
					Session::flash('message', "<p style='color:#f00;font-size:18px;text-align:center;'>Article(s) supprimé(s)</p>");

				}
				return Redirect::to("admPost");
			}


		}else{
			Session::flash('message', "<p style='color:#f00;font-size:18px;text-align:center;'>Veuillez sélectionner au moins un article</p>");
			
			return Redirect::to("admPost");
		}

	}
}