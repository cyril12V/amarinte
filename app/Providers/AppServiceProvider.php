<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

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
        Log::info('AppServiceProvider boot method executed.');

        // Définir explicitement la route de mise à jour Livewire avec le préfixe
        Livewire::setUpdateRoute(function ($handle) {
            // IMPORTANT: Assurez-vous que ce chemin correspond exactement à votre structure d'URL
            return Route::post('/amarinte_new/public/livewire/update', $handle)
                ->middleware('web') // Assurez-vous que les middlewares nécessaires sont là
                ->name('livewire.update'); // Donner un nom est une bonne pratique
        });
    }
}
