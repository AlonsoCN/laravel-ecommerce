<?php

class ProductsTableSeeder extends Seeder {

	public function run() {
		DB::table('products')->delete();

		$product = new Product;
		$product->id = 1;
		$product->title = 'Cartera';
		$product->stock = 50;
		$product->price = 29.99;
		$product->description = 'Cartera simple';
		$product->availability = '1';
		$product->users_id = 1;
		$product->save();

		$product = new Product;
		$product->id = 2;
		$product->title = 'Bolso';
		$product->stock = 20;
		$product->price = 49.99;
		$product->description = 'Bolso simple';
		$product->availability = '1';
		$product->users_id = 1;
		$product->save();
	}
}