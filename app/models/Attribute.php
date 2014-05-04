<?php

class Attribute extends Eloquent {

	protected $table = 'attributes';

	public static $rules = array(
		'product_id'	=> 'required|integer',
		'name'			=> 'required|between: 5, 255|alpha_num',
		'price'			=> 'required|numeric',
		'description'	=> 'null|between: 5, 255|alpha_num'
	);

	public function product_attribute() {
		return $this->hasMany('Product_Attribute');
	}

	public function user() {
        return $this->belongsTo('User');
    }
}