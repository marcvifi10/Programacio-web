@extends("layouts.user")

@section("title")
{{trans("web.dashboard")}}
@endsection

@section("style")
<style>
	.card {
		height: 200px;
	}
</style>
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<div class="card text-center">
				{{$numProducts}} {{trans("web.products")}}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-center">
				{{$numCategories}} {{trans("web.categories")}}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-center">
				{{$numBrands}} {{trans("web.brands")}}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card text-center">
				{{$numUsers}} {{trans("web.users")}}
			</div>
		</div>
	</div>
</div>
@endsection