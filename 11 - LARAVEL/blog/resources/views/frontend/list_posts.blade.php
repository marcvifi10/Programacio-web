@foreach($posts as $post)
<div class="col-xs-4 panel panel-default">
	<h4>{{$post->title}}</h4>
	<p>{{$post->created_at}}</p>
</div>
@endforeach