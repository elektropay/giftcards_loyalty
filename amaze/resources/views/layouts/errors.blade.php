@if (count($errors))

	<div class = "space"></div>

	<ul class = "error-panel rounded">

		<div class = "small-space"></div>

		@foreach ($errors->all() as $error)

			<li class = "error"> {{ $error }}</li>	
			<div class = "small-space"></div>

		@endforeach

	</ul>

@endif