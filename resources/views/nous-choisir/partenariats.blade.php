@extends('layouts.app')

@section('title', 'Partenariats - AMARINTE')

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
    }
    
    /* Header avec design immersif revu */
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
        background-image: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.5)), url('../images/partenariats.png');
        background-size: 100% auto;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

   
    
    /* Section introduction */
    .intro-section {
        padding: 5rem 0;
        background-color: var(--white);
        position: relative;
    }
    
    .section-accent {
        position: absolute;
        font-family: 'Jost', sans-serif;
        font-weight: 200; /* EXTRA LIGHT */
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
    
    .intro-subtitle {
        font-family: 'Jost', sans-serif;
        font-weight: 300;
        font-size: 1.6rem;
        color: var(--primary);
        margin-bottom: 2rem;
        letter-spacing: 0.5px;
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
    
    .intro-text p:last-child {
        margin-bottom: 0;
    }
    
    /* Section partenaires */
    .partners-section {
        background-color: var(--lightest);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }
    
    .accent-partners {
        top: 4rem;
        right: 5%;
    }
    
    .partners-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 2;
    }
    
    .partners-title {
        font-family: 'Jost', sans-serif;
        font-weight: 300;
        font-size: 2.5rem;
        color: var(--dark);
        margin-bottom: 3rem;
        text-align: center;
        position: relative;
        display: inline-block;
        margin-left: 50%;
        transform: translateX(-50%);
        letter-spacing: 1px;
        opacity: 0;
        animation: fadeIn 0.8s ease forwards;
    }
    
    .partners-title::before {
        content: '';
        position: absolute;
        width: 60px;
        height: 1px;
        background-color: rgba(114, 113, 124, 0.3);
        top: 50%;
        right: calc(100% + 20px);
    }
    
    .partners-title::after {
        content: '';
        position: absolute;
        width: 60px;
        height: 1px;
        background-color: rgba(114, 113, 124, 0.3);
        top: 50%;
        left: calc(100% + 20px);
    }
    
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 1.5rem;
        max-width: 1000px;
        margin: 0 auto;
        justify-items: center;
        align-items: start;
        margin-left: calc(50% + -550px);        
    }
    
    .partner-item {
        background-color: var(--white);
        border-radius: var(--radius-md);
        padding: 1.2rem;
        box-shadow: var(--shadow-md);
        transition: transform 0.4s ease, box-shadow 0.4s ease, opacity 0.8s ease;
        position: relative;
        opacity: 0;
        transform: translateY(40px);
        border: 1px solid rgba(0, 0, 0, 0.03);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 160px;
        height: 150px;
    }
    
    .partner-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background-color: var(--primary);
        transition: var(--transition);
    }
    
    .partner-item:nth-child(3n+2)::before {
        background-color: var(--secondary);
    }
    
    .partner-item:nth-child(3n+3)::before {
        background-color: var(--third);
    }
    
    .partner-item:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }
    
    .partner-item:hover::before {
        height: 8px;
    }
    
    .partner-logo {
        width: 100px;
        height: 70px;
        object-fit: contain;
        margin-bottom: 0.5rem;
        transition: transform 0.3s ease;
        filter: grayscale(60%);
    }
    
    .partner-item:hover .partner-logo {
        transform: scale(1.05);
        filter: grayscale(0%);
    }
    
    .partner-name {
        font-family: 'Jost', sans-serif;
        font-weight: 300;
        font-size: 0.9rem;
        color: var(--dark);
        margin-top: 0.5rem;
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
    
    /* Responsive */
    @media (max-width: 1200px) {
        .partners-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 1.2rem;
            max-width: 800px;
        }
        
        .partner-item {
            width: 160px;
        }
        
        /* Centrer les derniers éléments pour écrans moyens */
        .partner-item:nth-child(5):nth-last-child(4),
        .partner-item:nth-child(6):nth-last-child(3),
        .partner-item:nth-child(7):nth-last-child(2),
        .partner-item:nth-child(8):nth-last-child(1) {
            grid-column: span 1;
        }
        
        /* Si 5 éléments total, centrer le 5ème */
        .partner-item:nth-child(5):nth-last-child(1) {
            grid-column: 2 / 4;
        }
        
        /* Si 6 éléments total, centrer les 5ème et 6ème */
        .partner-item:nth-child(5):nth-last-child(2) {
            grid-column: 1 / 2;
        }
        .partner-item:nth-child(6):nth-last-child(1) {
            grid-column: 4 / 5;
        }
        
        /* Si 7 éléments total, centrer le 7ème */
        .partner-item:nth-child(7):nth-last-child(1) {
            grid-column: 2 / 4;
        }
        
        /* Si 8 éléments total, centrer les 7ème et 8ème */
        .partner-item:nth-child(7):nth-last-child(2) {
            grid-column: 1 / 2;
        }
        .partner-item:nth-child(8):nth-last-child(1) {
            grid-column: 4 / 5;
        }
        
        .section-accent {
            font-size: 8rem;
        }
    }
    
    @media (max-width: 992px) {
        .excellence-header {
            height: 350px;
        }
        
        .header-title {
            font-size: 3rem;
        }
        
        .partners-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }
        
        .partner-item {
            width: 160px;
            height: 140px;
            padding: 1.2rem;
        }
        
        .partner-logo {
            width: 100px;
            height: 70px;
        }
        
        .intro-section, .partners-section {
            padding: 4rem 0;
        }
        
        .accent-intro, .accent-partners {
            display: none;
        }
    }
    
    @media (max-width: 768px) {
        .excellence-header {
            height: 300px;
        }
        
        .header-title {
            font-size: 2.5rem;
        }
        
        .intro-section, .partners-section {
            padding: 3.5rem 0;
        }
        
        .intro-subtitle {
            font-size: 1.4rem;
        }
        
        .partners-title {
            font-size: 2rem;
        }
        
        .intro-container, .partners-container {
            padding: 0 2rem;
        }
        
        .partners-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 0.8rem;
        }
        
        .partner-item {
            width: 140px;
            height: 120px;
            padding: 1rem;
        }
        
        .partner-logo {
            width: 80px;
            height: 60px;
        }
        
        .partners-title::before,
        .partners-title::after {
            width: 40px;
        }
        
        .partner-name {
            font-size: 0.8rem;
        }
        
        .scroll-indicator {
            bottom: 2rem;
            right: 2rem;
        }
    }
    
    @media (max-width: 576px) {
        .header-title {
            font-size: 2rem;
        }
        
        .intro-section, .partners-section {
            padding: 3rem 0;
        }
        
        .partners-title::before,
        .partners-title::after {
            display: none;
        }
        
        .partners-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.8rem;
        }
        
        .partner-item {
            width: 130px;
            height: 110px;
            padding: 0.8rem;
        }
        
        .partner-logo {
            width: 70px;
            height: 50px;
        }
        
        .partner-name {
            font-size: 0.75rem;
        }
    }

    /* Centrer les 3 derniers éléments sur la deuxième ligne */
    /* Pour 8 éléments : 5 sur la première ligne, 3 centrés sur la deuxième */
    .partner-item:nth-child(6):nth-last-child(3) {
        grid-column: 2 / 3;
        grid-row: 2;
    }

    .partner-item:nth-child(7):nth-last-child(2) {
        grid-column: 3 / 4;
        grid-row: 2;
    }

    .partner-item:nth-child(8):nth-last-child(1) {
        grid-column: 4 / 5;
        grid-row: 2;
    }
    
    /* Si seulement 6 éléments, centrer le 6ème */
    .partner-item:nth-child(6):nth-last-child(1) {
        grid-column: 2 / 4;
        grid-row: 2;
    }
    
    /* Si seulement 7 éléments, centrer les 6ème et 7ème */
    .partner-item:nth-child(6):nth-last-child(2) {
        grid-column: 2 / 3;
        grid-row: 2;
    }
    .partner-item:nth-child(7):nth-last-child(1) {
        grid-column: 4 / 5;
        grid-row: 2;
    }
