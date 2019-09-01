@extends("layouts.frontend")

@section("title")
{{$brand->name}}
@endsection

@section("style")
<style>
	#imgDiv {
		height: 300px;
		width: fit-content;
	}

	img {
		width: 100%;
		height: 100%;
		object-fit: contain;
    }
</style>
@endsection

@section("content")
<div class="container">
	<h1 class="col-xs-12">{{$brand->name}}</h1>
	<div class="col-xs-12">
		<div id="imgDiv">
			<img src="{{$brand->logo}}" alt="logo">
		</div>
	</div>
	<div class="col-xs-12">
		{{trans("web.country")}}: {{$brand->country->name}}
	</div>
	<div class="col-xs-12">
		{{trans("web.provider")}}: {{$brand->provider->name}}
	</div>
</div>
@endsection