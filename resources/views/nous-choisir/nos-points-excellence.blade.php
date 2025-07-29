@extends('layouts.app')

@section('title', 'Nos points d\'excellence - AMARINTE')

@section('footer')


@section('additional_styles')
<style>
    /* Design modernisé pour la page d'excellence avec palette de couleurs raffinée */
    :root {
        --primary: #5c9bd6;
        --secondary: #44aa00;
        --third: #7f7f7f;
        --primary-light: rgba(92, 155, 214, 0.1);
        --secondary-light: rgba(68, 170, 0, 0.1);
        --third-light: rgba(127, 127, 127, 0.1);
        --dark: #2d3748;
        --text: #4a5568;
        --light-text: #7f7f7f;
        --lightest: #f7fafc;
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

    

    .header-pattern img {
        max-width: 100%;
        max-height: 100%;
    }

    .header-content {
        width: 100%;
        height: 40vh;
        background-image: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('../images/nos_points_excellence.png');
        background-size: 100% auto;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header-title {
        font-family: 'Jost', sans-serif;
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
    
    /* Section principale redesignée */
    .excellence-main {
        position: relative;
        padding: 5rem 0;
        background-color: var(--lightest);
    }
    
    .excellence-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }
    
    /* Grille optimisée pour les points d'excellence */
    .excellence-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2.5rem;
        margin-top: 1rem;
    }
    
    /* Carte avec design amélioré pour chaque point d'excellence */
    .excellence-item {
        position: relative;
        background: var(--white);
        border-radius: var(--radius-md);
        padding: 2.5rem;
        box-shadow: var(--shadow-md);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        z-index: 2;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.03);
        animation: cardAppear 0.6s ease forwards;
        opacity: 1;
        transform: translateY(0);
    }
    
    .excellence-item:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }
    
    /* Animation d'apparition des cartes par rangée */
    .excellence-item:nth-child(1) { animation-delay: 0.1s; }
    .excellence-item:nth-child(2) { animation-delay: 0.2s; }
    .excellence-item:nth-child(3) { animation-delay: 0.3s; }
    .excellence-item:nth-child(4) { animation-delay: 0.4s; }
    .excellence-item:nth-child(5) { animation-delay: 0.5s; }
    .excellence-item:nth-child(6) { animation-delay: 0.6s; }
    
    /* Accent de couleur dynamique */
    .excellence-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background-color: var(--primary);
        transition: var(--transition);
    }
    
    .excellence-item:nth-child(even)::before {
        background-color: var(--secondary);
    }
    
    .excellence-item:nth-child(3n)::before {
        background-color: var(--third);
    }
    
    .excellence-item:hover::before {
        height: 8px;
    }
    
    /* Motif de fond subtil */
    .excellence-item::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 60%;
        height: 60%;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5z' fill='%233a7bd5' fill-opacity='0.025' fill-rule='evenodd'/%3E%3C/svg%3E");
        background-size: 120%;
        background-position: bottom right;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    
    .excellence-item:hover::after {
        opacity: 1;
    }
    
    /* Icône avec animation plus légère */
    .excellence-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        background: var(--primary-light);
        border-radius: var(--radius-full);
        margin-bottom: 1.5rem;
        position: relative;
        transition: transform 0.3s ease;
        border: 1px solid rgba(58, 123, 213, 0.1);
    }
    
    .excellence-item:nth-child(even) .excellence-icon {
        background: var(--secondary-light);
        border: 1px solid rgba(54, 179, 126, 0.1);
    }
    
    .excellence-item:nth-child(3n) .excellence-icon {
        background: var(--third-light);
        border: 1px solid rgba(127, 127, 127, 0.1);
    }
    
    .excellence-item:hover .excellence-icon {
        transform: scale(1.05);
    }
    
    /* Animation d'apparition pour l'icône */
    .excellence-icon::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: var(--radius-full);
        background-color: var(--primary);
        opacity: 0;
        z-index: -1;
        transition: var(--transition);
        transform: scale(0.8);
    }
    
    .excellence-item:nth-child(even) .excellence-icon::before {
        background-color: var(--secondary);
    }
    
    .excellence-item:nth-child(3n) .excellence-icon::before {
        background-color: var(--third);
    }
    
    .excellence-item:hover .excellence-icon::before {
        opacity: 0.1;
        transform: scale(1.2);
    }
    
    .excellence-icon svg {
        width: 38px;
        height: 38px;
        fill: var(--primary);
        transition: var(--transition);
    }
    
    .excellence-item:nth-child(even) .excellence-icon svg {
        fill: var(--secondary);
    }
    
    .excellence-item:nth-child(3n) .excellence-icon svg {
        fill: var(--third);
    }
    
    .excellence-item:hover .excellence-icon svg {
        transform: scale(1.1);
    }
    
    /* Style de titre amélioré */
    .excellence-title {
        font-family: 'Jost', sans-serif;
        font-size: 1.6rem;
        color: var(--dark);
        margin-bottom: 1.2rem;
        position: relative;
        padding-bottom: 1rem;
        font-weight: 300;
        letter-spacing: 0.5px;
    }
    
    .excellence-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 3px;
        background-color: var(--primary);
        border-radius: var(--radius-full);
        transition: var(--transition);
    }
    
    .excellence-item:nth-child(even) .excellence-title::after {
        background-color: var(--secondary);
    }
    
    .excellence-item:nth-child(3n) .excellence-title::after {
        background-color: var(--third);
    }
    
    .excellence-item:hover .excellence-title::after {
        width: 80px;
    }
    
    /* Texte descriptif optimisé */
    .excellence-text {
        font-size: 1.05rem;
        line-height: 1.7;
        color: var(--light-text);
    }
    
    /* Animations améliorées */
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
    
    /* Design responsive soigné */
    @media (max-width: 1200px) {
        .excellence-grid {
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }
    }
    
    @media (max-width: 992px) {
        .header-title {
            font-size: 3rem;
        }
        
        .excellence-item {
            padding: 2rem;
        }
        
        .excellence-grid {
            gap: 1.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .excellence-header {
            height: 350px;
            padding-top: 90px;
        }
        
        .header-title {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .excellence-main {
            padding: 4rem 0;
        }
        
        .excellence-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .excellence-icon {
            width: 70px;
            height: 70px;
        }
        
        .excellence-title {
            font-size: 1.4rem;
        }
    }
    
    @media (max-width: 480px) {
        .header-title {
            font-size: 2.2rem;
        }
        
        .excellence-item {
            padding: 1.8rem;
        }
        
        .excellence-grid {
            grid-template-columns: 1fr;
        }
        
        .excellence-icon {
            width: 65px;
            height: 65px;
            margin-bottom: 1.2rem;
        }
        
        .excellence-icon svg {
            width: 32px;
            height: 32px;
        }
        
        .excellence-title {
            font-size: 1.3rem;
            padding-bottom: 0.8rem;
            margin-bottom: 1rem;
        }
        
        .excellence-text {
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('additional_scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ajouter des animations subties lors du survol
        const excellenceItems = document.querySelectorAll('.excellence-item');
        
        // Effet d'élévation progressive au survol
        excellenceItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.zIndex = "10";
            });
            
            item.addEventListener('mouseleave', function() {
                setTimeout(() => {
                    this.style.zIndex = "2";
                }, 300);
            });
        });
        
        // Animation au scroll pour les éléments hors écran
        const animateOnScroll = () => {
            excellenceItems.forEach(item => {
                const rect = item.getBoundingClientRect();
                const windowHeight = window.innerHeight || document.documentElement.clientHeight;
                
                // Si l'élément est entré dans la zone visible
                if (rect.top <= windowHeight * 0.9 && rect.bottom >= 0) {
                    item.style.opacity = "1";
                    item.style.transform = "translateY(0)";
                }
            });
        };
        
        // Déclencher au scroll avec throttling pour les performances
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (!scrollTimeout) {
                scrollTimeout = setTimeout(() => {
                    animateOnScroll();
                    scrollTimeout = null;
                }, 50);
            }
        });
    });
