<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;

class PrestationPublicController extends Controller
{
    /**
     * Affiche la liste des prestations publiées.
     */
    public function index()
    {
        $prestations = Prestation::where('status', 'published')
                                ->orderBy('order', 'asc')
                                ->get();

        return view('prestations.prestation', compact('prestations'));
    }

    /**
     * Affiche la vue des prestations en format carte.
     */
    public function prestation()
    {
        $prestations = Prestation::where('status', 'published')
                                ->orderBy('order', 'asc')
                                ->get();

        return view('prestations.prestation', compact('prestations'));
    }

    public function show(Prestation $prestation)
    {
        // Vérifier si la prestation est publiée, sinon renvoyer 404
        if ($prestation->status !== 'published') {
            abort(404);
        }

        $prestation->load('memoryCards');
        return view('prestations.public.show', compact('prestation'));
    }
} 