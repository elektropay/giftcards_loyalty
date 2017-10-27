@extends ('layouts.master')

@section('content')

	<div class = "window text-centered rounded">

		<h1 class = "title">Register</h1>
		<div class = "big-space"></div>

		<form method="POST" action='/amaze/public/register'>

			{{ csrf_field() }}

	  		<div>

	  			<input class = "s-12 line rounded" type ="text" id = "name" name = "name" placeholder = "Name" required>
	  			<div class = "space"></div>

	  			<input class = "s-12 line rounded" type ="text" id = "email" name = "email" placeholder = "Email" required>
	  			<div class = "space"></div>

	  			<input class = "s-12 line rounded" type ="password" id = "password" name = "password" placeholder = "Password" required>
	  			<div class = "space"></div>

	  			<input class = "s-12 line rounded" type ="password" id = "password_confirmation" name = "password_confirmation" placeholder = "Confirm Password" required>
	  			<div class = "space"></div>

	  			<button class = "s-12 line rounded" type="submit">Register</button>

	  			@include ('layouts.errors')


	  		</div>

		</form>

	</div>


@endsection

