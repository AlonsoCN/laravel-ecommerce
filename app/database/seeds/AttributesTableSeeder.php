<?php

class AttributesTableSeeder extends Seeder {

	public function run() {
		$attribute = new Attribute;
		$attribute->name = 'Verde';
		$attribute->price = 0.99;
		$attribute->description = 'Color Verde.';
		$attribute->images_id = 1;
		$attribute->save();

		$attribute = new Attribute;
		$attribute->name = 'Rojo';
		$attribute->price = 0.99;
		$attribute->description = 'Color Rojo.';
		$attribute->images_id = 1;
		$attribute->save();

		$attribute = new Attribute;
		$attribute->name = 'Azul';
		$attribute->price = 0.99;
		$attribute->description = 'Color Azul.';
		$attribute->images_id = 1;
		$attribute->save();

		$attribute = new Attribute;
		$attribute->name = 'Turquesa';
		$attribute->price = 1.99;
		$attribute->description = 'Color Turquesa.';
		$attribute->images_id = 1;
		$attribute->save();
	}
}