</style>
@endsection

@section('additional_scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const introContainer = document.querySelector('.intro-container');
        const partnerItems = document.querySelectorAll('.partner-item');
        
        // Animation au défilement
        function animateOnScroll() {
            // Animation pour l'intro
            const introRect = introContainer.getBoundingClientRect();
            const windowHeight = window.innerHeight || document.documentElement.clientHeight;
            const introVisible = introRect.top <= windowHeight * 0.8 && introRect.bottom >= 0;
            
            if (introVisible) {
                introContainer.style.opacity = "1";
                introContainer.style.transform = "translateY(0)";
            } else {
                // Réinitialiser l'animation si l'élément n'est plus visible
                if (introRect.top > windowHeight) {
                    introContainer.style.opacity = "0";
                    introContainer.style.transform = "translateY(40px)";
                }
            }
            
            // Animation pour les partenaires
            partnerItems.forEach((item, index) => {
                const rect = item.getBoundingClientRect();
                const partnerVisible = rect.top <= windowHeight * 0.85 && rect.bottom >= 0;
                
                if (partnerVisible) {
                    setTimeout(() => {
                        item.style.opacity = "1";
                        item.style.transform = "translateY(0)";
                    }, index * 100);
                } else {
                    // Réinitialiser l'animation si l'élément n'est plus visible
                    if (rect.top > windowHeight) {
                        item.style.opacity = "0";
                        item.style.transform = "translateY(40px)";
                    }
                }
            });
        }
        
        // Gérer l'indicateur de défilement
        function handleScrollIndicator() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight;
            const clientHeight = document.documentElement.clientHeight;
            const scrollIndicator = document.querySelector('.scroll-indicator');
            
            if (scrollTop > 300) {
                scrollIndicator.classList.add('visible');
                
                // Si près du bas de la page, changer la direction de la flèche
                if (scrollTop + clientHeight >= scrollHeight - 300) {
                    scrollIndicator.classList.add('up');
                } else {
                    scrollIndicator.classList.remove('up');
                }
            } else {
                scrollIndicator.classList.remove('visible');
            }
        }
        
        // Effet de hover pour les cartes
        partnerItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.zIndex = "10";
            });
            
            item.addEventListener('mouseleave', function() {
                setTimeout(() => {
                    this.style.zIndex = "2";
                }, 300);
            });
        });
        
        // Scroll doux pour l'indicateur de défilement
        document.querySelector('.scroll-indicator').addEventListener('click', function() {
            if (this.classList.contains('up')) {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            } else {
                window.scrollTo({
                    top: document.documentElement.scrollHeight,
                    behavior: 'smooth'
                });
            }
        });
        
        // Initialiser les animations
        animateOnScroll();
        handleScrollIndicator();
        
        // Déclencher les animations au scroll
        window.addEventListener('scroll', function() {
            animateOnScroll();
            handleScrollIndicator();
        });
    });
