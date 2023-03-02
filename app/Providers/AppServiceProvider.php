<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\PaymentConfirm;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using view composer to set following variables globally
        view()->composer('*',function($view) {
           $view->with('count_payment', PaymentConfirm::where('verify_status', '=', 'Pending')->get());
           $view->with('payment_status', PaymentConfirm::where('verify_status', '=', 'Pending')->orderBy('id', 'Desc')->offset(0)->limit(3)->get());
        });
    }
}
