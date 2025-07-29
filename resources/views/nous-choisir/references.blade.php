@extends('layouts.app')

@section('title', 'Nos références - AMARINTE')

@section('footer')


@section('additional_styles')
<style>
    /* Variables */
    :root {
        --primary: #5c9bd6;
        --secondary: #44aa00;
        --third: #7f7f7f;
        --primary-light: rgba(92, 155, 214, 0.1);
        --secondary-light: rgba(68, 170, 0, 0.1);
        --third-light: rgba(127, 127, 127, 0.1);
        --dark: #2d3748;
        --text: #4a5568;
        --light-text: #72717c;
        --lightest: #f8f9fb;
        --white: #ffffff;
        --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 10px 15px rgba(0, 0, 0, 0.05);
        --shadow-lg: 0 20px 25px rgba(0, 0, 0, 0.05);
        --transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
        --radius-sm: 6px;
        --radius-md: 12px;
        --radius-lg: 24px;
        --radius-full: 9999px;
    }

    /* Style épuré et minimaliste avec typographie légère */
    body {
        overflow-x: hidden;
        background-color: var(--lightest);
        font-family: 'Jost', sans-serif;
        color: var(--text);
        line-height: 1.7;
        margin: 0;
        padding: 0;
    }
    
    /* En-tête avec image */
    .excellence-header {
        width: 100%;
        position: relative;
        margin-top: 65px;
    }

    .header-pattern {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.6;
    }

    .header-content {
        width: 100%;
        height: 49vh;
        background-image: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.5)), url('../images/nos_references.png');
        background-size: 100% auto;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header-title {
        font-family: 'AUDREY', 'Jost', sans-serif;
        font-size: 42px;
        color: white;
        letter-spacing: 4px;
        font-weight: normal;
        text-transform: uppercase;
        text-shadow: 0 2px 5px rgba(0,0,0,0.4);
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .header-title::after {
        content: "";
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background-color: white;
        border-radius: 3px;
    }
    
    /* Section introduction */
    .intro-section {
        padding: 3rem 0;
        background-color: var(--white);
        position: relative;
    }
    
    .section-accent {
        position: absolute;
        font-family: 'Jost', sans-serif;
        font-weight: 200;
        font-size: 10rem;
        color: rgba(92, 155, 214, 0.03);
        z-index: 1;
        user-select: none;
        pointer-events: none;
    }
    
    .accent-intro {
        top: 50%;
        left: 5%;
        transform: translateY(-50%);
    }
    
    .intro-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 3rem;
        position: relative;
        z-index: 2;
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    
    .intro-content {
        text-align: center;
        position: relative;
    }
    
    .intro-text {
        font-family: 'Jost', sans-serif;
        font-weight: 300;
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--light-text);
        max-width: 800px;
        margin: 0 auto;
    }
    
    .intro-text p {
        margin-bottom: 1.5rem;
    }
    
    /* Section Références */
    .references-section {
        padding: 3rem 0;
        background-color: var(--lightest);
        position: relative;
    }
    
    .accent-references {
        top: 50%;
        right: 5%;
        transform: translateY(-50%);
    }
    
    .references-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 2;
    }
    
    .section-title {
        font-family: 'Jost', sans-serif;
        font-weight: 300;
        font-size: 2.5rem;
        color: var(--dark);
        text-align: center;
        margin-bottom: 2.5rem;
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    
    /* Carousel amélioré */
    .references-carousel {
        width: 100%;
        position: relative;
        overflow: hidden;
        margin: 2rem auto;
        padding-bottom: 4rem;
    }
    
    .carousel-track {
        display: flex;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        margin-bottom: 2rem;
        cursor: grab;
    }
    
    .carousel-track:active {
        cursor: grabbing;
    }
    
    .reference-card {
        flex: 0 0 calc(33.333% - 2rem);
        background-color: var(--white);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-md);
        margin: 0 1rem;
        padding: 2rem;
        text-align: center;
        transition: var(--transition);
        transform: scale(0.98);
        opacity: 0.9;
        min-width: 250px;
        position: relative;
        overflow: hidden;
    }
    
    .reference-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }
    
    .reference-card.active {
        transform: scale(1);
        opacity: 1;
    }
    
    .reference-card.active::before {
        transform: scaleX(1);
    }
    
    .reference-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .reference-logo {
        width: 120px;
        height: 60px;
        object-fit: contain;
        margin: 0 auto 1.5rem;
        filter: grayscale(0.3);
        transition: filter 0.3s ease;
    }
    
    .reference-card:hover .reference-logo {
        filter: grayscale(0);
    }
    
    .reference-name {
        font-family: 'Jost', sans-serif;
        font-weight: 500;
        font-size: 1.1rem;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }
    
    .reference-info {
        font-family: 'Jost', sans-serif;
        font-weight: 300;
        font-size: 0.9rem;
        color: var(--light-text);
        margin-bottom: 1rem;
    }
    
    .reference-stats {
        display: flex;
        justify-content: space-around;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .stat-item {
        text-align: center;
    }
    
    .stat-value {
        font-family: 'Jost', sans-serif;
        font-weight: 600;
        font-size: 1.2rem;
        color: var(--primary);
        margin-bottom: 0.2rem;
    }
    
    .stat-label {
        font-family: 'Jost', sans-serif;
        font-weight: 300;
        font-size: 0.85rem;
        color: var(--light-text);
    }
    
    /* Contrôles carousel améliorés */
    .carousel-controls {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
        position: relative;
        z-index: 10;
        gap: 1rem;
    }
    
    .carousel-button {
        background: linear-gradient(135deg, var(--primary), #4a90e2);
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        box-shadow: 0 4px 20px rgba(92, 155, 214, 0.3);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 20;
        outline: none;
        overflow: hidden;
    }
    
    .carousel-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.2), rgba(255,255,255,0.1));
        border-radius: 50%;
        transform: scale(0);
        transition: transform 0.3s ease;
    }
    
    .carousel-button:hover::before {
        transform: scale(1);
    }
    
    .carousel-button:hover, .carousel-button:focus {
        transform: scale(1.1) translateY(-2px);
        box-shadow: 0 8px 30px rgba(92, 155, 214, 0.4);
    }
    
    .carousel-button:active {
        transform: scale(0.95);
    }
    
    .carousel-button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
        box-shadow: 0 2px 10px rgba(92, 155, 214, 0.2);
    }
    
    .carousel-button svg {
        width: 24px;
        height: 24px;
        fill: none;
        stroke: var(--white);
        stroke-width: 2.5;
        transition: var(--transition);
        position: relative;
        z-index: 1;
    }
    
    .carousel-button:hover svg {
        stroke-width: 3;
        transform: scale(1.1);
    }
    
    /* Dots (ronds) modernes */
    .carousel-dots {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2rem;
        position: relative;
        z-index: 10;
        gap: 0.8rem;
    }
    
    .carousel-dot {
        width: 12px;
        height: 12px;
        background: rgba(92, 155, 214, 0.2);
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }
    
    .carousel-dot::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: var(--primary);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .carousel-dot:hover {
        background: rgba(92, 155, 214, 0.4);
        transform: scale(1.3);
        border-color: rgba(92, 155, 214, 0.3);
    }
    
    .carousel-dot:hover::before {
        width: 8px;
        height: 8px;
    }
    
    .carousel-dot.active {
        background: var(--primary);
        transform: scale(1.4);
        border-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 0 20px rgba(92, 155, 214, 0.5);
    }
    
    .carousel-dot.active::before {
        width: 6px;
        height: 6px;
        background: rgba(255, 255, 255, 0.8);
    }
    
    /* Responsive amélioré */
    @media (max-width: 1200px) {
        .reference-card {
            flex: 0 0 calc(50% - 2rem);
        }
    }
    
    @media (max-width: 768px) {
        .header-title {
            font-size: 2.8rem;
        }
        
        .section-title {
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        
        .section-accent {
            font-size: 7rem;
        }
        
        .references-carousel {
            width: 100%;
            padding-bottom: 3rem;
            margin: 1rem 0;
        }
        
        .carousel-track {
            margin-bottom: 1.5rem;
        }
        
        .reference-card {
            flex: 0 0 calc(85% - 1rem);
            margin: 0 0.5rem;
            min-width: 280px;
            max-width: 320px;
        }
        
        .carousel-controls {
            margin-top: 1.5rem;
            gap: 0.8rem;
        }
        
        .carousel-button {
            width: 50px;
            height: 50px;
            box-shadow: 0 3px 15px rgba(92, 155, 214, 0.25);
        }
        
        .carousel-button svg {
            width: 20px;
            height: 20px;
        }
        
        .carousel-dots {
            margin-top: 1.5rem;
            gap: 0.6rem;
        }
        
        .carousel-dot {
            width: 14px;
            height: 14px;
        }
        
        .carousel-dot.active {
            transform: scale(1.3);
        }
        
        /* Amélioration tactile pour mobile */
        .carousel-track {
            touch-action: pan-x;
            -webkit-overflow-scrolling: touch;
        }
        
        .reference-card {
            touch-action: manipulation;
        }
        
        .reference-card:hover {
            transform: none;
        }
        
        .reference-card.active:hover {
            transform: scale(1.02);
        }
    }
    
    @media (max-width: 576px) {
        .header-title {
            font-size: 2.3rem;
        }
        
        .intro-container, .references-container {
            padding: 0 1rem;
        }
        
        .section-accent {
            font-size: 5rem;
            opacity: 0.02;
        }
        
        .reference-card {
            flex: 0 0 calc(90% - 1rem);
            min-width: 260px;
            max-width: 300px;
            padding: 1.5rem;
        }
        
        .reference-logo {
            width: 100px;
            height: 50px;
        }
        
        .carousel-button {
            width: 45px;
            height: 45px;
        }
        
        .carousel-button svg {
            width: 18px;
            height: 18px;
        }
        
        .carousel-dots {
            gap: 0.5rem;
        }
        
        .carousel-dot {
            width: 12px;
            height: 12px;
        }
    }
    
    /* Animations */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    
    @keyframes cardAppear {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes dotPulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
    }
    
    .carousel-dot.active {
        animation: dotPulse 2s ease-in-out infinite;
    }
    
    /* Scroll Indicator */
    .scroll-indicator {
        position: fixed;
        bottom: 3rem;
        right: 3rem;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: var(--white);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        z-index: 100;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
        cursor: pointer;
    }
    
    .scroll-indicator.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .scroll-indicator .arrow {
        width: 12px;
        height: 12px;
        border-right: 2px solid var(--light-text);
        border-bottom: 2px solid var(--light-text);
        transform: rotate(45deg);
        margin-top: -6px;
        transition: transform 0.3s ease;
    }
    
    .scroll-indicator:hover .arrow {
        transform: rotate(45deg) scale(1.2);
    }
    
    .scroll-indicator.up .arrow {
        transform: rotate(-135deg);
        margin-top: 6px;
    }
    
    .scroll-indicator.up:hover .arrow {
        transform: rotate(-135deg) scale(1.2);
    }
    
    /* Styles spécifiques pour le carrousel des références */
    .ref-carousel-button {
        position: relative;
        z-index: 100;
        padding: 0;
        cursor: pointer !important;
        pointer-events: auto !important;
        -webkit-tap-highlight-color: rgba(0,0,0,0);
        outline: none !important;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        user-select: none;
    }
    
    .ref-carousel-button:focus {
        box-shadow: 0 0 0 3px rgba(92, 155, 214, 0.5);
    }
    
    .ref-carousel-dot {
        cursor: pointer !important;
        pointer-events: auto !important;
        -webkit-tap-highlight-color: rgba(0,0,0,0);
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        user-select: none;
    }
</style>
@endsection

@section('content')
<!-- Header -->
<header class="references-header">
    <div class="header-pattern"></div>
    <div class="header-content">
        <h1 class="header-title">Nos références</h1>
    </div>
</header>

<!-- Section Références Clients -->
<section class="references-section">
    <div class="references-container">
        <div class="references-carousel" id="references-carousel">
            <div class="carousel-track">
                <!-- Chaque carte est une référence client -->
                @foreach($references as $reference)
                <div class="reference-card">
                    @if($reference->logo)
                        <img src="{{ asset('storage/' . $reference->logo) }}" alt="{{ $reference->name }}" class="reference-logo">
                    @else
                        <div style="width: 120px; height: 60px; display: flex; align-items: center; justify-content: center; background-color: #f5f7f9; margin: 0 auto 1.5rem;">
                            <span style="color: #999;">Logo</span>
                        </div>
                    @endif
                    <h3 class="reference-name">{{ $reference->name }}</h3>
                    <p class="reference-info">{{ $reference->sector }}</p>
                    <div class="reference-stats">
                        <div class="stat-item">
                            <div class="stat-value">{{ $reference->turnover }}</div>
                            <div class="stat-label">Chiffre d'affaires</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">{{ $reference->employees }}</div>
                            <div class="stat-label">Employés</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="carousel-controls">
                <button type="button" class="carousel-button ref-carousel-button prev" id="ref-prev-button" aria-label="Référence précédente">
                    <svg viewBox="0 0 24 24">
                        <path d="M15 6l-6 6 6 6"></path>
                    </svg>
                </button>
                <button type="button" class="carousel-button ref-carousel-button next" id="ref-next-button" aria-label="Référence suivante">
                    <svg viewBox="0 0 24 24">
                        <path d="M9 6l6 6-6 6"></path>
                    </svg>
                </button>
            </div>
            
            <div class="carousel-dots">
                @for($i = 0; $i < ceil($references->count() / 3); $i++)
                    <div class="carousel-dot ref-carousel-dot {{ $i == 0 ? 'active' : '' }}" data-index="{{ $i }}" aria-label="Page {{ $i + 1 }}"></div>
                @endfor
            </div>
        </div>
    </div>
</section>

<!-- Indicateur de défilement -->
<div class="scroll-indicator">
    <div class="arrow"></div>
</div>
@endsection

@section('scripts')
@endsection 