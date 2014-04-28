<?php

class Product_Category extends Eloquent {

	protected $table = 'products_category';

	public function products()
    {
        return $this->belongsTo('Product');
    }

    public function categories()
    {
        return $this->belongsTo('Category');
    }
}