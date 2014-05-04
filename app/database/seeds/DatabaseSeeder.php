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
		$this->command->info('Profiles table seeded!');

		$this->call('UsersTableSeeder');
		$this->command->info('Users table seeded!');

		$this->call('ImagesTableSeeder');
		$this->command->info('Images table seeded!');

		$this->call('ProductsTableSeeder');
		$this->command->info('Products table seeded!');

		$this->call('CategoriesTableSeeder');
		$this->command->info('Categories table seeded!');

		$this->call('AttributesTableSeeder');
		$this->command->info('Attributes table seeded!');

		$this->call('UsersTableSeeder');

	}

}