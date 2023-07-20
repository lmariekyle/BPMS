<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BPMS') }}</title>

        <script src="https://kit.fontawesome.com/c0346081e5.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&family=Libre+Baskerville:wght@400;700&family=Lora&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">

        <!-- Scripts -->

    </head>
    <body class=" bg-dirty-white font-sans antialiased">
        <div class="min-h-screen bg-dirty-white">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <!-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> -->

            <!-- Page Content -->
            <main>
               
                {{ $slot }}
            </main>
        </div>

        <script>
            $("document").ready(function()
            {
                setTimeout(function(){
                    $("div.alert").remove();
                }, 3000);
            });
        </script>


    </body>
</html>
