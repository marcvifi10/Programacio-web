@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-xs-12">
		<h1>{{$entrada->title}}</h1>
		<p>{{$entrada->body}}</p>
	</div>
</div>
@endsection