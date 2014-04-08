<?php

class UsersTableSeeder extends Seeder {

	public function run() {
		$user = new User;
		$user->firstname = 'Alonso';
		$user->lastname = 'Calle';
		$user->email = 'luis.alonso.cn@gmail.com';
		$user->password = Hash::make('123456');
		$user->telephone = '952521226';
		$user->admin = 1;
		$user->save();
	}
}