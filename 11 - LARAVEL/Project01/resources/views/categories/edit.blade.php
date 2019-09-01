@extends("layouts.frontend")

@section("title")
{{trans("web.edit")}}
@endsection

@section("content")
<div class="container">
	{{Form::open(["url" => route("categories.update", $category->id), "method" => "PUT", "class" => "form-group"])}}
		<label for="name">{{trans("web.name")}}:</label>
		{{Form::text("name", $category->name, ["class" => "form-control" , "id" => "name"])}}
		<label for="name">{{trans("web.logo")}}:</label>
		{{Form::text("logo", $category->logo, ["class" => "form-control" , "id" => "logo"])}}
		{{Form::submit(trans("web.submit"), ["id" => "submit", "class" => "btn btn-primary"])}}
	{{Form::close()}}
</div>
@endsection