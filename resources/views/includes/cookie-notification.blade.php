@if (!request()->cookie('cookie_notification'))
    <div class="fixed bottom-0 left-0 z-50 max-w-full px-4 pb-4"
         id="cookie_notification">
        <div class="w-full p-4 bg-gray-800 border border-gray-700 rounded-lg shadow-lg">
            <div class="text-sm">
                <div class="flex items-start justify-end mb-2">
                    <button class="text-gray-400 transition-all hover:text-gray-200"
                            onclick="document.getElementById('cookie_notification').remove()">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <p class="pb-2 leading-relaxed text-gray-300">
                    We use cookies to enhance your experience on our website. Cookies help us analyze site usage, provide functionality, and personalize content. You can control cookie settings through your browser or opt out of them.
                </p>
                <p class="leading-relaxed text-gray-300">
                    By using this website, you consent to our use of cookies.

                    {{-- @lang('cookies_notification_text', ['cookies_section' => route('section', ['name' => $cookies_section ? $cookies_section->route_name : '#'])]) --}}
                    {{-- Example: "By using this website, in accordance with the <a class='text-blue-400 hover:underline' href='#'>rules</a>, you agree to the placement of cookies on your device. Cookies store data about the visit to the website, the data is anonymous and helps to offer you relevant content. You can <a class='text-blue-400 hover:underline' href='#'>change</a> your consent at any time." --}}
                </p>
                <div class="flex items-center justify-center mt-4 sm:justify-end">
                    <button class="px-3 py-2 ml-2 md:mt-0 whitespace-nowrap shrink-0 mt-2 text-xs text-white rounded sm:text-sm bg-blue-600 hover:bg-blue-700 min-w-[100px]"
                            id="cookies_notification_button"
                            type="button"
                            title="@lang('I agree')">
                        @lang('I agree')
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script asnyc>
        document.addEventListener("DOMContentLoaded", function() {
            const cookieNotification = document.querySelector("#cookie_notification");
            const cookieNotificationButton = document.querySelector("#cookie_notification_button");
            const cookie = document.cookie.indexOf("cookie_notification=");

            if (cookie < 0) {
                cookieNotification.classList.remove("hidden");
                cookieNotificationButton.focus();
            }

            function closeCookieNotification() {
                cookieNotification.remove();
                document.body.style.overflow = "";
            }

            function acceptCookieNotification() {
                const currentDate = new Date();
                const cookieEndDate = new Date(currentDate.setDate(currentDate.getDate() + 365));
                document.cookie = "cookie_notification=1; expires=" + cookieEndDate + "; path=/;";
                closeCookieNotification();
            }
            cookieNotificationButton.addEventListener("click", acceptCookieNotification);
        });
    </script>
@endif
