<?php

class Category extends Eloquent {

	protected $fillable = array('name');
	public static $rules = array('name'=>'min:3');

	public function products_categories() {
		return $this->hasMany('Product_Category');
	}

	public function users() {
        return $this->belongsTo('User');
    }
}