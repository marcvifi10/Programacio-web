<nav class="navbar navbar-expand bg-dark">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a href="{{route('cataleg')}}" class="nav-link">{{trans("web.catalog")}}</a>
		</li>
		<li class="nav-item">
			<a href="{{route('categories.index')}}" class="nav-link">{{trans("web.categories")}}</a>
		</li>
		<li class="nav-item">
			<a href="{{route('brands.index')}}" class="nav-link">{{trans("web.brands")}}</a>
		</li>
		<li class="nav-item">
			<a href="{{route('contact')}}" class="nav-link">{{trans("web.contact")}}</a>
		</li>
		<li class="nav-item">
			<a href="{{route('privacy')}}" class="nav-link">{{trans("web.privacy")}}</a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a href="{{route('language', 'es')}}" class="nav-link">ES</a>
		</li>
		<li class="nav-item">
			<a href="{{route('language', 'en')}}" class="nav-link">EN</a>
		</li>
	</ul>
</nav>