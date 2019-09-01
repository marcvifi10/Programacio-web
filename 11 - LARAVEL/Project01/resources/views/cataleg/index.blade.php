@extends("layouts.frontend")

@section("title")
{{trans("web.catalog")}}
@endsection

@section("style")
<style>
	.card {
		margin-top: 10px;
	}
</style>
@endsection

@section("content")
<div class="container">
	<h1>{{trans("web.products")}}</h1>
	@forelse ($products as $product)
	<div class="card">
		<div class="card-header">
			<a href="{{route('producte', $product->id)}}">{{$product->name}}</a>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-12">
					{{$product->description}}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-1">
					{{trans("web.price")}}:
				</div>
				<div class="col-sm-2">
					{{$product->price}} &euro;
				</div>
			</div>
			<div class="row">
				<div class="col-sm-1">
					{{trans("web.stock")}}:
				</div>
				<div class="col-sm-2">
					{{$product->stock}} {{trans("web.units")}}
				</div>
			</div>
		</div>
	</div>
	@empty
	<p>{{trans("web.products_not_found")}}</p>
	@endforelse
</div>
@endsection