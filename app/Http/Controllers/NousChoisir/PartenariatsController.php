<?php

namespace App\Http\Controllers\NousChoisir;

use App\Http\Controllers\Controller;
use App\Models\IntroSection;
use App\Models\Partnership;
use Illuminate\Http\Request;

class PartenariatsController extends Controller
{
    public function index()
    {
        $partnerships = Partnership::where('is_active', true)
                                  ->orderBy('order')
                                  ->get();
                                  
        $introSection = IntroSection::where('page', 'partnerships')
                                  ->where('status', 'publié')
                                  ->first();
                                  
        return view('nous-choisir.partenariats', [
            'partnerships' => $partnerships,
            'introSection' => $introSection,
        ]);
    }
}
