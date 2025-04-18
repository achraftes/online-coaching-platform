<div id="contacts" class="w-full px-6 py-12 bg-gray-50">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Contact Us</h2>

    <!-- ✅ Message de succès -->
    @if(session('success'))
      <div class="mb-6 text-green-700 bg-green-100 border border-green-400 rounded-lg px-4 py-3 text-center">
        {{ session('success') }}
      </div>
    @endif

    <!-- ✅ Messages d’erreur -->
    @if($errors->any())
      <div class="mb-6 text-red-700 bg-red-100 border border-red-400 rounded-lg px-4 py-3">
        <ul class="list-disc list-inside">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Formulaire -->
    <form method="POST" action="{{ route('contact.send') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
      @csrf
      <input type="text" name="name" placeholder="Your Name"
        value="{{ old('name') }}"
        class="p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
        
      <input type="email" name="email" placeholder="Your Email"
        value="{{ old('email') }}"
        class="p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
        
      <textarea name="message" rows="5" placeholder="Your Message"
        class="md:col-span-2 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">{{ old('message') }}</textarea>
      
      <button type="submit"
        class="md:col-span-2 bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 transition">Send Message</button>
    </form>

    <!-- Boutons de contact rapide -->
    <div class="flex justify-center gap-6 mb-10">
      <a href="https://wa.me/1234567890" target="_blank"
        class="flex items-center gap-2 px-5 py-3 text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
        <i class="fab fa-whatsapp text-xl"></i> WhatsApp
      </a>
      <a href="mailto:example@example.com"
        class="flex items-center gap-2 px-5 py-3 text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
        <i class="fas fa-envelope text-xl"></i> Email
      </a>
    </div>

    <!-- Carte -->
    <div class="w-full h-64">
      <iframe class="w-full h-full rounded-lg"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.999472205331!2d2.292292615674877!3d48.85837307928773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fdf58d2f2e1%3A0x4dff9ec57b6a3fdf!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1610015026602!5m2!1sfr!2sfr"
        allowfullscreen="" loading="lazy">
      </iframe>
    </div>
  </div>
</div>
