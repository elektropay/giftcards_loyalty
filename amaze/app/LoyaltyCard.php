<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use App\Card;
use App\LoyaltyTransaction;

class LoyaltyCard extends Card
{

	public function transactions () {

		return $this->hasMany(LoyaltyTransaction::class);

	}

}
