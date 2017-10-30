<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GiftCard;
use App\gcTransaction;

class gcTransactionController extends Controller
{
    
	public function store (GiftCard $giftCard) {

		$this->validate(request(), ['amount' => 'required|numeric']);

		$giftCard->addTransaction(request('amount'));

		return back();

	}

	public function destroy ($giftCardId, $gcTransactionId) {

		gcTransaction::destroy($gcTransactionId);
		$giftCard = GiftCard::find($giftCardId);

		return redirect('/giftcards/search?card_number='.$giftCard->card_number);

	}

}
