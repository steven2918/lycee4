<?php

class Question extends Eloquent{

	public function scopeQcmPerLevel($query, $role) {
		
		return $query->join('scores', 'questions.id', '=', 'scores.question_id')
		// ->where('scores.status_question', '=', 'pas fait')
		->where('scores.user_id', '=', Auth::user()->id)
		->where('questions.status', '=', "publish")
		->orderBy('questions.created_at', 'desc')
		->select('questions.id', 'questions.title', 'questions.class_level', 'questions.content', 'questions.created_at', 'scores.status_question' )
		->distinct('questions.id');

	}

	public function scopeGetQuestions($query, $nbQcms)
	{

		return $query->orderBy('created_at', 'desc')->take($nbQcms)->get();;

	}


	public function scopeCountQuestions($query)
	{

		return $query->join('scores', 'questions.id', '=', 'scores.question_id')
		->where('scores.user_id', '=', Auth::user()->id)
		->orderBy('questions.created_at', 'desc')
		->select("questions.id")
		->lists('questions.id');

	}

}
