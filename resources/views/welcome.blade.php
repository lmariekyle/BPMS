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
                <a href="{{ url('/dashboard') }}" class="p-2 border-2 border-deep-green rounded text-xl mx-2 text-deep-green bg-dirty-white font-robotocondensed">DASHBOARD</a>
                @else
                <a href="{{ route('login') }}" class="p-2  border-2 border-deep-green rounded text-xl mx-3 text-deep-green bg-dirty-white font-robotocondensed">LOGIN</a>
                @if (Route::has('create'))
                <a href="{{ route('create') }}" class="p-2  border-2 border-deep-green rounded text-xl mx-3 text-deep-green bg-dirty-white font-robotocondensed">
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
        <div class="flex flex-col bg-dirty-white border-2 border-black rounded-md shadow-lg h-max w-[1200px] px-4">
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

            <div class="bg-[#efeee9] flex flex-col shadow-lg h-[500px] w-full mt-[12rem] justify-items-center">

                <p class="absolute font-playfair font-semibold text-[74px] text-deep-green self-center text-custom -mt-[7rem] mb-4">Discover Paradise in Dalaguete</p>

                <div class="bg-green border-2 border-black w-[1060px] h-[240px] self-center mt-10 shadow-lg"></div>
                <div class="absolute flex flex-row w-[1000px] h-[250px] ml- px-4 py-2 self-center mt-[4rem] border-2 bg-[#efeee9] border-green shadow-md place-items-center">
                    <p class="font-poppins text-[24px] font-semibold text-black indent-4 text-center -mt-2">Nestled on the picturesque island of Cebu, the Municipality of Dalaguete beckons you to a tropical paradise like no other. With its lush green mountains, pristine white-sand beaches, and a rich cultural heritage, Dalaguete offers an unforgettable escape for nature enthusiasts and curious wanderers alike.</p>
                    <img src="images/8.png" alt="" style="height: 300px; width: 300px;" class="absolute left-0 -ml-[6rem] mt-[7rem]">
                </div>

            </div>


        </div>
        <!-- end of body content -->

</body>

</html>