<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use App\Card;

class Loyalty extends Card
{

	public function transactions () {

		return $this->hasMany(gcTransaction::class);

	}

}
