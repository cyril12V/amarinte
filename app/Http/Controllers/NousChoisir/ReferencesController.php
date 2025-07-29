<?php

namespace App\Http\Controllers\NousChoisir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reference;
use App\Models\IntroSection;

class ReferencesController extends Controller
{
    public function index()
    {
        // Récupération de la section d'introduction
        $introSection = IntroSection::where('page', 'references')->first();
        
        // Si aucune section n'existe, on crée un objet vide
        if (!$introSection) {
            $introSection = new IntroSection([
                'page' => 'references',
                'title' => 'Nos références clients',
                'content' => '<p>Découvrez nos principales références et réussites.</p>'
            ]);
        }
        
        // Récupération des références actives, triées par ordre
        $references = Reference::where('is_active', true)
                              ->orderBy('order')
                              ->get();
            
        return view('nous-choisir.references', [
            'introSection' => $introSection,
            'references' => $references,
        ]);
    }
}
