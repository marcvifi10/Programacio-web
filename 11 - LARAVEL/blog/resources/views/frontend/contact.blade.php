@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Contact</h1>
		</div>
	</div>
	<div class="form-group">
		{{-- <form class="form-group" id="form1" action="contact/process" method="POST"> --}}
		{!! Form::open(["url" => "/contact/process"]) !!}
			<div class="row">
				<div class="col-xs-2">
					<label for="nom">Nom:</label>
				</div>
				<div class="col-xs-10">
					<input type="text" class="form-control" id="nom" name="nom">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-2">
					<label for="email">Email address:</label>
				</div>
				<div class="col-xs-10">
					<input type="email" class="form-control" id="email" name="correu">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-2">
					<label for="comentari">Comentari:</label>
				</div>
				<div class="col-xs-10">
					<textarea class="form-control" rows="5" id="comentari" name="comentari"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection