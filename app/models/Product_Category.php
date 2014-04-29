<?php

class Product_Category extends Eloquent {

	protected $table = 'products_category';

	public static $rules = array(
		'product_id'	=> 'required|integer',
		'attribute_id'	=> 'required|integer',
		'images_id'	=> 'null|integer',
	)

	public function products()
    {
        return $this->belongsTo('Product');
    }

    public function categories()
    {
        return $this->belongsTo('Category');
    }
}