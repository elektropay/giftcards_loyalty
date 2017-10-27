<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class gcTransaction extends Model
{

	protected $guarded = [];

	public function giftCard () {

		return $this->belongsTo(GiftCard::class);

	}

}
