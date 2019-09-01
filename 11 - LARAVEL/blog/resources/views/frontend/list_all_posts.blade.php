@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous"></script>
<script>
	$(function () {
		var autor = -1;
		var categoria = -1;

		$("#selectAutor").change(function () {
			autor = $("#selectAutor").val();
			$.ajax({
				url: "./postsList/" + autor + "/" + categoria,
				method: "GET",
				dataType: "html",
				success: function(result, status){
					$("#postsDiv").html(result);
				}
			});
		});

		$("#selectCategoria").change(function () {
			categoria = $("#selectCategoria").val();
			$.ajax({
				url: "./postsList/" + autor + "/" + categoria,
				method: "GET",
				dataType: "html",
				success: function(result, status){
					$("#postsDiv").html(result);
				}
			});
		});
	});
</script>

<div class="container">
	<div class="row">
		<div class="col-xs-6">
			Autor
			<select class="form-control" id="selectAutor">
				<option value="-1">Selecciona un autor</option>
				@foreach($autors as $autor)
				<option value="{{$autor->id}}">{{$autor->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-xs-6">
			Caegoria
			<select class="form-control" id="selectCategoria">
				<option value="-1">Selecciona una categoria</option>
				@foreach($categories as $categoria)
				<option value="{{$categoria->id}}">{{$categoria->name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div id="postsDiv">
		@foreach($posts as $post)
		<div class="col-xs-4 panel panel-default">
			<h4>{{$post->title}}</h4>
			<p>{{$post->created_at}}</p>
		</div>
		@endforeach
	</div>
</div>
@endsection