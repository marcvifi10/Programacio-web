@extends('layouts.app');

@section('content')
<div class="container">
	<div class="col-xs-12">
		<h1>Borradors</h1>
	</div>
	@foreach ($borradors as $borrador)
	<div class="col-md-6 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>{{$borrador->title}}</h4></div>
			<div class="panel-body">{{$borrador->body}}</div>
		</div>
	</div>
	@endforeach
</div>
@endsection