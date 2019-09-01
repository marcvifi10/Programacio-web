<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;

class Country extends Model
{
	protected $fillable = ["name"];
	
	public function brands() {
		return $this->hasMany(Brand::class);
	}
}
