<div class="fixed z-50 hidden bottom-4 right-4"
     id="scroll_to_top_button">
    <button class="flex items-center justify-center text-white transition-all duration-300 transform bg-gray-800 rounded-full shadow-lg w-14 h-14 hover:bg-blue-600 hover:shadow-2xl hover:-translate-y-2 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-offset-2"
            type="button"
            onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-7 h-7"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 15l7-7 7 7" />
        </svg>
    </button>
</div>

<script src="{{ mix('js/scrollToTopButton.js') }}"
        defer></script>
