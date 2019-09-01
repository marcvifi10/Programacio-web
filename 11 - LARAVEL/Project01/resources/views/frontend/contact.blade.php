@extends("layouts.frontend")

@section("title")
{{trans("web.contact")}}
@endsection

@section("content")
<div class="container">
	<h1>{{trans("web.contact")}}</h1>
	<form class="form-group">
		<label for="name">{{trans("web.name")}}:</label>
		<input type="text" class="form-control" id="name" value="{{Auth::user()->name}}">
		<label for="email">{{trans("web.email")}}:</label>
		<input type="email" class="form-control" id="email" value="{{Auth::user()->email}}">
		<label for="comment">{{trans("web.comment")}}:</label>
  		<textarea class="form-control" rows="5" id="comment"></textarea>
	</form>
</div>
@endsection