@extends ('layouts.master')

@section ('content')

	<div class = "window rounded">

		<div class = "">
			Card #: {{ $giftCard->card_number }}
		</div>

		<div class = "small-space"></div>

		<div class = "title line">
			Current Balance: <strong>{{ number_format($giftCard->transactions->sum('amount') + $giftCard->amount, 2) }} $</strong>
		</div>

		<div class = "small-space"></div>

		<div>
			<form method="POST" action='/amaze/public/giftcards/{{ $giftCard->id }}/transactions'>

				{{ csrf_field() }}
		  		
		  		<input class = "s-12 line rounded"type="text" name="amount" placeholder="New Transaction Amount" required>
		  		<div class = "space"></div>

		  		<button class = "s-12 line rounded" type="submit">Add Transaction</button>

			</form>
		</div>

		@include ('layouts.errors')

		<div class = "space"></div>

		<ul class = "transaction-window">

			<div class = "small-space"></div>

			<li class = "text-centered">
				<strong>Transaction History</strong>
			</li>


			<div class = "space"></div>

			<li>
				
				Created {{ $giftCard->created_at->diffForHumans() }} : &nbsp;
				
				<span class = "right">{{ number_format($giftCard->amount, 2) }} $</span>
				<div class = "small-space"></div>

			</li>

		@foreach ($giftCard->transactions as $transaction)

			<li>

			
				Modified {{ $transaction->created_at->diffForHumans() }} : &nbsp;

				<span class = "right">{{ number_format($transaction->amount, 2) }} $</span>

				<div class = "small-space"></div>

			</li>

		@endforeach

		</ul>

@endsection