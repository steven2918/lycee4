<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');



	public function scopeStudents($query) {
		return $query->where('role', '!=', 'teacher')->orderBy('role', 'asc')->orderBy('username', 'asc');
	}


	public function scopeGetStudents($query, $nbStudents)
	{

		return $query->where('role', '!=', 'teacher')->orderBy('created_at', 'desc')->take($nbStudents)->get();;

	}

}
