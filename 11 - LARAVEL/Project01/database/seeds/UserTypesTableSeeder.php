<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table("user_types")->insert([
			"name" => "Admin"
		]);

		DB::table("user_types")->insert([
			"name" => "Gestor"
		]);

		DB::table("user_types")->insert([
			"name" => "Becari"
		]);

		DB::table("user_types")->insert([
			"name" => "Client"
		]);
    }
}
