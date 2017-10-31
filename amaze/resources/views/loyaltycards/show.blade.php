@extends ('layouts.master')

@section ('content')

	<div class = "window rounded">

		<form method="GET" action='/amaze/public/loyaltycards/{{$loyaltyCard->id}}/destroy'>
	  		<button class = "s-2 rounded red" type="submit" value="delete" 
	  			onclick="return confirm('Are you sure you want to delete card #{{$loyaltyCard->card_number}} and all associated transactions?')">Delete</button>
		</form>

		<div class = "space"></div>
		<div class = "left">
			# {{ $loyaltyCard->card_number }}
		</div>

		<div class = "right">
			Creator: {{$loyaltyCard->user->name}}
		</div>

		<div class = "line"></div>

		<div class = "title line">
			Current Balance: <strong>{{ $loyaltyCard->transactions->sum('amount') + $loyaltyCard->amount }} pts</strong>
		</div>

		<div class = "small-space"></div>

		<div>
			<form method="POST" action='/amaze/public/loyaltycards/{{ $loyaltyCard->id }}/transactions'>

				{{ csrf_field() }}
		  		
		  		<input class = "s-12 line rounded"type="text" name="amount" placeholder="New Transaction Amount" required>
		  		<div class = "space"></div>

		  		<button class = "s-12 line rounded blue" type="submit">Add Transaction</button>

			</form>
		</div>

		@include ('layouts.errors')

		<div class = "space"></div>

		<div class = "transaction-window rounded">

			<div class = "small-space"></div>

			<div class = "text-centered">
				<strong>Transaction History</strong>
			</div>

			<div class = "space"></div>

			<table class = "s-12">

<!-- 				<tr>

					<th class = "s-2">X</th>
					<th class = "s-6">Amount</th>
					<th class = "s-4">Creator</th>
					<th class = "s-4">Date</th>

				</tr>	 -->

				<tr>

					
					<th class = "s-3">Amount</th>
					<th class = "s-5">Location</th>
					<th class = "s-3">Date</th>
					<th class = "s-2"></th>

				</tr>	

				<tr>

					
					<!-- <td>{{ number_format($loyaltyCard->amount, 2) }} $</td> -->
					<td>Created</td>
					<td>{{ $loyaltyCard->user->name }}</td>
					<td>{{ $loyaltyCard->created_at->format('d/m/Y') }}</td>
					<td><button class = "s-10 rounded btn" type="submit" value="delete">-</button></td>

				</tr>	

				@foreach ($loyaltyCard->transactions as $transaction)

					<tr>
						<td>{{ $transaction->amount }} pts</td>
						<td>{{ $transaction->user->name }}</td>
						<td>{{ $transaction->created_at->format('d/m/Y') }}</td>
						<td>

							<form method="GET" action='/amaze/public/loyaltycards/{{$loyaltyCard->id}}/transactions/{{$transaction->id}}/destroy'>
						  		<button class = "s-10 rounded red btn" type="submit" value="delete"
						  		onclick="return confirm('Are you sure you want to delete this transaction?')">x</button>
							</form>

						</td>

					</tr>	

				@endforeach

			</table>

		</div>

		<div class = "space"></div>

@endsection