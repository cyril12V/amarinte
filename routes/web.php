<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PrestationPublicController;
use App\Http\Controllers\PrestationAdminController;
use App\Http\Controllers\MemoryCardController;
use App\Http\Controllers\ProfileController;

// Route d'accueil
Route::get('/', [WelcomeController::class, 'index'])->name('home');



// Routes pour les informations "Nous choisir"
Route::prefix('a-propos')->group(function () {
    Route::get('/qui-sommes-nous', [WelcomeController::class, 'who'])->name('about.who');
    Route::get('/nos-points-excellence', [WelcomeController::class, 'excellence'])->name('about.excellence');
    Route::get('/partenariats', [\App\Http\Controllers\NousChoisir\PartenariatsController::class, 'index'])->name('about.partnerships');
    Route::get('/nos-references', [\App\Http\Controllers\NousChoisir\ReferencesController::class, 'index'])->name('about.references');
});

Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');


// Route pour la page affichant toutes les prestations en vue carte
Route::get('/nos-prestations', [PrestationPublicController::class, 'prestation'])->name('prestations.prestation');

// Route existante pour voir une prestation individuelle
Route::get('/prestations/{prestation}', [PrestationPublicController::class, 'show'])->name('prestations.public.show');



