<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Carrito;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Hacer que $cartCount y $carrito estén disponibles en la vista de navbar
        View::composer('components.navbar', function ($view) {
            $cartCount = 0;
            $carrito = null;

            if (auth()->check()) {
                $carrito = Carrito::where('user_id', auth()->id())->with('servicios')->first();
                $cartCount = $carrito ? $carrito->servicios->count() : 0;
            }

            $view->with(compact('cartCount', 'carrito'));
        });
    }
}
