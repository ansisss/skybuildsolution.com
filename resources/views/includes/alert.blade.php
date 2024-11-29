@if ($errors->any() || session('error'))
    <div class="fixed inset-x-0 bottom-0 z-10 m-4 transition-all duration-200 transform translate-x-full sm:inset-x-auto sm:right-0 sm:max-w-sm"
         id="alert_message">
        <div class="flex w-full p-4 text-red-400 bg-gray-800 border border-red-500 rounded-lg shadow-lg">
            <div class="mr-4">
                <svg class="w-8 h-8 fill-current"
                     xmlns="http://www.w3.org/2000/svg"
                     width="192"
                     height="192"
                     viewBox="0 0 256 256">
                    <path fill="none"
                          d="M0 0h256v256H0z" />
                    <circle cx="128"
                            cy="128"
                            r="96"
                            opacity=".2" />
                    <circle cx="128"
                            cy="128"
                            r="96"
                            fill="none"
                            stroke="currentColor"
                            stroke-miterlimit="10"
                            stroke-width="16" />
                    <path fill="none"
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="16"
                          d="M128 80v56" />
                    <circle cx="128"
                            cy="172"
                            r="12" />
                </svg>
            </div>
            <div>
                <p class="mb-2 font-semibold">
                    @lang('An error has occurred!')
                </p>
                <p class="text-sm text-gray-400">
                    {{ $errors->first() }}
                    {{ session('error') }}
                </p>
            </div>
        </div>
    </div>
    <script id="alert_script">
        const message = document.querySelector("#alert_message");

        setTimeout(() => {
            message.classList.remove("translate-x-full");
        }, 0);

        setTimeout(() => {
            setTimeout(() => {
                message.remove()
            }, 200);
            message.classList.add("translate-x-full");
            document.querySelector("#alert_script").remove();
        }, 5000);
    </script>
@endif

@if (session('status') || session('success'))
    <div class="fixed inset-x-0 bottom-0 z-10 m-4 transition-all duration-200 transform translate-x-full sm:inset-x-auto sm:right-0 sm:max-w-sm"
         id="alert_message">
        <div class="flex w-full p-4 text-green-400 bg-gray-800 border border-green-500 rounded-lg shadow-lg">
            <div class="mr-4">
                <svg class="w-8 h-8 fill-current"
                     xmlns="http://www.w3.org/2000/svg"
                     width="192"
                     height="192"
                     viewBox="0 0 256 256">
                    <path fill="none"
                          d="M0 0h256v256H0z" />
                    <circle cx="128"
                            cy="128"
                            r="96"
                            opacity=".2" />
                    <path fill="none"
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="16"
                          d="M172 104l-58.667 56L84 132" />
                    <circle cx="128"
                            cy="128"
                            r="96"
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="16" />
                </svg>
            </div>
            <div>
                <p class="mb-2 font-semibold">
                    @lang('Operation successful!')
                </p>
                <p class="text-sm text-gray-400">
                    {{ session('status') }}
                    {{ session('success') }}
                </p>
            </div>
        </div>
    </div>
    <script id="alert_script">
        const message = document.querySelector("#alert_message");

        setTimeout(() => {
            message.classList.remove("translate-x-full");
        }, 0);

        setTimeout(() => {
            setTimeout(() => {
                message.remove()
            }, 200);
            message.classList.add("translate-x-full");
            document.querySelector("#alert_script").remove();
        }, 5000);
    </script>
@endif
