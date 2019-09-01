@extends("layouts.frontend")

@section("title")
{{trans("web.details")}}
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
	<div class="card">
		<div class="card-header">
			{{$product->name}}
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
</div>
@endsection