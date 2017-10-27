<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $totalBought = \App\GiftCard::getTotalBought();
        view()->share('totalBought', $totalBought);

        $totalUsed = \App\GiftCard::getTotalUsed();
        view()->share('totalUsed', $totalUsed);

        $numberOfCards = \App\GiftCard::getNumberOfCards();
        view()->share('numberOfCards', $numberOfCards);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
