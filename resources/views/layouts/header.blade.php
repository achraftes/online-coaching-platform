<!-- Header Section -->
<header class="relative z-50 w-full h-24 bg-white shadow-sm">
    <div class="container flex items-center justify-between h-full max-w-6xl px-8 mx-auto xl:px-0">
        <a href="/" class="relative flex items-center h-full font-black leading-none">
            <img 
                src="{{ asset('images/only coach (1).png') }}" 
                alt="Logo Coaching Professionel"
                class="h-32 w-auto block">
        </a>

        <!-- Navigation Desktop -->
        <nav class="md:flex items-center">
            <a href="/" class="relative px-3 py-2 mx-3 font-medium text-gray-800 transition-colors hover:text-indigo-600 group">
                Home
                <span class="absolute left-0 bottom-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
            </a>
            <a href="{{ env('APP_URL') }}#features" class="relative px-3 py-2 mx-3 font-medium text-gray-800 transition-colors hover:text-indigo-600 group">
                Features
                <span class="absolute left-0 bottom-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
            </a>
            <a href="{{ env('APP_URL') }}#blogs" class="relative px-3 py-2 mx-3 font-medium text-gray-800 transition-colors hover:text-indigo-600 group">
                Blogs
                <span class="absolute left-0 bottom-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
            </a>
            <a href="{{ env('APP_URL') }}#pricing" class="relative px-3 py-2 mx-3 font-medium text-gray-800 transition-colors hover:text-indigo-600 group">
                Pricing
                <span class="absolute left-0 bottom-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
            </a>
            <a href="{{ env('APP_URL') }}#testimonials" class="relative px-3 py-2 mx-3 font-medium text-gray-800 transition-colors hover:text-indigo-600 group">
                Testimonials
                <span class="absolute left-0 bottom-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
            </a>
        </nav>

        <!-- Boutons -->
        <div class="md:flex items-center">
            <a href="#_" class="px-4 py-2 text-sm font-bold text-pink-500 transition-colors hover:text-pink-600">Login</a>
            <a href="#_" class="px-5 py-3 ml-3 text-sm font-bold text-white transition-colors bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Get Started
            </a>
        </div>
    </div>
</header>