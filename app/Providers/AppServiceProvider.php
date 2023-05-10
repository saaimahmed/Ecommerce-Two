<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use View;
use Cart;

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


//        view::share('name','BITM');

//      View::Composer Diye Array index Categories => Category Model er Sob data pass kore diye eivabe
//                   full project er jekonu jaiag theke acccess kora jabe
        View::composer(['*'],function ($view)
        {
            $view->with('categories',Category::where('status',1)->get());
            $view->with('cartProduct',Cart::getContent());
        });


    }
}
