<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Account Notice</title>

        <!-- Fonts -->
        <script src="https://kit.fontawesome.com/c0346081e5.js" crossorigin="anonymous"></script>
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
            <h1 class="font-dancingscript text-6xl text-dirty-white text-center -mt-3">Municipality of Dalaguete</h1>
            <h2 class="font-libre text-4xl p-3 text-dirty-white text-center -mt-5">BARANGAY POBLACION</h2>
    </div>
       
    
    <div class="flex flex-col justify-center place-items-center ml-[400px] mt-[50px] w-max h-max">
        <p class="font-robotocondensed mt-12 text-[58px] ml-5 text-dirty-white bg-green w-max h-max px-10 py-2 text-center font-extrabold">I'M SORRY!</p>
        <p class="font-robotocondensed  mt-6 text-[28px] text-deep-green  w-max h-max px-4 py-2 text-center uppercase font-extrabold">Your Information Cannot be Found!</p>
        <p class="font-robotocondensed  text-[18px] text-deep-green px-4  text-center indent-4 break-normal w-max h-max">A gentle reminder that</p>
        <p class="font-robotocondensed  text-[18px] text-deep-green px-4  text-center uppercase indent-4 break-normal w-max h-max font-extrabold">ONLY RESIDENTS of Barangay Poblacion, Dalaguete can register a user account</p> 
        <p class="font-robotocondensed  text-[18px] text-deep-green px-4  text-center  indent-4 break-normal w-max h-max">
            If you are a resident of Barangay Poblacion, Dalaguete and wants to create a user account,</p>
        <p class="font-robotocondensed  text-[18px] text-deep-green px-4  text-center indent-4 break-normal w-max h-max">Please contact your assigned Barangay Health Worker in your respective Sitio.</p>
        <p class="font-robotocondensed  text-[18px] text-deep-green px-4  text-center indent-4 break-normal w-max h-max">Or contact our Barangay Secretary through Email provided below</p>  
        <h1 class="font-robotocondensed text-[20px] text-deep-green text-left font-extrabold"><i class="fa-regular fa-envelope fa-sm "></i> dbarangaypoblacion@gmail.com</h1>
        <br>
        <a href="/" class="font-robotocondensed  text-[18px] text-deep-green px-4  text-center indent-4 break-normal w-max h-max">Please click here to return to the homepage</a>
    </div>
    
    
    
</body>
</html>