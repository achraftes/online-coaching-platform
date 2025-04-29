<div class="relative overflow-hidden bg-gradient-to-br from-indigo-900 to-purple-800 lg:pt-32 lg:pb-40">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <!-- Texte et CTA -->
            <div class="lg:w-1/2 z-10 relative text-center lg:text-left mb-16 lg:mb-0">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight animate-slideUp">
                    Libérez votre<br>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-pink-300">Potentiel Créatif</span>
                </h1>
                
                <p class="text-lg md:text-xl text-indigo-100 mb-8 max-w-xl mx-auto lg:mx-0">
                    Transformation professionnelle par l'excellence personnelle. Dépassement de soi guidé par des experts.
                </p>

                <div class="space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#" onclick="showModal()" 
                       class="inline-block px-8 py-4 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-semibold rounded-lg transform transition-all duration-300 hover:scale-105 shadow-xl">
                       Commencer maintenant
                    </a>
                    
                    <a href="#services" 
                       class="inline-block px-8 py-4 border-2 border-white/20 hover:border-white/40 text-white font-semibold rounded-lg transition-all duration-300 hover:bg-white/10">
                       Découvrir nos services
                    </a>
                </div>

                <!-- Partenaires -->
                <div class="mt-16 lg:mt-24">
                    <p class="text-sm uppercase tracking-widest text-indigo-300 mb-6">Ils nous font confiance</p>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-8 opacity-90">
                        <!-- Logos simplifiés -->
                        <svg class="h-8 text-white" viewBox="0 0 128 128"><path fill="currentColor" d="M78.8..."/></svg>
                        <svg class="h-8 text-white" viewBox="0 0 128 128"><path fill="currentColor" d="M22.6..."/></svg>
                        <svg class="h-8 text-white" viewBox="0 0 128 128"><path fill="currentColor" d="M86.2..."/></svg>
                    </div>
                </div>
            </div>

            <!-- Image avec effet 3D -->
            <div class="lg:w-1/2 relative">
                <div class="relative lg:-mr-16 xl:-mr-32">
                    <div class="absolute -top-8 -left-8 w-full h-full bg-gradient-to-br from-pink-500 to-purple-600 rounded-2xl transform rotate-3"></div>
                    <img src="{{ asset('images/Coaching(4).jpg') }}" 
                         class="relative z-10 w-full max-w-lg rounded-2xl shadow-2xl transform hover:rotate-1 transition-all duration-500"
                         alt="Coaching professionnel expert">
                </div>
            </div>
        </div>
    </div>

    <!-- Éléments décoratifs -->
    <div class="absolute top-0 left-0 w-full h-full opacity-10">
        <div class="absolute top-20 left-20 w-64 h-64 bg-purple-400 rounded-full mix-blend-screen blur-3xl animate-float"></div>
        <div class="absolute bottom-10 right-32 w-48 h-48 bg-pink-400 rounded-full mix-blend-screen blur-3xl animate-float-delayed"></div>
    </div>
</div>

<style>
    .animate-slideUp {
        animation: slideUp 0.8s cubic-bezier(0.22, 0.61, 0.36, 1) forwards;
    }

    @keyframes slideUp {
        from { transform: translateY(40px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .animate-float {
        animation: float 8s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float 8s 2s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(3deg); }
    }
</style>
