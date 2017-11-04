<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Card extends Model
{
    
	protected $guarded = [];

	public function client () {

		return $this->belongsTo(Client::class, 'client_id');

	}

	public function user () {

		return $this->belongsTo(User::class, 'user_id');

	}

	public function addTransaction ($amount) {

		$this->transactions()->create([

			'amount' => $amount,

			'user_id' => auth()->user()->id

			]);

	}

	public function balance () {

		return $this->amount + $this->transactions()->selectRaw('SUM(amount) as total')->first()->total;

	}

	public function registerClient ($clientID) {

		$this->update(['client_id' => $clientID]);

	}

	public function scopeFilter($query, $filters)
	{
		
		if (isset($filters['month']) && $month = $filters['month']) {

			$query->whereMonth('created_at', Carbon::parse($month)->month);

		}

		if (isset($filters['year']) && $year = $filters['year']) {

			$query->whereYear('created_at', $year);

		}

	}

	public static function getTotalBought ($transactions_table) {

		//the total amount that was put on the gift cards when they were created
		$totalStartAmount = static::selectRaw('SUM(amount) as total');


		if (\Request::filled('startDate')) {
			$totalStartAmount->where('created_at', '>=', request('startDate'));
		}

		if (\Request::filled('endDate')) {
			$totalStartAmount->where('created_at', '<=', request('endDate'));
		}

		if (\Request::filled('location')) {
			$totalStartAmount->whereHas('user', function ($query) {
			    $query->where('username', '=', request('location'));
			});
		}

		$totalStartAmount =	$totalStartAmount ->first();



		//the total amount that was added to the gift cards
		$totalIncreaseAmount = \DB::table($transactions_table) -> selectRaw('SUM(amount) as total')

			->where('amount', '>', 0);

		if (\Request::filled('startDate')) {
			$totalIncreaseAmount->where('created_at', '>=', request('startDate'));
		}

		if (\Request::filled('endDate')) {
			$totalIncreaseAmount->where('created_at', '<=', request('endDate'));
		}

		if (\Request::filled('location')) {
			$totalIncreaseAmount->whereHas('user', function ($query) {
			    $query->where('username', '=', request('location'));
			});
		}

		$totalIncreaseAmount = $totalIncreaseAmount ->first();



		return number_format($totalStartAmount->total + $totalIncreaseAmount->total, 2);
			

	}

	public static function getTotalUsed ($transactions_table) {

		//the total amount that was added to the gift cards
		$totalDecreaseAmount = \DB::table($transactions_table) -> selectRaw('SUM(amount) as total')

			->where('amount', '<', 0);


		if (\Request::filled('startDate')) {
			$totalDecreaseAmount->where('created_at', '>=', request('startDate'));
		}

		if (\Request::filled('endDate')) {
			$totalDecreaseAmount->where('created_at', '<=', request('endDate'));
		}

		if (\Request::filled('location')) {
			$totalDecreaseAmount->whereHas('user', function ($query) {
			    $query->where('username', '=', request('location'));
			});
		}

		$totalDecreaseAmount = $totalDecreaseAmount->first();

		return number_format($totalDecreaseAmount->total, 2);	

	}

	public static function getNumberOfCards () {

		//the total amount that was added to the gift cards
		$numberOfCards = static::selectRaw('SUM(amount) as total');

		if (\Request::filled('startDate')) {
			$numberOfCards->where('created_at', '>=', request('startDate'));
		}

		if (\Request::filled('endDate')) {
			$numberOfCards->where('created_at', '<=', request('endDate'));
		}

		if (\Request::filled('location')) {
			$numberOfCards->whereHas('user', function ($query) {
			    $query->where('username', '=', request('location'));
			});
		}

		$numberOfCards = $numberOfCards->count();

		return $numberOfCards;	

	}

}
