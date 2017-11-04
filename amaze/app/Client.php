<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use App\Card;

class Client extends Model {

	protected $fillable = [
        'first_name', 'last_name', 'email'
    ];

	public function giftCards () {
		return $this->hasMany(gcTransaction::class);
	}

	public function loyaltyCard () {
		return $this->hasMany(gcTransaction::class);
	}

}