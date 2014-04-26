<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('phone')->nullable();
			$table->string('celphone');
			$table->string('dni')->unique();
			$table->string('address');
			$table->string('city');
			$table->string('country');
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('role')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}