@extends("layouts.frontend")

@section("title")
{{trans("web.modify")}}
@endsection

@section("content")
<div class="container">
	{{Form::open(["url" => route("brands.update", $brand->id), "method" => "PUT",
			"class" => "form-group"])}}
	<label for="name">{{trans("web.name")}}:</label>
	{{Form::text("name", $brand->name, ["class" => "form-control" , "id" => "name", "required" => "required"])}}
	<label for="name">{{trans("web.logo")}}:</label>
	{{Form::text("logo", $brand->logo, ["class" => "form-control" , "id" => "logo", "required" => "required"])}}
	<label for="country">{{trans("web.country")}}:</label>
	{{Form::select("country_id", $countries->pluck("name", "id"), $brand->country->id,
			array("class" => "form-control", "id" => "country", "required" => "required",))}}
	<label for="provider">{{trans("web.country")}}:</label>
	{{Form::select("provider_id", $providers->pluck("name", "id"), $brand->provider->id,
			array("class" => "form-control", "id" => "provider", "required" => "required",))}}
	{{Form::submit(trans("web.submit"), ["id" => "submit", "class" => "btn btn-primary"])}}
	{{Form::close()}}
</div>
@endsection