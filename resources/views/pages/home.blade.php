<div class="relative items-center justify-center w-full overflow-x-hidden lg:pt-40 lg:pb-40 xl:pt-40 xl:pb-64">
    <div
        class="container flex flex-col items-center justify-between h-full max-w-6xl px-8 mx-auto -mt-32 lg:flex-row xl:px-0">
        <div
            class="z-30 flex flex-col items-center w-full max-w-xl pt-48 text-center lg:items-start lg:w-1/2 lg:pt-20 xl:pt-40 lg:text-left">
            <div class="relative bg-white/70 backdrop-blur-md rounded-lg p-8 lg:p-12">
                <h1 class="relative mb-4 text-3xl font-black leading-tight text-gray-900 sm:text-6xl xl:mb-8">Libérez
                    votre <br>plein potentiel
                </h1>
                <p class="pr-0 mb-8 text-base text-gray-600 sm:text-lg xl:text-xl lg:pr-20">Coaching sur mesure pour
                    accélérer votre carrière et atteindre vos objectifs professionnels.</p>
                <a href="#" onclick="showModal()"
                    class="relative self-start inline-block w-auto px-8 py-4 mx-auto mt-0 text-base font-bold text-white bg-indigo-600 border-t border-gray-200 rounded-md shadow-xl sm:mt-1 fold-bold lg:mx-0">
                    Prenez un Rendez-vous
                </a>
            </div>

            <div class="flex-col hidden mt-12 sm:flex lg:mt-24">
                <p class="mb-4 text-sm font-medium tracking-widest text-gray-500 uppercase">Integrates With</p>
                <div class="flex">
                    </div>
            </div>
            <svg class="absolute left-0 max-w-md mt-24 -ml-64 left-svg" viewBox="0 0 423 423"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <linearGradient x1="100%" y1="0%" x2="4.48%" y2="0%" id="linearGradient-1">
                        <stop stop-color="#5C54DB" offset="0%" />
                        <stop stop-color="#6A82E7" offset="100%" />
                    </linearGradient>
                    <filter x="-9.3%" y="-6.7%" width="118.7%" height="118.7%" filterUnits="objectBoundingBox"
                        id="filter-3">
                        <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
                        <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                        <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" in="shadowBlurOuter1" />
                    </filter>
                    <rect id="path-2" x="63" y="504" width="300" height="300" rx="40" />
                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity=".9">
                    <g id="Desktop-HD" transform="translate(-39 -531)">
                        <g id="Hero" transform="translate(43 83)">
                            <g id="Rectangle-6" transform="rotate(45 213 654)">
                                <use fill="#000" filter="url(#filter-3)" xlink:href="#path-2" />
                                <use fill="url(#linearGradient-1)" xlink:href="#path-2" />
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <div class="relative z-50 flex flex-col items-end justify-center w-full h-full lg:w-1/2 ms:pl-10">
            <div class="container relative left-0 w-full max-w-3xl lg:absolute xl:max-w-4xl lg:w-screen">
                <img src="{{ asset('images/Coaching(4).jpg') }}"
                    class="w-4/5 md:w-3/4 lg:w-full h-auto mt-12 mb-12 mx-auto lg:mt-16 xl:mt-24 lg:mb-0 object-cover object-center"
                    alt="Coaching professionnel" style="opacity: 0.8;">
            </div>
        </div>
    </div>
</div>
<!-- Dans resources/views/home.blade.php ou welcome.blade.php -->


    <!-- Bouton retour en haut spécifique à la page d'accueil -->
    <button id="scrollTopBtn" class="scroll-top-btn" title="Retour en haut">↑</button>

<style>
    .scroll-top-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        background-color: #4F46E5;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 18px;
        cursor: pointer;
        display: none;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .scroll-top-btn:hover {
        background-color: #4F46E5;
        transform: translateY(-3px);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollTopBtn = document.getElementById('scrollTopBtn');

        // Afficher le bouton quand l'utilisateur défile vers le bas
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.style.display = 'block';
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
