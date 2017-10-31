@extends ('layouts.master')

@section ('content')

	<div class = "window text-centered rounded">

		<h1 class = "title">Loyalty Card Search</h1>
		<div class = "big-space"></div>
<!-- 
		<form method="GET" action='/amaze/public/loyaltycards/search'>

	  		<div>

	  			<input class = "s-12 line rounded" type ="text" id = "number" name = "card_number" placeholder = "Card Number" required>
	  			<div class = "space"></div>

		  		<a href = '/amaze/public/loyaltycards/create' class = "s-6 inline-block btn left rounded-left" >Create</a
		  		><button class = "s-6 inline-block btn rounded-right blue" type="submit">Find</button>

	  			@include ('layouts.errors')

	  		</div>

		</form> -->


		<form action = ""  method = "">

	  		<div>

	  			{{ csrf_field() }}

	  			<input class = "s-12 line rounded" type ="text" id = "number" name = "card_number" placeholder = "Card Number" required>
	  			<div class = "space"></div>

				<button class = "s-6 inline-block btn rounded-left" type="submit" formmethod="POST" formaction='/amaze/public/loyaltycards'>Create</button
		  		><button class = "s-6 inline-block btn rounded-right blue" type="submit" formmethod="get" formaction="/amaze/public/loyaltycards/search">Find</button>

	  			@include ('layouts.errors')

	  		</div>

		</form>

	</div>

@endsection