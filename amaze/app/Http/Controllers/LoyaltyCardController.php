<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\LoyaltyCard;
use App\LoyaltyTransaction;

use Carbon\Carbon;

class LoyaltyCardController extends Controller
{

	public function __construct() {

		$this->middleware('auth');

	}
    
	public function index () {

		$loyaltyCards = LoyaltyCard::latest()

			->filter(request(['month', 'year']))

			->get();

    	return view('loyaltycards.index', compact('loyaltyCards'));

	}

	// public function show (LoyaltyCard $loyaltyCard) {

 //    	return view('loyaltycards.show', compact('loyaltyCard'));

	// }

	public function show (Request $request){

		$this->validate(request(), [

			'card_number' => 'required|digits:16',

		]);

	    $card_number = $request->input('card_number');

	    //now get all user and services in one go without looping using eager loading
	    //In your foreach() loop, if you have 1000 users you will make 1000 queries

	    $loyaltyCards = LoyaltyCard::where('card_number', $card_number)->get();
	    $loyaltyCard = $loyaltyCards->first();


		if($loyaltyCards->isEmpty()) {
			return view('loyaltycards.index', compact('loyaltyCard'));
		} else {
		    return view('loyaltycards.show', compact('loyaltyCard'));

		}

	}

	public function create () {
		
    	return view('loyaltycards.create');

	}

	public function store () {

		$this->validate(request(), [

			'card_number' => 'required|digits:16'
			//'amount' => 'required',

		]);

		$card_number = request()->input('card_number');

		 // check if the loyaltycard exists 
		if (!LoyaltyCard::where('card_number', '=', request()->input('card_number'))->exists()) {
  			
  			//create the loyalty card
  			LoyaltyCard::create([

				'card_number' => request ('card_number'),

				'amount' => 0,

				'user_id' => auth()->user()->id

				]);
		
		}

		return redirect('/loyaltycards/search?card_number='.$card_number);
		
	}

	public function destroy ($id) {

		LoyaltyCard::find($id)->transactions()->delete();
		LoyaltyCard::destroy($id);

		return view('loyaltycards.index');

	}

	public function findStats () {

		return view('loyaltycards.stats');

	}

}
