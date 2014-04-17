<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function($table) {
			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('phone');
			$table->string('celphone');
			$table->string('dni');
			$table->string('address');
			$table->string('city');
			$table->string('country');
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
		Schema::drop('profiles');
	}

}
