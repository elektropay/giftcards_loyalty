<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\GiftCard;
use App\LoyaltyCard;
use App\Client;

use Carbon\Carbon;

class ClientController extends Controller
{

	public function __construct() {

		$this->middleware('auth');

	}

	public function requestClient () {

		$this->validate(request(), [

			'first_name' => 'required',

			'last_name' => 'required',

			'email' => 'required|email'

		]);

		 // check if the client exists 
		if (!Client::where('email', '=', request()->input('email'))->exists()) {
  			
	  		Client::create([

				'first_name' => request ('first_name'),

				'last_name' => request ('last_name'),
				
				'email' => request ('email')

				]);

		}

		return Client::where('email', '=', request()->input('email'))->first();

	}

	public function registerToGiftCard ($giftCardID) {

		$clientID = $this->requestClient ();
		GiftCard::find($giftCardID)->registerClient($clientID);

		return back();
		
	}

	public function registerToLoyaltyCard ($loyaltyCardID) {

		$clientID = $this->requestClient ()->id;
		LoyaltyCard::find($loyaltyCardID)->registerClient($clientID);

		return back();

	}

	public function destroy ($id) {

		return view('giftcards.index');

	}

}
