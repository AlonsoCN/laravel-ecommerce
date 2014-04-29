<?php

class Product_Attribute extends Eloquent {

	protected $table = 'products_attributes';

	public static $rules = array(
		'product_id'	=> 'required|integer',
		'attribute_id'	=> 'required|integer',
		'images_id'	=> 'null|integer',
	)

	public function products()
    {
        return $this->belongsTo('Product');
    }

    public function attributes()
    {
        return $this->belongsTo('Attribute');
    }

}