<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GiftCard;
use App\gcTransaction;

class gcTransactionController extends Controller
{
    
	public function store (GiftCard $giftCard) {

		$this->validate(request(), ['amount' => 'required|numeric|min:-200|max:200']);


		$sign = 1;
		if (request('sign') == "-") $sign = -1;
		$amount = request('amount') * $sign;


		$balance =  $giftCard->balance();
		$amount = -$amount > $balance ? $balance : $amount;


		$giftCard->addTransaction($amount);
		return back();

	}

	public function destroy ($giftCardId, $gcTransactionId) {

		gcTransaction::destroy($gcTransactionId);
		$giftCard = GiftCard::find($giftCardId);

		return redirect('/giftcards/search?card_number='.$giftCard->card_number);

	}

}
