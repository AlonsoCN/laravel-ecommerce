<?php

class Category extends Eloquent {

	protected $fillable = array('name');
	public static $rules = array('name'=>'min:3');

	public function products() {
		return $this->hasMany('Product');
	}
}