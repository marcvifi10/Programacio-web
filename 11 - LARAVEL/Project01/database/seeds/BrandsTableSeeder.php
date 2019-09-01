<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table("brands")->insert([
			"name" => "Brand 01",
			"logo" => "Logo 01",
			"country_id" => 1,
			"provider_id" => 1
		]);

		DB::table("brands")->insert([
			"name" => "Brand 02",
			"logo" => "Logo 02",
			"country_id" => 2,
			"provider_id" => 2
		]);

		DB::table("brands")->insert([
			"name" => "Brand 03",
			"logo" => "Logo 03",
			"country_id" => 3,
			"provider_id" => 3
		]);

		DB::table("brands")->insert([
			"name" => "Brand 04",
			"logo" => "Logo 04",
			"country_id" => 4,
			"provider_id" => 4
		]);
    }
}
