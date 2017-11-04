@extends ("layouts.master")

@section ('content')

  <div class = "window text-centered rounded">

    <h1 class = "title"> New Gift Card </h1>
    <div class = "big-space"></div>

  	<form method="POST" action='/loyaltycards'>

  		{{ csrf_field() }}

    		<input class = "s-12 line rounded" type="text" name="card_number" placeholder="Card Number" required>
        <div class = "space"></div>
    	
    		<input class = "s-12 line rounded" type="text" name="amount" placeholder="Amount" required>
        <div class = "space"></div>

    		<button class = "s-12 btn rounded blue" type="submit">Create</button>

  	</form>

  	@include ('layouts.errors')

  </div>

@endsection