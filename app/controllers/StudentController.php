<?php

class StudentController extends BaseController {

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

					if ( Auth::user()->role == "teacher") {
						return Redirect::to("admPost");
					}else{
						return Redirect::to("student");

					}


				}else{
					
					Session::flash('message', "<p style='color:red;'>Mauvais identifiants.</p>");
					return Redirect::back()->withInput()->withErrors($validator);
				}	
			}
		}
	}


	public function index()
	{
		$questions=Score::CountQuestions();
		$nbQuestions = count($questions);

		$scores = Choice::TotalScore();
		$nbTotalScores = count($scores);

		return View::make('admin.eleveadmin', ['nbQuestions'=>$nbQuestions, "questions" => $questions, 'nbTotalScores' => $nbTotalScores ]); 
	}

	public function qcm()
	{

		$questions=Question::QcmPerLevel(Auth::user()->role)->paginate(5);

		return View::make('admin.eleveqcm', ['questions'=>$questions]); 
	}

	public function response($id)
	{

		$question=Question::find($id);

		$choices = DB::table('choices')->where('question_id', $id)->get();

		return View::make('admin.eleveqcmresponse', ['question'=>$question, 'choices' => $choices]); 
	}

	public function view($id)
	{

		$question=Question::find($id);

		$choices = DB::table('choices')->where('question_id', $id)->get();

		$nbChoices = count($choices);

		$nbBonnesReponses = 0; 
		$score = Score::where('user_id', '=', Auth::user()->id)->where('question_id', '=', $id)->first();
		$nbBonnesReponses = $score->note;
		
		$resultat = $nbBonnesReponses.'/'.$nbChoices;

		return View::make('admin.eleveqcmview', ['question'=>$question, 'choices' => $choices, "score" => $resultat ]); 
	}

}
