<?php

class CategoriesTableSeeder extends Seeder {

	public function run() {
		$category = new Category;
		$category->name = 'Pantalones';
		$category->save();

		$category = new Category;
		$category->name = 'Camisas';
		$category->save();

		$category = new Category;
		$category->name = 'Sombreros';
		$category->save();

		$category = new Category;
		$category->name = 'Zapatos';
		$category->save();

		$category = new Category;
		$category->name = 'Carteras';
		$category->save();
	}
}