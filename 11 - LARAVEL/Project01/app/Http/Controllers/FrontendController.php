<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function contact() {
		return view("frontend.contact");
	}

	public function privacy() {
		return view("frontend.privacy");
	}

	public function canviIdioma($locale) {
		App::setlocale($locale);
		return redirect(route('cataleg'));
	}
}
