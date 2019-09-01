@extends("layouts.frontend")

@section("title")
{{trans("web.brands")}}
@endsection

@section("content")
<div class="container">
	<div class="col-xs-12">
		<a href="{{route('brands.create')}}" class="btn btn-primary" role="button">{{trans("web.add_brand")}}</a>
	</div>
	<div class="col-xs-12">
		<table class="table table-striped table-bordered table-hover">
			@forelse($brands as $brand)
			<tr>
				<td><a href="{{route('brands.show', $brand->id)}}">{{$brand->name}}</a></td>
				<td><a href="{{$brand->logo}}">{{trans("web.logo")}}</a></td>
				<td>{{$brand->country->name}}</td>
				<td>{{$brand->provider->name}}</td>
				<td>
					<a href="{{route('brands.edit', $brand->id)}}" class="btn btn-primary"
						role="button">{{trans("web.modify")}}</a>
				</td>
				<td>
					{{Form::open(["url" => route("brands.destroy", $brand->id), "method" => "DELETE"])}}
					{{Form::submit(trans("web.delete"), ["class" => "btn btn-primary"])}}
					{{Form::close()}}
				</td>
			</tr>
			@empty
			<tr>
				<td>{{trans("web.brands_not_found")}}</td>
			</tr>
			@endforelse
		</table>
	</div>
</div>
@endsection