<header class="sticky top-0 z-50 bg-gray-800 border-b border-gray-700">
    <div class="flex items-center justify-between px-6 mx-auto ">
        <!-- Logo -->
        <img class="h-12 sm:h-16"
             src="{{ asset('images/logo.png') }}"
             alt="Logo">

        <!-- Mobile Menu Button -->
        <button id="menu-toggle"
                class="block text-gray-400 hover:text-white sm:hidden focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke-width="2"
                 stroke="currentColor"
                 class="w-6 h-6">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Navigation Links -->
        <nav id="nav-menu"
             class="absolute left-0 hidden w-full px-6 py-4 bg-gray-800 top-full sm:static sm:flex sm:space-x-6 sm:bg-transparent sm:py-0 sm:w-auto">
            <ul class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-6">
                <li><a href="#services"
                       class="text-gray-300 hover:text-blue-400">Services</a></li>
                <li><a href="#about"
                       class="text-gray-300 hover:text-blue-400">About</a></li>
                <li><a href="#contact"
                       class="text-gray-300 hover:text-blue-400">Contact</a></li>
            </ul>
        </nav>

        <!-- Call-to-Action Button -->
        <a href="#signup"
           class="hidden px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700 sm:block">Get Started</a>
    </div>
</header>
