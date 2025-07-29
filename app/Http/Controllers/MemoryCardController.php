<?php

namespace App\Http\Controllers;

use App\Models\MemoryCard;
use App\Models\Prestation;
use Illuminate\Http\Request;

class MemoryCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memoryCards = MemoryCard::with('prestation')->orderBy('order')->get();
        return view('memory_cards.index', compact('memoryCards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Prestation $prestation)
    {
        return view('memory_cards.create', compact('prestation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Prestation $prestation)
    {
        $validated = $request->validate([
            'image' => 'required|string',
            'continent' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'order' => 'integer'
        ]);

        $memoryCard = $prestation->memoryCards()->create($validated);
        return redirect()->route('prestations.show', $prestation)
            ->with('success', 'Memory Card créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MemoryCard $memoryCard)
    {
        return view('memory_cards.show', compact('memoryCard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemoryCard $memoryCard)
    {
        return view('memory_cards.edit', compact('memoryCard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MemoryCard $memoryCard)
    {
        $validated = $request->validate([
            'image' => 'required|string',
            'continent' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'order' => 'integer'
        ]);

        $memoryCard->update($validated);
        return redirect()->route('prestations.show', $memoryCard->prestation)
            ->with('success', 'Memory Card mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemoryCard $memoryCard)
    {
        $prestation = $memoryCard->prestation;
        $memoryCard->delete();
        return redirect()->route('prestations.show', $prestation)
            ->with('success', 'Memory Card supprimée avec succès.');
    }
}
