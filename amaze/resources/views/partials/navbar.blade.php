<ul id = "navbar" class = "s-12">
	
	<li class = "navbar-element navbar-link" ><a href="/giftcards">Gift Cards</a></li>
	<li class = "navbar-element navbar-link" ><a href="/loyaltycards/">Loyalty</a></li>

	@if(Auth::check())
		<li class = "navbar-element navbar-link right"><a href="/logout">Logout</a></li>
		<li class = "navbar-element navbar-text right">{{ Auth::user()->username }} </li>

	@endif

</ul>


