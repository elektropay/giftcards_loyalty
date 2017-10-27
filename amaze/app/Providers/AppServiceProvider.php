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

        $var = \App\GiftCard::archives();
        view()->share('archives', $var);

        $totalBought = \App\GiftCard::getTotalBought();
        view()->share('totalBought', $totalBought);

        $totalUsed = \App\GiftCard::getTotalUsed();
        view()->share('totalUsed', $totalUsed);

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
