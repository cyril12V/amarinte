<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Affiche la page d'accueil
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Affiche la page de prestation Conseil
     */
    public function conseil()
    {
        return view('prestations.conseil');
    }

    /**
     * Affiche la page de prestation Pilotage
     */
    public function pilotage()
    {
        return view('prestations.pilotage');
    }

    /**
     * Affiche la page de prestation Formation
     */
    public function formation()
    {
        return view('prestations.formation');
    }

    /**
     * Affiche la page Qui sommes-nous
     */
    public function who()
    {
        return view('nous-choisir.qui-sommes-nous');
    }

    /**
     * Affiche la page Nos points d'excellence
     */
    public function excellence()
    {
        return view('nous-choisir.nos-points-excellence');
    }

    /**
     * Affiche la page Partenariats
     */
    public function partnerships()
    {
        return view('nous-choisir.partenariats');
    }

    /**
     * Affiche la page Nos références
     */
    public function references()
    {
        return view('nous-choisir.references');
    }

    /**
     * Affiche la page Contact
     */
    public function contact()
    {
        return view('about.contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'not_robot' => 'required|accepted',
        ]);

        // Vous pouvez traiter le formulaire ici (envoi d'email, enregistrement en BDD, etc.)
        // Par exemple, envoyer un email à l'administrateur:
        
        // Pour une implémentation complète, il faudrait configurer un service d'email
        // et créer un Mailable.

        // Retourner une réponse JSON pour l'AJAX
        return response()->json([
            'success' => true,
            'message' => 'Votre message a été envoyé avec succès. Nous vous contacterons bientôt.'
        ]);
    }

    // Méthodes pour les vues "Nous choisir"
}
