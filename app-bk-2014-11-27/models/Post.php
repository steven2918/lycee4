<?php

class Post extends Eloquent{

	public function user() {
		return $this->belongsTo('User');
	}


	// public function comments() {
	// 	return $this->hasMany('Comment');
	// }


	public function scopePublish($query) {
		return $query->where('status', '=', 'publish')->orderBy('created_at', 'desc');
	}



	public function scopeLastPosts($query)
	{

		$result['first']=$query->orderBy('created_at', 'desc')->take(1)->get();
		$result['two_other']=$query->orderBy('created_at', 'desc')->skip(1)->take(2)->get();

		return $result;

	}


	public function scopeSearch($query, $req)
	{

	return $query->where('status', '=', 'publish')->where('content', 'like', "%".$req."%")->orwhere('title', 'like', "%".$req."%")->orderBy('created_at', 'desc');

	}

	// public function categories() {
	// 	return $this->belongsToMany('Category');
	// }
}
