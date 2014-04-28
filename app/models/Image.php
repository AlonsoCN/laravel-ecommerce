<?php

class Image extends Eloquent {

	protected $table = 'images';

	public function categories() {
        return $this->belongsTo('Categorie');
    }

    public function products_attributes() {
        return $this->belongsTo('Product_Attribute');
    }
}