<?php

class AttributesTableSeeder extends Seeder {

	public function run() {
		$attribute = new Attribute;
		$attribute->name = 'Verde';
		$attribute->price = 0.99;
		$attribute->description = 'Color Verde.';
		$attribute->save();

		$attribute = new Attribute;
		$attribute->name = 'Rojo';
		$attribute->price = 0.99;
		$attribute->description = 'Color Rojo.';
		$attribute->save();

		$attribute = new Attribute;
		$attribute->name = 'Azul';
		$attribute->price = 0.99;
		$attribute->description = 'Color Azul.';
		$attribute->save();

		$attribute = new Attribute;
		$attribute->name = 'Turquesa';
		$attribute->price = 1.99;
		$attribute->description = 'Color Turquesa.';
		$attribute->save();
	}
}