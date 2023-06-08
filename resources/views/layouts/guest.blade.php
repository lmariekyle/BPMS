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
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
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

                // //show/hide password
                // $('.show-password').on('click',function(){
                //     let passwordInput = $(this).closest('.input-group').find('input');
                //     let passwordFieldType = passwordInput.attr('type');
                //     let newPasswordFieldType = passwordFieldType == 'password' ? 'text' : 'password';
                //     passwordInput.attr('type', newPasswordFieldType);
                //     $(this).text(newPasswordFieldType == 'password' ? 'show' : 'Hide');
                // });

            });



        </script>


    </body>
</html>
