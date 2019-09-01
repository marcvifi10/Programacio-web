<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('categories')->insert([
			'name' => 'Category 01',
			'logo' => 'logo01.png'
		]);

		DB::table('categories')->insert([
			'name' => 'Category 02',
			'logo' => 'logo02.png'
		]);
    }
}
