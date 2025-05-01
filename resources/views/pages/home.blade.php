<div class="relative overflow-hidden bg-white lg:pt-24 lg:pb-32">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <!-- Texte et CTA -->
            <div class="lg:w-1/2 z-10 relative text-center lg:text-left mb-16 lg:mb-0">
                <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6 leading-tight animate-fadeIn">
                    Libérez votre<br>
                    <span class="relative inline-block">
                        <span class="relative z-10">Potentiel Créatif</span>
                        <span class="absolute bottom-2 left-0 w-full h-3 bg-blue-100 transform -rotate-1 z-0"></span>
                    </span>
                </h1>
                
                <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-xl mx-auto lg:mx-0">
                    Transformation professionnelle par l'excellence personnelle. Dépassement de soi guidé par des experts.
                </p>

                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#" onclick="showModal()"  
                       class="inline-block px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-300 hover:shadow-lg transform hover:translate-y-px">
                       Commencer maintenant
                    </a>
                    
                    <a href="#services" 
                       class="inline-block px-8 py-4 border-2 border-blue-200 hover:border-blue-300 text-blue-600 font-medium rounded-lg transition-all duration-300 hover:bg-blue-50">
                       Découvrir nos services
                    </a>
                </div>

                <!-- Partenaires -->
                <div class="mt-16 lg:mt-20">
                    <p class="text-sm uppercase tracking-wider text-gray-500 mb-6">Ils nous font confiance</p>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-10 opacity-70">
                        <!-- Logos simplifiés -->
                        <svg class="h-8 text-gray-400" viewBox="0 0 128 128"><path fill="currentColor" d="M78.8..."/></svg>
                        <svg class="h-8 text-gray-400" viewBox="0 0 128 128"><path fill="currentColor" d="M22.6..."/></svg>
                        <svg class="h-8 text-gray-400" viewBox="0 0 128 128"><path fill="currentColor" d="M86.2..."/></svg>
                    </div>
                </div>
            </div>

            <!-- Image avec effet subtil -->
            <div class="lg:w-1/2 relative">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-100 to-purple-100 rounded-xl transform rotate-1 scale-105"></div>
                    <img src="{{ asset('images/Coaching(4).jpg') }}" 
                         class="relative z-10 w-full max-w-lg mx-auto rounded-xl shadow-xl transform transition-all duration-500"
                         alt="Coaching professionnel expert">
                </div>
            </div>
        </div>
    </div>

    <!-- Éléments décoratifs subtils -->
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-20 right-0 w-64 h-64 bg-blue-50 rounded-full opacity-50 blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-40 h-40 bg-purple-50 rounded-full opacity-50 blur-2xl"></div>
    </div>
</div>

<style>
    .animate-fadeIn {
        animation: fadeIn 0.8s ease-out forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Bouton retour en haut -->
<button id="scrollTopBtn" class="scroll-top-btn" title="Retour en haut">↑</button>

<style>
    .scroll-top-btn {
        position: fixed;
        bottom: 24px;
        right: 24px;
        width: 48px;
        height: 48px;
        background-color: white;
        color: #3B82F6;
        border: none;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        display: none;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .scroll-top-btn:hover {
        background-color: #F9FAFB;
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollTopBtn = document.getElementById('scrollTopBtn');

        // Afficher le bouton quand l'utilisateur défile vers le bas
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.style.display = 'flex';
                scrollTopBtn.style.alignItems = 'center';
                scrollTopBtn.style.justifyContent = 'center';
            } else {
                scrollTopBtn.style.display = 'none';
            }
        });

        // Fonction pour remonter en haut lors du clic
        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>