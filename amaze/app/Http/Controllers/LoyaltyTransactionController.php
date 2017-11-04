<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LoyaltyCard;
use App\LoyaltyTransaction;

class LoyaltyTransactionController extends Controller
{
    
	public function store (LoyaltyCard $loyaltyCard) {

		$this->validate(request(), ['amount' => 'required|numeric|integer|min:-1000|max:1000']);


		$sign = 1;
		if (request('sign') == "-") $sign = -1;
		$amount = request('amount') * $sign;


		$balance =  $loyaltyCard->balance();
		$amount = -$amount > $balance ? -$balance : $amount;


		$loyaltyCard->addTransaction($amount);
		return back();

	}

	public function destroy ($loyaltyCardId, $LoyaltyTransactionId) {

		LoyaltyTransaction::destroy($LoyaltyTransactionId);
		$loyaltyCard = LoyaltyCard::find($loyaltyCardId);

		return redirect('/loyaltycards/search?card_number='.$loyaltyCard->card_number);

	}

}
