@extends("layouts.frontend")

@section("title")
{{trans("web.categories")}}
@endsection

@section("content")
<div class="container">
	<a href="{{route('categories.create')}}" class="btn btn-primary" role="button">{{trans("web.add_category")}}</a>
	<table class="table table-striped table-bordered table-hover">
		@forelse($categories as $category)
		<tr>
			<td>{{$category->name}}</td>
			<td>{{$category->logo}}</td>
			<td>
				<a href="{{route('categories.show', $category->id)}}">{{trans("web.details")}}</a>
				<a href="{{route('categories.edit', $category->id)}}">{{trans("web.modify")}}</a>
				<a href="{{route('destroyCategory', $category->id)}}">{{trans("web.delete")}}</a>
				{{-- {{Form::open(["url" => route("categories.destroy", $category->id), "method" => "DELETE", "name" => "myForm"])}}
					{{Form::submit(trans("web.delete"))}}
				{{Form::close()}} --}}
			</td>
		</tr>
		@empty
		<tr>
			<td colspan=3>{{trans("web.categories_not_found")}}</td>
		</tr>
		@endforelse
	</table>
</div>
@endsection