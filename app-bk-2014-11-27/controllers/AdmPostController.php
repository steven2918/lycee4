<?php

class AdmPostController extends \BaseController {


	private function upload(){


		$file = Input::file('photo')->getClientOriginalName();

		// if (Input::file('photo')->isValid())
		// {



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
		$posts=Post::paginate(10);

		return View::make("admin.admin", ['posts'=>$posts]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make("admin.newPost");

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		



		$post = new Post;

		$post->title=$_POST['titre'];
		$post->abstract=$_POST['abstract'];
		$post->content=$_POST['content'];


		if (Input::hasFile('photo'))
		{
    //
			if (Input::file('photo')->isValid())
			{


				$destinationPath=public_path()."\assets\images";

				$extention= Input::file('photo')->getClientOriginalExtension();
				($fileName=$this->upload()) or $fileName='';

		// var_dump($fileName);

				try {

					Input::file('photo')->move($destinationPath, $fileName.".".$extention);
			// return "okk";

				} catch(Exception $e) {

			// return "KOO : ".$destinationPath.$fileName.$extention;
				}



				$post->url_thumbnail=$fileName.".".$extention;

			}
		}
		else{
			$post->url_thumbnail="";			
		}


		$post->status='publish';
		$post->user_id=Auth::user()->id;
		$post->save();

		return Redirect::to("admPost");

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		//
		$post = Post::find($id);
		// $categ = Category::all();
		$checked[]=0;

		// foreach ($post->categories as $category) {
		// 	$checked[]=$category->id;
		// }
		// var_dump($checked);

		return View::make("admin.edit", ['post'=>$post/*, 'categ'=>$categ, "categChecked"=>$checked*/]);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		// var_dump($_POST);

		try{

			$post = Post::find($id);
			$data = $_POST;

			// var_dump($post->categories()->get());

			DB::transaction(function() use ($post, $data){

				$post->title=$data['titre'];
				$post->content=$data['content'];

				// $categsExist = $post->categories()->get();



				// foreach ($categsExist as $categExist) {
				// # code...
				// 	$post->categories()->detach($categExist->id);
				// }

				// $post->categories()->attach($data['categories']);



				if (Input::hasFile('photo'))
				{
    //
					if (Input::file('photo')->isValid())
					{


						$destinationPath=public_path()."\assets\images";

						$extention= Input::file('photo')->getClientOriginalExtension();
						($fileName=$this->upload()) or $fileName='';

		// var_dump($fileName);

						try {

							Input::file('photo')->move($destinationPath, $fileName.".".$extention);
			// return "okk";

						} catch(Exception $e) {

			// return "KOO : ".$destinationPath.$fileName.$extention;
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
		//
		Post::destroy($id);

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
}