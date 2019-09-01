@extends("layouts.frontend")

@section("title")
{{trans("web.privacy")}}
@endsection

@section("content")
<div class="container">
	<h1>{{trans("web.privacy")}}</h1>
	<p>{{trans("web.privacy_text")}}</p>
</div>
@endsection