<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Libre+Baskerville&family=Lora&family=Playfair+Display&family=Poppins&family=Roboto&family=Roboto+Condensed&family=Rozha+One&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="bg-dirty-white">
    <div class="px-5 py-[4rem] text-center justify-center w-50 h-42 bg-olive-green"> 
        <p class="font-poppin text-[40px] text-dirty-white text-center">BARANGAY POBLACION MANAGEMENT SYSTEM</p>
    </div>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>