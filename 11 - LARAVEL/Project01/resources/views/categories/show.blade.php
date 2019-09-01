@extends("layouts.frontend")

@section("title")
{{trans("web.details")}}
@endsection

@section("content")
<div class="container">
	<h1>{{$category->name}}</h1>
	<p>{{$category->logo}}</p>
</div>
@endsection