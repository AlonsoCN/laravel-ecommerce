<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_attributes', function($table) {
			$table->increments('id');
			$table->integer('products_id')->unsigned();
			$table->foreign('products_id')->references('id')->on('products');
			$table->integer('attributes_id')->unsigned();
			$table->foreign('attributes_id')->references('id')->on('attributes');
			$table->integer('images_id')->unsigned()->nullable();
			$table->foreign('images_id')->references('id')->on('images');
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
		Schema::drop('products_attributes');
	}

}
