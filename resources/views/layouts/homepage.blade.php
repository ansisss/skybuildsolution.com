<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <meta name="csrf-token"
          content="{{ csrf_token() }}">
    @if (!app()->isProduction())
        <meta name="robots"
              content="noindex, nofollow">
    @endif
    <link rel="shortcut icon"
          href="/favicon.png?v=0.1">
    <link rel="preconnect"
          href="https://fonts.googleapis.com/css2"
          crossorigin>
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>
    <title>SkyBuild Soulutions Services</title>
    <meta name="title"
          content="SkyBuild Soulutions Services" />
    <meta name="description"
          content="SkyBuild Solution helps businesses and users leverage AI tools to improve productivity, automation, and business growth." />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="text-white bg-gray-900">
    @include('includes.header')
    @yield('content')
    @include('includes.cookie-notification')
    @include('includes.footer')
    @yield('javascript')
</body>

</html>
