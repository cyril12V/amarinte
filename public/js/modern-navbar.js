// ====== NAVBAR MODERNE ======
document.addEventListener('DOMContentLoaded', function() {
  // Éléments de la navbar
  const navbar = document.querySelector('.modern-navbar');
  const mobileToggle = document.querySelector('.mobile-toggle');
  const navbarNav = document.querySelector('.navbar-nav');
  const mobileOverlay = document.querySelector('.mobile-overlay');
  const dropdowns = document.querySelectorAll('.dropdown');
  const body = document.body;

  // ====== EFFET DE SCROLL ======
  let lastScrollY = window.scrollY;
  
  function handleScroll() {
    const currentScrollY = window.scrollY;
    
    if (navbar) {
      // Ajouter effet glass au scroll
      if (currentScrollY > 50) {
        navbar.classList.add('scrolled', 'glass');
      } else {
        navbar.classList.remove('scrolled', 'glass');
      }
    }
    
    lastScrollY = currentScrollY;
  }

  // Écouter le scroll avec throttling pour les performances
  let ticking = false;
  window.addEventListener('scroll', function() {
    if (!ticking) {
      requestAnimationFrame(handleScroll);
      ticking = true;
      setTimeout(() => { ticking = false; }, 10);
    }
  });

  // ====== MENU MOBILE ======
  function toggleMobileMenu() {
    const isMenuOpen = navbarNav.classList.contains('show');
    
    if (isMenuOpen) {
      closeMobileMenu();
    } else {
      openMobileMenu();
    }
  }

  function openMobileMenu() {
    navbarNav.classList.add('show');
    mobileToggle.classList.add('active');
    if (mobileOverlay) {
      mobileOverlay.classList.add('show');
    }
    
    // Bloquer le scroll
    body.style.overflow = 'hidden';
    
    // Ajouter les indices d'animation aux éléments
    const navItems = navbarNav.querySelectorAll('.nav-item');
    navItems.forEach((item, index) => {
      item.style.setProperty('--item-index', index);
    });
    
    // Accessibilité
    mobileToggle.setAttribute('aria-expanded', 'true');
  }

  function closeMobileMenu() {
    navbarNav.classList.remove('show');
    mobileToggle.classList.remove('active');
    if (mobileOverlay) {
      mobileOverlay.classList.remove('show');
    }
    
    // Fermer tous les dropdowns ouverts
    dropdowns.forEach(dropdown => {
      dropdown.classList.remove('active');
      const menu = dropdown.querySelector('.dropdown-menu');
      if (menu) {
        menu.style.maxHeight = null;
      }
    });
    
    // Débloquer le scroll
    body.style.overflow = '';
    
    // Accessibilité
    mobileToggle.setAttribute('aria-expanded', 'false');
  }

  // Gestionnaire du bouton hamburger
  if (mobileToggle) {
    mobileToggle.addEventListener('click', toggleMobileMenu);
  }

  // Fermer le menu en cliquant sur l'overlay
  if (mobileOverlay) {
    mobileOverlay.addEventListener('click', closeMobileMenu);
  }

  // ====== DROPDOWNS ======
  function initDropdowns() {
    dropdowns.forEach(dropdown => {
      const toggle = dropdown.querySelector('.dropdown-toggle');
      const menu = dropdown.querySelector('.dropdown-menu');
      
      if (!toggle || !menu) return;

      // Supprimer les anciens event listeners si ils existent
      toggle.removeEventListener('click', handleDropdownClick);
      dropdown.removeEventListener('mouseenter', handleDropdownHover);
      dropdown.removeEventListener('mouseleave', handleDropdownLeave);

      // Desktop: hover
      function handleDropdownHover() {
        if (window.innerWidth > 768) {
          menu.style.display = 'block';
          setTimeout(() => {
            menu.classList.add('show');
          }, 10);
        }
      }

      function handleDropdownLeave() {
        if (window.innerWidth > 768) {
          menu.classList.remove('show');
          setTimeout(() => {
            if (!menu.classList.contains('show')) {
              menu.style.display = 'none';
            }
          }, 300);
        }
      }

      // Mobile: click
      function handleDropdownClick(e) {
        if (window.innerWidth <= 768) {
          e.preventDefault();
          e.stopPropagation();
          
          // Fermer les autres dropdowns
          dropdowns.forEach(otherDropdown => {
            if (otherDropdown !== dropdown && otherDropdown.classList.contains('active')) {
              otherDropdown.classList.remove('active');
              const otherMenu = otherDropdown.querySelector('.dropdown-menu');
              if (otherMenu) {
                otherMenu.style.maxHeight = null;
              }
            }
          });
          
          // Toggle le dropdown actuel
          dropdown.classList.toggle('active');
          
          if (dropdown.classList.contains('active')) {
            menu.style.maxHeight = menu.scrollHeight + 'px';
          } else {
            menu.style.maxHeight = null;
          }
        }
      }

      // Ajouter les event listeners
      if (window.innerWidth > 768) {
        dropdown.addEventListener('mouseenter', handleDropdownHover);
        dropdown.addEventListener('mouseleave', handleDropdownLeave);
      }
      
      toggle.addEventListener('click', handleDropdownClick);
    });
  }

  // Initialiser les dropdowns
  initDropdowns();

  // ====== NAVIGATION LINKS ======
  const navLinks = document.querySelectorAll('.nav-link:not(.dropdown-toggle)');
  navLinks.forEach(link => {
    link.addEventListener('click', function() {
      // Fermer le menu mobile quand on clique sur un lien
      if (window.innerWidth <= 768 && navbarNav.classList.contains('show')) {
        closeMobileMenu();
      }
    });
  });

  // ====== GESTION DU RESIZE ======
  let resizeTimeout;
  window.addEventListener('resize', function() {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(function() {
      const width = window.innerWidth;
      
      if (width > 768) {
        // Desktop: fermer le menu mobile s'il est ouvert
        if (navbarNav.classList.contains('show')) {
          closeMobileMenu();
        }
        
        // Réinitialiser les dropdowns pour le desktop
        dropdowns.forEach(dropdown => {
          dropdown.classList.remove('active');
          const menu = dropdown.querySelector('.dropdown-menu');
          if (menu) {
            menu.style.maxHeight = null;
            menu.style.display = '';
          }
        });
      } else {
        // Mobile: s'assurer que les dropdowns sont configurés pour mobile
        dropdowns.forEach(dropdown => {
          const menu = dropdown.querySelector('.dropdown-menu');
          if (menu && !dropdown.classList.contains('active')) {
            menu.style.maxHeight = null;
            menu.style.display = '';
          }
        });
      }
      
      // Réinitialiser les dropdowns pour le nouveau format
      initDropdowns();
    }, 250);
  });

  // ====== FERMETURE AVEC ESCAPE ======
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      if (navbarNav.classList.contains('show')) {
        closeMobileMenu();
      }
    }
  });

  // ====== SMOOTH SCROLL POUR LES ANCRES ======
  const anchorLinks = document.querySelectorAll('a[href^="#"]');
  anchorLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href === '#' || href === '#!') return;
      
      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        
        // Calculer l'offset pour la navbar fixe
        const navbarHeight = navbar ? navbar.offsetHeight : 70;
        const targetPosition = target.offsetTop - navbarHeight - 20;
        
        window.scrollTo({
          top: Math.max(0, targetPosition),
          behavior: 'smooth'
        });
        
        // Fermer le menu mobile si ouvert
        if (window.innerWidth <= 768 && navbarNav.classList.contains('show')) {
          closeMobileMenu();
        }
      }
    });
  });

  // ====== AMÉLIORATION ACCESSIBILITÉ ======
  // Focus management pour le menu mobile
  function trapFocus(element) {
    const focusableElements = element.querySelectorAll(
      'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select'
    );
    const firstFocusableElement = focusableElements[0];
    const lastFocusableElement = focusableElements[focusableElements.length - 1];

    element.addEventListener('keydown', function(e) {
      if (e.key === 'Tab') {
        if (e.shiftKey) {
          if (document.activeElement === firstFocusableElement) {
            lastFocusableElement.focus();
            e.preventDefault();
          }
        } else {
          if (document.activeElement === lastFocusableElement) {
            firstFocusableElement.focus();
            e.preventDefault();
          }
        }
      }
    });
  }

  // Appliquer le focus trap quand le menu mobile est ouvert
  if (navbarNav) {
    const observer = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
        if (mutation.target.classList.contains('show')) {
          trapFocus(navbarNav);
          // Focus sur le premier élément du menu
          const firstLink = navbarNav.querySelector('.nav-link');
          if (firstLink) {
            firstLink.focus();
          }
        }
      });
    });
    
    observer.observe(navbarNav, { attributes: true, attributeFilter: ['class'] });
  }

  // ====== INITIALISATION ======
  // S'assurer que les attributs d'accessibilité sont corrects
  if (mobileToggle) {
    mobileToggle.setAttribute('aria-expanded', 'false');
    mobileToggle.setAttribute('aria-label', 'Ouvrir le menu de navigation');
  }

  // Ajouter des labels ARIA pour les dropdowns
  dropdowns.forEach((dropdown, index) => {
    const toggle = dropdown.querySelector('.dropdown-toggle');
    const menu = dropdown.querySelector('.dropdown-menu');
    
    if (toggle && menu) {
      const id = `dropdown-${index}`;
      menu.setAttribute('id', id);
      toggle.setAttribute('aria-haspopup', 'true');
      toggle.setAttribute('aria-expanded', 'false');
      toggle.setAttribute('aria-controls', id);
    }
  });

  // Vérifier le scroll initial
  handleScroll();
  
  console.log('🚀 Navbar moderne initialisée avec succès!');
}); 