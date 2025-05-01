<div class="relative overflow-hidden bg-gray-50 lg:pt-20 lg:pb-32">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <!-- Texte et CTA -->
            <div class="lg:w-2/5 z-10 relative text-center lg:text-left mb-16 lg:mb-0">
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    Libérez votre
                    <span class="block mt-2 text-indigo-700">Potentiel Créatif</span>
                </h1>
                
                <p class="text-lg md:text-xl text-gray-700 mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                    Transformation professionnelle par l'excellence personnelle. Dépassement de soi guidé par des experts.
                </p>

                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#" onclick="showModal()"  
                       class="inline-block px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium transition-all duration-300 hover:shadow-lg">
                       Commencer maintenant
                    </a>
                    
                    <a href="#services" 
                       class="inline-block px-8 py-4 bg-gray-50 border border-indigo-200 hover:border-indigo-300 text-indigo-700 font-medium transition-all duration-300 hover:bg-indigo-50">
                       Découvrir nos services
                    </a>
                </div>

                <!-- Partenaires -->
                <div class="mt-16">
                    <p class="text-sm uppercase tracking-wider text-gray-500 mb-6 font-medium">Ils nous font confiance</p>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-10">
                        <!-- Logos simplifiés -->
                        <svg class="h-6 text-gray-400" viewBox="0 0 128 128"><path fill="currentColor" d="M78.8..."/></svg>
                        <svg class="h-6 text-gray-400" viewBox="0 0 128 128"><path fill="currentColor" d="M22.6..."/></svg>
                        <svg class="h-6 text-gray-400" viewBox="0 0 128 128"><path fill="currentColor" d="M86.2..."/></svg>
                    </div>
                </div>
            </div>

            <!-- Image intégrée sans cadre -->
            <div class="lg:w-3/5 relative">
                <img src="{{ asset('images/Coaching(4).jpg') }}" 
                     class="w-full object-cover h-[500px] lg:h-[600px]"
                     alt="Coaching professionnel expert">
                
                <!-- Superposition subtile pour harmoniser avec la page -->
                <div class="absolute inset-0 bg-indigo-900/5 mix-blend-multiply"></div>
            </div>
        </div>
    </div>

    <!-- Élément décoratif très subtil -->
    <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-gray-100 to-transparent"></div>
</div>

<!-- Bouton retour en haut -->
<button id="scrollTopBtn" class="scroll-top-btn" title="Retour en haut">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
    </svg>
</button>

<style>
    .scroll-top-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background-color: #4F46E5;
        color: white;
        border: none;
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .scroll-top-btn:hover {
        background-color: #4338CA;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollTopBtn = document.getElementById('scrollTopBtn');

        // Afficher le bouton quand l'utilisateur défile vers le bas
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.style.display = 'flex';
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