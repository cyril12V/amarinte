<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;

class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestations = Prestation::orderBy('order')->get();
        return view('prestations.index', compact('prestations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prestations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'hero_image' => 'required|string',
            'description' => 'required|string',
            'format_title' => 'required|string|max:255',
            'format_conseil' => 'required|string',
            'format_due_diligence' => 'required|string',
            'status' => 'required|in:published,draft',
            'order' => 'integer'
        ]);

        $prestation = Prestation::create($validated);
        return redirect()->route('prestations.show', $prestation)
            ->with('success', 'Prestation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestation $prestation)
    {
        $prestation->load('memoryCards');
        return view('prestations.show', compact('prestation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestation $prestation)
    {
        return view('prestations.edit', compact('prestation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestation $prestation)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'hero_image' => 'required|string',
            'description' => 'required|string',
            'format_title' => 'required|string|max:255',
            'format_conseil' => 'required|string',
            'format_due_diligence' => 'required|string',
            'status' => 'required|in:published,draft',
            'order' => 'integer'
        ]);

        $prestation->update($validated);
        return redirect()->route('prestations.show', $prestation)
            ->with('success', 'Prestation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestation $prestation)
    {
        $prestation->delete();
        return redirect()->route('prestations.index')
            ->with('success', 'Prestation supprimée avec succès.');
    }
}
