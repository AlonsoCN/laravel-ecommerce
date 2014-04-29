<?php

class Category extends Eloquent {

	protected $fillable = array('name', 'description');

	public static $rules = array(
		'name'			=> 'required|min:3',
		'description'	=> 'null|max:255',
		'images_id'		=> 'integer'
		'users_id'		=> 'required|integer'
	);

	public function products_categories() {
		return $this->hasMany('Product_Category');
	}

	public function users() {
        return $this->belongsTo('User');
    }
}