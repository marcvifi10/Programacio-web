@if (Route::has('login'))
<nav class="navbar navbar-expand bg-light">
	@auth
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="{{route('brands.index')}}">{{trans("web.brands")}}</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('categories.index')}}">{{trans("web.categories")}}</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('cataleg')}}">{{trans("web.catalog")}}</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<div class="nav-link">
					{{trans("web.hello")}} {{Auth::User()->name}}
					@if (Auth::user()->userType->id != 4)
					 ({{trans("web.go_to")}} <a href="{{route('dashboard')}}">{{trans("web.admin")}}</a>)
					@endif
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('logoutUser')}}">{{trans("web.logout")}}</a>
			</li>
		</ul>
	@else
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="{{route('login')}}">{{trans("web.login")}}</a>
			</li>
			@if (Route::has('register'))
			<li class="nav-item">
				<a class="nav-link" href="{{route('registerUser')}}">{{trans("web.register")}}</a>
			</li>
			@endif
		</ul>
	@endauth
</nav>
@endif