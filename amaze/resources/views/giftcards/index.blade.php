@extends ('layouts.master')

@section ('content')

	<div class = "window text-centered rounded">

		<h1 class = "title">Gift Cards</h1>
		<div class = "big-space"></div>
<!-- 
		<form method="GET" action='/amaze/public/giftcards/search'>

	  		<div>

	  			<input class = "s-12 line rounded" type ="text" id = "number" name = "card_number" placeholder = "Card Number" required>
	  			<div class = "space"></div>

		  		<a href = '/amaze/public/giftcards/create' class = "s-6 inline-block btn left rounded-left" >Create</a
		  		><button class = "s-6 inline-block btn rounded-right blue" type="submit">Find</button>

	  			@include ('layouts.errors')

	  		</div>

		</form> -->


		<form action = ""  method = "">

	  		<div>

	  			{{ csrf_field() }}

	  			<input class = "s-12 line rounded" type ="text" id = "number" name = "card_number" placeholder = "Card Number" value = "{{ old('card_number') }}" required>
	  			<div class = "space"></div>

				<button class = "s-6 inline-block btn rounded-left" type="submit" formmethod="POST" formaction='/giftcards'>Create Card</button
		  		><button class = "s-6 inline-block btn rounded-right blue" type="submit" formmethod="get" formaction="/giftcards/search">Find Card</button>

		  		<div class = "space"></div>

		  		@if(old('card_number') && !count($errors))
					<div class = "info rounded"> Card not found </div>
				@endif

	  			@include ('layouts.errors')

	  		</div>

		</form>

	</div>

@endsection