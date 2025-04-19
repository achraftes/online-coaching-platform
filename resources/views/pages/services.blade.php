<!-- Section Nos Services -->
<div id="services" class="w-full px-6 py-16 bg-white">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Nos Services</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
      <!-- Service 1 -->
      <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition" onclick="toggleDetails('details1')">
        <h3 class="text-xl font-semibold text-indigo-600 mb-4">Coaching Individuel</h3>
        <p class="text-gray-700">Un accompagnement personnalisé pour atteindre vos objectifs...</p>
        <div id="details1" class="text-gray-700 hidden mt-4">
          <ul class="space-y-2">
            <li><i class="fas fa-user mr-2 text-indigo-500"></i>Suivi personnalisé</li>
            <li><i class="fas fa-bullseye mr-2 text-indigo-500"></i>Objectifs clairs et atteignables</li>
            <li><i class="fas fa-chart-line mr-2 text-indigo-500"></i>Suivi de progrès</li>
          </ul>
        </div>
      </div>

      <!-- Service 2 -->
      <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition" onclick="toggleDetails('details2')">
        <h3 class="text-xl font-semibold text-indigo-600 mb-4">Coaching en Équipe</h3>
        <p class="text-gray-700">Améliorez la collaboration et la performance de vos équipes...</p>
        <div id="details2" class="text-gray-700 hidden mt-4">
          <ul class="space-y-2">
            <li><i class="fas fa-users mr-2 text-indigo-500"></i>Travail collaboratif</li>
            <li><i class="fas fa-handshake mr-2 text-indigo-500"></i>Communication renforcée</li>
            <li><i class="fas fa-lightbulb mr-2 text-indigo-500"></i>Résolution de problèmes</li>
          </ul>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition" onclick="toggleDetails('details3')">
        <h3 class="text-xl font-semibold text-indigo-600 mb-4">Formation en Ligne</h3>
        <p class="text-gray-700">Accédez à nos modules de formation en ligne pour apprendre...</p>
        <div id="details3" class="text-gray-700 hidden mt-4">
          <ul class="space-y-2">
            <li><i class="fas fa-laptop-code mr-2 text-indigo-500"></i>Modules interactifs</li>
            <li><i class="fas fa-clock mr-2 text-indigo-500"></i>Accès flexible 24/7</li>
            <li><i class="fas fa-certificate mr-2 text-indigo-500"></i>Certification à la fin</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- JS pour toggle -->
<script>
  function toggleDetails(id) {
    const details = document.getElementById(id);
    details.classList.toggle('hidden');
  }
</script>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
