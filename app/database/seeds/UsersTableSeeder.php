<?php

class UsersTableSeeder extends Seeder {

	public function run() {
		$user = new User;
		$user->profile_id = 1;
		$user->email = 'luis.alonso.cn@gmail.com';
		$user->password = Hash::make('123456');
		$user->admin = 1;
		$user->save();
	}
}