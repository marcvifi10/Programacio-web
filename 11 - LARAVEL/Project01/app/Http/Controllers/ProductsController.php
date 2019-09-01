<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function cataleg() {
		$products = Product::get();
		return view('cataleg.index', compact("products"));
	}

	public function detallCataleg($id) {
		$product = Product::find($id);
		return view("cataleg.detalls", compact("product"));
	}
}
