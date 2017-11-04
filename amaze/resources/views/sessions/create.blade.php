@extends ('layouts.master')

@section('content')

	<div class = "window text-centered rounded">

		<h1 class = "title"> Log-in </h1>
		<div class = "big-space"></div>

		<form method="POST" action='/login'>

			{{ csrf_field() }}


	  		<input class = "s-12 line rounded" type ="text" id = "username" name = "username" placeholder = "Username or Email" value = "{{ old('username') }}" required>
	  		<div class = "space"></div>

	  		<input class = "s-12 line rounded" type ="password" id = "password" name = "password" placeholder = "Password" required>
	  		<div class = "space"></div>

	  		<button class = "s-12 line rounded blue" type="submit" value="Submit">Login</button>

	  		@include ('layouts.errors')


		</form>

		<div class = "space"></div>
		<a class = "form-under" href="/register">Create account<a/>

	</div>


@endsection