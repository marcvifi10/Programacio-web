@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Entrades</h1>
	<div class="col-xs-12">
		@foreach($entrades as $entrada)
		<h3><a href="entrades/{{$entrada->id}}">{{$entrada->title}}</a></h3>
		<p>{{$entrada->body}}</p>
		@endforeach
	</div>
</div>
@endsection