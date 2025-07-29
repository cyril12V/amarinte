@extends('layouts.app')

@section('title', 'Contact - AMARINTE')

@section('footer')


@section('additional_styles')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
<style>
  @media (max-width: 768px) {
    .contact-baseline {
      display: none !important;
    }
  }
</style>
@endsection

@section('additional_scripts')
<script src="{{ asset('js/contact.js') }}"></script>
@endsection

@section('content')
<!-- En-tête mobile générique (visible uniquement sur mobile) -->
<div class="mobile-page-header" style="display: none;">
    <h1 class="mobile-page-title">Nous contacter</h1>
    <p class="mobile-page-subtitle">Stratégies pour croître à l'international</p>
</div>

<!-- Section héro avec image en arrière-plan -->
<div class="contact-hero">
    <div class="contact-hero-image">
        <div class="contact-hero-content">
            <h1 class="contact-hero-title">Nous contacter</h1>
        </div>
    </div>
    
</div>

<!-- Baseline sous l'image -->
<div class="contact-baseline">
Stratégies pour croitre à l'international</div>

<!-- Section principale avec fond texturé -->
<div class="contact-main">
    <div class="contact-container">
        
        <div class="contact-content">
            <!-- Formulaire de contact -->
            <div class="contact-form-container">
                <h3 class="contact-form-title">Formulaire</h3>
                
                <div id="formErrors" class="mt-3"></div>
                <div id="formSuccess" class="mt-3">Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.</div>
                
                <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label" for="nom">Votre nom :</label>
                        <input type="text" id="nom" name="nom" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="prenom">Votre prénom :</label>
                        <input type="text" id="prenom" name="prenom" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Votre email :</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="message">Votre message :</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <div class="custom-checkbox-container robot-check">
                            <input type="checkbox" id="not_robot" name="not_robot" class="custom-checkbox" required>
                            <label for="not_robot">Je ne suis pas un robot</label>
                        </div>
                        
                        <button type="submit" class="contact-submit">Envoyer</button>
                    </div>
                </form>
            </div>
            
            <!-- Informations de contact -->
            <div class="contact-info">
                <div class="contact-info-logo">
                    <img src="{{ asset('images/logoarbre.png') }}" alt="Logo AMARINTE">
                </div>
                
                <h3 class="info-title">AMARINTE</h3>
                <address class="contact-address">
                    Annick SVAY-DELECROIX<br>
                    28 rue de Fleury<br>
                    77300 Fontainebleau<br>
                    FRANCE<br>
                    <span class="contact-phone">Mob. +33 6 12 38 53 89</span>
                </address>
                
                <!-- Section réseaux sociaux -->
                <div class="contact-social">
                    <h4 class="social-title">Nous suivre</h4>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 