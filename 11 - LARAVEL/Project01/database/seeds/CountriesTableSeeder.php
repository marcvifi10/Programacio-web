<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('countries')->insert([
			'name' => 'Country 01'
		]);

		DB::table('countries')->insert([
			'name' => 'Country 02'
		]);

		DB::table('countries')->insert([
			'name' => 'Country 03'
		]);

		DB::table('countries')->insert([
			'name' => 'Country 04'
		]);
    }
}
