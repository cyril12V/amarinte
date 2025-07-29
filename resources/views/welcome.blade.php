@extends('layouts.app')

@section('title', 'AMARINTE – Stratégies de croissance internationale')

@section('content')
  <!-- Hero Carousel -->
  <div class="hero-container">
    <div class="hero-logo desktop-only">
      <img src="{{ asset('images/logoarbre.png') }}" alt="AMARINTE">
    </div>

    <section class="hero">
      <div class="carousel" id="carousel">
          <div class="carousel-slide active" style="background-image: url('{{ asset('images/carousel_1.png') }}')">
              <div class="carousel-overlay">
              <p class="carousel-text">Nous aidons les PME et ETI à croître à l'international</p>
              </div>
          </div>
          <div class="carousel-slide" style="background-image: url('{{ asset('images/carousel_2.png') }}')">
              <div class="carousel-overlay">
                  <p class="carousel-text">Nous assurons l'ingénierie pédagogique des formations et séminaires export</p>
              </div>
          </div>
          <div class="carousel-slide" style="background-image: url('{{ asset('images/carousel_3.png') }}')">
              <div class="carousel-overlay">
                  <p class="carousel-text">Nous mettons nos clients en relation avec des donneurs d'ordre ou des tiers de confiance, en France et à l'étranger</p>
              </div>
          </div>
          <div class="carousel-slide" style="background-image: url('{{ asset('images/carousel_4.png') }}')">
              <div class="carousel-overlay">
                  <p class="carousel-text">Nous les accompagnons dans le déploiement de cette stratégie</p>
              </div>
          </div>
          <div class="carousel-slide" style="background-image: url('{{ asset('images/carousel_5.png') }}')">
              <div class="carousel-overlay">
                  <p class="carousel-text">Nous éclairons les dirigeants dans leur stratégie internationale</p>
              </div>
          </div>
      </div>
    </section>
  </div>

  <!-- Baseline -->
  <div class="baseline">
    Stratégies pour croître à l'international
  </div>

  <!-- About Section -->
  <section class="about-section">
    <div class="container">
      <div class="left-aligned-text">
        <p class="about-text">
         Bien plus que la croissance sur le marché domestique, le développement international est porteur de complexité, de risques et d'effet systémique sur l'entreprise.
        </p>
      </div>

      <div class="bracketed-text-right">
        <p class="about-text">
          <span class="bracket-left">&#123;</span>
          Complexité de la distance physique, de l'interculturel ou encore de l'intermédiation locale ; risque issu de l'instabilité pays et du climat des affaires…
          Enfin, effet systémique, sur l'entreprise, de l'adaptation et de l'innovation à marche forcée pour répondre aux nécessités des marchés étrangers.
          <span class="bracket-right">&#125;</span>
        </p>
      </div>

      <div class="highlight-box">
        <p class="highlight-text">
          AMARINTE conseille, accompagne et forme<br>
          les dirigeants de PME et d'ETI<br>
          dans la stratégie internationale,<br>
          l'alignement de l'organisation export<br>
          et le déploiement des opérations à l'étranger.
        </p>
      </div>

      <div class="benefits-section">
        <p class="benefits-title">Ce faisant, nous vous aidons à :</p>
        <ul class="benefits-list">
          <li> - diversifier à bon escient, sur des projections justes, votre portefeuille pays ;<br>
          - sécuriser vos décisions export, l'établissement du Business plan afférent et sa mise en œuvre ; <br>
          - optimiser la performance de vos collaborateurs export, qu'ils soient dans ou hors de l'entreprise. </li>
        </ul>
      </div>
    </div>
  </section>

    <!-- Services Section with 3 buttons -->
    <section class="services-section">
      <div class="container services-container">
        <!-- CONSEIL -->
        <a href="{{ route('prestations.public.show', 1) }}" class="service-card">
          <div class="service-icon conseil">
            <img src="{{ asset('images/conseil_icon.png') }}" alt="Conseil" class="service-img">
          </div>
          <h3 class="service-title">CONSEIL</h3>
        </a>
  
        <!-- PILOTAGE -->
        <a href="{{ route('prestations.public.show', 2) }}" class="service-card">
          <div class="service-icon pilotage">
            <img src="{{ asset('images/pilotage_icon.png') }}" alt="Pilotage" class="service-img">
          </div>
          <h3 class="service-title">PILOTAGE</h3>
        </a>
  
        <!-- FORMATION -->
        <a href="{{ route('prestations.public.show', 3) }}" class="service-card">
          <div class="service-icon formation">
            <img src="{{ asset('images/formation_icon.png') }}" alt="Formation" class="service-img">
          </div>
          <h3 class="service-title">FORMATION</h3>
        </a>
      </div>
    </section>

  <!-- Video Section -->
  <section class="video-section">
    <div class="container">
      <div class="video-content">
        <div class="video-header">
          <h3 class="video-title">DECOUVRIR AMARINTE EN VIDEO          </h3>
          <p class="video-description">
            On me demande souvent ce qu'il faut entendre par "stratégie internationale", ce que je fais et apporte à mes clients. Voici en toute humilité comment j'exerce mon métier.
          </p>
        </div>
        
        <div class="video-container">
          <!-- Vidéo avec taille réduite -->
          <video id="presentation-video" controls poster="{{ asset('images/miniature_video.png') }}">
            <source src="{{ asset('videos/Amarinte_VFinale.mov') }}" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos.
          </video>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('additional_styles')
