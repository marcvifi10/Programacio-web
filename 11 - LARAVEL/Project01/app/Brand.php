<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\Provider;

class Brand extends Model
{
	protected $fillable = ["name", "logo", "country_id", "provider_id"];
	
	public function products() {
		return $this->hasMany(Product::class);
	}

	public function country() {
		return $this->belongsTo(Country::class);
	}

	public function provider() {
		return $this->belongsTo(Provider::class);
	}
}
