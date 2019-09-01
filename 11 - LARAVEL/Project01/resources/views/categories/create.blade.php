@extends("layouts.frontend")

@section("title")
{{trans("web.create_category")}}
@endsection

@section("content")
<div class="container">
	{{Form::open(["url" => route("categories.store"), "class" => "form-group"])}}
		<label for="name">{{trans("web.name")}}:</label>
		{{Form::text("name", "", ["class" => "form-control" , "id" => "name"])}}
		<label for="name">{{trans("web.logo")}}:</label>
		{{Form::text("logo", "", ["class" => "form-control" , "id" => "logo"])}}
		{{Form::submit(trans("web.submit"), ["id" => "submit", "class" => "btn btn-primary"])}}
	{{Form::close()}}
</div>
@endsection