@extends ('layouts.master')

@section('content')

	<div class = "window text-centered rounded">

		<h1 class = "title">Register</h1>
		<div class = "big-space"></div>

		<form method="POST" action='/register'>

			{{ csrf_field() }}

  			<input class = "s-12 line rounded" type ="text" id = "username" name = "username" placeholder = "Username" value = "{{ old('username') }}" required>
  			<div class = "space"></div>

  			<input class = "s-12 line rounded" type ="text" id = "email" name = "email" placeholder = "Email" value = "{{ old('email') }}" required>
  			<div class = "space"></div>

  			<input class = "s-12 line rounded" type ="password" id = "password" name = "password" placeholder = "Password" required>
  			<div class = "space"></div>

  			<input class = "s-12 line rounded" type ="password" id = "password_confirmation" name = "password_confirmation" placeholder = "Confirm Password" required>
  			<div class = "space"></div>

  			<button class = "s-12 line rounded blue" type="submit">Register</button>

  			@include ('layouts.errors')

		</form>

	</div>


@endsection

