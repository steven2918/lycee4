<?php

class AdmQCMController extends \BaseController {


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
		$questions=Question::orderBy('created_at', 'desc')->paginate(5);

		return View::make("admin.questionadmin", ['questions'=>$questions]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make("admin.newQcm");

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
		'content'=>'required',
		];

		$userData=[
		'titre' => Input::get('titre'),
		'content' => Input::get('content'),

		];

		$validator=Validator::make($userData, $rules);


		if($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput();

		}else{
			$question = new Question;

			$question->title=$_POST['titre'];
			$question->content=$_POST['content'];
			$question->class_level=$_POST['role'];

			$question->status='unpublish';
			$question->save();

			$idQuestion = $question->id;
			$nbReponse = $_POST['nbreponse'];


			/* insertion de données dans la table score pour indiquer aux élèves qu'un nouveau qcm a été créé */
			$users = User::where('role', '=', $_POST['role'])->get();

			foreach ($users as $user) {

				$score = new Score;
				$score->user_id = $user->id;
				$score->question_id = $idQuestion;
				$score->status_question = "pas fait";
				$score->save();

			}

			return View::make("admin.newChoice", ['nbReponse'=>$nbReponse, 'idQuestion'=>$idQuestion, 'titre'=>$_POST['titre'], 'contenu'=>$_POST['content'], 'niveau'=>$_POST['role']]);

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
		
		$question = Question::find($id);

		$choices = DB::table('choices')->where('question_id', $id)->get();

		$nbReponse = count($choices);
		
		return View::make("admin.editquestion", ['question'=>$question, 'choices'=>$choices, 'nbReponse' => $nbReponse]);

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

			$question = Question::find($id);
			$data = $_POST;


			$question->title=$data['title'];
			$question->content=$data['content'];
			$question->class_level=$data['role'];

			$question->status='publish';


			/* update de la table score */
			$question->save();


			$choices = Choice::GetChoices($id);

			foreach ($choices as $choice) {
				
				$choice =  Choice::find($choice->id);
				$choice->content = $_POST['reponse'.$choice->id];
				$choice->status = $_POST['valeur'.$choice->id];
				$choice->save();

			}

			Session::flash('message', "<p style='color:#01DF01;font-size:18px;text-align:center;'>Question modifiée</p>");

			return Redirect::to("admQCM");

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

		$question = Question::find($id);
		$question->delete();

		Session::flash('message', "<p style='color:#f00;font-size:18px;text-align:center;'>Question supprimée</p>");

		return Redirect::to("admQCM");
	}

	public function changeStatus($id)
	{
		$question = Question::find($id);

		if($question->status=="publish"){
			$question->status = 'unpublish';
		}else{
			$question->status = 'publish';

		}
		$question->save();


		return Redirect::to("admQCM");

	}

	public function action()
	{

		if(isset($_POST['check'])){
			if ($_POST['action'] == 'publish') {

				foreach($_POST['check'] as $id)
				{
					$question = Question::find($id);
					$question->status = 'publish';
					$question->save();

				}
				return Redirect::to("admQCM");

			}elseif($_POST['action'] == 'unpublish'){

				foreach($_POST['check'] as $id)
				{
					$question = Question::find($id);
					$question->status = 'unpublish';
					$question->save();

				}
				return Redirect::to("admQCM");		

			}elseif($_POST['action'] == 'delete'){

				foreach($_POST['check'] as $id)
				{

					Question::destroy($id);
					Session::flash('message', "<p style='color:#f00;font-size:18px;text-align:center;'>Question(s) supprimée(s)</p>");

				}
				return Redirect::to("admQCM");
			}
		}else{
			Session::flash('message', "<p style='color:#f00;font-size:18px;text-align:center;'>Veuillez sélectionner au moins une question</p>");
			
			return Redirect::to("admQCM");
		}

	}
}