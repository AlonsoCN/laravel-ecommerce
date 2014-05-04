<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ProfilesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('ImagesTableSeeder'); 
		$this->call('ProductsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('AttributesTableSeeder');
	}

}