<style>
  /* Styles pour les écrans mobiles */
  .desktop-only {
    display: block;
  }
  
  .mobile-welcome-title {
    display: none;
    text-align: center;
    padding: 30px 20px;
    background-color: #f8f8f8;
    margin-bottom: 20px;
  }
  
  .mobile-welcome-title h1 {
    font-family: 'AUDREY', 'Jost', sans-serif;
    font-size: 32px;
    color: #72717c;
    margin-bottom: 10px;
    letter-spacing: 2px;
  }
  
  .mobile-welcome-title p {
    font-family: 'Jost', sans-serif;
    font-size: 18px;
    color: #333;
    margin: 0;
  }
  
  @media (max-width: 768px) {
    .desktop-only {
      display: none;
    }
    
    /* Masquer le carousel et la baseline en version mobile */
    .hero-container,
    .hero,
    .carousel,
    .baseline {
      display: none !important;
    }
    
    /* Afficher le titre mobile */
    .mobile-welcome-title {
      display: block;
    }
    
    /* Ajuster les styles de la vidéo */
    .video-container video {
      border-width: 10px;
      max-width: 100%;
      border-radius: 0;
    }
    
    .video-title {
      font-size: 24px;
    }
    
    .video-description {
      font-size: 16px;
      padding: 0 15px;
    }
    
    /* Ajuster les sections de services */
    .services-container {
      flex-direction: column;
      align-items: center;
    }
    
    .service-card {
      width: 100%;
      margin-bottom: 20px;
      max-width: 280px; /* Limiter la largeur pour un meilleur affichage */
    }
    
    /* Centre les médaillons de service */
    .services-section {
      padding: 30px 0;
    }
    
    .services-container {
      padding: 0 15px;
      justify-content: center;
    }
    
    /* Ajuster les sections de texte */
    .left-aligned-text,
    .bracketed-text-right,
    .highlight-box,
    .benefits-section {
      width: 90%;
      padding: 20px;
    }
    
    .bracketed-text-right {
      width: 80%;
    }
    
    .benefits-list li {
      font-size: 16px;
    }
  }
  
  @media (max-width: 576px) {
    .carousel-slide {
      height: 60vh; /* Hauteur réduite pour très petits écrans */
    }
    
    .carousel-text {
      font-size: 16px;
    }
    
    .video-container video {
      border-width: 5px;
    }
  }
</style>
@endsection