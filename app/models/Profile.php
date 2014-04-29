<?php

class Profile extends Eloquent {

	protected $table = 'profiles';

	protected $fillable = array('firstname','lastname', 'phone', 'celphone', 'dni', 
								'address', 'city', 'country');

	public static $rules = array(
		'firstname'	=> 'required|min:2|alpha',
		'lastname'	=> 'required|min:2|alpha',
		'phone'		=> 'null|between:6, 9|alpha_num',
		'celphone'	=> 'required|between:9, 11|alpha_num',
		'dni'		=> 'required|digits:8|alpha-num|unique:profiles',
		'address'	=> 'required|between:5, 255|alpha_num',
		'city'		=> 'required|between:2, 120|alpha',
		'country'	=> 'required|between:2, 120|alpha'		
	);

    public function users()
    {
        return $this->hasOne('User');
    }
}