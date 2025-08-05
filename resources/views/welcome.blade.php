<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coaching Professionel</title>
    <!-- Favicon personnalisé -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/only coach (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('images/only coach (1).png') }}">
    

    <!-- Pour une meilleure compatibilité -->
    <link rel="apple-touch-icon" href="{{ asset('images/only coach (1).png') }}">
    <meta name="msapplication-TileImage" content="{{ asset('images/only coach (1).png') }}">
    <!-- Link-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Fonction pour charger PayPal de manière dynamique
        function loadPayPalScript() {
            console.log('Début du chargement du script PayPal');
            return new Promise((resolve, reject) => {
                // Vérifier si PayPal est déjà chargé
                if (window.paypal) {
                    console.log('PayPal est déjà chargé ');
                    resolve();
                    return;
                }

                const script = document.createElement('script');
                const params = new URLSearchParams({
                    'client-id': 'AaJQBfi_ceDEEHLITezh5JAcR64vDVDLbRBAJFaMYLp2J2mwtVvajCX_pWvgcj-oj9LzcOSOvhG1vJb4',
                    'currency': 'CAD',
                    'intent': 'capture'
                });

                script.src = `https://www.paypal.com/sdk/js?${params.toString()}`;
                script.async = true;

                script.onload = () => {
                    console.log('Script PayPal chargé avec succès');
                    // Attendre un court instant pour s'assurer que PayPal est bien initialisé
                    setTimeout(() => {
                        if (window.paypal) {
                            resolve();
                        } else {
                            console.error('PayPal SDK non disponible après chargement');
                            reject(new Error('PayPal SDK non disponible'));
                        }
                    }, 500);
                };

                script.onerror = (error) => {
                    console.error('Erreur lors du chargement du script PayPal:', error);
                    reject(new Error('Impossible de charger PayPal - Veuillez réessayer plus tard'));
                };

                document.body.appendChild(script);
            });
        }
    </script>
    @vite(['resources/css/style-inscription.css', 'resources/js/script-inscription.js'])
    <script>
        function showModal() {
            const modal = document.getElementById('inscriptionModal');
            if (modal) {
                modal.style.display = 'block';
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }
        }

        function hideModal() {
            const modal = document.getElementById('inscriptionModal');
            if (modal) {
                modal.classList.remove('show');
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }
    </script>
    <style>
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #10B981;
            color: white;
            padding: 1rem;
            border-radius: 0.5rem;
            display: none;
            align-items: center;
            gap: 0.5rem;
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="overflow-x-hidden antialiased">
    @include('layouts.header')
    @include('pages.home')
    @include('pages.services')
    @include('pages.features')
    @include('pages.blogs')
    @include('pages.pricing')
    @include('pages.testimonials')
    @include('pages.contacts')

    <!-- END FEATURES SECTION -->
     

    <!-- FontAwesome CDN (Ajoutez ceci dans le <head> de votre page si nécessaire) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Start Testimonials -->

    <!-- End Testimonials-->


    @include('layouts.footer')

   <!-- Modal d'inscription -->
<div id="inscriptionModal" class="modal">
    <div class="modal-content">
        <button class="close-button">&times;</button>
        <h2 class="text-3xl font-semibold mb-8 text-center">Inscription</h2>
        <form id="inscriptionForm" class="space-y-6">
            <div class="form-group">
                <label class="form-label" for="fname">Prénom</label>
                <input type="text" id="fname" name="fname" class="form-input" required placeholder="Entrez votre prénom">
                <div class="error-text" data-error="fname"></div>
            </div>
            <div class="form-group">
                <label class="form-label" for="lname">Nom</label>
                <input type="text" id="lname" name="lname" class="form-input" required placeholder="Entrez votre nom">
                <div class="error-text" data-error="lname"></div>
            </div>
            <div class="form-group">
                <label class="form-label" for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" class="form-input" required placeholder="Entrez votre numéro de téléphone">
                <div class="error-text" data-error="phone"></div>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-input" required placeholder="Entrez votre email">
                <div class="error-text" data-error="email"></div>
                <div id="email-exists-error" class="text-red-500 text-sm mt-1 hidden">
                    Cet email existe déjà. Veuillez en utiliser un autre email.
                </div>
            </div>


            <div class="form-group">
                <label class="form-label" for="service">Service souhaité</label>
                <div class="dropdown">
                    <div class="selected-option" id="selectedOption">Sélectionnez un service</div>
                    <div class="options" id="options">
                        <div class="option" data-value="">Sélectionnez un service</div>
                        <div class="option" data-value="personalCoaching">Coaching Personnel (90€)</div>
                        <div class="optgroup" id="coachingProfessional">
                            <div class="group-label">Coaching Professionnel</div>
                            <div class="sub-options">
                                <div class="option" data-value="professionalDevelopment">Développement Professionnel (350€)</div>
                                <div class="option" data-value="professionalReconversion">Reconversion Professionnelle (500€)</div>
                            </div>
                        </div>
                        <div class="optgroup" id="entrepreneurship">
                            <div class="group-label">Accompagnement à l'Entrepreneuriat</div>
                            <div class="sub-options">
                                <div class="option" data-value="entrepreneurshipStandardPack">Pack Standard (800€)</div>
                                <div class="option" data-value="entrepreneurshipPremiumPack">Pack Premium (Tarif sur devis)</div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="service" id="serviceInput">
                    <div class="error-text" data-error="service"></div>
                </div>
            </div>
            <button type="submit" class="submit-button">Continuer</button>
        </form>
    </div>
</div>

<div id="successMessage" class="success-message flex items-center">
    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
    </svg>
    <span>Inscription réussie !!!</span>
</div>

<!-- Modal de paiement -->
<div id="paymentModal" class="modal">
    <div class="modal-content payment-modal">
        <button class="close-button">&times;</button>
        <h2 class="text-3xl font-semibold mb-8 text-center">Finaliser votre réservation</h2>

        <div class="summary-section">
            <h3 class="text-xl font-semibold mb-4">Récapitulatif de la commande</h3>
            <div class="summary-details">
                <div class="summary-row">
                    <span>Service sélectionné:</span>
                    <span id="summary-service" class="font-medium"></span>
                </div>
                <div class="summary-row">
                    <span>Prix:</span>
                    <span id="summary-price" class="font-medium"></span>
                </div>
                <div class="summary-total">
                    <span>Total à payer:</span>
                    <span id="summary-total" class="text-xl font-bold text-indigo-600"></span>
                </div>
            </div>
        </div>

        <div class="payment-methods">
            <h3 class="text-xl font-semibold mb-4">Choisissez votre mode de paiement I consent to the processing of my personal data in accordance with EU laws.
*</h3>

            <!-- PayPal -->
            <!-- <label class="payment-option">
                <input type="radio" name="payment_method" value="paypal">
                <div class="payment-option-content">
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg" 
                         alt="PayPal" 
                         class="payment-logo">
                    <div class="payment-details">
                        <span class="payment-title">PayPal</span>
                        <span class="payment-description">Paiement sécurisé via PayPal - Cartes acceptées</span>
                    </div>
                    <div class="payment-check">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
            </label> -->
            <div id="paypal-button-container" class="hidden mt-4"></div>

            <!-- Stripe -->
            <label class="payment-option">
                <input type="radio" name="payment_method" value="stripe">
                <div class="payment-option-content">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Stripe_Logo%2C_revised_2016.svg" 
                         alt="Stripe" 
                         class="payment-logo">
                    <div class="payment-details">
                        <span class="payment-title">Carte bancaire</span>
                        <span class="payment-description">Paiement sécurisé par carte - Visa, Mastercard, AMEX</span>
                    </div>
                    <div class="payment-check">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
            </label>
            <div id="stripe-elements" class="hidden mt-6">
                <div id="card-element" class="p-4 border rounded-lg"></div>
                <div id="card-errors" class="text-red-500 text-sm mt-2" role="alert"></div>
            </div>

            <!-- Paiement sur place -->
            <label class="payment-option">
                <input type="radio" name="payment_method" value="onsite">
                <div class="payment-option-content">
                    <div class="payment-icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="payment-details">
                        <span class="payment-title">Paiement sur place</span>
                        <span class="payment-description">Payez lors de votre rendez-vous - Confirmation immédiate par WhatsApp</span>
                    </div>
                    <div class="payment-check">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
            </label>
        </div>

        <!-- Bouton de confirmation -->
        <div class="payment-actions mt-6 flex justify-end space-x-4">
            <button type="button" 
                    class="btn-secondary px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300" 
                    onclick="hidePaymentModal()">
                Annuler
            </button>
            <button type="button" 
                    id="confirm-payment-btn" 
                    class="btn-primary hidden px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 flex items-center justify-center">
                <span class="btn-text">Confirmer le paiement</span>
                <svg id="payment-spinner" 
                     class="animate-spin h-5 w-5 ml-3 hidden" 
                     xmlns="http://www.w3.org/2000/svg" 
                     fill="none" 
                     viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" 
                          fill="currentColor" 
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
</div>
   
    
    <!-- <script>
    // Afficher le modal automatiquement si des erreurs sont présentes
    @if($errors->any() || session('showModal'))
        document.addEventListener('DOMContentLoaded', function() {
            showModal();
        });
    @endif
     
    document.addEventListener('DOMContentLoaded', function() {
        const emailInput = document.getElementById('email');
        const emailExistsError = document.getElementById('email-exists-error');
        let emailCheckTimeout;

        emailInput.addEventListener('input', function() {
            clearTimeout(emailCheckTimeout);

            emailCheckTimeout = setTimeout(async function() {
                const email = emailInput.value;

                if (email && email.includes('@')) {
                    try {
                        const response = await fetch('/check-email', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ email: email })
                        });

                        const data = await response.json();

                        if (data.exists) {
                            emailExistsError.classList.remove('hidden');
                            emailInput.classList.add('border-red-500');
                        } else {
                            emailExistsError.classList.add('hidden');
                            emailInput.classList.remove('border-red-500');
                        }
                    } catch (error) {
                        console.error('Erreur lors de la vérification de l\'email:', error);
                    }
                }
            }, 500); // Délai de 500ms avant de vérifier
        });
    });
</script> -->

    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
