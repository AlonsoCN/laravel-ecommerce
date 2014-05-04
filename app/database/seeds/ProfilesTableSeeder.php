<?php

class ProfilesTableSeeder extends Seeder {

	public function run() {
		DB::table('profiles')->delete();

		$profile = new Profile;
		$profile->id = 1;
		$profile->firstname = 'Adminis';
		$profile->lastname = 'Trador';
		$profile->phone = '(052)121212';
		$profile->celphone = '952111111';
		$profile->dni = '11223344';
		$profile->address = 'Metropolis #333';
		$profile->city = 'Lima';
		$profile->country = 'Perú';
		$profile->save();
	}
}