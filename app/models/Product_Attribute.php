<?php

class Product_Attribute extends Eloquent {

	protected $table = 'products_attributes';

	public function products()
    {
        return $this->belongsTo('Product');
    }

    public function attributes()
    {
        return $this->belongsTo('Attribute');
    }

}