<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Transaction;
use App\LoyaltyCard;

class LoyaltyTransaction extends Transaction
{

	public function loyaltyCard () {

		return $this->belongsTo(LoyaltyCard::class);

	}

}
