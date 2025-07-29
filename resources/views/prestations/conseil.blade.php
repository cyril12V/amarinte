@extends('layouts.app')

@section('title', 'Conseil & Due diligence - AMARINTE')

@section('footer')


@section('content')
<div class="prestation-hero">
    <div class="prestation-hero-image">
    </div>
    <div class="prestation-hero-content">
        <h1 class="prestation-hero-title">Conseil & Due diligence</h1>
        <div class="prestation-description">
            <p>L'intervention est conçue finement sur mesure en fonction du problème posé.</p>
            <p>Elle peut faire appel à tout ou partie de la méthode suivante :</p>
        </div>
        <div class="prestation-image">
            <img src="../images/prestations/conseil.png" alt="Conseil & Due diligence">
        </div>
        <div class="format-box">
            <p class="format-title">Format</p>
            <div class="format-content">
                <p>Conseil : typiquement 10 à 20 jours de travail répartis sur 2 à 4 mois</p>
                <p>Due diligence : typiquement 10 jours de travail répartis sur 1 mois et demi</p>
            </div>
        </div>
    </div>
</div>

<div class="memory-cards-section">
    <div class="memory-cards-container">
        <!-- Carte 1 - Restauration rapide -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Restauration rapide">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(1, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 2 - Snacks apéritif -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Snacks">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(2, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 3 - Coopérative céréalière -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Agriculture">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(3, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 4 - Pâtisserie haut de gamme -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Pâtisserie">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(4, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 5 - Matériaux de construction -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1541888946425-d681bb8c7a37?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Construction">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/africa.png" alt="Afrique">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(5, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 6 - Travaux publics -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1581092921461-39b9d08a9b21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Travaux publics">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/africa.png" alt="Afrique">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(6, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 7 - Enseignes lumineuses -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Signalétique">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(7, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 8 - Pierres tombales -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Pierre">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(8, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 9 - Décoration vintage -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Décoration">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(9, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 10 - Prothèses mammaires -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Médical">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/america.png" alt="Amérique">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(10, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 11 - Centres d'amaigrissement -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Santé">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(11, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 12 - Analyses de sols -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1592982537447-7440770cbfc9?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Agronomie">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(12, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 13 - Machines anti-cellulite -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Esthétique">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(13, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 14 - Stents biorésorbables -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Médical">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/america.png" alt="Amérique">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(14, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 15 - Modèles prédictifs -->
        <div class="memory-card" onclick="flipCard(this)">
            <div class="card-inner">
                <div class="card-front">
                    <img src="https://images.unsplash.com/photo-1581092921461-39b9d08a9b21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Hydrologie">
                    <div class="continent-icon">
                        <img src="../images/prestations/continent/europe.png" alt="Europe">
                    </div>
                </div>
                <div class="card-back">
                    <div class="case-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <button class="voir-plus-btn" onclick="openCasePopup(15, event)">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>
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
    background-image: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.5)), url('../images/section_contact.png');
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
    padding: 40px;
    margin: 40px auto;
    max-width: 800px;
    text-align: center;
}

.format-title {
    font-family: 'Jost', sans-serif;
    font-size: 38px;
    font-weight: 300;
    color: #46454c;
    margin-bottom: 30px;
    text-align: center;
    letter-spacing: 2px;
}

.format-content {
    font-family: 'Jost', sans-serif;
    font-size: 18px;
    color: #4d4c53;
    line-height: 1.8;
    font-weight: 300;
}

.format-content p {
    margin-bottom: 15px;
}

/* Styles pour les cartes Memory */
.memory-cards-section {
    padding: 60px 20px;
    background-color: var(--light-gray);
}

.memory-cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

.memory-card {
    perspective: 1000px;
    height: 450px;
    cursor: pointer;
}

.card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    transition: transform 0.8s;
    transform-style: preserve-3d;
}

.memory-card.flipped .card-inner {
    transform: rotateY(180deg);
}

.card-front, .card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 15px;
    overflow: hidden;
}

.card-front {
    background-color: white;
}

.card-front img {
    width: 100%;
    height: 100%;
    object-fit: cover;
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
}

.continent-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.card-back {
    background-color: var(--primary-color);
    transform: rotateY(180deg);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 30px;
    text-align: center;
}

.case-description {
    margin-top: 0;
    text-align: left;
    position: relative;
    width: 100%;
}

.case-description p {
    font-family: 'Jost', sans-serif;
    font-size: 16px;
    line-height: 1.6;
    color: #4d4c53;
    margin-bottom: 20px;
    /* Limiter à 5 lignes */
    display: -webkit-box;
    -webkit-line-clamp: 5;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.voir-plus-btn {
    background-color: var(--accent-blue);
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 20px;
    font-family: 'Jost', sans-serif;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.voir-plus-btn:hover {
    background-color: #3a7a9e;
}

/* Styles pour le popup */
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
</style>

<script>
function flipCard(card) {
    card.classList.toggle('flipped');
}

function openCasePopup(cardId, event) {
    event.stopPropagation(); // Empêche le retournement de la carte
    const popup = document.getElementById('casePopup');
    const description = document.getElementById('popupDescription');
    
    const cases = {
        1: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        2: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        3: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        4: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        5: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        6: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        7: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        8: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        9: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        10: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        11: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        12: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        13: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        14: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        },
        15: {
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        }
    };

    description.textContent = cases[cardId].description;
    popup.style.display = "block";
}

function closeCasePopup() {
    document.getElementById('casePopup').style.display = "none";
}

// Fermer le popup en cliquant en dehors
window.onclick = function(event) {
    const popup = document.getElementById('casePopup');
    if (event.target == popup) {
        popup.style.display = "none";
    }
}
</script>
