@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p>Dades rebudes correctament</p>
			<p>{{ $nom }}</p>
			<p>{{ $correu }}</p>
			<p>{{ $comentari }}</p>
		</div>
	</div>
</div>
@endsection