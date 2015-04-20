<?php

class Choice extends Eloquent{

	public function scopeGetChoices($query, $idquestion) {
		
		return $query->where('question_id', '=', $idquestion)->get();

	}



	public function scopeTotalScore($query)
	{

		return $query->join('questions', 'questions.id', '=', 'choices.question_id')
		->join('scores', 'questions.id', '=', 'scores.question_id')
		->where('scores.status_question', '=', 'fait')
		->where('scores.user_id', '=', Auth::user()->id)
		->get();

	}

}
