<?php

class Product extends Eloquent {

	protected $fillable = array('title', 'description', 'price', 'availability');

	public static $rules = array(
		'title'			=> 'required|min:2',
		'stock'			=> 'required|min:1|integer'
		'price'			=> 'required|numeric',
		'description'	=> 'required|min:10',
		'availability'	=> 'integer',
		'users_id'		=> 'integer|null',
	);

	public function users() {
        return $this->belongsTo('User');
    }
}