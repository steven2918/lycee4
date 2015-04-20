<?php

class Score extends Eloquent{

	public function scopeCountQuestions($query)
	{

		return $query->where('user_id', '=', '2')
		->where('status_question', '=', 'fait')
		->get();

	}


}
