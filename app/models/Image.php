<?php

class Image extends Eloquent {

	protected $table = 'images';

	public static $rules = array(
		'file_name'		=> 'required|between: 5, 255|alpha_num',
		'description'	=> 'required|between: 5, 255|alpha_num'
	)

	public function categories() {
        return $this->belongsTo('Categorie');
    }

    public function products_attributes() {
        return $this->belongsTo('Product_Attribute');
    }
}