<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use App\Card;

class GiftCard extends Card
{

	public function transactions () {

		return $this->hasMany(gcTransaction::class);

	}

}
