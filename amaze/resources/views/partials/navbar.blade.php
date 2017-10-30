<ul id = "navbar" class = "s-12">
	
	<li class = "navbar-element navbar-link" ><a href="/amaze/public/giftcards">Gift Cards</a></li>
	<li class = "navbar-element navbar-link" ><a href="/amaze/public/">Loyalty</a></li>

	@if(Auth::check())
		<li class = "navbar-element navbar-link right"><a href="/amaze/public/logout">Logout</a></li>
		<li class = "navbar-element navbar-text right">{{ Auth::user()->name }} </li>

	@endif

</ul>


