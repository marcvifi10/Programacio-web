<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('products')->insert([
			'name' => 'Product 01',
			'description' => 'Non Lorem sint id in nisi proident consectetur. Aliqua culpa fugiat excepteur Lorem. Dolore fugiat labore culpa id.',
			'image' => '',
			'price' => 1.5,
			'stock' => 10,
			'category_id' => 1,
			'brand_id' => 1
		]);

		DB::table('products')->insert([
			'name' => 'Product 02',
			'description' => 'Aliquip exercitation dolor sint adipisicing Lorem magna laborum. Reprehenderit proident commodo sit id pariatur tempor ad qui ex fugiat deserunt culpa officia. Dolore excepteur ullamco excepteur qui exercitation est. Aliqua Lorem elit mollit pariatur labore consectetur est occaecat laboris est ipsum nisi et nulla. Mollit ut reprehenderit cupidatat ea. Dolor duis culpa laboris consectetur proident et velit est et aliqua officia quis consequat ut.',
			'image' => '',
			'price' => 4.99,
			'stock' => 42,
			'category_id' => 2,
			'brand_id' => 2
		]);

		DB::table('products')->insert([
			'name' => 'Product 03',
			'description' => 'Consectetur sit sunt tempor amet dolor non ipsum. Aliquip reprehenderit sunt mollit consequat. Ullamco officia laborum elit magna. Ipsum ad aliquip minim amet. Esse veniam ad ullamco nulla non esse do excepteur consequat ullamco amet aliquip labore dolor.',
			'image' => '',
			'price' => 9.99,
			'stock' => 21,
			'category_id' => 1,
			'brand_id' => 3
		]);

		DB::table('products')->insert([
			'name' => 'Product 04',
			'description' => 'Mollit culpa non duis eu velit sint. Lorem quis aute qui do proident sint et mollit incididunt elit non. Pariatur nostrud eiusmod velit ea exercitation reprehenderit ad Lorem nostrud cillum. Ad tempor in commodo enim adipisicing cillum consequat voluptate aliquip qui. Nostrud consequat labore ullamco laboris sit minim culpa fugiat non velit laborum proident eiusmod. Laboris commodo est reprehenderit sunt eu ipsum consequat dolor nostrud pariatur adipisicing cillum magna.',
			'image' => '',
			'price' => 6.95,
			'stock' => 3,
			'category_id' => 2,
			'brand_id' => 4
		]);
	}
}
