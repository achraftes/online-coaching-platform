<!-- Section Nos Services -->
<div id="services" class="w-full px-6 py-16 bg-white">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Nos Services</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
      <!-- Service 1 -->
      <div onclick="openModal('modal1')" class="cursor-pointer bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-indigo-600 mb-4">Coaching Individuel</h3>
        <p class="text-gray-700">Un accompagnement personnalisé pour atteindre vos objectifs...</p>
      </div>

      <!-- Service 2 -->
      <div onclick="openModal('modal2')" class="cursor-pointer bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-indigo-600 mb-4">Coaching en Équipe</h3>
        <p class="text-gray-700">Améliorez la collaboration et la performance de vos équipes...</p>
      </div>

      <!-- Service 3 -->
      <div onclick="openModal('modal3')" class="cursor-pointer bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-indigo-600 mb-4">Formation en Ligne</h3>
        <p class="text-gray-700">Accédez à nos modules de formation en ligne pour apprendre...</p>
      </div>
    </div>
  </div>
</div>

<!-- Modals -->
<div id="modal1" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" onclick="closeModal('modal1', event)">
  <div class="bg-white rounded-lg p-6 max-w-md w-full relative" onclick="event.stopPropagation()">
    <button onclick="closeModal('modal1')" class="absolute top-2 right-2 text-gray-500 hover:text-red-500">&times;</button>
    <h3 class="text-xl font-bold mb-4 text-indigo-600">Coaching Individuel</h3>
    <ul class="space-y-2 text-gray-700">
      <li><i class="fas fa-user mr-2 text-indigo-500"></i>Suivi personnalisé</li>
      <li><i class="fas fa-bullseye mr-2 text-indigo-500"></i>Objectifs clairs et atteignables</li>
      <li><i class="fas fa-chart-line mr-2 text-indigo-500"></i>Suivi de progrès</li>
    </ul>
  </div>
</div>

<div id="modal2" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" onclick="closeModal('modal2', event)">
  <div class="bg-white rounded-lg p-6 max-w-md w-full relative" onclick="event.stopPropagation()">
    <button onclick="closeModal('modal2')" class="absolute top-2 right-2 text-gray-500 hover:text-red-500">&times;</button>
    <h3 class="text-xl font-bold mb-4 text-indigo-600">Coaching en Équipe</h3>
    <ul class="space-y-2 text-gray-700">
      <li><i class="fas fa-users mr-2 text-indigo-500"></i>Travail collaboratif</li>
      <li><i class="fas fa-handshake mr-2 text-indigo-500"></i>Communication renforcée</li>
      <li><i class="fas fa-lightbulb mr-2 text-indigo-500"></i>Résolution de problèmes</li>
    </ul>
  </div>
</div>

<div id="modal3" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" onclick="closeModal('modal3', event)">
  <div class="bg-white rounded-lg p-6 max-w-md w-full relative" onclick="event.stopPropagation()">
    <button onclick="closeModal('modal3')" class="absolute top-2 right-2 text-gray-500 hover:text-red-500">&times;</button>
    <h3 class="text-xl font-bold mb-4 text-indigo-600">Formation en Ligne</h3>
    <ul class="space-y-2 text-gray-700">
      <li><i class="fas fa-laptop-code mr-2 text-indigo-500"></i>Modules interactifs</li>
      <li><i class="fas fa-clock mr-2 text-indigo-500"></i>Accès flexible 24/7</li>
      <li><i class="fas fa-certificate mr-2 text-indigo-500"></i>Certification à la fin</li>
    </ul>
  </div>
</div>

<!-- JS pour gérer les modals -->
<script>
  // Fonction pour ouvrir la modal
  function openModal(id) {
    // Ouvrir la modal spécifique
    const modal = document.getElementById(id);
    modal.classList.remove('hidden');
  }

  // Fonction pour fermer la modal
  function closeModal(id, event) {
    // Si l'utilisateur clique en dehors de la modal (background)
    if (event.target.id === id) {
      const modal = document.getElementById(id);
      modal.classList.add('hidden');
    }
  }
</script>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
