// Attendre que le DOM soit chargé
document.addEventListener('DOMContentLoaded', function() {
    // Animation du carousel
    const carouselSlides = document.querySelectorAll('.carousel-slide');
    let currentSlide = 0;
    
    // Fonction pour changer de slide
    function nextSlide() {
        if (carouselSlides.length > 0) {
            carouselSlides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % carouselSlides.length;
            carouselSlides[currentSlide].classList.add('active');
        }
    }
    
    // Change de slide toutes les 5 secondes
    if (carouselSlides.length > 0) {
        setInterval(nextSlide, 5000);
    }
    
    // ======== MENU MOBILE AVEC DROPDOWNS ========
    // Éléments DOM
    const hamburger = document.getElementById('hamburger');
    const navbarMenu = document.getElementById('navbarMenu');
    const menuOverlay = document.getElementById('menuOverlay');
    const body = document.body;
    
    // Fonction pour ouvrir/fermer le menu
    function toggleMenu() {
        navbarMenu.classList.toggle('show');
        hamburger.classList.toggle('active');
        if (menuOverlay) {
            menuOverlay.classList.toggle('active');
        }
        body.classList.toggle('menu-open');
        
        // Bloquer le scroll du body quand le menu est ouvert
        if (body.classList.contains('menu-open')) {
            body.style.overflow = 'hidden';
        } else {
            body.style.overflow = '';
        }
        
        // Amélioration de l'accessibilité avec aria-expanded
        const isExpanded = navbarMenu.classList.contains('show');
        hamburger.setAttribute('aria-expanded', isExpanded);
    }
    
    // Gestionnaire pour le menu hamburger
    if (hamburger && navbarMenu) {
        hamburger.addEventListener('click', toggleMenu);
        
        // Fermer le menu quand on clique sur l'overlay
        if (menuOverlay) {
            menuOverlay.addEventListener('click', toggleMenu);
        }
    }
    
    // ======== GESTION DES DROPDOWNS MOBILE ========
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    if (dropdownToggles.length > 0) {
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const parent = this.parentElement;
                    const isCurrentlyActive = parent.classList.contains('active');
                    
                    // Fermer tous les autres dropdowns
                    document.querySelectorAll('.navbar-item.active').forEach(item => {
                        if (item !== parent) {
                            item.classList.remove('active');
                        }
                    });
                    
                    // Toggle le dropdown actuel
                    if (isCurrentlyActive) {
                        parent.classList.remove('active');
                    } else {
                        parent.classList.add('active');
                    }
                }
            });
        });
    }
    
    // Gérer les clics sur les liens du menu mobile (pas les dropdowns)
    const navbarLinks = document.querySelectorAll('.navbar-link:not(.dropdown-toggle)');
    navbarLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768 && body.classList.contains('menu-open')) {
                toggleMenu();
            }
        });
    });
    
    // Gérer les clics sur les items des dropdowns
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            if (window.innerWidth <= 768 && body.classList.contains('menu-open')) {
                toggleMenu();
            }
        });
    });
    
    // Adapter le menu au resize de la fenêtre
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            if (navbarMenu && navbarMenu.classList.contains('show')) {
                navbarMenu.classList.remove('show');
                hamburger.classList.remove('active');
                if (menuOverlay) {
                    menuOverlay.classList.remove('active');
                }
                body.classList.remove('menu-open');
                body.style.overflow = '';
            }
            
            // Réinitialiser les dropdowns
            document.querySelectorAll('.navbar-item.active').forEach(item => {
                item.classList.remove('active');
            });
        }
    });
    
    // Fermer le menu avec la touche Escape
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && body.classList.contains('menu-open')) {
            toggleMenu();
        }
    });

    // Assurer que le menu prend toute la largeur
    function adjustMenuWidth() {
        if (window.innerWidth <= 768 && navbarMenu) {
            navbarMenu.style.width = window.innerWidth + 'px';
        }
    }
    
    // Ajuster au chargement et au redimensionnement
    adjustMenuWidth();
    window.addEventListener('resize', adjustMenuWidth);
});
