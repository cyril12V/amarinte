<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'AMARINTE – Stratégies de croissance internationale')</title>
  
  <!-- Vite Assets (Tailwind CSS) -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
  
  <!-- Polices Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500&display=swap" rel="stylesheet">
  
  <!-- Polices personnalisées -->
  <style>
    @font-face {
      font-family: 'AUDREY';
      src: url('{{ asset('fonts/AUDREY/AUDREY-Normal.otf') }}') format('opentype');
      font-weight: normal;
      font-style: normal;
      font-display: swap;
    }
    
    /* ====== NAVBAR DESKTOP (ORIGINALE) ====== */
    .navbar {
      height: auto;
      min-height: initial;
      padding: 5px 0;
      max-height: 65px;
      overflow: visible;
      margin-bottom: 0;
      position: relative;
      background-color: #72717c !important;
      color: white;
    }
    
    .navbar-wave-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 250%;
      background-image: url("{{ asset('images/wave_navbar.png') }}");
      background-size: 100% 100%;
      background-position: center;
      background-repeat: no-repeat;
      z-index: 1;
    }
    
    .mobile-logo {
      display: none;
    }
    
    .navbar-logo-image {
      height: 40px;
      width: auto;
    }
    
    .navbar-container {
      padding-top: 0;
      padding-bottom: 0;
      max-height: 55px;
      overflow: visible;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    
    .navbar-logo, .navbar-menu, .navbar-link, .navbar-item, .dropdown-menu, .dropdown-item, .hamburger {
      position: relative;
      z-index: 10;
    }
    
    /* Ajustements du logo */
    .navbar-logo {
      margin-left: 15px;
      padding-bottom: 10px;
      color: white;
      text-decoration: none;
      font-family: 'AUDREY', sans-serif;
      font-size: 24px;
      letter-spacing: 2px;
    }
    
    /* Ajustements des liens desktop */
    .navbar-link {
      color: rgba(255, 255, 255, 0.85) !important;
      font-size: 0.95em;
    }
    
    .navbar-link:hover {
      color: white !important;
    }
    
    .hamburger-line {
      background-color: white !important;
    }
    
    /* Dropdown desktop */
    .dropdown-menu {
      background-color: rgba(114, 113, 124, 0.9) !important;
    }
    
    .dropdown-item {
      color: rgba(255, 255, 255, 0.85) !important;
      font-size: 0.9em;
    }
    
    .dropdown-item:hover {
      background-color: rgba(255, 255, 255, 0.1) !important;
      color: white !important;
    }
    
    /* Supprime la marge entre la navbar et le contenu qui suit */
    main {
      margin-top: 0;
      padding-top: 0;
    }
    
    body {
      overflow-x: hidden;
    }

    /* Ajout pour le menu à droite */
    .navbar-menu {
      margin-left: auto;
    }
    
    /* Spacer pour maintenir les liens à droite */
    .navbar-spacer {
      flex-grow: 1;
    }
    
    /* Style pour le footer simplifié */
    .wave-footer-transition {
      width: 100%;
      overflow: hidden;
      line-height: 0;
      margin-top: 0;
      position: relative;
      z-index: 2;
      background: var(--lightest);
    }
    
    .wave-footer-image {
      width: 100%;
      object-fit: cover;
      display: block;
      transform: translateY(95px);
    }
    
    .simplified-footer {
      background-color: #72717c;
      padding: 25px 0;
      margin-top: -20px;
      position: relative;
      z-index: 1;
    }
    
    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 30px;
      position: relative;
      z-index: 2;
    }
    
    .footer-links {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      gap: 8px;
    }
    
    .footer-brand {
      color: #ffffff;
      font-family: 'Jost', sans-serif;
      font-size: 24px;
      font-weight: 400;
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-bottom: 5px;
    }
    
    .footer-credits {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
      justify-content: center;
    }
    
    .footer-link {
      color: white;
      text-decoration: none;
      font-family: 'Jost', sans-serif;
      font-size: 14px;
      font-weight: 300;
      font-style: italic;
      transition: all 0.3s ease;
    }
    
    .footer-link:hover {
      color: white;
      text-decoration: underline;
    }
    
    .footer-separator {
      color: rgba(255, 255, 255, 0.4);
      font-size: 14px;
      font-weight: 300;
      margin: 0 3px;
    }
    
    .footer-agency {
      color: white;
      font-family: 'Jost', sans-serif;
      font-size: 14px;
      font-weight: 300;
      font-style: italic;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .footer-agency:hover {
      color: white;
      text-decoration: underline;
    }
    
    /* ===== CORRECTIONS BANNIÈRES MOBILES ===== */
    @media (max-width: 768px) {
      .navbar-wave-image {
        display: none;
      }

      .navbar {
        position: fixed;
        width: 100%;
        background: #72717c !important;
        z-index: 1000;
        top: 0;
        height: 70px !important;
        max-height: 70px !important;
        padding: 10px 0;
      }

      .navbar-container {
        height: 100%;
        max-height: 70px;
        display: flex;
        align-items: center;
      }

      .hamburger {
        display: block;
        width: 30px;
        height: 25px;
        position: relative;
        cursor: pointer;
      }

      .hamburger-line {
        width: 100%;
        height: 3px;
        background-color: white !important;
        margin: 5px 0;
      }

      .navbar-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #72717c;
        padding: 20px 0;
      }

      .navbar-menu.show {
        display: block;
      }

      body {
        padding-top: 70px;
      }
      
      /* Corrections pour le footer en mobile */
      .simplified-footer {
        padding: 20px 0;
        margin-top: -15px;
      }
      
      .footer-content {
        padding: 0 20px;
      }
      
      .footer-brand {
        font-size: 20px;
        letter-spacing: 1.5px;
      }
      
      .footer-credits {
        flex-direction: column;
        gap: 5px;
      }
      
      .footer-separator {
        display: none;
      }
      
      .wave-footer-image {
        transform: translateY(12px);
      }
      
      .footer-link,
      .footer-agency {
        font-size: 13px;
      }
      
      /* Masquer toutes les bannières et textes en version mobile */
      .contact-hero-image,
      .prestation-hero-image,
      .excellence-header,
      .about-header,
      .partnership-header,
      .references-header,
      [class*="hero-image"],
      [class*="banner-image"],
      .partnership-description,
      .partnerships-intro {
        display: none !important;
      }

      /* Conteneur des partenaires */
      .partnerships-container {
        margin-top: 70px !important;
        padding: 20px !important;
        width: 100% !important;
      }

      /* Grille des partenaires */
      .partnerships-grid {
        display: flex !important;
        flex-wrap: wrap !important;
        justify-content: center !important;
        gap: 20px !important;
        width: 90% !important;
        margin: 0 auto !important;
      }

      /* Items des partenaires */
      .partnership-item {
        width: calc(50% - 10px) !important;
        margin: 0 !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
      }

      .partnership-item img {
        max-width: 100% !important;
        height: auto !important;
      }

      .about-section,
      .service-section,
      .prestation-content,
      .prestation-show {
        margin-top: 70px !important;
      }

      /* Ajustement pour le premier rond des services */
      .service-section .service-item:first-child {
        margin-top: 20px !important;
      }

      .prestation-hero-content {
        padding: 70px 20px;
      }

      .bio-container,
      .excellence-container,
      .references-container {
        margin-top: 70px !important;
      }

      /* Masquer le texte des partenaires */
      .partnerships-intro {
        display: none !important;
      }

      /* Affichage des partenaires en 2 colonnes */
      .partnerships-grid {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 20px !important;
        padding: 20px !important;
        margin-top: 70px !important;
      }

      .partnership-item {
        width: 100% !important;
        margin: 0 !important;
      }
    }
  </style>
  
  <!-- FontAwesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  
  <!-- Styles personnalisés -->
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  
  @yield('additional_styles')
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar" id="navbar">
    <div class="navbar-wave-image"></div>
    <div class="container navbar-container">
      <a href="{{ route('home') }}" class="navbar-logo mobile-logo">
        <img src="{{ asset('images/logoarbre.png') }}" alt="AMARINTE" class="navbar-logo-image">
      </a>
      <div class="navbar-spacer"></div>
      <button class="hamburger" id="hamburger" aria-label="Menu" aria-expanded="false">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </button>
      <div class="mobile-menu-overlay" id="menuOverlay"></div>
      <ul class="navbar-menu" id="navbarMenu">
        <li class="navbar-item">
          <a href="{{ route('home') }}" class="navbar-link">Accueil</a>
        </li>
        <li class="navbar-item">
          <div class="nav-item-container">
            <a href="#" class="navbar-link dropdown-toggle">Nos prestations</a>
            <div class="dropdown-menu">
              @foreach(\App\Models\Prestation::all() as $prestation)
                <a href="{{ route('prestations.public.show', $prestation) }}" class="dropdown-item">{{ $prestation->title }}</a>
              @endforeach
            </div>
          </div>
        </li>
        <li class="navbar-item">
          <div class="nav-item-container">
            <a href="#" class="navbar-link dropdown-toggle">Nous choisir</a>
            <div class="dropdown-menu">
              <a href="{{ route('about.who') }}" class="dropdown-item">Qui sommes-nous ?</a>
              <a href="{{ route('about.excellence') }}" class="dropdown-item">Nos points d'excellence</a>
              <a href="{{ route('about.partnerships') }}" class="dropdown-item">Partenariats</a>
              <a href="{{ route('about.references') }}" class="dropdown-item">Nos références</a>
            </div>
          </div>
        </li>
        <li class="navbar-item">
          <a href="{{ route('contact') }}" class="navbar-link">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Contenu principal -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  @hasSection('footer')
    @yield('footer')
  @else
  <!-- Vague de transition vers le footer -->
  <div class="wave-footer-transition">
    <img src="{{ asset('images/wave_footer2.png') }}" alt="" class="wave-footer-image">
  </div>
  
  <footer class="simplified-footer">
    <div class="footer-content">
      <div class="footer-links">
        <div class="footer-brand">AMARINTE</div>
        <div class="footer-credits">
          <a href="#" class="footer-link">Mention légale</a>
          <span class="footer-separator">|</span>
          <a href="https://elmdigitalagency.fr/" target="_blank" class="footer-agency">Site réalisé par ELM DIGITAL AGENCY</a>
        </div>
      </div>
    </div>
  </footer>
  @endif

  <!-- Scripts JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const hamburger = document.getElementById('hamburger');
      const navbarMenu = document.getElementById('navbarMenu');
      
      hamburger.addEventListener('click', function() {
        hamburger.classList.toggle('active');
        navbarMenu.classList.toggle('show');
      });
    });
  </script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/references-carousel.js') }}"></script>
  @yield('additional_scripts')
  @livewireScripts
</body>
</html> 