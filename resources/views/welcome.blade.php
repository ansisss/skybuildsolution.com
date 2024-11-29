@extends('layouts.homepage')
@section('content')
    @include('includes.alert')
    <section class="relative flex items-center justify-center w-full h-screen bg-gradient-to-br from-gray-800 to-gray-900">
        <img src="{{ asset('images/bg.svg') }}"
             class="absolute inset-0 object-cover w-full h-full"></img>
        <div class="absolute inset-0 z-10 bg-black/40"></div>
        <div class="relative z-20 max-w-4xl px-4 mx-auto text-center">
            <h1 class="mb-4 text-4xl font-bold leading-tight md:text-5xl">Building Smarter Solutions with AI</h1>
            {{-- <p class="mb-6 text-lg text-gray-300">Discover the most profitable affiliate opportunities using cutting-edge AI-driven insights.</p> --}}
            <a href="#services"
               class="inline-block px-6 py-3 font-semibold text-white bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700">Explore our services</a>
        </div>
    </section>
    <section id="services"
             class="py-16 bg-gray-900">
        <div class="container px-6 mx-auto">
            <h3 class="mb-12 text-3xl font-bold text-center text-blue-400">Our services</h3>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <div class="p-6 bg-gray-800 rounded-lg shadow-lg">
                    <h4 class="mb-3 text-xl font-semibold text-blue-400">Transparency and reliability</h4>
                    <p class="italic text-gray-300">Objective reviews and analysis of AI tools and platforms to help you make informed decisions.</p>
                </div>
                <div class="p-6 bg-gray-800 rounded-lg shadow-lg">
                    <h4 class="mb-3 text-xl font-semibold text-blue-400">Innovation and development</h4>
                    <p class="italic text-gray-300">Practical guides and tips for applying AI in various fields, such as customer service, data analysis, and marketing.</p>
                </div>
                <div class="p-6 bg-gray-800 rounded-lg shadow-lg">
                    <h4 class="mb-3 text-xl font-semibold text-blue-400">Value to the user</h4>
                    <p class="italic text-gray-300">Exclusive discounts and special offers available only through our recommendations.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="about"
             class="py-16 bg-gray-800">
        <div class="container flex flex-col items-center px-6 mx-auto md:flex-row">
            <div class="md:w-1/2">
                <img src="{{ asset('images/13574.jpg') }}"
                     alt="AI in Action"
                     class="rounded-lg shadow-lg">
            </div>
            <div class="md:w-1/2 md:pl-8">
                <h3 class="mb-4 text-3xl font-bold text-blue-400">About us</h3>
                <p class="mb-4 text-gray-300">SkyBuild Solution is your trusted guide to innovative artificial intelligence tools and solutions. Our mission is to help businesses and individual users discover and leverage AI technologiesto enhance productivity, drive automation, and foster business growth.</p>
                {{-- <p class="text-gray-300">Join us to harness the power of AI and elevate your affiliate earnings.</p> --}}
            </div>
        </div>
    </section>
    <section id="signup"
             class="py-16 bg-gradient-to-br from-blue-500 to-blue-600">
        <div class="container px-6 mx-auto text-center">
            <h3 class="mb-4 text-3xl font-bold text-white">Get Started Today</h3>
            <p class="mb-6 text-lg text-white">Sign up for free and discover a smarter way to affiliate marketing with SkyBuild Soulutions.</p>
            <a href="#contact"
               class="px-6 py-3 font-semibold text-blue-600 bg-white rounded-lg shadow-lg hover:bg-gray-100">Sign Up Now</a>
        </div>
    </section>
    <section id="contact"
             class="py-16 bg-gray-900">
        <div class="container px-6 mx-auto">
            <h3 class="mb-12 text-3xl font-bold text-center text-blue-400">Contact Us</h3>
            <form class="max-w-lg p-8 mx-auto bg-gray-800 rounded-lg shadow-lg"
                  action="{{ route('contact.send') }}"
                  method="POST">
                @csrf
                <input type="hidden"
                       id="recaptchaResponse"
                       name="recaptcha">
                <div class="mb-4">
                    <label for="name"
                           class="block mb-2 text-gray-400">Your Name</label>
                    <input type="text"
                           id="name"
                           name="name"
                           class="w-full px-4 py-2 text-white placeholder-gray-400 bg-gray-700 border border-gray-700 rounded-lg"
                           placeholder="Enter your name"
                           required>
                </div>
                <div class="mb-4">
                    <label for="email"
                           class="block mb-2 text-gray-400">Your Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           class="w-full px-4 py-2 text-white placeholder-gray-400 bg-gray-700 border border-gray-700 rounded-lg"
                           placeholder="Enter your email"
                           required>
                </div>
                <div class="mb-4">
                    <label for="message"
                           class="block mb-2 text-gray-400">Your Message</label>
                    <textarea id="message"
                              name="message"
                              rows="4"
                              class="w-full px-4 py-2 text-white placeholder-gray-400 bg-gray-700 border border-gray-700 rounded-lg"
                              placeholder="Enter your message"
                              required></textarea>
                </div>
                <button type="submit"
                        class="px-6 py-3 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Send Message</button>
            </form>
        </div>
    </section>
    @php
        $user_recaptcha = env('RECAPTCHA_USER');
    @endphp
    @if (isset($user_recaptcha))
        <script>
            document.addEventListener("DOMContentLoaded", async (event) => {
                function reCaptchaOnFocus() {
                    var script = document.createElement('script');
                    script.src = 'https://www.google.com/recaptcha/api.js?render=<?php echo $user_recaptcha; ?>';
                    script.onload = initializeReCaptcha;
                    document.body.appendChild(script);

                    document.getElementById('name').removeEventListener('focus', reCaptchaOnFocus);
                    document.getElementById('email').removeEventListener('focus', reCaptchaOnFocus);
                    document.getElementById('message').removeEventListener('focus', reCaptchaOnFocus);
                }

                function initializeReCaptcha() {
                    grecaptcha.ready(function() {
                        grecaptcha.execute('<?= $user_recaptcha ?>', {
                            action: 'contacts'
                        }).then(function(token) {
                            var recaptchaResponse = document.getElementById('recaptchaResponse');
                            recaptchaResponse.value = token;
                        });
                    });
                }

                document.getElementById('name').addEventListener('focus', reCaptchaOnFocus, false);
                document.getElementById('email').addEventListener('focus', reCaptchaOnFocus, false);
                document.getElementById('message').addEventListener('focus', reCaptchaOnFocus, false);
            });
        </script>
    @endif
@endsection
