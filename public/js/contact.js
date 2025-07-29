// Gestion du formulaire de contact
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const formErrors = document.getElementById('formErrors');
    const formSuccess = document.getElementById('formSuccess');
    
    // Cacher le message de succès au chargement
    if (formSuccess) {
        formSuccess.style.display = 'none';
    }
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Réinitialiser les erreurs
            resetErrors();
            
            // Récupérer les valeurs du formulaire
            const nom = document.getElementById('nom').value.trim();
            const prenom = document.getElementById('prenom').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            const notRobot = document.getElementById('not_robot').checked;
            
            // Validation côté client
            let isValid = true;
            let errors = [];
            
            if (!nom) {
                markFieldAsError('nom');
                errors.push('Le nom est requis');
                isValid = false;
            }
            
            if (!prenom) {
                markFieldAsError('prenom');
                errors.push('Le prénom est requis');
                isValid = false;
            }
            
            if (!email) {
                markFieldAsError('email');
                errors.push('L\'email est requis');
                isValid = false;
            } else if (!isValidEmail(email)) {
                markFieldAsError('email');
                errors.push('Veuillez entrer une adresse email valide');
                isValid = false;
            }
            
            if (!message) {
                markFieldAsError('message');
                errors.push('Le message est requis');
                isValid = false;
            }
            
            if (!notRobot) {
                const robotCheck = document.querySelector('.robot-check');
                if (robotCheck) robotCheck.classList.add('error');
                errors.push('Veuillez confirmer que vous n\'êtes pas un robot');
                isValid = false;
            }
            
            // Afficher les erreurs ou soumettre le formulaire
            if (!isValid) {
                displayErrors(errors);
            } else {
                // Envoi du formulaire via AJAX
                submitFormAjax();
            }
        });
        
        // Retirer les mises en évidence d'erreur lors de la saisie
        const inputs = contactForm.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error');
                const errorDiv = document.getElementById('formErrors');
                if (errorDiv) {
                    errorDiv.style.display = 'none';
                }
            });
        });
        
        // Gestion de la case à cocher "Je ne suis pas un robot"
        const robotCheckbox = document.getElementById('not_robot');
        if (robotCheckbox) {
            robotCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    document.querySelector('.robot-check').classList.remove('error');
                }
            });
        }
    }
    
    // Fonction pour envoyer le formulaire via AJAX
    function submitFormAjax() {
        // Récupérer le jeton CSRF
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                          document.querySelector('input[name="_token"]')?.value;
        
        // Afficher un indicateur de chargement
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
        
        // Préparer les données du formulaire
        const formData = new FormData(contactForm);
        
        // Envoyer la requête AJAX
        fetch(contactForm.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData,
            credentials: 'same-origin'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur réseau ou serveur');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Cacher le formulaire
                contactForm.style.display = 'none';
                
                // Afficher le message de succès
                if (formSuccess) {
                    formSuccess.textContent = data.message || 'Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.';
                    formSuccess.style.display = 'block';
                    formSuccess.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            } else {
                // En cas d'erreur de validation côté serveur
                if (data.errors) {
                    const serverErrors = Object.values(data.errors).flat();
                    displayErrors(serverErrors);
                } else {
                    displayErrors(['Une erreur est survenue. Veuillez réessayer.']);
                }
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            displayErrors(['Une erreur de connexion est survenue. Veuillez réessayer.']);
        })
        .finally(() => {
            // Réactiver le bouton
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        });
    }
    
    function resetErrors() {
        // Supprimer les messages d'erreur
        if (formErrors) {
            formErrors.innerHTML = '';
            formErrors.style.display = 'none';
        }
        
        // Réinitialiser les champs en erreur
        const errorFields = document.querySelectorAll('.error');
        errorFields.forEach(field => {
            field.classList.remove('error');
        });
        
        // Réinitialiser la vérification robot
        const robotCheck = document.querySelector('.robot-check');
        if (robotCheck) robotCheck.classList.remove('error');
    }
    
    function markFieldAsError(fieldId) {
        const field = document.getElementById(fieldId);
        if (field) {
            field.classList.add('error');
        }
    }
    
    function displayErrors(errors) {
        if (formErrors && errors.length > 0) {
            formErrors.innerHTML = '';
            const errorList = document.createElement('ul');
            
            errors.forEach(error => {
                const errorItem = document.createElement('li');
                errorItem.textContent = error;
                errorList.appendChild(errorItem);
            });
            
            formErrors.appendChild(errorList);
            formErrors.style.display = 'block';
            
            // Scroll jusqu'aux erreurs
            formErrors.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
}); 