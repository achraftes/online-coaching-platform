<footer class="bg-gray-900 text-white py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col items-center text-center sm:flex-row sm:flex-wrap sm:justify-between sm:text-left">
      
      <!-- Bloc 1 : Coaching Pro -->
      <div class="w-full sm:w-1/2 lg:w-1/3 mb-6">
        <h1 class="text-2xl font-bold mb-4">Coaching Pro</h1>
        <p class="text-gray-400">Empowering individuals to reach <br>
           their full potential through personalized  <br>
           coaching and guidance.</p>
        <div class="flex mt-4 space-x-4 justify-center sm:justify-start">
          <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
          <a href="https://x.com/chkr_achraf" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
          <a href="https://www.linkedin.com/in/achraf-chikrabane-850554291/" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
          <a href="https://www.instagram.com/achraf_chkr/" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <!-- Bloc 2 : Navigation -->
      <div class="w-full sm:w-1/2 lg:w-1/6 mb-6 flex flex-col items-center sm:items-start text-center sm:text-left">
        <h3 class="text-lg font-semibold mb-4">Navigation</h3>
        <ul>
          <li><a href="/" class="text-gray-400 hover:text-white">Home</a></li>
          <li><a href="#blogs" class="text-gray-400 hover:text-white">Blogs</a></li>
          <li><a href="#services" class="text-gray-400 hover:text-white">Services</a></li>
          <li><a href="#contacts" class="text-gray-400 hover:text-white">Contact</a></li>
          <li><a href="#features" class="text-gray-400 hover:text-white">Test</a></li>
        </ul>
      </div>

      <!-- Bloc 3 : Support -->
      <div class="w-full sm:w-1/2 lg:w-1/6 mb-6 flex flex-col items-center sm:items-start text-center sm:text-left">
        <h3 class="text-lg font-semibold mb-4">Support</h3>
        <ul>
          <li><a href="{{ route('support.contact') }}" class="text-gray-400 hover:text-white">Help Center</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white">Terms of Service</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white">FAQs</a></li>
        </ul>
      </div>

      <!-- Bloc 4 : Newsletter -->
      <div class="w-full sm:w-1/2 lg:w-1/3 mb-6 flex flex-col items-center sm:items-start text-center sm:text-left">
        <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
        <p class="text-gray-400 mb-4">Subscribe to get the latest updates and offers.</p>
        <form class="flex flex-col sm:flex-row items-center sm:items-start">
          <input type="email" placeholder="Your email" class="w-full sm:w-auto px-3 py-2 rounded-md sm:rounded-l-md focus:outline-none bg-white text-black mb-2 sm:mb-0">
          <button class="bg-blue-600 px-4 py-2 rounded-md sm:rounded-r-md hover:bg-blue-700 text-white">Subscribe</button>
        </form>
      </div>
    </div>

    <!-- Bas de page -->
    <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500 text-sm">
      © {{ date('Y') }} Coaching Pro. All rights reserved.
    </div>
  </div>
</footer>
