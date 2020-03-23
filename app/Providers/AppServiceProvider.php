<?php

    namespace App\Providers;
    use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Facades\Schema; // ADD THIS LINE
    
class AppServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
    {
        Schema::defaultStringLength(191);// ADD THIS LINE
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