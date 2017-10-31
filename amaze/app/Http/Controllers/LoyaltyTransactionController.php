<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LoyaltyCard;
use App\LoyaltyTransaction;

class LoyaltyTransactionController extends Controller
{
    
	public function store (LoyaltyCard $loyaltyCard) {

		$this->validate(request(), ['amount' => 'required|numeric']);
		$loyaltyCard->addTransaction(request('amount'));

		return back();

	}

	public function destroy ($loyaltyCardId, $LoyaltyTransactionId) {

		LoyaltyTransaction::destroy($LoyaltyTransactionId);
		$loyaltyCard = LoyaltyCard::find($loyaltyCardId);

		return redirect('/loyaltycards/search?card_number='.$loyaltyCard->card_number);

	}

}
