<?php

class ImagesTableSeeder extends Seeder {

	public function run() {
		DB::table('images')->delete();

		$image = new Image;
		$image->id = 1;
		$image->file_name = 'a0l1f203_23ase23_123a.jpg';
		$image->description = 'Cartera pequeña';
		$image->save();

		$image = new Image;
		$image->id = 2;
		$image->file_name = 'b0l1f203_23ase23_321a.jpg';
		$image->description = 'Cartera normal';
		$image->save();

		$image = new Image;
		$image->id = 3;
		$image->file_name = 'c0l1f203_23ase23_153a.jpg';
		$image->description = 'Cartera grande';
		$image->save();
	}
}