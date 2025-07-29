@extends('layouts.app')

@section('title', $prestation->title . ' - AMARINTE')

@section('footer')


@section('content')
<div class="prestation-hero">
    <div class="prestation-hero-image">
    </div>
    <div class="prestation-hero-content">
        <h1 class="prestation-hero-title">{{ $prestation->title }}</h1>
        <div class="prestation-description">
            <p>{!! nl2br(e($prestation->description)) !!}</p>
        </div>
        <div class="prestation-image">
            <img src="{{ asset('storage/'.$prestation->middle_image) }}" alt="{{ $prestation->title }}">
        </div>
        <div class="format-box">
            <div class="format-title-container">
                <p class="format-title">{{ $prestation->format_title }}</p>
            </div>
            <div class="format-content">
                {!! nl2br(e($prestation->format_content)) !!}
            </div>
        </div>
    </div>
</div>

<div class="memory-cards-section">
    <div class="memory-cards-container">
        @foreach($prestation->memoryCards as $i => $memoryCard)
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="{{ asset('storage/'.$memoryCard->image) }}" alt="{{ $memoryCard->continent }}">
                    <div class="continent-icon">
                        <img src="{{ asset('images/prestations/continent/' . strtolower($memoryCard->continent) . '.png') }}" alt="{{ $memoryCard->continent }}">
                    </div>
                    <div class="sector-label">
                        <span>SECTEUR D'ACTIVITÉ</span>
                        <h3>{{ $memoryCard->sector }}</h3>
                    </div>
                    <button class="flip-card-btn" onclick="flipCard(this.closest('.memory-card')); event.stopPropagation();">
                        Tourner la carte
                    </button>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>{!! nl2br(e($memoryCard->description)) !!}</p>
                        <button class="voir-plus-btn" data-content="{{ $memoryCard->content }}" onclick="openCasePopup('{{ addslashes($memoryCard->content) }}', event); event.stopPropagation();">
                            <span>Voir plus</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Popup pour le cas complet -->
<div id="casePopup" class="popup">
    <div class="popup-content">
        <span class="close-popup" onclick="closeCasePopup()">&times;</span>
        <div class="popup-body">
            <p id="popupDescription"></p>
        </div>
    </div>
</div>
@endsection

<style>
@import url('https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&display=swap');
:root {
    --primary-color: #eaf1dd;
    --secondary-color: #72717c;
    --accent-color: #eaf1dd;
    --light-gray: #f5f7f9;
    --dark-gray: #72717c;
    --accent-blue: #4c8fbb;
}
.prestation-hero {
    width: 100%;
    position: relative;
    margin-top: 65px;
}
.prestation-hero-image {
    width: 100%;
    height: 40vh;
    background-image: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.5)), url('{{ asset('storage/'.$prestation->hero_image) }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
}
.prestation-hero-content {
    text-align: center;
    max-width: 800px;
    padding: 40px 20px;
    margin: 0 auto;
}
.prestation-hero-title {
    font-family: 'Jost', sans-serif;
    font-size: 42px;
    color: #46454c;
    letter-spacing: 4px;
    font-weight: 300;
    text-transform: uppercase;
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
}
.prestation-description {
    margin-top: 40px;
    text-align: left;
}
.prestation-description p {
    font-family: 'Jost', sans-serif;
    font-size: 18px;
    line-height: 1.8;
    color: #4d4c53;
    margin-bottom: 10px;
    font-weight: 300;
    white-space: pre-line;
}
.prestation-image {
    margin: 40px auto;
    max-width: 100%;
}
.prestation-image img {
    max-width: 100%;
    height: auto;
}
.format-box {
    border: 4px solid var(--primary-color);
    border-radius: 15px;
    padding: 25px;
    margin: 40px auto;
    max-width: 800px;
    text-align: center;
    position: relative;
}
.format-title-container {
    position: absolute;
    top: 0px;
    left: 0;
    width: 100%;
    text-align: center;
}
.format-title {
    font-family: 'Jost', sans-serif;
    font-size: 38px;
    font-weight: 300;
    color: #000000;
    display: inline-block;
    background-color: white;
    padding: 0 20px;
    letter-spacing: 2px;
    margin: 0;
}
.format-content {
    font-family: 'Jost', sans-serif;
    font-size: 18px;
    color: #4d4c53;
    line-height: 1.5;
    font-weight: 300;
    margin-top: 35px;
}
.format-content p {
    margin-bottom: 10px;
}
.memory-cards-section {
    padding: 60px 20px;
    background-color: var(--light-gray);
}
.memory-cards-container {
    display: grid;
    grid-template-columns: repeat(3, 400px);
    gap: 25px;
    max-width: 1400px;
    margin: 0 auto;
    justify-content: center;
}

@media (max-width: 1250px) {
    .memory-cards-container {
        grid-template-columns: repeat(2, 400px);
    }
}

@media (max-width: 850px) {
    .memory-cards-container {
        grid-template-columns: 400px;
    }
}

.memory-card {
    width: 400px;
    height: 500px;
    cursor: pointer;
    margin: 0 auto;
    position: relative;
}

.card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.6s ease;
    transform-style: preserve-3d;
}

.card-front, .card-back {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 15px;
    overflow: hidden;
    transition: opacity 0.3s ease;
}

.card-front {
    background-color: white;
    opacity: 1;
    z-index: 2;
    position: relative;
}

.card-front::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.3);
    z-index: 1;
    border-radius: 15px;
}

.card-front img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 0;
}

