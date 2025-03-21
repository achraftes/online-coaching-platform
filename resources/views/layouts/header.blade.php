 <!-- Header Section -->
 <header class="relative z-50 w-full h-24 bg-white shadow-sm">
        <div class="container flex items-center justify-between h-full max-w-6xl px-8 mx-auto xl:px-0">
            <a href="/" class="relative flex items-center h-full font-black leading-none">
                <svg class="w-auto h-8 text-indigo-600 fill-current" viewBox="0 0 194 116"
                    xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="evenodd">
                        <path
                            d="M96.869 0L30 116h104l-9.88-17.134H59.64l47.109-81.736zM0 116h19.831L77 17.135 67.088 0z" />
                        <path d="M87 68.732l9.926 17.143 29.893-51.59L174.15 116H194L126.817 0z" />
                    </g>
                </svg>
                <span class="ml-3 text-xl text-gray-800">Coaching Professionel</span>
            </a>

            <nav class="md:flex items-center">
                <a href="/" class="relative px-3 py-2 mx-3 font-medium text-gray-800 transition-colors group">
                    Home
                    <span
                        class="absolute left-0 bottom-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                </a>
                <a href="{{ env('APP_URL') }}#features" class="relative px-3 py-2 mx-3 font-medium text-gray-800 transition-colors group">
                    Features
                    <span
                        class="absolute left-0 bottom-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                </a>
                <a href="{{ env('APP_URL') }}#blogs" class="relative px-3 py-2 mx-3 font-medium text-gray-800 transition-colors group">
                    Blogs
                    <span
                        class="absolute left-0 bottom-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                </a>
                <a href="{{ env('APP_URL') }}#pricing" class="relative px-3 py-2 mx-3 font-medium text-gray-800 transition-colors group">
                    Pricing
                    <span
                        class="absolute left-0 bottom-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                </a>
                <a href="{{ env('APP_URL') }}#testimonials"
                    class="relative px-3 py-2 mx-3 font-medium text-gray-800 transition-colors group">
                    Testimonials
                    <span
                        class="absolute left-0 bottom-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
                </a>
            </nav>

            <div class="md:flex items-center">
                <a href="#_"
                    class="px-4 py-2 text-sm font-bold text-pink-500 transition-colors hover:text-pink-600">Login</a>
                <a href="#_"
                    class="px-5 py-3 ml-3 text-sm font-bold text-white transition-colors bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Get Started
                </a>
            </div>

            <div id="mobile-menu-button" class="flex md:hidden">
                <button type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <div id="mobile-menu"
                class="absolute top-full left-0 right-0 z-20  p-4 bg-white border-t border-gray-100 shadow-lg md:hidden">
                <nav class="flex flex-col space-y-3">
                    <a href="#"
                        class="px-4 py-2 font-medium text-gray-800 rounded hover:bg-indigo-50 hover:text-indigo-600">Home</a>
                    <a href="#features"
                        class="px-4 py-2 font-medium text-gray-800 rounded hover:bg-indigo-50 hover:text-indigo-600">Features</a>
                    <a href="#pricing"
                        class="px-4 py-2 font-medium text-gray-800 rounded hover:bg-indigo-50 hover:text-indigo-600">Pricing</a>
                    <a href="#testimonials"
                        class="px-4 py-2 font-medium text-gray-800 rounded hover:bg-indigo-50 hover:text-indigo-600">Testimonials</a>
                    <div class="pt-3 mt-3 border-t border-gray-200">
                        <a href="#_" class="block w-full py-2 font-bold text-center text-pink-500">Login</a>
                        <a href="#_"
                            class="block w-full px-5 py-3 mt-2 text-sm font-bold text-center text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                            Get Started
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- End Header Section-->
  