<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\GiftCard;

use Carbon\Carbon;

class GiftCardController extends Controller
{

	public function __construct() {

		$this->middleware('auth');

	}
    
	public function index () {

		$giftCards = GiftCard::latest()

			->filter(request(['month', 'year']))

			->get();

    	return view('giftcards.index', compact('giftCards'));

	}

	// public function show (GiftCard $giftCard) {

 //    	return view('giftcards.show', compact('giftCard'));

	// }

	public function show (Request $request){

		$this->validate(request(), [

			'card_number' => 'required|digits:16',

		]);

	    $card_number = $request->input('card_number');

	    //now get all user and services in one go without looping using eager loading
	    //In your foreach() loop, if you have 1000 users you will make 1000 queries

	    $giftCards = GiftCard::where('card_number', $card_number)->get();
	    $giftCard = $giftCards->first();


		if($giftCards->isEmpty()) {
			return view('giftcards.index', compact('giftCard'));
		} else {
		    return view('giftcards.show', compact('giftCard'));

		}
	}

	public function create () {
		
    	return view('giftcards.create');

	}

	public function store () {

		$this->validate(request(), [

			'card_number' => 'required|digits:16',
			'amount' => 'required', 

		]);

		GiftCard::create(request(['card_number', 'amount']));
		$card_number = request()->input('card_number');

		return redirect('/giftcards/search?card_number='.$card_number);
		
	}

	public function findStats (Request $request) {

		// $giftCards = GiftCard::selectRaw('SUM(amount) as total');
		// $transactions = \DB::table('gc_transactions')->selectRaw('SUM(amount) as total');


		// if ($request->has('startDate')) {
		// 	$giftCards -> where('created_at', '>=', $request->startDate);
		// 	$transactions -> where('created_at', '>=', $request->startDate);
		// }
			

		// if ($request->has('endDate')) {
		// 	$giftCards -> where('created_at', '<=', $request->endDate);
		// 	$transactions -> where('created_at', '<=', $request->endDate);
		// }

			
		// $giftCards = $giftCards->first();


		// $positiveTransactions = $transactions->where ('amount', '>', 0)->first();
		//$negativeTransactions = $transactions->where ('amount', '<', 0)->first();

    	return view('giftcards.stats');

	}

	// public function exportStats (Request $request) {

	// 	if ($request->ajax()) {

	// 		$giftCards = GiftCard::selectRaw('SUM(amount) as total')

	// 		->where('created_at', '>=', $request->startDate)

	// 		//->where('created_at', '<=', 'end')

	// 		->first();

	// 	}

	// 	return view('giftcards.stats', compact('giftCards'));

	// }
}