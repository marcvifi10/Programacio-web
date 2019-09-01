<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;

class Provider extends Model
{
	protected $fillable = ["name"];
	
	public function brands() {
		return $this->hasMany(Brand::class);
	}
}
