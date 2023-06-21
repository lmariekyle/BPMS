<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    </head>
    <body class="bg-dirty-white">
    <div class="px-5 py-5 justify-center w-50 h-40 bg-olive-green"> 
            <h1 class="font-dancingscript text-3xl text-dirty-white text-center">Municipality of Dalaguete</h1>
    </div>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        <script>
            $(document).ready(function(){
                
                function generatePassword(){
                    let charset = document.getElementById('lastname').value;
                    let password = "poblacion";
                    password += charset;
                    return password;
                }

                // sets password input fields
                $('.generate-password').on('click',function(){
                    let password = generatePassword();

                    $('#password').val(password);
                    $('#password_confirmation').val(password);
                });

            });
        </script>
    </body>
</html>
