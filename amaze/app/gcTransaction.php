<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Transaction;

class gcTransaction extends Transaction
{

	public function giftCard () {

		return $this->belongsTo(GiftCard::class);

	}

}