.card-back {
    background: linear-gradient(to right, #e7efd9, #dfe9cb);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 30px;
    box-sizing: border-box;
    opacity: 0;
    z-index: 1;
    transform: rotateY(180deg);
}

/* Quand la carte est retournée */
.memory-card.flipped .card-front {
    opacity: 0;
    z-index: 1;
}

.memory-card.flipped .card-back {
    opacity: 1;
    z-index: 2;
}

.memory-card.flipped .card-inner {
    transform: rotateY(180deg);
}

.continent-icon {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 40px;
    height: 40px;
    background-color: white;
    border-radius: 50%;
    padding: 5px;
    z-index: 3;
}

.continent-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.sector-label {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.85);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    z-index: 2;
    border-radius: 15px;
}

.sector-label span {
    display: block;
    font-family: 'Jost', sans-serif;
    font-size: 12px;
    font-weight: 500;
    color: var(--accent-blue);
    letter-spacing: 1px;
    margin-bottom: 5px;
}

.sector-label h3 {
    font-family: 'Jost', sans-serif;
    font-size: 20px;
    font-weight: 500;
    color: #2a2a2a;
    margin: 0;
}

.flip-card-btn {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: var(--accent-blue);
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 20px;
    font-family: 'Jost', sans-serif;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    z-index: 10;
}

.flip-card-btn:hover {
    background-color: #3a7a9e;
    transform: translateX(-50%) scale(1.05);
}

.case-description {
    margin-top: 0;
    text-align: left;
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.case-description p {
    font-family: 'Jost', sans-serif;
    font-size: 16px;
    line-height: 1.6;
    color: #4d4c53;
    margin-bottom: 20px;
    flex-grow: 1;
    overflow-y: auto;
    max-height: 80%;
}

.voir-plus-btn {
    background-color: var(--accent-blue);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 20px;
    font-family: 'Jost', sans-serif;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 100%;
    max-width: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    position: relative;
    z-index: 20;
    min-height: 44px;
}

.voir-plus-btn span {
    display: block;
    width: 100%;
    text-align: center;
    pointer-events: none;
}

.voir-plus-btn:hover {
    background-color: #3a7a9e;
    transform: scale(1.05);
}

.popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    z-index: 1000;
    backdrop-filter: blur(5px);
}

.popup-content {
    position: relative;
    background-color: white;
    margin: 5% auto;
    padding: 40px;
    width: 90%;
    max-width: 800px;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    animation: popupFadeIn 0.3s ease;
}

@keyframes popupFadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.close-popup {
    position: absolute;
    right: 25px;
    top: 20px;
    font-size: 35px;
    cursor: pointer;
    color: #2a2a2a;
    transition: transform 0.3s ease;
}

.close-popup:hover {
    transform: rotate(90deg);
}

.popup-body {
    margin-top: 30px;
}

.popup-body p {
    font-family: 'Jost', sans-serif;
    font-size: 18px;
    line-height: 1.8;
    color: #4d4c53;
    text-align: justify;
}

/* Styles pour la version mobile */
@media (max-width: 768px) {
    .prestation-hero {
        margin-top: 0;
    }
    
    .prestation-hero-image {
        display: none;
    }
    
    .prestation-hero-title {
        font-size: 32px;
        margin-top: 30px;
    }
    
    .prestation-hero-content {
        padding: 30px 20px;
    }
    
    .prestation-description {
        padding: 0 15px;
        max-width: 90%;
        margin: 30px auto;
    }
    
    .prestation-description p {
        font-size: 16px;
    }
    
    /* Réduire la taille de l'image centrale */
    .prestation-image {
        margin: 30px auto;
        max-width: 90%;
    }
    
    .prestation-image img {
        max-width: 100%;
    }
    
    /* Réduire le contour du format-box */
    .format-box {
        margin: 30px 10px;
        padding: 20px 15px;
        border-width: 3px;
        max-width: 90%;
    }
    
    .format-title {
        font-size: 28px;
    }
    
    .format-content {
        font-size: 16px;
        margin-top: 30px;
    }
    
    /* Ajuster les cartes pour la version mobile */
    .memory-cards-section {
        padding: 40px 15px;
    }
    
    .memory-cards-container {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .memory-card {
        width: 100%;
        max-width: 350px;
        height: 450px;
    }
    
    .card-front, .card-back {
        width: 100%;
        height: 450px;
    }
    
    /* Améliorer la popup pour mobile */
    .popup-content {
        padding: 25px 15px;
        margin: 15% auto;
        width: 92%;
        max-height: 80vh;
        overflow-y: auto;
    }
    
    .popup-body {
        margin-top: 20px;
    }
    
    .popup-body p {
        font-size: 16px;
        line-height: 1.6;
        padding: 0 5px;
    }
    
    .close-popup {
        right: 15px;
        top: 15px;
        font-size: 30px;
    }
}
</style>

<script>
function flipCard(card) {
    card.classList.toggle('flipped');
}

function openCasePopup(content, event) {
    if (event) {
        event.stopPropagation();
        event.preventDefault();
    }
    
    const popup = document.getElementById('casePopup');
    const description = document.getElementById('popupDescription');
    
    // Affiche le contenu complet de la memory card
    description.innerHTML = content ? content.replace(/\n/g, '<br>') : '';
    popup.style.display = "block";
    
    // Empêcher la propagation du scroll
    document.body.style.overflow = 'hidden';
}

function closeCasePopup() {
    document.getElementById('casePopup').style.display = "none";
    // Réactiver le scroll
    document.body.style.overflow = 'auto';
}

// Fermer le popup en cliquant à l'extérieur
window.onclick = function(event) {
    const popup = document.getElementById('casePopup');
    if (event.target == popup) {
        closeCasePopup();
    }
}

// Empêcher que les boutons "Voir plus" fassent tourner la carte
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.voir-plus-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            e.preventDefault();
            const content = this.getAttribute('data-content');
            openCasePopup(content, e);
        });
    });
});
</script> 