</script>
@endsection

@section('content')
<!-- Header -->
<header class="excellence-header">
    <div class="header-pattern"></div>
    <div class="header-content">
        <h1 class="header-title">Nos points d'excellence</h1>
    </div>
</header>

<!-- Section principale avec cartes dynamiques -->
<section class="excellence-main">
    <div class="excellence-container">
        <div class="excellence-grid">
            <!-- Point d'excellence 1 -->
            <div class="excellence-item">
                <div class="excellence-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21,5H3C2.447,5,2,5.448,2,6v12c0,0.552,0.447,1,1,1h18c0.553,0,1-0.448,1-1V6C22,5.448,21.553,5,21,5z M20,17H4V7h16V17z"/>
                        <path d="M12,9c1.654,0,3,1.346,3,3s-1.346,3-3,3s-3-1.346-3-3S10.346,9,12,9z"/>
                    </svg>
                </div>
                <h3 class="excellence-title">Expertise approfondie</h3>
                <p class="excellence-text">Notre équipe pluridisciplinaire possède une connaissance inégalée des marchés internationaux et des dynamiques transculturelles. Nous apportons des insights stratégiques qui vous permettent de prendre des décisions éclairées et optimales pour votre développement.</p>
            </div>
            
            <!-- Point d'excellence 2 -->
            <div class="excellence-item">
                <div class="excellence-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8s3.589-8,8-8 s8,3.589,8,8S16.411,20,12,20z"/>
                        <path d="M13 7L11 7 11 13 17 13 17 11 13 11z"/>
                    </svg>
                </div>
                <h3 class="excellence-title">Réactivité maximale</h3>
                <p class="excellence-text">Dans un environnement commercial en perpétuelle évolution, notre capacité d'adaptation et notre réactivité font toute la différence. Nous vous garantissons des délais d'intervention optimaux et une flexibilité sans compromis pour répondre à vos besoins urgents.</p>
            </div>
            
            <!-- Point d'excellence 3 -->
            <div class="excellence-item">
                <div class="excellence-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19,5h-2V3c0-0.552-0.447-1-1-1H8C7.447,2,7,2.448,7,3v2H5C3.895,5,3,5.895,3,7v12c0,1.105,0.895,2,2,2h14 c1.105,0,2-0.895,2-2V7C21,5.895,20.105,5,19,5z M9,4h6v1H9V4z M19,19H5V7h14V19z"/>
                        <path d="M12,9c-1.657,0-3,1.343-3,3s1.343,3,3,3s3-1.343,3-3S13.657,9,12,9z"/>
                    </svg>
                </div>
                <h3 class="excellence-title">Solutions sur mesure</h3>
                <p class="excellence-text">Chaque entreprise est unique, c'est pourquoi nous concevons des stratégies personnalisées qui s'alignent parfaitement avec vos objectifs et votre culture d'entreprise. Nos approches sur mesure garantissent une mise en œuvre efficace et des résultats tangibles.</p>
            </div>
            <!-- Point d'excellence 4 -->
            <div class="excellence-item">
                <div class="excellence-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,2H4C2.9,2,2,2.9,2,4v16c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V4C22,2.9,21.1,2,20,2z M20,20H4V4h16V20z"/>
                        <path d="M7,12h2v2H7V12z M11,12h2v2h-2V12z M15,12h2v2h-2V12z M7,8h2v2H7V8z M11,8h2v2h-2V8z M15,8h2v2h-2V8z M7,16h2v2H7V16z M11,16h2v2h-2V16z M15,16h2v2h-2V16z"/>
                    </svg>
                </div>
                <h3 class="excellence-title">Accompagnement continu</h3>
                <p class="excellence-text">Notre engagement ne s'arrête pas à la livraison d'une mission. Nous assurons un suivi régulier et maintenons une communication transparente pour garantir la pérennité de vos succès. Notre approche collaborative crée une relation de confiance durable.</p>
            </div>

            <!-- Point d'excellence 5 -->
            <div class="excellence-item">
                <div class="excellence-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M12,20c-4.41,0-8-3.59-8-8s3.59-8,8-8s8,3.59,8,8 S16.41,20,12,20z"/>
                        <path d="M11,7h2v7h-2V7z M11,15h2v2h-2V15z"/>
                    </svg>
                </div>
                <h3 class="excellence-title">Innovation constante</h3>
                <p class="excellence-text">Nous investissons continuellement dans la recherche et le développement de nouvelles méthodologies. Notre veille active des tendances internationales nous permet de vous proposer des solutions innovantes et adaptées aux évolutions du marché.</p>
            </div>

            <!-- Point d'excellence 6 -->
            <div class="excellence-item">
                <div class="excellence-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16,2H8C6.9,2,6,2.9,6,4v16c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M16,20H8V4h8V20z"/>
                        <path d="M12,17c0.6,0,1-0.4,1-1s-0.4-1-1-1s-1,0.4-1,1S11.4,17,12,17z"/>
                    </svg>
                </div>
                <h3 class="excellence-title">Réseau international</h3>
                <p class="excellence-text">Notre vaste réseau de partenaires et d'experts locaux nous permet d'offrir une couverture mondiale. Cette présence internationale garantit une compréhension approfondie des marchés locaux et facilite vos démarches d'expansion.</p>
            </div>
        </div>
    </div>
</section>

@endsection 

