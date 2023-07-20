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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    </head>
    <body class=" bg-green font-sans antialiased">
        <div class="min-h-screen bg-green">
            <!-- Page Content -->
            <main>
                <!-- messages -->
                {{ $slot }}
            </main>
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

            $("document").ready(function()
            {
                setTimeout(function(){
                    $("div.alert").remove();
                }, 3000);
            });
        </script>


    </body>
</html>