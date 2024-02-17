<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BPMS</title>

    <style>
        .hide {
            display: none;
        }

        .info:hover+.hide {
            position: absolute;
            display: block;
            z-index: 9;
        }
    
        .tilted-image-right {
            transform: rotate(-50deg); /* Adjust the degree value to control the tilt angle */
        }

    </style>

    <script src="https://kit.fontawesome.com/c0346081e5.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Pie Chart Script -->
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChartResident);
        google.charts.setOnLoadCallback(drawChartHousehold);

        function drawChartResident() {

            var data = google.visualization.arrayToDataTable([
                ['Sitio', 'Residents'],
                <?php echo $chartdataResident ?>
            ]);

            var options = {
                sliceVisibilityThreshold: 0,
                width: '100%',
                height: '100%',
                pieSliceText: 'value',
                backgroundColor: 'none',
                chartArea: {
                    height: "95%",
                    width: "95%"
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('residentPiechart'));

            chart.draw(data, options);
        }

        function drawChartHousehold() {

            var data = google.visualization.arrayToDataTable([
                ['Sitio', 'Households'],
                <?php echo $chartdataHousehold ?>
            ]);

            var options = {
                sliceVisibilityThreshold: 0,
                width: '100%',
                height: '100%',
                pieSliceText: 'value',
                backgroundColor: 'none',
                chartArea: {
                    height: "95%",
                    width: "95%"
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('householdPiechart'));

            chart.draw(data, options);
        }
    </script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Libre+Baskerville&family=Lora&family=Playfair+Display&family=Poppins&family=Raleway&family=Roboto&family=Roboto+Condensed&family=Rozha+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="bg-[#f8f9f0]">
    <!-- header -->
    <div class="px-5 py-5 flex flex-row justify-start w-50 h-max bg-olive-green">

        <div class="ml-10 w-[150px] h-[150px] rounded-full border-2 bg-dirty-white border-green flex justify-center items-center">
            <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="">
        </div>
        <div class="flex flex-col ml-5 mt-7">
            <h1 class="font-roboto text-[40px] text-dirty-white text-center">BARANGAY POBLACION</h1>
            <h2 class="font-roboto text-[40px] -mt-3 text-dirty-white text-center tracking-wide">MANAGEMENT SYSTEM</h2>
        </div>
        <div>
            @if (Route::has('login'))
            <div class="hidden absolute right-3 mt-20 px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/dashboard') }}" class="p-2 rounded text-xl mx-3 text-dirty-white hover:bg-dirty-white hover:text-deep-green bg-olive-green font-robotocondensed hover:shadow-md">DASHBOARD</a>
                @else
                <a href="{{ route('login') }}" class="p-2 rounded text-xl mx-3 text-dirty-white hover:bg-dirty-white hover:text-deep-green bg-olive-green font-robotocondensed hover:shadow-md">LOGIN</a>
                @if (Route::has('create'))
                <a href="{{ route('create') }}" class="p-2 rounded text-xl mx-3 text-dirty-white hover:bg-dirty-white hover:text-deep-green bg-olive-green font-robotocondensed hover:shadow-md">
                    REGISTER
                </a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
    <!-- end of header -->

    <!-- start of body content -->
    <div class="flex flex-col place-items-center mt-[8rem] px-8">
        <!-- statistics container -->
        <div class="flex flex-col px-4">
            <div class="flex flex-col bg-dirty-white border-2 border-black rounded-md shadow-lg h-max w-[1200px] px-4">
                <div class="bg-green px-4 py-2 self-center w-max border-1 -mt-5 border-black rounded-md shadow-md">
                    <p class="font-poppin text-[28px] text-dirty-white">BARANGAY POBLACION, DALAGUETE {{ date("Y") }} CENSUS DATA</p>
                </div>

                <div class="flex flex-row self-center space-x-8 mt-[4rem]">
                    <div class="flex flex-col self-start bg-dirty-white shadow-lg border-2 border-green mt-[2rem] ml-2 px-3 py-2">
                        <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max self-center -mt-8">
                            <p class="font-poppin text-[18px] text-dirty-white text-center">TOTAL RESIDENTS PER SITIO</p>
                        </div>

                        <div class="w-[500px] l-[500px] mt-2 mx-auto" id="residentPiechart"></div>
                        <a class="info w-[13px] self-end"><i class="fa fa-question-circle-o text-[12px]"></i></a>
                        <div class="hide bg-green py-2 px-2 rounded-xl self-end mt-[15rem] mr-8">
                            <p class="text-xs font-robotocondensed w-80 text-justify text-dirty-white">
                                Hover over the colors in the legend to highlight the different Sitios of the Barangay. If the Pie Chart is not highlighting
                                the Sitio, that means there are currently 0 Residents there.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col self-start bg-dirty-white shadow-lg border-2 border-green mt-[2rem] ml-2 px-3 py-2">
                        <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max self-center -mt-8">
                            <p class="font-poppin text-[18px] text-dirty-white text-center">TOTAL HOUSEHOLDS PER SITIO</p>
                        </div>

                        <div class="w-[500px] l-[500px] mt-2 mx-auto" id="householdPiechart"></div>
                        <a class="info w-[13px] self-end"><i class="fa fa-question-circle-o text-[12px]"></i></a>
                        <div class="hide bg-green py-2 px-2 rounded-xl self-end mt-[15rem] mr-8">
                            <p class="text-xs font-robotocondensed w-80 text-justify text-dirty-white">
                                Hover over the colors in the legend to highlight the different Sitios of the Barangay. If the Pie Chart is not highlighting
                                the Sitio, that means there are currently 0 Households there.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row self-center space-x-8 mt-[4rem] mb-[4rem]">
                    <div class="flex flex-col self-start bg-dirty-white shadow-lg border-2 border-green mt-[1rem] py-10">
                        <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max self-center -mt-[4rem]">
                            <p class="font-poppin text-[18px] text-dirty-white text-center">TOTAL RESIDENTS AS OF {{ date("Y") }}</p>
                        </div>
                        <div class="bg-green w-[525px] h-[95px] m-auto flex items-center justify-center mt-8 shadow-lg">
                            <p class="font-poppin text-center font-black text-[60px] text-dirty-white">{{ $statistics->totalResidentsBarangay }} RESIDENTS</p>
                        </div>
                        <h1 class="mt-4 font-bold font-poppin text-[28px] text-deep-green text-center">IN BARANGAY</h1>
                        <h1 class="mt-1 font-bold font-poppin text-[28px] text-deep-green text-center">POBLACION, DALAGUETE, CEBU</h1>
                    </div>

                    <div class="flex flex-col self-start bg-dirty-white shadow-lg border-2 border-green mt-[1rem] ml-[5rem] py-10">
                        <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max self-center -mt-[4rem]">
                            <p class="font-poppin text-[18px] text-dirty-white text-center">TOTAL HOUSEHOLDS AS OF {{ date("Y") }}</p>
                        </div>
                        <div class="bg-green w-[525px] h-[95px] m-auto flex items-center justify-center mt-8 shadow-lg">
                            <p class="font-roboto text-center font-black text-6xl text-dirty-white">{{ $statistics->totalHouseholdsBarangay}} HOUSEHOLDS</p>
                        </div>
                        <h1 class="mt-4 font-bold font-poppin text-[28px] text-deep-green text-center">IN BARANGAY</h1>
                        <h1 class="mt-1 font-bold font-poppin text-[28px] text-deep-green text-center">POBLACION, DALAGUETE, CEBU</h1>
                    </div>

                </div>
            </div>
            <!-- end of statistics content -->

            <!-- start of tourism -->
            <div class=" flex flex-col h-full w-full mt-[12rem] justify-items-center">

                <p class="absolute font-playfair font-semibold text-[74px] text-deep-green self-center text-custom -mt-[7rem] mb-4">Discover Paradise in Dalaguete</p>

                <div class="flex flex-col">
                    <div class="bg-green border-2 border-black w-[1060px] h-[240px] self-center mt-10 shadow-lg">
                    </div>
                    <div class="absolute flex flex-row w-[1000px] h-[250px] px-4 py-2 self-center mt-[4rem] border-2 bg-dirty-white border-green shadow-md place-items-center">
                    <p class="font-poppins text-[24px] font-semibold text-black indent-4 text-center -mt-2">Nestled on the picturesque island of Cebu, the Municipality of Dalaguete beckons you to a tropical paradise like no other. With its lush green mountains, pristine white-sand beaches, and a rich cultural heritage, Dalaguete offers an unforgettable escape for nature enthusiasts and curious wanderers alike.</p>
                    <img src="images/8.png" alt="" style="height: 230px; width: 300px;" class="absolute left-0 -ml-[4rem] mt-[8.5rem]">
                    <img src="images/9.png" alt="" style="height: 220px; width: 250px;" class="absolute right-0 -mr-[6.3rem] mt-[7.3rem]">
                    </div>
                </div>

                <!-- obong -->
                <div class="flex flex-row mt-[5rem] mb-[5rem] space-x-14">
                    <!-- start of image -->
                        <div class="flex flex-col">
                                <div class=" flex flex-col justify-center place-items-center w-[540px] h-[560px] px-4 py-4 self-center mt-[4rem] -ml-[4rem] border-2 bg-dirty-white border-green shadow-md">
                                    <div class="bg-white rounded-lg w-[500px] h-[580px] shadow-lg mt-1 ml-1">
                                        <ul class="slider" id="slider1">
                                            <li class="h-[480px] w-[480px] relative mt-2 ml-2">
                                                <img class="h-full object-cover w-full rounded-lg ml-1" src="{{ asset('images/Obong.jpg') }}" alt="">
                                            </li>

                                            <li class="h-[480px] w-[480px] mt-2 ml-2 relative hidden">
                                                <img class="h-full object-cover w-full " src="{{ asset('images/OsmenaPeak.jpg') }}" alt="">

                                            </li>

                                            <li class="h-[480px] w-[480px] relative mt-2 ml-2 hidden">
                                                <img class="h-full object-cover w-full " src="{{ asset('images/CasayBeachClub.jpg') }}" alt="">
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- slider buttons -->
                                    <div class="ml-[24rem] mt-[128.3rem] absolute px-5 flex h-[12px] w-[490px] top-0 left-0 self-center">
                                        <div class="my-auto  w-full flex justify-between">
                                            <button id="prevButtonslider1" class="p-3 text-deep-green rounded-full bg-white opacity-75">
                                            <i class="fa-solid fa-chevron-left"></i>
                                            </button>
                                            <button  id="nextButtonslider1" class="p-3 text-deep-green bg-white opacity-75 rounded-full">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div> <!-- end of buttons -->
                                </div>   
                        </div> <!-- end of image --> 

                        <!-- start of paragraphs -->
                        <div class="flex flex-col justify-center place-items-center w-[650px] h-[500px] mt-[4rem]">

                            <div class="self-center">
                                <p class="font-dancingscript text-[112px] text-deep-green">Obong Spring</p>
                            </div>

                            <div class="self-center shadow-lg border-r-2 border-black w-[650px] px-6 py-8">
                                <p class="font-poppin text-[18px] text-deep-green">In the serene town of Dalaguete, Cebu, Obong Spring is a hidden oasis that beckons to travelers from afar. <br><br> To get there, take a scenic bus ride from Cebu City's South Bus Terminal to Dalaguete. From Dalaguete, head to Obong Barangay.
                                        Obong Spring offers a tranquil escape with its crystal-clear waters, ideal for a refreshing swim and cliff diving. <br><br> Entrance fees are budget-friendly, making it accessible to all for only PHP 50. Don't forget your swimwear and a picnic basket for a day of relaxation.
                                        For tourists seeking a serene and natural retreat, Obong Spring in Dalaguete, Cebu, is a must-visit destination. Embrace the peace and beauty of this hidden gem, just a few hours away from the city's hustle and bustle. Dalaguete welcomes you!</p>
                            </div>
                            
                            <img src="images/2.png" alt="" class="absolute self-start -ml-[3.5rem] -mt-[17rem] tilted-image-right" style="height: 100px; width: 100px;">

                        </div> <!-- end of paragraphs -->
                </div> <!-- end obong -->
       

                 <!-- osmena peak -->
                 <div class="flex flex-row mt-[5rem] mb-[5rem] space-x-14">


                        <!-- start of paragraphs -->
                        <div class="flex flex-col justify-center place-items-center w-[650px] h-[500px] mt-[4rem]">

                            <div class="self-center">
                                <p class="font-dancingscript text-[112px] text-deep-green">Osmena Peak</p>
                            </div>

                            <div class="self-center shadow-lg border-l-2 border-black w-[650px] px-6 py-8">
                                <p class="font-poppin text-[18px] text-deep-green">Osmena Peak is renowned for its remarkable jagged hills, reminiscent of chocolate kisses, and its panoramic views of the surrounding countryside. Whether you're an avid hiker or simply seeking a glimpse of nature's wonders, Osmena Peak promises an unforgettable adventure, making it a must-visit destination for travelers outside Dalaguete. <br><br> To get there, take a scenic bus ride from Cebu City's South Bus Terminal to Dalaguete. The final leg of the journey involves a scenic motorbike or habal-habal ride to the peak's base.
                                        <br><br>Entrance fees are modest, ensuring accessibility for all travelers. Osmena Peak stands as a breathtaking natural wonder that beckons to adventurers from all corners.</p>
                            </div>
                            <img src="images/2.png" alt="" class="absolute self-start -ml-[3.5rem] -mt-[17rem] tilted-image-right" style="height: 100px; width: 100px;">
                        </div> <!-- end of paragraphs -->

                         <!-- start of image -->
                         <div class="flex flex-col">
                                <div class=" flex flex-col justify-center place-items-center w-[540px] h-[560px] px-4 py-4 self-center mt-[4rem] -mr-[4rem] border-2 bg-dirty-white border-green shadow-md">
                                    <div class="bg-white rounded-lg w-[500px] h-[580px] shadow-lg mt-1 ml-1">
                                        <ul class="slider" id="slider2">
                                            <li class="h-[480px] w-[480px] relative mt-2 ml-2">
                                                <img class="h-full object-cover w-full rounded-lg ml-1" src="{{ asset('images/OsmenaPeak.jpg') }}" alt="">
                                            </li>

                                            <li class="h-[480px] w-[480px] mt-2 ml-2 relative hidden">
                                                <img class="h-full object-cover w-full " src="{{ asset('images/Obong.jpg') }}" alt="">

                                            </li>

                                            <li class="h-[480px] w-[480px] relative mt-2 ml-2 hidden">
                                                <img class="h-full object-cover w-full " src="{{ asset('images/CasayBeachClub.jpg') }}" alt="">
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- slider buttons -->
                                    <div class="mr-[1rem] absolute px-5 flex h-[12px] w-[490px] self-center">
                                        <div class="my-auto w-full flex justify-between">
                                            <button id="prevButtonslider2" class="p-3 text-deep-green rounded-full bg-white opacity-75">
                                            <i class="fa-solid fa-chevron-left"></i>
                                            </button>
                                            <button id="nextButtonslider2" class="p-3 text-deep-green bg-white opacity-75 rounded-full">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div> <!-- end of buttons -->
                                </div>   
                        </div> <!-- end of image --> 
                </div> <!-- end osmena -->

                <!-- casaybeach -->
                <div class="flex flex-row mt-[5rem] mb-[5rem] space-x-14">
                    <!-- start of image -->
                        <div class="flex flex-col">
                                <div class=" flex flex-col justify-center place-items-center w-[540px] h-[560px] px-4 py-4 self-center mt-[4rem] -ml-[4rem] border-2 bg-dirty-white border-green shadow-md">
                                    <div class="bg-white rounded-lg w-[500px] h-[580px] shadow-lg mt-1 ml-1">
                                        <ul class="slider" id="slider3">
                                            <li class="h-[480px] w-[480px] relative mt-2 ml-2">
                                                <img class="h-full object-cover w-full rounded-lg ml-1" src="{{ asset('images/CasayBeachClub.jpg') }}" alt="">
                                            </li>

                                            <li class="h-[480px] w-[480px] mt-2 ml-2 relative hidden">
                                                <img class="h-full object-cover w-full " src="{{ asset('images/OsmenaPeak.jpg') }}" alt="">

                                            </li>

                                            <li class="h-[480px] w-[480px] relative mt-2 ml-2 hidden">
                                                <img class="h-full object-cover w-full " src="{{ asset('images/Obong.jpg') }}" alt="">
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- slider buttons -->
                                    <div class="absolute px-5 flex h-[12px] w-[490px] self-center">
                                        <div class="my-auto  w-full flex justify-between">
                                            <button id="prevButtonslider3" class="p-3 text-deep-green rounded-full bg-white opacity-75">
                                            <i class="fa-solid fa-chevron-left"></i>
                                            </button>
                                            <button  id="nextButtonslider3" class="p-3 text-deep-green bg-white opacity-75 rounded-full">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div> <!-- end of buttons -->
                                </div>   
                        </div> <!-- end of image --> 

                        <!-- start of paragraphs -->
                        <div class="flex flex-col justify-center place-items-center w-[650px] h-[500px] mt-[4rem]">

                            <div class="self-center">
                                <p class="font-dancingscript text-[112px] text-deep-green">Casay Beach</p>
                            </div>

                            <div class="self-center shadow-lg border-r-2 border-black w-[650px] px-6 py-8">
                                <p class="font-poppin text-[18px] text-deep-green">Along the pristine shores of Dalaguete, Cebu, lies Casay Beach Club, an idyllic coastal retreat for travelers seeking sun, sea, and serenity.  <br><br> To reach this hidden gem, , take a scenic bus ride from Cebu City's South Bus Terminal to Dalaguete. Upon arrival in Dalaguete, a tricycle trip will lead you to the tranquil Casay Beach Club. Entrance fees are pocket-friendly, making it accessible for all. <br><br>
                                Casay Beach Club invites you to unwind, sunbathe, and take refreshing dips in the ocean. For adventure enthusiasts, snorkeling and water sports activities are available to complete your beach experience. <br><br> Entrance fees are pocket-friendly, making it accessible for 
                                a day or weekend of relaxation by the sea. Escape the city's hustle and bustle and embrace the coastal beauty of this coastal retreat. Dalaguete welcomes you to the sun, sand, and surf!</p>
                            </div>
                            <img src="images/2.png" alt="" class="absolute self-start -ml-[4.5rem] -mt-[22rem] tilted-image-right" style="height: 120px; width: 120px;">
                            <img src="images/9.png" alt="" class="absolute self-end -mr-[6rem] mt-[42.5rem]" style="height: 280px; width: 300px;">
                        </div> <!-- end of paragraphs -->
                </div> <!-- end casaybeach -->
            </div>   <!-- end of dalaguete tourism -->





        </div>
        <!-- end of body content -->

        <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Function to initialize a slider
        function initializeSlider(sliderID) {
            let currentSlideID = 1;
            let sliderElement = document.getElementById(sliderID);
            let totalSlides = sliderElement ? sliderElement.childElementCount : 0;
            console.log(`Slider ID: ${sliderID}`);
        console.log(`Total Slides: ${totalSlides}`);

            if (sliderElement) {
                // Get references to the buttons for this slider
                let prevButton = document.getElementById(`prevButton${sliderID}`);
                let nextButton = document.getElementById(`nextButton${sliderID}`);


                if (prevButton && nextButton) {
                    prevButton.addEventListener('click', prev);
                    nextButton.addEventListener('click', next);
                }

                function next() {
                    console.log('Next button clicked');
                    if (currentSlideID < totalSlides) {
                        currentSlideID++;
                        showSlide();
                    }
                }

                function prev() {
                    console.log('prev button clicked');
                    if (currentSlideID > 1) {
                        currentSlideID--;
                        showSlide();
                    }
                }

                function showSlide() {
                    slides = sliderElement.getElementsByTagName('li');
                    for (let index = 0; index < totalSlides; index++) {
                        const element = slides[index];
                        if (currentSlideID === index + 1) {
                            element.classList.remove('hidden');
                        } else {
                            element.classList.add('hidden');
                        }
                    }
                }
            }
        }

        // Initialize each slider
        initializeSlider('slider1');
        initializeSlider('slider2');
        initializeSlider('slider3');
        // Initialize more sliders as needed
    });
</script>




</body>

</html>