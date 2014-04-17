<?php

class ProfileTableSeeder extends Seeder {

	public function run() {
		$category = new Profile;
		$category->id = 1;
		$category->first_name = 'Adminis';
		$category->last_name = 'Trador';
		$category->phone = '(052)121212';
		$category->celphone = '952111111';
		$category->dni = '11223344';
		$category->address = 'Metropolis #333';
		$category->city = 'Lima';
		$category->country = 'Perú'
		$category->save();
	}
}