</script>
@endsection

@section('content')
<!-- Header -->
<header class="partnership-header">
    <div class="header-pattern"></div>
    <div class="header-content">
        <h1 class="header-title"></h1>
    </div>
</header>

<!-- Section introduction -->
<section class="intro-section">
    <div class="section-accent accent-intro">COLLABORATIONS</div>
    
    <div class="intro-container">
        <div class="intro-content">
            <h2 class="intro-subtitle">{{ $introSection->title }}</h2>
            <div class="intro-text">
                {!! $introSection->content !!}
            </div>
        </div>
    </div>
</section>

<!-- Section partenaires -->
<section class="partners-section">
    <div class="section-accent accent-partners">RÉSEAU</div>
    
    <div class="partners-container">
        <h2 class="partners-title">Nos partenaires</h2>
        
        <div class="partners-grid">
            @foreach($partnerships as $partnership)
            <div class="partner-item">
                @if($partnership->logo)
                    <img src="{{ asset('storage/' . $partnership->logo) }}" alt="{{ $partnership->name }}" class="partner-logo">
                @else
                    <div style="width: 180px; height: 120px; display: flex; align-items: center; justify-content: center; background-color: #f5f7f9; margin-bottom: 1rem;">
                        <span style="color: #999;">Logo</span>
                    </div>
                @endif
                <div class="partner-name">{{ $partnership->name }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Indicateur de défilement -->
<div class="scroll-indicator">
    <div class="arrow"></div>
</div>
@endsection 