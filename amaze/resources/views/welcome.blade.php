@extends ('layouts.master')

@section ('content')

	<div class = "window s-6 rounded">

		<h1 class = "title line text-centered">
			Logged in as {{ Auth::user()->name }}.
		</h1>

		<div class = "small-space"></div>

	    <a class = "btn s-6 inline-block text-centered blue rounded-left" href="/amaze/public/giftcards">Gift Cards</a
	   	><a class = "btn s-6 inline-block text-centered blue rounded-right" href="/amaze/public/loyalty">Loyalty</a>
	
	</div>

@endsection