document.addEventListener("DOMContentLoaded", () => {
    // Variables globales
    let currentModal = null;
    let stripeInstance = null;
    let cardElement = null;
    let paypalLoaded = false;

    // Définition des services et leurs prix
    const serviceNames = {
        'basic': 'Service de Base',
        'premium': 'Service Premium',
        'luxury': 'Service de Luxe'
    };

    const servicePrices = {
        'basic': '50€',
        'premium': '100€',
        'luxury': '200€'
    };

    // Initialisation de Stripe avec la clé publique
    const stripePublicKey = 'pk_test_51R2JiDKXCswdU07U96r1QyW90xAPCXHdAT97T0yHjXTexLuPKsIhXsRYSxAyk49vosXvpZnllQCTpvfjjI3KJ56u00PCYWM2cg';
    try {
        let stripeInstance = Stripe(stripePublicKey);
        const elements = stripeInstance.elements();
        let card= elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    '::placeholder': {
                        color: '#aab7c4'
                    },
                    iconColor: '#4F46E5'
                },
                invalid: {
                    color: '#dc2626',
                    iconColor: '#dc2626'
                }
            }
        });
    } catch (error) {
        console.error('Erreur lors de l\'initialisation de Stripe:', error);
    }

    const selectedOption = document.getElementById('selectedOption');
    const options = document.getElementById('options');
    const serviceInput = document.getElementById('serviceInput'); // Champ caché pour envoyer la valeur sélectionnée

// Afficher ou cacher la liste des options
    selectedOption.addEventListener('click', () => {
        options.style.display = options.style.display === 'block' ? 'none' : 'block';
    });

// Gérer la sélection des options
    options.querySelectorAll('.option').forEach(option => {
        option.addEventListener('click', () => {
            const selectedValue = option.getAttribute('data-value'); // Récupérer la valeur de l'option
            selectedOption.textContent = option.textContent; // Mettre à jour l'affichage
            serviceInput.value = selectedValue; // Mettre à jour le champ caché
            options.style.display = 'none'; // Cacher les options après sélection
        });
    });

