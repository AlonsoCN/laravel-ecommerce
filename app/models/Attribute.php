<?php

class Attribute extends Eloquent {

	protected $table = 'attributes';

	public function products_attributes() {
		return $this->hasMany('Product_Attribute');
	}

	public function users() {
        return $this->belongsTo('User');
    }
}