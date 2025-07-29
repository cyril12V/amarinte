@extends('layouts.app')

@section('title', 'Qui sommes-nous ? - AMARINTE')

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
        position: relative;
        height: 40vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-top: 65px;
        background-image: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.5)), url('../images/section_contact.png');
        background-size: 100% auto;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
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
        text-align: center;
        max-width: 800px;
        padding: 0 20px;
        z-index: 2;
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
    /* Section biographie */
    .bio-section {
        padding: 5rem 0;
        background-color: var(--white);
        position: relative;
    }
    
    .section-accent {
        position: absolute;
        font-family: 'JOST', sans-serif;
        font-weight: 200; /* EXTRA LIGHT */
        font-size: 10rem;
        color: rgba(114, 113, 124, 0.03);
        z-index: 1;
        user-select: none;
        pointer-events: none;
        animation: fadeIn 1s ease forwards;
    }
    
    .accent-bio {
        top: 50%;
        left: 5%;
        transform: translateY(-50%);
    }
    
    .bio-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 4rem;
        display: flex;
        align-items: center;
        gap: 6rem;
        position: relative;
        z-index: 2;
    }
    
    .bio-image-container {
        flex: 0 0 45%;
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    
    .bio-image-frame {
        position: relative;
        padding: 1.5rem;
    }
    
    .bio-image-border {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 1px solid rgba(114, 113, 124, 0.2);
        border-radius: 2px;
        transform: translate(15px, 15px);
        transition: transform 0.4s ease;
    }
    
    .bio-image-container:hover .bio-image-border {
        transform: translate(8px, 8px);
    }
    
    .bio-image {
        width: 100%;
        height: 580px;
        overflow: hidden;
        position: relative;
        box-shadow: var(--shadow-md);
    }
    
    .bio-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.7s ease;
        filter: grayscale(20%);
    }
    
    .bio-image-container:hover .bio-image img {
        transform: scale(1.05);
        filter: grayscale(0%);
    }
    
    .bio-content {
        flex: 0 0 45%;
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    
    .bio-title {
        font-family: 'Jost', sans-serif;
        font-weight: 300; /* LIGHT */
        font-size: 2.5rem;
        color: var(--dark);
        margin-bottom: 2rem;
        position: relative;
        display: inline-block;
        letter-spacing: 1px;
    }
    
    .bio-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 0;
        width: 40px;
        height: 2px;
        background-color: var(--third);
        transition: width 0.5s ease;
    }
    
    .bio-content:hover .bio-title::after {
        width: 100px;
    }
    
    .bio-text {
        font-family: 'Jost', sans-serif;
        font-weight: 300; /* LIGHT */
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--light-text);
    }
    
    .bio-text p {
        margin-bottom: 1.5rem;
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Section interview */
    .interview-section {
        background-color: var(--lightest);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }
    
    .accent-interview {
        top: 4rem;
        right: 5%;
    }
    
    .interview-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 3rem;
        position: relative;
        z-index: 2;
    }
    
    .interview-title {
        font-family: 'Jost', sans-serif;
        font-weight: 300; /* LIGHT */
        font-size: 2.5rem;
        color: var(--dark);
        margin-bottom: 3rem;
        text-align: center;
        position: relative;
        display: inline-block;
        margin-left: 50%;
        transform: translateX(-50%);
        letter-spacing: 1px;
        animation: fadeIn 0.8s ease forwards;
    }
    
    .interview-title::before {
        content: '';
        position: absolute;
        width: 60px;
        height: 1px;
        background-color: rgba(114, 113, 124, 0.3);
        top: 50%;
        right: calc(100% + 20px);
    }
    
    .interview-title::after {
        content: '';
        position: absolute;
        width: 60px;
        height: 1px;
        background-color: rgba(114, 113, 124, 0.3);
        top: 50%;
        left: calc(100% + 20px);
    }
    
    .interview-items-container {
        display: flex;
        flex-direction: column;
        gap: 2.5rem;
    }
    
    .interview-item {
        background-color: var(--white);
        border-radius: var(--radius-md);
        padding: 3rem;
        box-shadow: var(--shadow-md);
        transition: transform 0.4s ease, box-shadow 0.4s ease, opacity 0.8s ease;
        position: relative;
        opacity: 0;
        transform: translateY(40px);
        border: 1px solid rgba(0, 0, 0, 0.03);
    }
    
    .interview-item:nth-child(1) { animation-delay: 0.1s; }
    .interview-item:nth-child(2) { animation-delay: 0.2s; }
    .interview-item:nth-child(3) { animation-delay: 0.3s; }
    
    .interview-item:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }
    
    .interview-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background-color: var(--third);
        transition: var(--transition);
    }
    
    .interview-item:nth-child(even)::before {
        background-color: var(--primary);
    }
    
    .interview-item:nth-child(3n)::before {
        background-color: var(--secondary);
    }
    
    .interview-item:hover::before {
        height: 8px;
    }
    
    .interview-question {
        font-family: 'Jost', sans-serif;
        font-weight: 300; /* LIGHT */
        font-size: 1.5rem;
        color: var(--dark);
        margin-bottom: 1.5rem;
        position: relative;
        display: inline-block;
        padding-left: 2rem;
        letter-spacing: 0.5px;
    }
    
    .interview-question::before {
        content: '"';
        position: absolute;
        left: 0;
        top: -10px;
        font-size: 3rem;
        color: rgba(114, 113, 124, 0.2);
        font-family: serif;
    }
    
    .interview-answer {
        font-family: 'Jost', sans-serif;
        font-weight: 300; /* LIGHT */
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--light-text);
        position: relative;
        padding-left: 1.5rem;
        border-left: 1px solid rgba(114, 113, 124, 0.1);
    }
    
    .interview-answer p {
        margin-bottom: 1.5rem;
        opacity: 1;
        transform: translateY(0);
    }
    
    .interview-answer p:last-child {
        margin-bottom: 0;
    }
    
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
    
    /* Effets de parallaxe léger */
    .parallax-element {
        transition: transform 0.3s ease-out;
    }
    
    /* Responsive */
    @media (max-width: 1200px) {
        .bio-container {
            gap: 4rem;
        }
        
        .bio-image {
            height: 500px;
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
        
        .bio-container {
            flex-direction: column;
            gap: 3rem;
        }
        
        .bio-image-container, .bio-content {
            flex: 0 0 100%;
        }
        
        .bio-image {
            height: 450px;
            max-width: 450px;
            margin: 0 auto;
        }
        
        .bio-section, .interview-section {
            padding: 4rem 0;
        }
        
        .interview-question {
            font-size: 1.4rem;
        }
        
        .accent-bio, .accent-interview {
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
        
        .bio-section, .interview-section {
            padding: 3.5rem 0;
        }
        
        .bio-title, .interview-title {
            font-size: 2rem;
        }
        
        .bio-container, .interview-container {
            padding: 0 2rem;
        }
        
        .interview-item {
            padding: 2.5rem;
        }
        
        .interview-title::before,
        .interview-title::after {
            width: 40px;
        }
        
        .interview-answer {
            padding-left: 1rem;
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
        
        .bio-image {
            height: 350px;
        }
        
        .bio-section, .interview-section {
            padding: 3rem 0;
        }
        
        .interview-title::before,
        .interview-title::after {
            display: none;
        }
        
        .interview-item {
            padding: 2rem 1.5rem;
        }
        
        .interview-question {
            font-size: 1.3rem;
            padding-left: 1.5rem;
        }
        
        .interview-answer {
            padding-left: 0.5rem;
        }
    }
</style>
@endsection

@section('additional_scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Effet d'élévation progressive au survol pour les éléments d'interview
        const interviewItems = document.querySelectorAll('.interview-item');
        const bioElements = document.querySelectorAll('.bio-image-container, .bio-content');
        
        interviewItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.zIndex = "10";
            });
            
            item.addEventListener('mouseleave', function() {
                setTimeout(() => {
                    this.style.zIndex = "2";
                }, 300);
            });
        });
        
        // Animation au défilement
        function animateOnScroll() {
            // Animation pour les éléments bio
            bioElements.forEach(element => {
                const rect = element.getBoundingClientRect();
                const windowHeight = window.innerHeight || document.documentElement.clientHeight;
                const elementVisible = rect.top <= windowHeight * 0.8 && rect.bottom >= 0;
                
                if (elementVisible) {
                    element.style.opacity = "1";
                    element.style.transform = "translateY(0)";
                } else {
                    // Réinitialiser l'animation si l'élément n'est plus visible
                    if (rect.top > windowHeight) {
                        element.style.opacity = "0";
                        element.style.transform = "translateY(40px)";
                        element.style.transition = "opacity 0.8s ease, transform 0.8s ease";
                    }
                }
            });
            
            // Animation pour les éléments d'interview
            interviewItems.forEach((item, index) => {
                const rect = item.getBoundingClientRect();
                const windowHeight = window.innerHeight || document.documentElement.clientHeight;
                const elementVisible = rect.top <= windowHeight * 0.85 && rect.bottom >= 0;
                
                if (elementVisible) {
                    setTimeout(() => {
                        item.style.opacity = "1";
                        item.style.transform = "translateY(0)";
                    }, index * 150);
                } else {
                    // Réinitialiser l'animation si l'élément n'est plus visible
                    if (rect.top > windowHeight) {
                        item.style.opacity = "0";
                        item.style.transform = "translateY(40px)";
                        item.style.transition = "opacity 0.8s ease, transform 0.8s ease";
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
        
        // Effet de parallaxe léger
        function handleParallax(e) {
            const parallaxElements = document.querySelectorAll('.parallax-element');
            const mouseX = e.clientX / window.innerWidth - 0.5;
            const mouseY = e.clientY / window.innerHeight - 0.5;
            
            parallaxElements.forEach(element => {
                const depthX = element.getAttribute('data-depth-x') || 20;
                const depthY = element.getAttribute('data-depth-y') || 20;
                const movementX = mouseX * depthX;
                const movementY = mouseY * depthY;
                element.style.transform = `translate(${movementX}px, ${movementY}px)`;
            });
        }
        
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
        
        // Déclencher l'effet de parallaxe au mouvement de la souris
        window.addEventListener('mousemove', handleParallax);
    });
</script>
@endsection

@section('content')
<!-- Header -->
<header class="excellence-header">
    <div class="header-content">
        <h1 class="header-title">Qui sommes-nous ?</h1>
    </div>
</header>

<!-- Section biographie -->
<section class="bio-section">
    <div class="section-accent accent-bio parallax-element" data-depth-x="10" data-depth-y="5">AMARINTE</div>
    
    <div class="bio-container">
        <div class="bio-image-container">
            <div class="bio-image-frame">
                <div class="bio-image">
                    <img src="{{ asset('images/Annick-3.jpg') }}" alt="Annick SVAY-DELECROIX" class="parallax-element" data-depth-x="5" data-depth-y="5">
                </div>
                <div class="bio-image-border"></div>
            </div>
        </div>
        
        <div class="bio-content">
            <h2 class="bio-title">Annick SVAY-DELECROIX</h2>
            <div class="bio-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
                
                <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>
                
                <p>Curabitur aliquet quam id dui posuere blandit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Sed porttitor lectus nibh. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section interview améliorée -->
<section class="interview-section">
    <div class="section-accent accent-interview parallax-element" data-depth-x="15" data-depth-y="10">ENTRETIEN</div>
    
    <div class="interview-container">
        <h2 class="interview-title">Entretien</h2>
        
        <div class="interview-items-container">
            <div class="interview-item">
                <div class="interview-question">
                    Que signifie Amarinte ?
                </div>
                <div class="interview-answer">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                    <p>Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor risus. Donec rutrum congue leo eget malesuada.</p>
                </div>
            </div>
            
            <div class="interview-item">
                <div class="interview-question">
                    Quelle est votre approche ?
                </div>
                <div class="interview-answer">
                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel.</p>
                    <p>Nulla quis lorem ut libero malesuada feugiat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel.</p>
                </div>
            </div>
            
            <div class="interview-item">
                <div class="interview-question">
                    Comment définissez-vous votre vision ?
                </div>
                <div class="interview-answer">
                    <p>Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus.</p>
                    <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Indicateur de défilement -->
<div class="scroll-indicator">
    <div class="arrow"></div>
</div>
@endsection