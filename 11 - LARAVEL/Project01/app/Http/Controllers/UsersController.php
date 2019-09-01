<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserType;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Brand;
use App\Category;

class UsersController extends Controller
{
	public function main() {
		$products = Product::get();
		$brands = Brand::get();
		$categories = Category::get();
		return view("main", compact("products", "brands", "categories"));
	}

	public function register() {
		$userTypes = UserType::get();
		return view("frontend.register", compact("userTypes"));
	}

	public function store(Request $request) {
		$data = [
			"name" => $request->name,
			"email" => $request->email,
			"password" => bcrypt($request->password),
			"user_type_id" => $request->user_type_id
		];

		$user = User::create($data);
		$credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended("/");
		}
	}

	public function dashboard() {
		$numProducts = Product::count();
		$numBrands = Brand::count();
		$numCategories = Category::count();
		$numUsers = User::count();
		return view("frontend.dashboard",
			compact("numProducts", "numBrands", "numCategories", "numUsers"));
	}

	public function logout() {
		Auth::logout();
		return redirect("/");
	}
}
