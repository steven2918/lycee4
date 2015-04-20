<?php

class ScoreController extends BaseController {

	public function index()
	{

		$choices = DB::table('choices')->where('question_id', $_POST['question_id'])->get();
		$nbChoices = count($choices);

		$nbBonnesReponses = 0; 

		foreach ($choices as $choice)
		{

			if ($choice->status == $_POST['valeur-'.$choice->id]) {
				++$nbBonnesReponses;
			}

		}

// update de la table score avec le user en question

		$resultat = $nbBonnesReponses.'/'.$nbChoices;

		$score = Score::where('user_id', '=', Auth::user()->id)->where('question_id', '=', $_POST['question_id'])->first();
		$score->note = $resultat;
		$score->status_question = 'fait';
		$score->save();

		return Redirect::to("student/qcm");
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

}