// Afficher les sous-options au survol
    document.querySelectorAll('.optgroup').forEach(group => {
        group.addEventListener('mouseenter', () => {
            group.querySelector('.sub-options').style.display = 'block';
        });

        group.addEventListener('mouseleave', () => {
            group.querySelector('.sub-options').style.display = 'none';
        });
    });


    // Fonctions de gestion des modales
    function showModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = 'block';
            currentModal = modal;
            setTimeout(() => modal.classList.add('show'), 10);
            document.body.style.overflow = 'hidden';
        }
    }

    function hideModal(modalId) {
        const modal = modalId ? document.getElementById(modalId) : currentModal;
        if (modal) {
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
                if (modal === currentModal) {
                    currentModal = null;
                }
            }, 300);
            document.body.style.overflow = '';
        }
    }

    // Gestion de la navigation mobile
    const navBtn = document.getElementById('nav-mobile-btn');
    const nav = document.getElementById('nav');

    if (navBtn) {
        navBtn.addEventListener('click', function() {
            this.classList.toggle('close');
            nav.classList.toggle('hidden');
        });
    }

    // Gestion des modales
    document.querySelectorAll('.modal').forEach(modal => {
        const closeBtn = modal.querySelector('.close-button');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => hideModal(modal.id));
        }

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                hideModal(modal.id);
            }
        });
    });

    // Gestion des touches clavier
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && currentModal) {
            hideModal();
        }
    });

    // Gestion du formulaire d'inscription
    const form = document.getElementById('inscriptionForm');
    if (form) {
        form.addEventListener('submit', handleFormSubmit);
    }

    async function handleFormSubmit(e) {
        e.preventDefault();
        clearErrors();

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const response = await fetch('/clients', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                const result = await response.json();
                if (response.status === 422 && result.errors) {
                    handleValidationErrors(result.errors);
                    return;
                }
                throw new Error(result.message || 'Une erreur est survenue');
            }

            const result = await response.json();

            // Afficher le message de succès avant de cacher la modale
            showSuccess('Inscription réussie ! Veuillez choisir votre mode de paiement.');

            // Attendre un court instant pour que le message soit visible
            await new Promise(resolve => setTimeout(resolve, 1000));

            // Récupérer les valeurs avant de réinitialiser le formulaire
            const selectedService = document.getElementById('serviceInput').value;
            const selectedOption = document.querySelector(`.option[data-value="${selectedService}"]`);
            const serviceText = selectedOption ? selectedOption.textContent : 'Service non sélectionné';
            const servicePrice = selectedService === 'personal' ? '90€' : '0€';

            hideModal('inscriptionModal');
            
            // Passer les données complètes à showPaymentModal
            showPaymentModal({
                ...data,
                service: selectedService,
                serviceText: serviceText,
                servicePrice: servicePrice
            });
            
            form.reset();
        } catch (error) {
            console.error('Erreur:', error);
            showError('form', error.message || 'Une erreur est survenue. Veuillez réessayer.');
        }
    }

    // Gestion de la modal de paiement
    const paymentModal = document.getElementById('paymentModal');

    function showPaymentModal(serviceData) {
        // Utiliser les données passées à la fonction
        const firstName = serviceData.fname;
        const lastName = serviceData.lname;
        const email = serviceData.email;
        const phone = serviceData.phone;
        const serviceText = serviceData.serviceText;
        
        // Déterminer le prix en fonction du service
        let servicePrice = '0€';
        switch(serviceData.service) {
            case 'personalCoaching':
                servicePrice = '90€';
                break;
            case 'professionalDevelopment':
                servicePrice = '250€';
                break;
            case 'professionalReconversion':
                servicePrice = '400€';
                break;
            case 'entrepreneurshipStandardPack':
                servicePrice = '800€';
                break;
            case 'entrepreneurshipPremiumPack':
                servicePrice = 'Tarif sur devis';
                break;
            default:
                servicePrice = '0€';
        }
        
        // Mettre à jour le récapitulatif avec les valeurs du formulaire
        const summaryService = document.getElementById('summary-service');
        const summaryPrice = document.getElementById('summary-price');
        const summaryTotal = document.getElementById('summary-total');
        const summaryName = document.getElementById('summary-name');
        const summaryEmail = document.getElementById('summary-email');
        const summaryPhone = document.getElementById('summary-phone');

        // Mettre à jour le service et le prix
        if (summaryService) summaryService.textContent = serviceText;
        if (summaryPrice) summaryPrice.textContent = servicePrice;
        if (summaryTotal) summaryTotal.textContent = servicePrice;
        if (summaryName) summaryName.textContent = `${firstName || ''} ${lastName || ''}`;
        if (summaryEmail) summaryEmail.textContent = email || '';
        if (summaryPhone) summaryPhone.textContent = phone || '';

        const modal = document.getElementById('paymentModal');
        if (modal) {
            modal.style.display = 'block';
            setTimeout(() => modal.classList.add('show'), 10);
            document.body.style.overflow = 'hidden';
        }
    }

    // Déclarer la fonction dans le scope global
    function hidePaymentModal() {
        const paymentModal = document.getElementById('paymentModal');
        if (paymentModal) {
            // Réinitialiser les éléments de paiement
            const stripeElements = document.getElementById('stripe-elements');
            const paypalContainer = document.getElementById('paypal-button-container');
            const confirmBtn = document.getElementById('confirm-payment-btn');
            const cardErrors = document.getElementById('card-errors');

            // Cacher tous les conteneurs de paiement
            if (stripeElements) stripeElements.classList.add('hidden');
            if (paypalContainer) paypalContainer.classList.add('hidden');
            if (confirmBtn) confirmBtn.classList.add('hidden');
            if (cardErrors) cardErrors.innerHTML = '';

            // Décocher tous les boutons radio
            document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                radio.checked = false;
            });

            // Animation de fermeture
            paymentModal.classList.remove('show');
            setTimeout(() => {
                paymentModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }, 300);
        }
    }

    // Initialisation des gestionnaires d'événements pour la modal de paiement
    const initPaymentModalHandlers = () => {
        // Fermeture en cliquant sur les boutons
        const closeButtons = document.querySelectorAll('.payment-modal .close-button, .btn-secondary');
        closeButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                hidePaymentModal();
            });
        });

        // Fermeture en cliquant en dehors de la modal
        const modal = document.getElementById('paymentModal');
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    hidePaymentModal();
                }
            });
        }
    };

    // Initialiser les gestionnaires d'événements
    initPaymentModalHandlers();

    // Fermeture avec la touche Echap
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            hidePaymentModal();
        }
    });

    // Gestion des paiements
    const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
    const stripeElements = document.getElementById('stripe-elements');
    const paypalContainer = document.getElementById('paypal-button-container');
    const cardErrors = document.getElementById('card-errors');
    const confirmPaymentBtn = document.getElementById('confirm-payment-btn');

    function initializePaymentMethods() {
        const stripeElements = document.getElementById('stripe-elements');
        const paypalContainer = document.getElementById('paypal-button-container');
        const confirmPaymentBtn = document.getElementById('confirm-payment-btn');

        // Initialisation de Stripe Elements
        if (stripeInstance && stripeElements) {
            try {
                const elements = stripeInstance.elements();
                cardElement = elements.create('card', {
                    style: {
                        base: {
                            fontSize: '16px',
                            color: '#32325d',
                            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                            '::placeholder': {
                                color: '#aab7c4'
                            },
                            iconColor: '#4F46E5'
                        },
                        invalid: {
                            color: '#dc2626',
                            iconColor: '#dc2626'
                        }
                    }
                });

                cardElement.mount('#card-element');

                cardElement.on('change', function(event) {
                    const displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.innerHTML = `
                            <div class="flex items-center gap-2 text-red-600 bg-red-50 p-3 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>${event.error.message}</span>
                            </div>
                        `;
                    } else {
                        displayError.textContent = '';
                    }
                });
            } catch (error) {
                console.error('Erreur lors de l\'initialisation de Stripe Elements:', error);
            }
        }

        // Écouteurs d'événements pour les méthodes de paiement
        const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
        paymentMethodRadios.forEach(radio => {
            radio.addEventListener('change', handlePaymentMethodChange);
        });

        if (confirmPaymentBtn) {
            confirmPaymentBtn.addEventListener('click', processPayment);
            console.log('Écouteur d\'événement ajouté au bouton de confirmation');
        }

        // Vérifier si PayPal est déjà chargé
        if (window.paypal) {
            initializePayPal();
        } else {
            // Attendre que PayPal soit chargé
            window.addEventListener('paypal-loaded', initializePayPal);
        }
    }

    // Ajouter un événement pour détecter quand PayPal est chargé
    window.addEventListener('load', function() {
        const paypalScript = document.querySelector('script[src*="paypal"]');
        if (paypalScript) {
            paypalScript.addEventListener('load', function() {
                window.dispatchEvent(new Event('paypal-loaded'));
            });
        }
    });

    // Fonction pour vérifier si PayPal est chargé
    function checkPayPalLoaded() {
        return new Promise((resolve) => {
            if (window.paypal) {
                resolve(true);
                return;
            }

            // Vérifier toutes les 100ms pendant 10 secondes maximum
            let attempts = 0;
            const interval = setInterval(() => {
                attempts++;
                if (window.paypal) {
                    clearInterval(interval);
                    resolve(true);
                } else if (attempts >= 100) { // 10 secondes
                    clearInterval(interval);
                    resolve(false);
                }
            }, 100);
        });
    }

    async function initializePayPal() {
        const paypalContainer = document.getElementById('paypal-button-container');
        if (!paypalContainer) {
            console.error('Conteneur PayPal manquant');
            showPaymentError('Conteneur PayPal non trouvé');
            return;
        }

        try {
            console.log('Tentative de chargement de PayPal...');

            // Vider le conteneur avant de réinitialiser
            paypalContainer.innerHTML = '<div class="text-gray-600 p-4 text-center">Chargement de PayPal...</div>';

            await window.loadPayPalScript();

            // Vérifier si PayPal est disponible
            if (!window.paypal || !window.paypal.Buttons) {
                throw new Error('PayPal n\'est pas correctement initialisé');
            }

            console.log('PayPal est chargé, initialisation des boutons...');
            paypalContainer.innerHTML = '';

            const buttons = window.paypal.Buttons({
                style: {
                    layout: 'vertical',
                    color: 'blue',
                    shape: 'rect',
                    label: 'paypal'
                },
                createOrder: function(data, actions) {
                    const amount = getFormattedAmount();
                    const service = document.getElementById('summary-service').textContent;

                    console.log('Création de la commande PayPal avec le montant:', amount);

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: amount,
                                currency_code: 'CAD'
                            },
                            description: `Service de coaching: ${service}`
                        }]
                    });
                },
                onApprove: async function(data, actions) {
                    try {
                        console.log('Paiement PayPal approuvé, capture en cours...');
                        const order = await actions.order.capture();
                        console.log('Commande PayPal capturée:', order);
                        await handlePaymentSuccess('paypal', order.id);
                        hidePaymentModal();
                        showSuccess('Paiement PayPal réussi ! Un email de confirmation vous sera envoyé.');
                    } catch (error) {
                        console.error('Erreur lors de la capture PayPal:', error);
                        showPaymentError('Erreur lors du paiement PayPal. Veuillez réessayer.');
                    }
                },
                onError: function(err) {
                    console.error('Erreur PayPal:', err);
                    showPaymentError('Une erreur est survenue avec PayPal. Veuillez réessayer.');
                    paypalContainer.innerHTML = '<div class="text-red-600 p-4 text-center">Une erreur est survenue. Veuillez rafraîchir la page ou choisir un autre mode de paiement.</div>';
                }
            });

            // Vérifier si les boutons peuvent être rendus
            const isEligible = await buttons.isEligible();
            if (!isEligible) {
                throw new Error('PayPal n\'est pas disponible pour ce paiement');
            }

            await buttons.render('#paypal-button-container');
            console.log('Boutons PayPal initialisés avec succès');
            paypalLoaded = true;

        } catch (error) {
            console.error('Erreur lors de l\'initialisation des boutons PayPal:', error);
            paypalContainer.innerHTML = `
                <div class="text-red-600 p-4 text-center">
                    <p class="font-semibold mb-2">PayPal n'est pas disponible pour le moment.</p>
                    <p class="text-sm">Veuillez choisir un autre mode de paiement ou réessayer plus tard.</p>
                </div>
            `;
            throw error;
        }
    }

    function handlePaymentMethodChange(e) {
        console.log('Changement de méthode de paiement:', e.target.value);
        hideAllPaymentContainers();
        const confirmBtn = document.getElementById('confirm-payment-btn');

        switch(e.target.value) {
            case 'stripe':
                stripeElements.classList.remove('hidden');
                confirmBtn.classList.remove('hidden');
                break;
            case 'paypal':
                paypalContainer.classList.remove('hidden');
                confirmBtn.classList.add('hidden');
                if (!paypalLoaded) {
                    initializePayPal().catch(error => {
                        console.error('Erreur lors de l\'initialisation de PayPal:', error);
                        showPaymentError('Erreur lors du chargement de PayPal. Veuillez rafraîchir la page.');
                    });
                }
                break;
            case 'onsite':
                confirmBtn.classList.remove('hidden');
                break;
        }
    }

    function hideAllPaymentContainers() {
        stripeElements.classList.add('hidden');
        paypalContainer.classList.add('hidden');
        if (cardErrors) {
            cardErrors.style.display = 'none';
        }
    }

    async function processPayment(event) {
        event.preventDefault();

        const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
        if (!paymentMethod) {
            showPaymentError('Veuillez sélectionner un mode de paiement');
            return;
        }

        const spinner = document.getElementById('payment-spinner');
        const btnText = document.querySelector('.btn-text');

        try {
            showSpinner(spinner);
            updateButtonText(btnText, 'Traitement en cours...');
            clearPaymentError();

            console.log('Mode de paiement sélectionné:', paymentMethod.value);

            switch(paymentMethod.value) {
                case 'stripe':
                    console.log('Traitement du paiement Stripe...');
                    await handleStripePayment();
                    break;
                case 'onsite':
                    console.log('Traitement du paiement sur place...');
                    await handleOnsitePayment();
                    break;
                case 'paypal':
                    console.log('Veuillez utiliser les boutons PayPal directement');
                    showPaymentError('Pour PayPal, veuillez utiliser les boutons PayPal ci-dessus');
                    break;
                default:
                    throw new Error('Mode de paiement non reconnu');
            }
        } catch (error) {
            console.error('Erreur lors du traitement du paiement:', error);
            showPaymentError(error.message || 'Une erreur est survenue lors du traitement du paiement');
        } finally {
            hideSpinner(spinner);
            updateButtonText(btnText, 'Confirmer le paiement');
        }
    }

    function showPaymentError(message) {
        const cardErrors = document.getElementById('card-errors');
        if (cardErrors) {
            cardErrors.innerHTML = `
                <div class="flex items-center gap-2 text-red-600 bg-red-50 p-3 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>${message}</span>
                </div>
            `;
            cardErrors.style.display = 'block';
        }
    }

    function showSpinner(spinner) {
        if (spinner) {
            spinner.classList.remove('hidden');
        }
    }

    function hideSpinner(spinner) {
        if (spinner) {
            spinner.classList.add('hidden');
        }
    }

    function updateButtonText(button, text) {
        if (button) {
            button.textContent = text;
        }
    }

    function getFormattedAmount() {
        const amount = document.getElementById('summary-total').textContent
            .replace('CA$', '')
            .replace(',', '')
            .replace('.00', '')
            .trim();
        return amount;
    }

    // Initialisation
    try {
        stripeInstance = Stripe('pk_test_51R2JiDKXCswdU07U96r1QyW90xAPCXHdAT97T0yHjXTexLuPKsIhXsRYSxAyk49vosXvpZnllQCTpvfjjI3KJ56u00PCYWM2cg');
    } catch (error) {
        console.error('Erreur lors de l\'initialisation de Stripe:', error);
    }

    window.addEventListener('load', initializePaymentMethods);

    // Amélioration de la gestion des erreurs
    function handleValidationErrors(errors) {
        Object.entries(errors).forEach(([field, messages]) => {
            showError(field, Array.isArray(messages) ? messages[0] : messages);
        });
    }

    function clearErrors() {
        document.querySelectorAll('.error-text').forEach(error => {
            error.style.display = 'none';
            error.textContent = '';
        });
    }

    function showSuccess(message) {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.innerHTML = `
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>${message}</span>
            `;
            successMessage.style.display = 'flex';
            successMessage.style.opacity = '1';

            // Faire disparaître le message après 3 secondes avec une animation
            setTimeout(() => {
                successMessage.style.opacity = '0';
        setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 300);
            }, 3000);
        }
    }

    function showError(field, message) {
        const error = document.querySelector(`[data-error="${field}"]`);
        if (error) {
            error.textContent = message;
            error.style.display = 'block';
        }
    }

    async function handleStripePayment() {
        try {
            if (!stripeInstance) {
                throw new Error('Stripe n\'est pas initialisé correctement');
            }

            if (!cardElement) {
                throw new Error('Le formulaire de carte n\'est pas initialisé');
            }

            console.log('Création du paiement Stripe...');
            const { paymentMethod, error: createError } = await stripeInstance.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: document.getElementById('fname').value + ' ' + document.getElementById('lname').value,
                    email: document.getElementById('email').value
                }
            });

            if (createError) {
                console.error('Erreur lors de la création du paiement:', createError);
                let errorMessage = `
                    <div class="flex flex-col items-center gap-2 text-red-600 bg-red-50 p-4 rounded-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="font-semibold">Carte refusée</p>
                        <p class="text-sm text-center">Veuillez essayer une autre carte ou choisir un autre mode de paiement.</p>
                    </div>
                `;
                
                showPaymentError(errorMessage);
                throw new Error(createError.message);
            }

            if (!paymentMethod || !paymentMethod.id) {
                throw new Error('Impossible de créer la méthode de paiement');
            }

            console.log('Méthode de paiement créée avec succès:', paymentMethod.id);

            const amount = getFormattedAmount();
            const response = await fetch('/api/process-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    payment_method_id: paymentMethod.id,
                    amount: amount,
                    service: document.getElementById('summary-service').textContent,
                    client_name: document.getElementById('fname').value + ' ' + document.getElementById('lname').value,
                    client_email: document.getElementById('email').value
                })
            });

            if (!response.ok) {
                const errorData = await response.json();
                let errorMessage = `
                    <div class="flex flex-col items-center gap-2 text-red-600 bg-red-50 p-4 rounded-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="font-semibold">Carte refusée</p>
                        <p class="text-sm text-center">Veuillez essayer une autre carte ou choisir un autre mode de paiement.</p>
                    </div>
                `;
                
                showPaymentError(errorMessage);
                throw new Error(errorData.message);
            }

            const result = await response.json();

            if (result.requires_action) {
                console.log('Authentification supplémentaire requise...');
                const { paymentIntent, error: actionError } = await stripeInstance.handleCardAction(result.payment_intent_client_secret);

                if (actionError) {
                    let errorMessage = `
                        <div class="flex flex-col items-center gap-2 text-red-600 bg-red-50 p-4 rounded-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="font-semibold">Carte refusée</p>
                            <p class="text-sm text-center">Veuillez essayer une autre carte ou choisir un autre mode de paiement.</p>
                        </div>
                    `;
                    
                    showPaymentError(errorMessage);
                    throw new Error(actionError.message);
                }

                await handlePaymentSuccess('stripe', paymentIntent.id);
            } else if (result.success) {
                console.log('Paiement réussi !');
                hidePaymentModal();
                showSuccess('Paiement par carte réussi ! Un email de confirmation vous sera envoyé.');
            } else {
                throw new Error(result.error || 'Erreur lors du paiement');
            }
        } catch (error) {
            console.error('Erreur Stripe détaillée:', error);
            let errorMessage = `
                <div class="flex flex-col items-center gap-2 text-red-600 bg-red-50 p-4 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="font-semibold">Paiement Invalide</p>
                    <p class="text-sm text-center">Veuillez essayer une autre carte ou choisir un autre mode de paiement.</p>
                </div>
            `;
            showPaymentError(errorMessage);
        }
    }

    async function handleOnsitePayment() {
        const phoneNumber = '+212606939590';
        const clientName = document.getElementById('fname').value + ' ' + document.getElementById('lname').value;
        const clientPhone = document.getElementById('phone').value;
        const clientEmail = document.getElementById('email').value;
        const service = document.getElementById('summary-service').textContent;
        const price = document.getElementById('summary-price').textContent;
        const date = new Date().toLocaleDateString('fr-FR');

        const message = `🌟 *Nouvelle Réservation de Coaching* 🌟%0A%0A` +
            `👤 *Client*%0A` +
            `Nom: ${clientName}%0A` +
            `📞 Tél: ${clientPhone}%0A` +
            `📧 Email: ${clientEmail}%0A%0A` +
            `📋 *Détails de la Réservation*%0A` +
            `🎯 Service: ${service}%0A` +
            `💰 Prix: ${price}%0A` +
            `📅 Date: ${date}%0A` +
            `💳 Paiement: Sur place%0A%0A` +
            `✨ *Confirmation en attente*%0A` +
            `Nous vous contacterons rapidement pour confirmer votre rendez-vous.`;

        window.open(`https://wa.me/${phoneNumber}?text=${message}`, '_blank');
        await handlePaymentSuccess('onsite');
    }

    async function handlePaymentSuccess(method, paymentId = null) {
        try {
            const response = await fetch('/api/confirm-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    payment_method: method,
                    payment_id: paymentId,
                    client_name: document.getElementById('fname').value + ' ' + document.getElementById('lname').value,
                    client_email: document.getElementById('email').value,
                    service: document.getElementById('summary-service').textContent,
                    amount: document.getElementById('summary-total').textContent
                })
            });

            const result = await response.json();

            if (result.success) {
                showSuccess(getSuccessMessage(method));
                hidePaymentModal();
                resetForm();
            } else {
                throw new Error(result.message);
            }
        } catch (error) {
            throw new Error(`Erreur de confirmation: ${error.message}`);
        }
    }

    function getSuccessMessage(method) {
        switch(method) {
            case 'stripe':
                return 'Paiement par carte réussi ! Un email de confirmation vous sera envoyé.';
            case 'paypal':
                return 'Paiement PayPal réussi ! Un email de confirmation vous sera envoyé.';
            case 'onsite':
                return 'Réservation confirmée ! Un message WhatsApp a été envoyé pour confirmation.';
            default:
                return 'Paiement réussi !';
        }
    }

    function resetForm() {
        const form = document.getElementById('inscriptionForm');
        if (form) {
            form.reset();
        }
        if (card) {
            card.clear();
        }
    }

    // Fonction pour nettoyer les erreurs de paiement
    function clearPaymentError() {
        const cardErrors = document.getElementById('card-errors');
        if (cardErrors) {
            cardErrors.style.display = 'none';
            cardErrors.innerHTML = '';
        }
    }
});

