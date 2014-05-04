<?php

class Category extends Eloquent {

	protected $fillable = array('name', 'description');

	public static $rules = array(
		'name'			=> 'required|min:3',
		'description'	=> 'null|max:255',
		'images_id'		=> 'integer',
		'users_id'		=> 'required|integer'
	);

	public function product_category() {
		return $this->hasMany('Product_Category');
	}

	public function user() {
        return $this->belongsTo('User');
    }
}