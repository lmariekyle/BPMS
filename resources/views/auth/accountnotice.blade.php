<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Account Notice</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500&family=Libre+Baskerville:wght@400;700&family=Lora&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">        
       <!-- <style>
            body {
                background: #fdffee;
                font-family: 'Nunito', sans-serif;
            }
        </style> -->
    </head>
<body class="bg-dirty-white">
    <!-- header -->
    <div class="px-5 py-5 justify-center w-50 h-40 bg-olive-green"> 
            <h1 class="font-dancingscript text-6xl text-dirty-white text-center">Municipality of Dalaguete</h1>
            <h2 class="font-libre text-4xl p-3 text-dirty-white text-center">BARANGAY POBLACION</h2>


        <div class= "mb-12 -mt-28 ml-8 w-64 h-64 rounded-full border-2 bg-dirty-white border-green flex justify-center items-center">
        <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="">
        </div>
    </div>
       

    <!-- welcome statistics conten -->
    
        <p class="font-robotocondensed mt-12 text-4xl p-3 text-deep-green text-center">Sorry you are not a registered resident in Barangay Poblacion!</p>
    
    
</body>
</html>