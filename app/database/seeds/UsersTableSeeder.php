<?php

class UsersTableSeeder extends Seeder {

	public function run() {
      DB::table('users')->delete();

		$user = new User;
		$user->profile_id = 1;
		$user->email = 'admin@admin.com';
		$user->password = Hash::make('123456');
		$user->role = 1;
		$user->save();
	}
}