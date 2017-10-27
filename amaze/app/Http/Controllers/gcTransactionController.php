<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GiftCard;
use App\gcTransaction;

class gcTransactionController extends Controller
{
    
	public function store (GiftCard $giftCard) {

		$this->validate(request(), ['amount' => 'required|numeric|required|regex:/^\d*(\.\d{1,2})?$/']);

		$giftCard->addTransaction(request('amount'));
		return back();

	}

}
