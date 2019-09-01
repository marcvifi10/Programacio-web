@extends("layouts.user")

@section("title")
{{trans("web.index")}}
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="row">
				@forelse($products as $product)
					<div class="col-sm-4">
						<div class="card">
							<div class="card-header">
								{{$product->name}}
							</div>
							<div class="card-body">
								<div class="row">
									{{-- <div class="col-sm-12">
										{{$product->description}}
									</div> --}}
									<div class="col-sm-12">
										{{trans("web.price")}}: {{$product->price}} &euro;
									</div>
									<div class="col-sm-12">
										{{trans("web.stock")}}: {{$product->price}}
									</div>
									<div class="col-sm-12">
										{{trans("web.brand")}}: {{$product->brand->name}}
									</div>
									<div class="col-sm-12">
										{{trans("web.category")}}: {{$product->category->name}}
									</div>
								</div>
							</div>
						</div>
					</div>
				@empty
					<p>{{trans("web.products_not_found")}}</p>
				@endforelse
			</div>
		</div>
		<div class="col-sm-4">
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-12 text-center">
						<h3>{{trans("web.brands")}}</h3>
					</div>
					<div class="col-sm-12  text-center">
						<ul class="list-group">
						@forelse($brands as $brand)
							<li class="list-group-item">
								<a href="">{{$brand->name}}</a>
							</li>
						@empty
							{{trans("web.brands_not_found")}}
						@endforelse
						</ul>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="col-sm-12 text-center">
						<h3>{{trans("web.categories")}}</h3>
					</div>
					<div class="col-sm-12  text-center">
						<ul class="list-group">
						@forelse($categories as $category)
							<li class="list-group-item">
								<a href="">{{$category->name}}</a>
							</li>
						@empty
							{{trans("web.categories_not_found")}}
						@endforelse
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection