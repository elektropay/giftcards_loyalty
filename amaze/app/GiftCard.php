<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class GiftCard extends Model
{
    
	protected $guarded = [];

	public function transactions () {

		return $this->hasMany(gcTransaction::class);

	}

	public function addTransaction ($amount) {

		$this->transactions()->create(compact('amount'));

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

	public static function archives () {

		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')

			->groupBy('year', 'month')

			->orderByRaw('min(created_at) desc')

			->get()

			->toArray();

	}

	public static function getTotalBought () {

		//the total amount that was put on the gift cards when they were created
		$totalStartAmount = static::selectRaw('SUM(amount) as total');



		if (\Request::filled('startDate')) {
			$totalStartAmount->where('created_at', '>=', request('startDate'));
		}

		if (\Request::filled('endDate')) {
			$totalStartAmount->where('created_at', '<=', request('endDate'));
		}

		$totalStartAmount =	$totalStartAmount ->first();


		//the total amount that was added to the gift cards
		$totalIncreaseAmount = \DB::table('gc_transactions')

			->selectRaw('SUM(amount) as total')

			->where('amount', '>', 0);

		if (\Request::filled('startDate')) {
			$totalIncreaseAmount->where('created_at', '>=', request('startDate'));
		}

		if (\Request::filled('endDate')) {
			$totalIncreaseAmount->where('created_at', '<=', request('endDate'));
		}

		$totalIncreaseAmount = $totalIncreaseAmount ->first();

		return number_format($totalStartAmount->total + $totalIncreaseAmount->total, 2);
			

	}

	public static function getTotalUsed () {

		//the total amount that was added to the gift cards
		$totalDecreaseAmount = \DB::table('gc_transactions')

			->selectRaw('SUM(amount) as total')

			->where('amount', '<', 0);

			// ->where('created_at', '>=', request('startDate'))

			// ->where('created_at', '<=', request('endDate'))

			//->first();

		if (\Request::filled('startDate')) {
			$totalDecreaseAmount->where('created_at', '>=', request('startDate'));
		}

		if (\Request::filled('endDate')) {
			$totalDecreaseAmount->where('created_at', '<=', request('endDate'));
		}

		$totalDecreaseAmount = $totalDecreaseAmount->first();

		return number_format($totalDecreaseAmount->total, 2);	

	}

}
