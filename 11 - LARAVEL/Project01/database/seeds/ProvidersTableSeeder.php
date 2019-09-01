<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('providers')->insert([
			'name' => 'Provider 01'
		]);

		DB::table('providers')->insert([
			'name' => 'Provider 02'
		]);

		DB::table('providers')->insert([
			'name' => 'Provider 03'
		]);

		DB::table('providers')->insert([
			'name' => 'Provider 04'
		]);
    }
}
