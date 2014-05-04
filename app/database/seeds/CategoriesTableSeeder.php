<?php

class CategoriesTableSeeder extends Seeder {

	public function run() {
		$category = new Category;
		$category->id = 1;
		$category->name = 'Carteras Pequeñas';
		$category->description = 'Carteras Pequeñas';
		$category->images_id = 1;
		$category->save();

		$category = new Category;
		$category->id = 2;
		$category->name = 'Carteras Mediana';
		$category->description = 'Carteras Mediana';
		$category->images_id = 2;
		$category->save();

		$category = new Category;
		$category->id = 3;
		$category->name = 'Carteras Grande';
		$category->description = 'Carteras Grande';
		$category->images_id = 3;
		$category->save();

		$category = new Category;
		$category->id = 4;
		$category->name = 'Bolso';
		$category->description = 'Bolso';
		//$category->images_id = 4;
		$category->save();
	}
}