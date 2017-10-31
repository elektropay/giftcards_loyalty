<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{

	protected $guarded = [];

	public function giftCard () {

		return $this->belongsTo(GiftCard::class);

	}

	public function user () {

		return $this->belongsTo(User::class, 'user_id');

	}

}
