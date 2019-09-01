@extends("layouts.frontend")

@section("title")
{{trans("web.create_brand")}}
@endsection

@section("content")
<div class="container">
	{{Form::open(["url" => route("brands.store"), "method" => "POST", "class" => "form-group"])}}
	<label for="name">{{trans("web.name")}}:</label>
	{{Form::text("name", "", ["class" => "form-control" , "id" => "name", "required" => "required"])}}
	<label for="name">{{trans("web.logo")}}:</label>
	{{Form::text("logo", "", ["class" => "form-control" , "id" => "logo", "required" => "required",])}}
	<label for="country">{{trans("web.country")}}:</label>
	{{Form::select("country_id", $countries->pluck("name", "id"), null,
			array("placeholder" => "Please select a country", "required" => "required",
			"class" => "form-control", "id" => "country"))}}
	<label for="provider">{{trans("web.country")}}:</label>
	{{Form::select("provider_id", $providers->pluck("name", "id"), null,
			array("placeholder" => "Please select a provider", "required" => "required",
			"class" => "form-control", "id" => "provider"))}}
	{{Form::submit(trans("web.submit"), ["id" => "submit", "class" => "btn btn-primary"])}}
	{{Form::close()}}
</div>
@endsection