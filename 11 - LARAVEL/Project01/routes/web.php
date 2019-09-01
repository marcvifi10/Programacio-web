<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
// 	return view('welcome');
// });

Route::get('/', "UsersController@main");

Route::group(["middleware" => "auth"], function () {
	Route::get("/cataleg", array("uses" => "ProductsController@cataleg", "as" => "cataleg"));
	Route::get("/cataleg/detall/{id}", array("uses" => "ProductsController@detallCataleg", "as" => "producte"));

	Route::resource("/categories", "CategoriesController");
	Route::get("/categories/delete/{id}", array("uses" => "CategoriesController@destroy", "as" => "destroyCategory"));

	Route::resource("/brands", "BrandsController");

	Route::get("/dashboard", array("uses" => "UsersController@dashboard", "as" => "dashboard"))->middleware("adminPrivileges");

	Route::get("/logoutUser", array("uses" => "UsersController@logout", "as" => "logoutUser"));
});

Route::get("/contacte", array("uses" => "FrontendController@contact", "as" => "contact"))->middleware("auth");

Route::get("/privacitat", array("uses" => "FrontendController@privacy", "as" => "privacy"));

Route::get("/idioma/{locale}", array("uses" => "FrontendController@canviIdioma", "as" => "language"));

Auth::routes();

Route::get("/registerUser", array("uses" => "UsersController@register", "as" => "registerUser"));
Route::post("/storeUser", array("uses" => "UsersController@store", "as" => "storeUser"));

Route::get('/home', 'HomeController@index')->name('home');
