 <div id="features" class="relative w-full px-8 py-10 border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
     <div id="blogs" class="container flex flex-col items-center justify-between h-full max-w-6xl mx-auto">
         <h2 class="my-5 text-base font-medium tracking-tight text-indigo-500 uppercase">Nos services</h2>
         <h6
             class="max-w-2xl px-5 mt-2 text-3xl font-black leading-tight text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl">
             Nous vous accompagnons à chaque étape de votre évolution
         </h6>

         <div class="flex flex-col w-full mt-0 lg:flex-row sm:mt-10 lg:mt-20">

             <!-- Coaching individuel -->
             <div class="w-full max-w-md p-4 mx-auto mb-10 lg:w-1/3">
                 <div
                     class="relative flex flex-col items-center justify-center w-full h-full p-10 rounded-lg shadow-lg bg-white">
                     <i class="fas fa-user-tie text-6xl text-indigo-500"></i>
                     <h4 class="relative mt-6 text-lg font-bold">Coaching individuel</h4>
                     <p class="relative mt-2 text-base text-center text-gray-600">
                         Des séances personnalisées pour définir votre projet et surmonter vos défis.
                     </p>
                     <a href="{{ route('coaching') }}" class="relative flex mt-2 text-sm font-medium text-indigo-500 underline">
                         En savoir plus
                     </a>
                 </div>
             </div>

             <!-- Développement du leadership -->
             <div class="w-full max-w-md p-4 mx-auto mb-10 lg:w-1/3">
                 <div
                     class="relative flex flex-col items-center justify-center w-full h-full p-10 rounded-lg shadow-lg bg-white">
                     <i class="fas fa-chart-line text-6xl text-indigo-500"></i>
                     <h4 class="relative mt-6 text-lg font-bold">Développement du leadership</h4>
                     <p class="relative mt-2 text-base text-center text-gray-600">
                         Apprenez à motiver et inspirer votre équipe pour des résultats performants.
                     </p>
                     <a href="{{ route('leadership') }}" class="relative flex mt-2 text-sm font-medium text-indigo-500 underline">
                         En savoir plus
                     </a>
                 </div>
             </div>

             <!-- Gestion du stress et de la confiance -->
             <div class="w-full max-w-md p-4 mx-auto mb-10 lg:w-1/3">
                 <div
                     class="relative flex flex-col items-center justify-center w-full h-full p-10 rounded-lg shadow-lg bg-white">
                     <i class="fas fa-brain text-6xl text-indigo-500"></i>
                     <h4 class="relative mt-6 text-lg font-bold">Gestion du stress et de la confiance</h4>
                     <p class="relative mt-2 text-base text-center text-gray-600">
                         Renforcez votre mindset pour gérer la pression et maximiser votre impact.
                     </p>
                     <a href="{{ route('stress') }}" class="relative flex mt-2 text-sm font-medium text-indigo-500 underline">
                         En savoir plus
                     </a>
                 </div>
             </div>

         </div>
     </div>
 </div>
