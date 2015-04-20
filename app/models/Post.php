<?php

class Post extends Eloquent{

	public function user() {
		return $this->belongsTo('User');
	}


	public function comments() {
		return $this->hasMany('Comment');
	}


	public function countComments() {
		return  $this->hasMany('Comment')->selectRaw('count(comments.id) as commentcount');
	}


	public function scopePublish($query) {
		return $query->where('status', '=', 'publish')->orderBy('created_at', 'desc');
	}



	public function scopeLastPosts($query)
	{

		$result['first']=$query->where('status', '=', 'publish')->orderBy('created_at', 'desc')->take(1)->get();
		$result['two_other']=$query->where('status', '=', 'publish')->orderBy('created_at', 'desc')->skip(1)->take(2)->get();

		return $result;

	}


	public function scopeSearch($query, $req)
	{

		return $query->where('status', '=', 'publish')->where('content', 'like', "%".$req."%")->orwhere('title', 'like', "%".$req."%")->orderBy('created_at', 'desc');

	}

	public function scopeGetPosts($query, $nbPosts)
	{

		return $query->orderBy('created_at', 'desc')->take($nbPosts)->get();;

	}

}
