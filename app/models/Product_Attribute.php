<?php

class Product_Attribute extends Eloquent {

	protected $table = 'products_attributes';

	public static $rules = array(
		'product_id'	=> 'required|integer',
		'attribute_id'	=> 'required|integer',
		'images_id'	=> 'null|integer'
	);

	public function product()
    {
        return $this->belongsTo('Product');
    }

    public function attribute()
    {
        return $this->belongsTo('Attribute');
    }

}