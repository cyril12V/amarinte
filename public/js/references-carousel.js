/**
 * Script JavaScript consolidé pour la gestion des carousels
 * Fusionne les fonctionnalités des différents carousels en une implémentation cohérente
 */
window.addEventListener('load', function() {
    console.log('[Carousel Script] Script loaded and window ready.');
    // ===== ÉLÉMENTS DOM COMMUNS =====
    const navbar = document.getElementById('navbar');
    const hamburger = document.getElementById('hamburger');
    const navbarMenu = document.getElementById('navbarMenu');
    const navbarItems = document.querySelectorAll('.navbar-item');
    
    // ===== GESTION DE LA NAVBAR =====
    function handleScroll() {
      if (window.scrollY > 50) {
        navbar?.classList.add('navbar-scrolled');
      } else {
        navbar?.classList.remove('navbar-scrolled');
      }
    }
    
    function toggleMenu() {
      navbarMenu?.classList.toggle('active');
      
      // Animation des lignes du hamburger pour former un X
      const hamburgerLines = hamburger?.querySelectorAll('.hamburger-line') || [];
      if (navbarMenu?.classList.contains('active')) {
        hamburgerLines[0]?.style.setProperty('transform', 'translateY(9px) rotate(45deg)');
        hamburgerLines[1]?.style.setProperty('opacity', '0');
        hamburgerLines[2]?.style.setProperty('transform', 'translateY(-9px) rotate(-45deg)');
      } else {
        hamburgerLines[0]?.style.setProperty('transform', 'none');
        hamburgerLines[1]?.style.setProperty('opacity', '1');
        hamburgerLines[2]?.style.setProperty('transform', 'none');
      }
    }
    
    function toggleDropdown(e) {
      if (window.innerWidth <= 768) {
        const parent = this;
        const dropdown = parent.querySelector('.dropdown-menu');
        
        if (dropdown) {
          e.preventDefault();
          parent.classList.toggle('active');
        }
      }
    }
    
    function closeMenuOnClickOutside(e) {
      if (navbarMenu?.classList.contains('active') && 
          !navbarMenu?.contains(e.target) && 
          !hamburger?.contains(e.target)) {
        toggleMenu();
      }
    }
    
    // ===== GESTION DES CAROUSELS =====
    // Fonction réutilisable pour initialiser tous les carousels
    function initializeCarousel(carouselId) {
      console.log(`[Carousel Init - ${carouselId}] Initializing...`);
      const carousel = document.getElementById(carouselId);
      if (!carousel) {
        console.error(`[Carousel Init - ${carouselId}] Carousel element with ID #${carouselId} not found.`);
        return null;
      }
      console.log(`[Carousel Init - ${carouselId}] Carousel element found:`, carousel);
      
      const track = carousel.querySelector('.carousel-track');
      const slides = Array.from(carousel.querySelectorAll('.carousel-slide, .reference-card'));
      const nextButton = carousel.querySelector('.carousel-button.next, [id$="next-button"]');
      const prevButton = carousel.querySelector('.carousel-button.prev, [id$="prev-button"]');
      const dots = Array.from(carousel.querySelectorAll('.carousel-dot'));
      
      if (!track) console.warn(`[Carousel Init - ${carouselId}] Track element (.carousel-track) not found.`);
      if (!slides.length) console.warn(`[Carousel Init - ${carouselId}] No slides (.carousel-slide, .reference-card) found.`);
      if (!nextButton) console.warn(`[Carousel Init - ${carouselId}] Next button (.carousel-button.next, [id$="next-button"]) not found.`);
      if (!prevButton) console.warn(`[Carousel Init - ${carouselId}] Prev button (.carousel-button.prev, [id$="prev-button"]) not found.`);
      if (!dots.length) console.warn(`[Carousel Init - ${carouselId}] No dots (.carousel-dot) found.`);
      
      if (!track || !slides.length) {
        console.error(`[Carousel Init - ${carouselId}] Essential elements (track or slides) missing. Aborting initialization.`);
        return null;
      }
      
      // État et configuration du carousel
      const carouselState = {
        currentIndex: 0,
        slideWidth: slides[0].offsetWidth + parseInt(window.getComputedStyle(slides[0]).marginLeft || 0) + parseInt(window.getComputedStyle(slides[0]).marginRight || 0),
        slidesPerView: getVisibleSlides(),
        isDragging: false,
        startPosition: 0,
        currentTranslate: 0,
        prevTranslate: 0,
        animationId: null,
        autoRotateInterval: null
      };
      console.log(`[Carousel Init - ${carouselId}] Initial state:`, carouselState);
      
      function getVisibleSlides() {
        if (window.innerWidth < 768) return 1;
        if (window.innerWidth < 1200) return 2;
        return 3;
      }
      
      function updateCarouselDisplay() {
        console.log(`[Carousel Update - ${carouselId}] Updating display. Index: ${carouselState.currentIndex}, SlidesVisible: ${carouselState.slidesPerView}`);
        if (!track) return;
        
        // Calculer le translateX
        const translateX = -carouselState.currentIndex * carouselState.slideWidth;
        track.style.transform = `translateX(${translateX}px)`;
        
        // Mettre à jour les classes active pour les slides/cartes
        slides.forEach((slide, index) => {
          const isVisible = index >= carouselState.currentIndex && index < carouselState.currentIndex + carouselState.slidesPerView;
          slide.classList.toggle('active', isVisible);
          
          // Animation optionnelle
          if (isVisible) {
            slide.style.animation = `cardAppear 0.5s ease forwards ${(index - carouselState.currentIndex) * 0.1}s`;
          } else {
            slide.style.animation = '';
          }
        });
        
        // Mettre à jour les dots
        if (dots.length > 0) {
          const activeIndex = Math.floor(carouselState.currentIndex / (slides.length / dots.length));
          dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === activeIndex);
          });
        }
        
        // État des boutons
        if (prevButton) {
          const isDisabled = carouselState.currentIndex <= 0;
          prevButton.disabled = isDisabled;
          prevButton.style.opacity = isDisabled ? '0.5' : '1';
          prevButton.style.cursor = isDisabled ? 'not-allowed' : 'pointer';
          console.log(`[Carousel Update - ${carouselId}] Prev button disabled: ${isDisabled}`);
        }
        
        if (nextButton) {
          const isDisabled = carouselState.currentIndex >= slides.length - carouselState.slidesPerView;
          nextButton.disabled = isDisabled;
          nextButton.style.opacity = isDisabled ? '0.5' : '1';
          nextButton.style.cursor = isDisabled ? 'not-allowed' : 'pointer';
          console.log(`[Carousel Update - ${carouselId}] Next button disabled: ${isDisabled}`);
        }
      }
      
      function nextSlide() {
        console.log(`[Carousel Nav - ${carouselId}] Next slide requested.`);
        if (carouselState.currentIndex < slides.length - carouselState.slidesPerView) {
          carouselState.currentIndex++;
          console.log(`[Carousel Nav - ${carouselId}] Moving to index: ${carouselState.currentIndex}`);
          updateCarouselDisplay();
        } else {
          console.log(`[Carousel Nav - ${carouselId}] Already at the last slide.`);
        }
      }
      
      function prevSlide() {
        console.log(`[Carousel Nav - ${carouselId}] Previous slide requested.`);
        if (carouselState.currentIndex > 0) {
          carouselState.currentIndex--;
          console.log(`[Carousel Nav - ${carouselId}] Moving to index: ${carouselState.currentIndex}`);
          updateCarouselDisplay();
        } else {
          console.log(`[Carousel Nav - ${carouselId}] Already at the first slide.`);
        }
      }
      
      function setupAutoRotate(interval) {
        // Annuler l'intervalle existant s'il y en a un
        if (carouselState.autoRotateInterval) {
          clearInterval(carouselState.autoRotateInterval);
        }
        
        // N'activer l'auto-rotation que s'il y a assez de slides
        if (slides.length > carouselState.slidesPerView) {
          carouselState.autoRotateInterval = setInterval(() => {
            if (carouselState.currentIndex >= slides.length - carouselState.slidesPerView) {
              // Retour au début si on a atteint la fin
              carouselState.currentIndex = 0;
            } else {
              carouselState.currentIndex++;
            }
            updateCarouselDisplay();
          }, interval);
        }
      }
      
      // ------ Événements tactiles ------
      function touchStart(event) {
        console.log(`[Carousel Touch - ${carouselId}] Touch start.`);
        carouselState.isDragging = true;
        carouselState.startPosition = event.touches[0].clientX;
        carouselState.prevTranslate = carouselState.currentTranslate;
        
        // Arrêter l'auto-rotation pendant l'interaction
        if (carouselState.autoRotateInterval) {
          clearInterval(carouselState.autoRotateInterval);
        }
        
        // Enlever la transition pour un déplacement direct
        track.style.transition = 'none';
      }
      
      function touchMove(event) {
        if (!carouselState.isDragging) return;
        console.log(`[Carousel Touch - ${carouselId}] Touch move.`);
        
        const currentPosition = event.touches[0].clientX;
        const moveDistance = currentPosition - carouselState.startPosition;
        
        // Appliquer la translation en temps réel
        track.style.transform = `translateX(${-carouselState.currentIndex * carouselState.slideWidth + moveDistance}px)`;
        
        // Empêcher le défilement de la page
        event.preventDefault();
      }
      
      function touchEnd() {
        if (!carouselState.isDragging) return;
        console.log(`[Carousel Touch - ${carouselId}] Touch end.`);
        
        carouselState.isDragging = false;
        
        // Restaurer la transition pour l'animation
        track.style.transition = 'transform 0.5s ease-in-out';
        
        // Calculer le mouvement
        const endPosition = parseFloat(track.style.transform.match(/-?\d+\.?\d*/)[0] || 0);
        const movedDistance = endPosition - (-carouselState.currentIndex * carouselState.slideWidth);
        
        // Modifier l'index en fonction du mouvement
        if (movedDistance < -100 && carouselState.currentIndex < slides.length - carouselState.slidesPerView) {
          carouselState.currentIndex++;
        } else if (movedDistance > 100 && carouselState.currentIndex > 0) {
          carouselState.currentIndex--;
        }
        
        updateCarouselDisplay();
        
        // Réactiver l'auto-rotation après l'interaction
        if (carouselId === 'references-carousel') setupAutoRotate(7000);
      }
      
      // ------ Événements souris ------
      function mouseStart(event) {
        console.log(`[Carousel Mouse - ${carouselId}] Mouse down.`);
        carouselState.isDragging = true;
        carouselState.startPosition = event.clientX;
        
        // Arrêter l'auto-rotation pendant l'interaction
        if (carouselState.autoRotateInterval) {
          clearInterval(carouselState.autoRotateInterval);
        }
        
        track.style.cursor = 'grabbing';
        track.style.transition = 'none';
        
        event.preventDefault();
      }
      
      function mouseMove(event) {
        if (!carouselState.isDragging) return;
        console.log(`[Carousel Mouse - ${carouselId}] Mouse move.`);
        
        const currentPosition = event.clientX;
        const moveDistance = currentPosition - carouselState.startPosition;
        
        // Appliquer la translation en temps réel
        track.style.transform = `translateX(${-carouselState.currentIndex * carouselState.slideWidth + moveDistance}px)`;
        
        event.preventDefault();
      }
      
      function mouseEnd(event) {
        if (!carouselState.isDragging) return;
        console.log(`[Carousel Mouse - ${carouselId}] Mouse up.`);
        
        carouselState.isDragging = false;
        track.style.cursor = 'grab';
        track.style.transition = 'transform 0.5s ease-in-out';
        
        // Calculer le mouvement
        const dx = event.clientX - carouselState.startPosition;
        
        // Modifier l'index en fonction du mouvement
        if (dx < -100 && carouselState.currentIndex < slides.length - carouselState.slidesPerView) {
          carouselState.currentIndex++;
        } else if (dx > 100 && carouselState.currentIndex > 0) {
          carouselState.currentIndex--;
        }
        
        updateCarouselDisplay();
        
        // Réactiver l'auto-rotation après l'interaction
        if (carouselId === 'references-carousel') setupAutoRotate(7000);
      }
      
      // ------ Gestionnaires d'événements ------
      function addEventListeners() {
        console.log(`[Carousel Events - ${carouselId}] Adding event listeners.`);
        // Boutons de navigation
        nextButton?.addEventListener('click', (e) => {
          console.log(`[Carousel Events - ${carouselId}] Next button clicked.`);
          e.preventDefault();
          nextSlide();
          
          // Arrêter l'auto-rotation lors de l'interaction manuelle
          if (carouselState.autoRotateInterval) {
            clearInterval(carouselState.autoRotateInterval);
            // Redémarrer après un certain temps d'inactivité
            setTimeout(() => setupAutoRotate(7000), 10000);
          }
        });
        
        prevButton?.addEventListener('click', (e) => {
          console.log(`[Carousel Events - ${carouselId}] Previous button clicked.`);
          e.preventDefault();
          prevSlide();
          
          // Arrêter l'auto-rotation lors de l'interaction manuelle
          if (carouselState.autoRotateInterval) {
            clearInterval(carouselState.autoRotateInterval);
            // Redémarrer après un certain temps d'inactivité
            setTimeout(() => setupAutoRotate(7000), 10000);
          }
        });
        
        // Points de navigation
        dots.forEach((dot, index) => {
          dot.addEventListener('click', (e) => {
            console.log(`[Carousel Events - ${carouselId}] Dot ${index} clicked.`);
            e.preventDefault();
            const itemsPerDotGroup = Math.max(1, Math.floor(slides.length / dots.length)); // Avoid division by zero
            const targetStartIndex = index * itemsPerDotGroup;
            const maxIndex = Math.min(targetStartIndex, slides.length - carouselState.slidesPerView);
            
            console.log(`[Carousel Events - ${carouselId}] Calculated maxIndex: ${maxIndex} from index: ${index}, itemsPerDotGroup: ${itemsPerDotGroup}, targetStartIndex: ${targetStartIndex}`);
            
            carouselState.currentIndex = maxIndex;
            updateCarouselDisplay();
            
            // Arrêter l'auto-rotation lors de l'interaction manuelle
            if (carouselState.autoRotateInterval) {
              clearInterval(carouselState.autoRotateInterval);
              // Redémarrer après un certain temps d'inactivité
              setTimeout(() => setupAutoRotate(7000), 10000);
            }
          });
        });
        
        // Événements tactiles
        track.addEventListener('touchstart', touchStart, { passive: true });
        track.addEventListener('touchmove', touchMove, { passive: false });
        track.addEventListener('touchend', touchEnd, { passive: true });
        
        // Événements souris
        track.addEventListener('mousedown', mouseStart, { passive: false });
        document.addEventListener('mousemove', mouseMove, { passive: false });
        document.addEventListener('mouseup', mouseEnd, { passive: true });
        
        // Empêcher le comportement de glisser par défaut
        track.addEventListener('dragstart', (e) => e.preventDefault());
        
        // Support des touches clavier
        document.addEventListener('keydown', (event) => {
          if (event.key === 'ArrowLeft') {
            prevSlide();
          } else if (event.key === 'ArrowRight') {
            nextSlide();
          }
        });
        
        // Adapter en cas de redimensionnement
        window.addEventListener('resize', () => {
          console.log(`[Carousel Events - ${carouselId}] Window resized.`);
          carouselState.slideWidth = slides[0].offsetWidth + parseInt(window.getComputedStyle(slides[0]).marginLeft || 0) + parseInt(window.getComputedStyle(slides[0]).marginRight || 0);
          carouselState.slidesPerView = getVisibleSlides();
          console.log(`[Carousel Events - ${carouselId}] New slideWidth: ${carouselState.slideWidth}, New slidesPerView: ${carouselState.slidesPerView}`);
          updateCarouselDisplay();
        });
      }
      
      // Initialisation
      function init() {
        console.log(`[Carousel Init - ${carouselId}] Starting init function.`);
        // Assurer que tous les éléments sont correctement configurés
        slides.forEach(slide => {
          slide.setAttribute('draggable', 'false');
        });
        
        // Configuration initiale
        updateCarouselDisplay();
        addEventListeners();
        
        // Démarrer l'auto-rotation si nécessaire
        if (carouselId === 'main-carousel') {
          console.log(`[Carousel Init - ${carouselId}] Setting up auto-rotate (5000ms).`);
          setupAutoRotate(5000);
        } else if (carouselId === 'references-carousel') {
          console.log(`[Carousel Init - ${carouselId}] Setting up auto-rotate (7000ms).`);
          setupAutoRotate(7000);
        }
        
        return {
          next: nextSlide,
          prev: prevSlide,
          goTo: (index) => {
            carouselState.currentIndex = Math.min(index, slides.length - carouselState.slidesPerView);
            updateCarouselDisplay();
          },
          update: updateCarouselDisplay
        };
      }
      
      // Renvoyer l'API du carousel
      console.log(`[Carousel Init - ${carouselId}] Initialization complete.`);
      return init();
    }
    
    // ===== ANIMATIONS AU SCROLL =====
    function initScrollAnimations() {
      const animateElements = document.querySelectorAll('.animate-on-scroll');
      const sections = document.querySelectorAll('.intro-section, .references-section');
      const sectionTitles = document.querySelectorAll('.section-title');
      const introContainer = document.querySelector('.intro-container');
      const scrollIndicator = document.querySelector('.scroll-indicator');
      
      function checkInView() {
        // Animation des éléments avec classe animate-on-scroll
        animateElements.forEach(element => {
          const elementTop = element.getBoundingClientRect().top;
          const elementVisible = 150;
          
          if (elementTop < window.innerHeight - elementVisible) {
            element.classList.add('visible');
          }
        });
        
        // Animation des sections au scroll
        sections.forEach(section => {
          const sectionTop = section.offsetTop;
          const sectionHeight = section.offsetHeight;
          
          // Si la section est visible
          if (window.scrollY > sectionTop - window.innerHeight / 1.3 && 
              window.scrollY < sectionTop + sectionHeight) {
            
            // Animation spécifique pour la section d'introduction
            if (section.classList.contains('intro-section') && introContainer) {
              introContainer.style.opacity = '1';
              introContainer.style.transform = 'translateY(0)';
            }
          }
        });
        
        // Animation des titres de section
        sectionTitles.forEach(title => {
          const titleParent = title.parentElement?.parentElement;
          
          if (titleParent && window.scrollY > titleParent.offsetTop - window.innerHeight / 1.5) {
            title.style.opacity = '1';
            title.style.transform = 'translateY(0)';
          }
        });
        
        // Gestion de l'indicateur de défilement
        if (scrollIndicator) {
          if (window.scrollY > 300) {
            scrollIndicator.classList.add('visible');
            if (window.scrollY + window.innerHeight > document.body.offsetHeight - 200) {
              scrollIndicator.classList.add('up');
            } else {
              scrollIndicator.classList.remove('up');
            }
          } else {
            scrollIndicator.classList.remove('visible');
          }
        }
      }
      
      // Écouteur d'événement scroll
      window.addEventListener('scroll', checkInView);
      
      // Vérification initiale
      checkInView();
      
      // Gérer le clic sur l'indicateur de défilement
      if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
          if (scrollIndicator.classList.contains('up')) {
            // Remonter en haut
            window.scrollTo({
              top: 0,
              behavior: 'smooth'
            });
          } else {
            // Descendre à la section suivante
            let nextSectionTop = document.body.offsetHeight;
            
            sections.forEach(section => {
              const sectionTop = section.offsetTop;
              if (window.scrollY < sectionTop && sectionTop < nextSectionTop) {
                nextSectionTop = sectionTop;
              }
            });
            
            window.scrollTo({
              top: nextSectionTop,
              behavior: 'smooth'
            });
          }
        });
      }
    }
  
    // ===== INITIALISATION PRINCIPALE =====
    function init() {
      // Initialiser les gestionnaires de la navbar
      window.addEventListener('scroll', handleScroll);
      hamburger?.addEventListener('click', toggleMenu);
      
      // Gérer les clics sur les éléments de menu avec sous-menus
      navbarItems.forEach(item => {
        const link = item.querySelector('.navbar-link');
        if (item.querySelector('.dropdown-menu') && link) {
          link.addEventListener('click', toggleDropdown.bind(item));
        }
      });
      
      // Fermer le menu en cliquant ailleurs
      document.addEventListener('click', closeMenuOnClickOutside);
      
      // Appliquer le scroll initial
      handleScroll();
      
      // Initialiser les animations au scroll
      initScrollAnimations();
      
      // Initialiser tous les carousels de la page
      console.log('[Main Init] Initializing carousels...');
      const mainCarousel = initializeCarousel('main-carousel');
      const referencesCarousel = initializeCarousel('references-carousel');
      console.log('[Main Init] Carousels initialized.');
      
      // Exporter les carousels pour un accès global si nécessaire
      window.carousels = {
        main: mainCarousel,
        references: referencesCarousel
      };
    }
    
    // Lancer l'initialisation
    console.log('[Main Init] Starting main initialization.');
    init();
    console.log('[Main Init] Main initialization finished.');
  });