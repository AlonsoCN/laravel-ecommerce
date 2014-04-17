<?php

class CategoriesTableSeeder extends Seeder {

	public function run() {
		$category = new Category;
		$category->name = 'Carteras Pequeñas';
		$category->save();

		$category = new Category;
		$category->name = 'Carteras Medianas';
		$category->save();

		$category = new Category;
		$category->name = 'Carteras Grandes';
		$category->save();

		$category = new Category;
		$category->name = 'Bolsos';
		$category->save();

		$category = new Category;
		$category->name = 'Maletas';
		$category->save();
	}
}