<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Section Témoignages</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <style>
    .bg-custom-indigo {
      background-color: #4f46e5;
    }
    .hover\:bg-custom-indigo:hover {
      background-color: #4f46e5;
    }
  </style>
</head>
<body>
  <div id="testimonials" class="flex items-center justify-center w-full px-8 py-12 bg-gradient-to-b from-gray-50 to-white md:py-16 lg:py-24 xl:py-40 xl:px-0" x-data="testimonialData()">
    <div class="max-w-6xl mx-auto">
      <div class="flex-col items-center">
        <div class="flex flex-col items-center justify-center w-full h-full max-w-2xl mx-auto text-center mb-12">
          <p class="my-4 text-base font-semibold tracking-wide text-purple-600 uppercase">Ce que nos clients disent</p>
          <h2 class="text-4xl font-bold leading-tight tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
            Témoignages
          </h2>
          <div class="w-24 h-1 mx-auto my-6 bg-custom-indigo rounded-full"></div>
          <p class="my-6 text-xl font-normal text-gray-600">Découvrez comment notre produit transforme l'expérience de nos clients et pourquoi ils nous adorent.</p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
          <!-- Témoignages initiaux -->
          <template x-for="(testimonial, index) in visibleTestimonials" :key="index">
            <div class="p-6 transition-all duration-300 transform bg-white rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-2">
              <div class="flex flex-col md:flex-row md:items-start">
                <div class="flex-shrink-0 mx-auto mb-4 md:mb-0 md:mr-5 md:mx-0">
                  <img class="object-cover w-20 h-20 rounded-full ring-4 ring-purple-100" 
                    :src="testimonial.image"
                    :alt="testimonial.name">
                </div>
                <div class="flex-1">
                  <div class="flex items-center mb-2">
                    <template x-for="star in 5" :key="star">
                      <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                      </svg>
                    </template>
                  </div>
                  <p class="mb-4 text-lg italic text-gray-700" x-text="testimonial.quote"></p>
                  <div class="pt-3 border-t border-gray-200">
                    <h3 class="text-base font-bold text-gray-900" x-text="testimonial.name"></h3>
                    <p class="text-sm text-purple-600" x-text="testimonial.title"></p>
                  </div>
                </div>
              </div>
            </div>
          </template>
        </div>
        
        <div class="flex justify-center mt-12" x-show="!allTestimonialsShown">
          <button @click="showMoreTestimonials" class="px-8 py-3 font-semibold text-white transition-all duration-300 bg-custom-indigo rounded-lg shadow-md hover:bg-custom-indigo hover:shadow-lg">
            Voir plus de témoignages
          </button>
        </div>
        
        <div class="flex justify-center mt-12" x-show="allTestimonialsShown">
          <button @click="showLessTestimonials" class="px-8 py-3 font-semibold text-white transition-all duration-300 bg-custom-indigo rounded-lg shadow-md hover:bg-custom-indigo hover:shadow-lg">
            Voir moins de témoignages
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function testimonialData() {
      return {
        allTestimonialsShown: false,
        itemsPerPage: 4,
        currentPage: 1,
        allTestimonials: [
          {
            name: "Sandra Walton",
            title: "CEO, SomeCompany",
            quote: "J'adore ces templates! Les fonctionnalités et les mises en page sont vraiment impressionnantes.",
            image: "https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2694&q=80"
          },
          {
            name: "Mike Smith",
            title: "CEO, SomeCompany",
            quote: "Extrêmement utile pour tous les projets que nous avons lancés.",
            image: "https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1700&q=80"
          },
          {
            name: "Kenny Jones",
            title: "CEO, SomeCompany",
            quote: "J'adore vraiment ce service. Maintenant, je peux rapidement démarrer n'importe quel projet.",
            image: "https://images.unsplash.com/photo-1546820389-44d77e1f3b31?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1400&q=80"
          },
          {
            name: "Molly Sanchez",
            title: "CEO, SomeCompany",
            quote: "Enfin un système rapide et facile que je peux utiliser pour tout type de projet.",
            image: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2700&q=80"
          },
          {
            name: "Thomas Laurent",
            title: "Directeur Marketing, TechCorp",
            quote: "Ce service a complètement transformé notre façon de travailler. Gain de temps incroyable !",
            image: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2700&q=80"
          },
          {
            name: "Sophie Dubois",
            title: "Designer UX, CreativeStudio",
            quote: "La meilleure solution que j'ai trouvée après des années de recherche. Bravo à l'équipe !",
            image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2700&q=80"
          },
          {
            name: "Jean Dupont",
            title: "Entrepreneur",
            quote: "Grâce à ce produit, j'ai pu lancer ma startup en un temps record. Je le recommande vivement !",
            image: "https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2700&q=80"
          },
          {
            name: "Marie Leroy",
            title: "Responsable Projet, GlobalTech",
            quote: "La qualité du service client est exceptionnelle. Ils ont résolu tous mes problèmes en un temps record.",
            image: "https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2700&q=80"
          }
        ],
        get visibleTestimonials() {
          return this.allTestimonials.slice(0, this.currentPage * this.itemsPerPage);
        },
        showMoreTestimonials() {
          if (this.currentPage * this.itemsPerPage < this.allTestimonials.length) {
            this.currentPage++;
            if (this.currentPage * this.itemsPerPage >= this.allTestimonials.length) {
              this.allTestimonialsShown = true;
            }
          } else {
            this.allTestimonialsShown = true;
          }
        },
        showLessTestimonials() {
          this.currentPage = 1;
          this.allTestimonialsShown = false;
        }
      };
    }
  </script>
</body>
</html>
