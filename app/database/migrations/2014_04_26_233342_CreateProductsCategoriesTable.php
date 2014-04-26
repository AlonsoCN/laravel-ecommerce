<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_categories', function($table) {
			$table->increments('id');
			$table->integer('products_id')->unsigned();
			$table->foreign('products_id')->references('id')->on('products');
			$table->integer('categories_id')->unsigned();
			$table->foreign('categories_id')->references('id')->on('categories');
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
		Schema::drop('products_categories');
	}

}
