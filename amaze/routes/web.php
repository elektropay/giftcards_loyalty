<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function(){ 

	if (\Auth::check()) {
    	// The user is logged in...
		return view('welcome');

	} else {

		return view('sessions.create');

	}

	
});

Route::get('/giftcards/{giftCard}/destroy', 'GiftCardController@destroy');

Route::get('/giftcards', 'GiftCardController@index')->name('home');

Route::get('/giftcards/stats', 'GiftCardController@findStats');

Route::get('/giftcards/exportStats', 'GiftCardController@exportStats');

Route::get('/giftcards/create', 'GiftCardController@create');

Route::post('/giftcards', 'GiftCardController@store');

Route::get('/giftcards/{giftCard}', 'GiftCardController@show');



Route::post('/giftcards/{giftCard}/transactions', 'gcTransactionController@store');
Route::get('/giftcards/{giftCard}/transactions/{transaction}/destroy', 'gcTransactionController@destroy');



Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create')->name('login');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');
