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

        //pass the stats only to the stats view
        view()->composer('giftcards.stats', function ($view) {

            return $view->with ('stats', array(

                'totalBought' => \App\GiftCard::getTotalBought("gc_transactions"),
                'totalUsed' => \App\GiftCard::getTotalUsed("gc_transactions"),
                'numberOfCards' => \App\GiftCard::getNumberOfCards()

            ));

        });

        // $totalBought = \App\GiftCard::getTotalBought();
        // view()->share('totalBought', $totalBought);

        // $totalUsed = \App\GiftCard::getTotalUsed();
        // view()->share('totalUsed', $totalUsed);

        // $numberOfCards = \App\GiftCard::getNumberOfCards();
        // view()->share('numberOfCards', $numberOfCards);

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
