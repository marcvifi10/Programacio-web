<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>@yield("title")</title>

		<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

		<script type="text/javascript" src="{{ URL::asset('js/app.js') }}" defer></script>
		@yield("script")
		@yield("style")
	</head>

	<body>
		@include("partials.frontendmenu")
		@yield("content")
	</body>
</html>