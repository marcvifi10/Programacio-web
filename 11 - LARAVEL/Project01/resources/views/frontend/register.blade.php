@extends("layouts.frontend")

@section("title")
{{trans("web.register")}} {{trans("web.user")}}
@endsection

@section("script")
<meta name="passwords_not_match" content="{{trans('web.passwords_not_match')}}">
<script type="text/javascript" src="{{ URL::asset('js/validate_passwords.js') }}" defer></script>
@endsection

@section("content")
<div class="container">
	{{Form::open(["url" => route("storeUser"), "method" => "POST", "class" => "form-group"])}}
	<label for="name">{{trans("web.name")}}:</label>
	{{Form::text("name", "", ["class" => "form-control" , "id" => "name", "required" => "required"])}}

	<label for="email">{{trans("web.email")}}:</label>
	{{Form::email("email", "", ["class" => "form-control" , "id" => "email", "required" => "required"])}}

	<label for="password1">{{trans("web.password")}}:</label>
	{{Form::password("password", array("class" => "form-control" , "id" => "password1",
		"required" => "required"))}}

	<label for="password2">{{trans("web.repeat_password")}}:</label>
	{{Form::password("password2", array("class" => "form-control" , "id" => "password2",
		"required" => "required"))}}

	<label for="userType">{{trans("web.user_type")}}:</label>
	{{Form::select("user_type_id", $userTypes->pluck("name", "id"), null,
		array("placeholder" => "Please select a user type", "required" => "required",
		"class" => "form-control", "id" => "userType"))}}

	{{Form::submit(trans("web.submit"), ["id" => "submit", "class" => "btn btn-primary"])}}
	{{Form::close()}}
</div>
@endsection