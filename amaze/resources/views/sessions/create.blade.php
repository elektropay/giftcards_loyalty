@extends ('layouts.master')

@section('content')

	<div class = "window text-centered rounded">

		<h1 class = "title"> Log-in </h1>
		<div class = "big-space"></div>

		<form method="POST" action='/amaze/public/login'>

			{{ csrf_field() }}

	  		<div>

	  			<input class = "s-12 line rounded" type ="text" id = "email" name = "email" placeholder = "Email" required>
	  			<div class = "space"></div>

	  			<input class = "s-12 line rounded" type ="password" id = "password" name = "password" placeholder = "Password" required>
	  			<div class = "space"></div>

	  			<button class = "s-12 line rounded" type="submit">Login</button>

	  			@include ('layouts.errors')

	  		</div>

		</form>

		<div class = "space"></div>
		<a class = "form-under" href="/amaze/public/register">Create account<a/>

	</div>


@endsection