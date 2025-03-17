<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coaching Professionel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
</head>

<body class="overflow-x-hidden antialiased">
    @include('layouts.header')
    @include('pages.home')
    @include('pages.features')
    @include('pages.blogs')
    @include('pages.pricing')
    @include('pages.testimonials')

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
                    <input type="text" id="fname" name="fname" class="form-input" required
                        placeholder="Entrez votre prénom">
                    <div class="error-text" data-error="fname"></div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="lname">Nom</label>
                    <input type="text" id="lname" name="lname" class="form-input" required
                        placeholder="Entrez votre nom">
                    <div class="error-text" data-error="lname"></div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" class="form-input" required
                        placeholder="Entrez votre numéro de téléphone">
                    <div class="error-text" data-error="phone"></div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-input" required
                        placeholder="Entrez votre email">
                    <div class="error-text" data-error="email"></div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="service">Service souhaité</label>
                    <select id="service" name="service" class="form-input" required>
                        <option value="">Sélectionnez un service</option>
                        <option value="starter">Starter (CA$550.00)</option>
                        <option value="professional">Professional (CA$750.00)</option>
                        <option value="enterprise">Enterprise (CA$950.00)</option>
                    </select>
                    <div class="error-text" data-error="service"></div>
                </div>

                <button type="submit" class="submit-button">
                    Continuer
                </button>
            </form>
        </div>
    </div>

    <div id="successMessage" class="success-message flex items-center">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <span>Inscription réussie !</span>
    </div>

    <!-- Ajouter la modal de paiement -->
    <div id="paymentModal" class="modal">
        <div class="modal-content" style="max-width: 600px;">
            <button class="close-button" onclick="hidePaymentModal()">&times;</button>
            <h2 class="text-3xl font-semibold mb-8 text-center">Paiement</h2>

            <div class="summary-section">
                <h3 class="text-xl font-semibold mb-4">Récapitulatif</h3>
                <div class="summary-row">
                    <span>Service:</span>
                    <span id="summary-service" class="font-medium"></span>
                </div>
                <div class="summary-row">
                    <span>Prix:</span>
                    <span id="summary-price" class="font-medium"></span>
                </div>
                <div class="summary-total">
                    <div class="summary-row">
                        <span>Total:</span>
                        <span id="summary-total" class="text-lg font-bold text-indigo-600"></span>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-xl font-semibold mb-4">Mode de paiement</h3>
                <div class="space-y-4">
                    <label class="payment-option flex items-center">
                        <input type="radio" name="payment_method" value="onsite">
                        <div class="ml-3">
                            <span class="font-medium">Paiement sur place</span>
                            <p class="text-sm text-gray-500 mt-1">Payez lors de votre rendez-vous</p>
                        </div>
                    </label>
                    <label class="payment-option flex items-center">
                        <input type="radio" name="payment_method" value="paypal">
                        <div class="ml-3">
                            <span class="font-medium">PayPal</span>
                            <p class="text-sm text-gray-500 mt-1">Paiement sécurisé en ligne</p>
                        </div>
                    </label>
                </div>
            </div>

            <div class="flex justify-between gap-4">
                <button onclick="hidePaymentModal()"
                    class="px-6 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-all duration-300 flex-1">
                    Retour
                </button>
                <button onclick="processPayment()"
                    class="px-6 py-3 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-all duration-300 flex-1">
                    Confirmer le paiement
                </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
