<?php

class AdmChoiceController extends \BaseController {




	public function test($val1, $val2){
		var_dump($val1, $va2);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id, $nbReponse)
	{
		var_dump($id, $nbReponse);
		exit();

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make("admin.newQcm");

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		for ($i=0; $i < $_POST['nbReponse']; $i++) { 

			$choice = new Choice;
			$choice->question_id = $_POST['id-form'];
			$choice->content = $_POST['reponse'.$i];
			$choice->status = $_POST['valeur'.$i];
			$choice->save();

		}

		return Redirect::to("admQCM");

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
		
		$choice = Choice::find($id);
		
		return View::make("admin.editchoice", ['choice'=>$choice]);

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