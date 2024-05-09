<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        .hide {
            display: none;
        }

        .info:hover+.hide {
            position: absolute;
            display: block;
            z-index: 9;
        }

        #detailsChecked {
            display: block;
        }
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.load('current', {'packages': ['bar']});

        google.charts.setOnLoadCallback(drawChartResident);
        google.charts.setOnLoadCallback(drawChartHousehold);
        google.charts.setOnLoadCallback(drawAllResident);
        google.charts.setOnLoadCallback(drawAllHousehold);
        google.charts.setOnLoadCallback(drawChartMonthInc);
        google.charts.setOnLoadCallback(drawPayment);
        google.charts.setOnLoadCallback(drawRefund);
        google.charts.setOnLoadCallback(drawPRCount);
        google.charts.setOnLoadCallback(drawEducation);
        google.charts.setOnLoadCallback(drawIP);
        google.charts.setOnLoadCallback(drawNHTS);
        google.charts.setOnLoadCallback(drawWater);
        google.charts.setOnLoadCallback(drawToilet);
        google.charts.setOnLoadCallback(drawPregnancy);

        function drawChartResident() {

            var data = google.visualization.arrayToDataTable([
                ['Sitio', 'Residents'],
                <?php echo $chartdataResident ?>
            ]);

            var options = {
                width: '100%',
                height: '100%',
                backgroundColor: 'none',
                chartArea: {
                    height: "80%",
                    width: "80%"
                },
                colors: ['green'],
                legend: 'none',
                vAxis: {
                    format: '0'
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('residentBarchart'));

            var checkBox = document.getElementById('resCheck');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, options);
        }

        function drawChartHousehold() {

            var data = google.visualization.arrayToDataTable([
                ['Sitio', 'Households'],
                <?php echo $chartdataHousehold ?>
            ]);

            var options = {
                width: '100%',
                height: '100%',
                color: 'green',
                backgroundColor: 'none',
                chartArea: {
                    height: "80%",
                    width: "80%"
                },
                colors: ['green'],
                legend: 'none',
                vAxis: {
                    format: '0'
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('householdBarchart'));

            var checkBox = document.getElementById('hhCheck');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, options);
        }

        function drawEducation() {
            var data = google.visualization.arrayToDataTable([
                ['Year-Quarter', 'None', 'Elementary Graduate','Junior High School Graduate','Senior High School Graduate','College Graduate','Postgraduate'],
                <?php echo $chartAllEdu ?>
            ]);

            var options = {
                chart: {
                    title: 'Educational Attainment Per Quarter'
                }
            };

            var chart = new google.charts.Bar(document.getElementById('Educhart'));

            var checkBox = document.getElementById('addInfo');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        function drawChartMonthInc() {
            var data = google.visualization.arrayToDataTable([
                ['Year-Quarter', 'None', 'less than 9,100','9,100 - 18,200','18,200 - 36,400','36,400 - 63,700','63,700 - 109,200','109,200 - 182,200','above 182,000'],
                <?php echo $chartAllIncome ?>
            ]);

            var options = {
                chart: {
                    title: 'Income Per Quarter',
                    subtitle: 'Per Value Range'
                }
            };

            var chart = new google.charts.Bar(document.getElementById('monthInchart'));

            var checkBox = document.getElementById('addInfo');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        function drawAllResident() {
            var data = google.visualization.arrayToDataTable([
                <?php echo $chartAllRes ?>
            ]);

            var options = {
                chart: {
                    title: 'Resident Population Per Quarter Recorded'
                },
                backgroundColor: 'transparent'
            };

            var chart = new google.charts.Bar(document.getElementById('AllReschart'));

            var checkBox = document.getElementById('detailsResCheckBox');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        function drawAllHousehold() {
            var data = google.visualization.arrayToDataTable([
                <?php echo $chartAllHh ?>
            ]);

            var options = {
                chart: {
                    title: 'Households Per Quarter Recorded'
                }
            };

            var chart = new google.charts.Bar(document.getElementById('AllHhchart'));

            var checkBox = document.getElementById('detailsHhCheckBox');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        function drawPayment() {
            var data = google.visualization.arrayToDataTable([
                ['Year-Quarter', 'Total Amount Paid'],
                <?php echo $payAllChart ?> 
            ]);
            
            var options = {
                title: 'Amount Paid Per Quarter',
                width: '100%',
                height: '100%',
                backgroundColor: 'transparent',
                chartArea: {
                    height: "70%",
                    width: "70%"
                },
                colors: ['green'],
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('Paychart'));

            var checkBox = document.getElementById('addInfo');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, options);
        }

        function drawRefund() {
            var data = google.visualization.arrayToDataTable([
                ['Year-Quarter', 'Total Amount Refunded'],
                <?php echo $refundAllChart ?> 
            ]);
            
            var options = {
                title: 'Amount Refunded Per Quarter',
                width: '100%',
                height: '100%',
                backgroundColor: 'transparent',
                chartArea: {
                    height: "70%",
                    width: "70%"
                },
                colors: ['red'],
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('Refundchart'));

            var checkBox = document.getElementById('addInfo');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, options);
        }

        function drawPRCount() {
            var data = google.visualization.arrayToDataTable([
                ['Year-Quarter', 'Paid', 'Refunded',],
                <?php echo $prAllChart ?>
            ]);

            var options = {
                chart: {
                    title: 'Differences Between Paid and Refunded Transactions',
                    subtitle: 'Per Quarter'
                }
            };

            var chart = new google.charts.Bar(document.getElementById('prCountchart'));

            var checkBox = document.getElementById('addInfo');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, options);
        }

        function drawIP() {
            var data = google.visualization.arrayToDataTable([
                ['Year-Quarter', 'IP', 'Non-IP',],
                <?php echo $chartAllIP ?>
            ]);

            var options = {
                chart: {
                    title: 'Household IP'
                }
            };

            var chart = new google.charts.Bar(document.getElementById('IPchart'));

            var checkBox = document.getElementById('addInfo');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, options);
        }

        function drawNHTS() {
            var data = google.visualization.arrayToDataTable([
                ['Year-Quarter', 'NHTS', 'Non-NHTS',],
                <?php echo $chartAllNHTS ?>
            ]);

            var options = {
                chart: {
                    title: 'Household NHTS'
                }
            };

            var chart = new google.charts.Bar(document.getElementById('NHTSchart'));

            var checkBox = document.getElementById('addInfo');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, options);
        }

        function drawWater() {
            var data = google.visualization.arrayToDataTable([
                ['Year-Quarter','Doubtful','L1','L2','L3'],
                <?php echo $chartWater ?>
            ]);

            var options = {
                chart: {
                    title: 'Household Water Access'
                }
            };

            var chart = new google.charts.Bar(document.getElementById('Waterchart'));

            var checkBox = document.getElementById('addInfo');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, options);
        }

        function drawToilet() {
            var data = google.visualization.arrayToDataTable([
                ['Year-Quarter','Sanitary','Insanitary','None','Shared'],
                <?php echo $chartToilet ?>
            ]);

            var options = {
                chart: {
                    title: 'Household Toilet Facilities'
                }
            };

            var chart = new google.charts.Bar(document.getElementById('Toiletchart'));

            var checkBox = document.getElementById('addInfo');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, options);
        }

        function drawPregnancy() {
            var data = google.visualization.arrayToDataTable([
                ['Year-Quarter','Not Pregnant','Pregnant','Post-Partum'],
                <?php echo $chartPreg ?>
            ]);

            var options = {
                chart: {
                    title: 'Pregnancy'
                }
            };

            var chart = new google.charts.Bar(document.getElementById('Pregchart'));

            var checkBox = document.getElementById('addInfo');
                checkBox.addEventListener('change', function () {
                    chart.draw(data, options);
            });

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        function viewRes(){
            const checkBox = document.getElementById('resCheck');
            const view = document.getElementById('resDisplay');
            const viewAdd = document.getElementById('resAddInfo');

            if(checkBox.checked){
                view.style.display = "block";
                viewAdd.style.display = "block";
            }else{
                view.style.display = "none";
                viewAdd.style.display = "none";
            }
        }

        function viewHouse(){
            const checkBox = document.getElementById('hhCheck');
            const view = document.getElementById('hhDisplay');
            const viewAdd = document.getElementById('hhAddInfo');

            if(checkBox.checked){
                view.style.display = "block";
                viewAdd.style.display = "block";
            }else{
                view.style.display = "none";
                viewAdd.style.display = "none";
            }
        }

        function viewMoreResDetails(){
            const checkBox = document.getElementById('detailsResCheckBox');
            const details = document.getElementById('AllReschart');
            const lessDetails = document.getElementById('residentBarchart');

            if(checkBox.checked){
                details.style.display = "block";
                lessDetails.style.display = "none";
            }else{
                details.style.display = "none";
                lessDetails.style.display = "block";
            }
        }

        function viewMoreHhDetails(){
            const checkBox = document.getElementById('detailsHhCheckBox');
            const details = document.getElementById('AllHhchart');
            const lessDetails = document.getElementById('householdBarchart');

            if(checkBox.checked){
                details.style.display = "block";
                lessDetails.style.display = "none";
            }else{
                details.style.display = "none";
                lessDetails.style.display = "block";
            }
        }

        function viewAddInfo(){
            const checkBox = document.getElementById('addInfo');
            const view = document.getElementById('addInfoDisplay');

            if(checkBox.checked){
                view.style.display = "block";
            }else{
                view.style.display = "none";
            }
        }
    </script>

    <div class="py-1 mt-[8rem] flex flex-col justify-center bg-dirty-white">

            @role('Admin')
            <div class="px-5 py-5 flex flex-col justify-center h-[250px] w-full bg-olive-green -mt-[10rem]">
                <div class="mb-12 mt-[33rem] ml-[5rem] w-64 h-64 rounded-full border-2 bg-dirty-white border-green self-center">
                    <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="">
                </div>
                <div class="bg-green w-[450px] h-[80px] text-center py-2 my-9 mt-[20px] self-center ml-[5rem] border-2 border-deep-green">
                    <a href="{{ route('accounts.index') }}" class="font-robotocondensed text-[40px] text-dirty-white text-center">MANAGE ACCOUNTS</a>
                </div>
                <div class="bg-green w-[450px] h-[80px] text-center py-2 my-9 self-center ml-[5rem] -mt-3 border-2 border-deep-green">
                    <a href="{{ route('services.index') }}" class="font-robotocondensed text-[40px] text-dirty-white text-center">MANAGE REQUESTS</a>
                </div>

                <!-- Authentication -->
                <div class="bg-green h-[40px] w-[140px] text-center ml-[5rem] mt-[1rem] px-2 py-1 font-semibold self-center border-2 border-deep-green rounded-md">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="text-dirty-white">
                                            {{ __('LOGOUT') }}
                        </a>
                    </form>
                </div>
            </div>
            @endrole
            
            @hasanyrole('Barangay Captain|Barangay Secretary')
            
            <div class="flex flex-col p-3 -mt-20 ml-24 h-max w-[1342px]">
                <p class="ml-3 mt-3 mb-2 font-robotocondensed text-[24px] text-black">FILTER STATISTICS</p>
                <div class="flex flex-row px-10 py-10 items-center justify-between w-[1250px] ml-3 border-b-2 border-black rounded-sm h-max">
                    <form action="" method="GET">

                        <div class="float-left bg-transparent h-16 w-40">
                            <x-label for="sitio" :value="__('Sitio')" />
                            <select id="sitio" class="rounded-lg border-2 mt-1 w-full bg-transparent" name="sitio" :value="old('sitio')" required autofocus>
                                <option value="NULL">Select Sitio</option>
                                @foreach ($sitioList as $sitio)
                                <option value="{{$sitio->id}}" class="bg-dirty-white">{{ $sitio->sitioName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="float-left bg-transparent h-16 w-40" style="margin-left: 50px;">
                            <x-label for="gender" :value="__('Gender')" />
                            <select id="gender" class="rounded-lg border-2 mt-1 w-full bg-transparent" name="gender" :value="old('gender')" required autofocus>
                                <option value="NULL">Select Gender</option>
                                @foreach ($gender as $gender)
                                    @if($gender->genderGroup == 'M')
                                    <option value="{{$gender->genderGroup}}" class="bg-dirty-white">Male</option>
                                    @elseif($gender->genderGroup == 'F')
                                    <option value="{{$gender->genderGroup}}" class="bg-dirty-white">Female</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="float-left bg-transparent h-16 w-max" style="margin-left: 50px;">
                            <x-label for="ageclass" :value="__('Age Classification')" />
                            <select id="ageclass" class="rounded-lg border-2 mt-1 w-46 bg-transparent" name="ageclass" :value="old('ageclass')" required autofocus>
                                <option value="NULL">Select Age Range</option>
                                @foreach ($ageClassification as $age)
                                <option value="{{$age->ageGroup}}" class="bg-dirty-white">{{ $age->ageGroup }}</option>
                                @endforeach
                            </select>
                            <a class="info w-[16px] self-end ml-2"><i class="fa fa-question-circle-o text-[15px]"></i></a>
                            <div class="text-dirty-white text-xs font-robotocondensed hide bg-green p-2 border-2 rounded-xl self-end ml-40">
                                <div class="w-80 text-justify">
                                    <p>Age Classification:</p>
                                    <p>N - Newborn (0-28 Days Old)</p>
                                    <p>I - Infant (29 Days - 11 Months Old)</p>
                                    <p>U - Under-five (1-4 Years Old)</p>
                                    <p>S - School-Aged Children (5-9 Years Old)</p>
                                    <p>A - Adolescents (10-19 Years Old)</p>
                                    <p>WRA - Not Pregnant and non-Post Partum (15-59 Years Old, Female)</p>
                                    <p>P - Pregnant</p>
                                    <p>AP - Adolescent-Pregnant</p>
                                    <p>PP - Post Partum</p>
                                    <p>AB - Adult (20-59 Years Old, Male)</p>
                                    <p>SC - Senior Citizen (60 Years Old and Above)</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="float-left bg-transparent h-16" style="margin-left: 90px;">
                            <x-label for="year" :value="__('Year')" />
                            <select id="year" class="rounded-lg border-2 mt-1 w-full bg-transparent" name="year" :value="old('year')" required autofocus>
                                @foreach ($yearList as $year)
                                    <option value="{{$year->year}}" class="bg-dirty-white">{{$year->year}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="float-left bg-transparent h-16" style="margin-left: 30px;">
                            <x-label for="quarter" :value="__('Quarter')" />
                            <select id="quarter" class="rounded-lg border-2 mt-1 w-full bg-transparent" name="quarter" :value="old('quarter')" required autofocus>
                                <option value="1" class="bg-dirty-white">1</option>
                                <option value="2" class="bg-dirty-white">2</option>
                                <option value="3" class="bg-dirty-white">3</option>
                                <option value="4" class="bg-dirty-white">4</option>
                            </select>
                        </div>

                        <div class="w-[30px] h-[30px] float-right ml-[190px] mt-8">
                            <button class="" type="submit"><i class="fa-solid fa-filter text-deep-green text-[28px] self-end"></i></button>
                        </div>
                    </form>
                    <form class="flex flex-row" action="{{ route('exportpdf') }}" method="GET">
                        <input name="sitio" type="hidden" value="{{$request->sitio}}"></input>
                        <input name="gender" type="hidden" value="{{$request->gender}}"></input>
                        <input name="ageclass" type="hidden" value="{{$request->ageclass}}"></input>
                        <input name="year" type="hidden" value="{{$request->year}}"></input>
                        <input name="quarter" type="hidden" value="{{$request->quarter}}"></input>
                        <div class="w-[30px] h-[30px] mt-8 mr-2">
                            @if($totalResidentCount > 0 && $totalHouseholdCount > 0)
                            <button type="submit" class="">
                                <i class="fa-solid fa-print text-deep-green text-[28px]"></i>
                            </button>
                            @else
                                <i class="fa-solid fa-print text-deep-green text-[28px] hover:cursor-not-allowed"></i>
                            @endif
                        </div>
                    </form>
                </div>

                @if($request->sitio || $request->gender || $request->ageclass || $request->year || $request->quarter)
                    @if($totalResidentCount > 0 && $totalHouseholdCount > 0)
                    <div class="flex flex-col bg-dirty-white h-max w-[1200px] px-4 ml-10 mt-[5rem]">
                        <div class="bg-green px-4 py-2 self-center w-max border-1 -mt-5 border-black rounded-md shadow-md">
                            <p class="font-poppin text-[28px] text-dirty-white">BARANGAY POBLACION, DALAGUETE CENSUS DATA</p>
                        </div>
                        <div class="flex flex-row mt-[2rem] self-start bg-dirty-white justify-center">
                            <div class="shadow-lg border-2 border-green mt-[2rem] py-10 ml-[12%]">
                                <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max mx-auto -mt-[4rem]">
                                    <p class="font-poppin text-[18px] text-dirty-white text-center">TOTAL RESIDENTS</p>
                                </div>
                                <div class="bg-green w-[525px] h-[95px] m-auto flex items-center justify-center mt-8 shadow-lg">
                                    <p class="font-poppin text-center font-black text-[30px] text-dirty-white">
                                        {{ $totalResidentCount }} RESIDENTS
                                    </p>
                                </div>
                            </div>
                            <div class="mt-[2rem] shadow-lg border-2 border-green py-10 ml-[4%]">
                                <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max mx-auto -mt-[4rem]">
                                    <p class="font-poppin text-[18px] text-dirty-white text-center">TOTAL HOUSEHOLDS</p>
                                </div>
                                <div class="bg-green w-[525px] h-[95px] m-auto flex items-center justify-center mt-8 shadow-lg">
                                    <p class="font-poppin text-center font-black text-[30px] text-dirty-white">
                                        {{ $totalHouseholdCount }} HOUSEHOLDS
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row mt-[2rem] ml-[3rem]">
                            <input type="checkbox" id="resCheck" class="mt-[3.8px]" onchange="viewRes()">
                            <label for="resCheck" class="ml-[8px]">Resident</label>
                            <input type="checkbox" id="hhCheck" class="mt-[3.8px] ml-[15px]" onchange="viewHouse()">
                            <label for="hhCheck" class="ml-[8px]">Household</label>
                        </div>
                        <div id="resDisplay" class="self-center space-x-8 mb-[4rem]" style="display: none;">
                            <div class="flex flex-row mt-[2rem] ml-[3rem]">
                                <input type="checkbox" id="detailsResCheckBox" class="mt-[3.8px]" onchange="viewMoreResDetails()">
                                <label for="detailsResCheckBox" class="ml-[8px]">Show more details for comparison</label>
                            </div>
                            <div class="flex flex-col self-start bg-white shadow-lg border-2 border-green mt-[2rem] ml-2 px-3 py-2">
                                <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max self-center -mt-8">
                                    <h1 class="font-poppin text-[18px] text-dirty-white text-center">
                                        @if(!($request->sitio))
                                        TOTAL RESIDENTS PER SITIO
                                        @elseif ($request->sitio=="NULL")
                                        TOTAL RESIDENTS PER SITIO
                                        @else
                                        TOTAL RESIDENTS IN {{ $nameSitio }}
                                        @endif
                                    </h1>
                                </div>
                                @if (($request->sitio || $request->gender || $request->ageclass))
                                <div class="w-[1050px] h-[700px]">
                                    <div class="w-[1050px] h-[700px]" id="residentBarchart" style=""></div>
                                    <div class="ml-10 mt-6 w-[950px] h-[700px]" id="AllReschart" style="display: none;"></div>
                                </div>
                                <a class="info w-[13px] self-end"><i class="fa fa-question-circle-o text-[12px]"></i></a>
                                <div class="text-dirty-white text-xs font-robotocondensed hide bg-green py-2 px-2 border-2 rounded-xl self-end mt-[24rem] mr-8">
                                    <div class="mb-2 w-80 text-justify">
                                        <p class="py-2 text-xl">LEGEND</p>
                                        <p>FORMAT:</p>
                                        <p>No Sitio Filter: Sitio Name</p>
                                        <p>With Sitio Filter: Age Classification (Gender)</p>
                                        <br>
                                        <div>
                                            Gender:
                                            <br>
                                            M - Male
                                            <br>
                                            F - Female
                                        </div>
                                        <div class="my-2">
                                            Age Classification:
                                            <br>
                                            <p>N - Newborn (0-28 Days Old)</p>
                                            <p>I - Infant (29 Days - 11 Months Old)</p>
                                            <p>U - Under-five (1-4 Years Old)</p>
                                            <p>S - School-Aged Children (5-9 Years Old)</p>
                                            <p>A - Adolescents (10-19 Years Old)</p>
                                            <p>WRA - Not Pregnant and non-Post Partum (15-59 Years Old, Female)</p>
                                            <p>P - Pregnant</p>
                                            <p>AP - Adolescent-Pregnant</p>
                                            <p>PP - Post Partum</p>
                                            <p>AB - Adult (20-59 Years Old, Male)</p>
                                            <p>SC - Senior Citizen (60 Years Old and Above)</p>
                                        </div>
                                    <hr>
                                    </div>
                                </div>
                                @else
                                <div class="w-[1050px] h-[600px] mt-2 mx-auto font-poppin text-[18px] text-dirty-white text-center"></div>
                                @endif
                            </div>
                        </div>
                        <div id="hhDisplay" class="self-center space-x-8 mb-[4rem]" style="display: none;">
                            <div class="flex flex-row mt-[2rem] ml-[3rem]">
                                <input type="checkbox" id="detailsHhCheckBox" class="mt-[3.8px]" onchange="viewMoreHhDetails()">
                                <label for="detailsHhCheckBox" class="ml-[8px]">Show more details for comparison</label>
                            </div>
                            <div class="flex flex-col self-start bg-white shadow-lg border-2 border-green mt-[2rem] ml-2 px-3 py-2">
                                <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max self-center -mt-8">
                                    <h1 class="font-poppin text-[18px] text-dirty-white text-center">
                                        @if(!($request->sitio))
                                        TOTAL HOUSEHOLDS PER SITIO
                                        @elseif ($request->sitio=="NULL")
                                        TOTAL HOUSEHOLDS PER SITIO
                                        @else
                                        TOTAL HOUSEHOLDS IN {{ $nameSitio }}
                                        @endif
                                    </h1>
                                </div>
                                <div class="">
                                    @if(($request->sitio || $request->gender || $request->ageclass))
                                    <div class="w-[1050px] h-[700px]">
                                        <div class="w-[1050px] h-[700px]" id="householdBarchart" style=""></div>
                                        <div class="ml-10 mt-6 w-[950px] h-[700px]" id="AllHhchart" style="display: none;"></div>
                                    </div>
                                    @else
                                    <div class="w-[1050px] h-[700px] mt-2 mx-auto font-poppin text-[18px] text-dirty-white text-center"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="my-[2rem] border-2 border-green"></div>
                        <div class="flex flex-row ml-[3rem]">
                            <input type="checkbox" id="addInfo" class="mt-[3.8px]" onchange="viewAddInfo()">
                            <label for="addInfo" class="ml-[8px]">Additional Details</label>
                        </div>
                        <div id="addInfoDisplay" class="mt-[2rem] w-[1050px] self-center" style="display: none;">
                            <div id="resAddInfo" style="display: none;">
                                <p class="font-bold text-[22px] mt-2 mb-6">Resident Additional Information</p>
                                <div class="h-[650px] w-[1050px] border-2 border-green bg-white px-6 py-6">
                                    <div class="ml-6 h-[600px] w-[950px]" id="monthInchart"></div>
                                </div>
                                @if($request->sitio == "NULL" && $request->gender == "NULL" && $request->ageclass == "NULL")
                                <div class="flex flex-row mt-[2rem] w-[1050px] h-[350px]">
                                    <div class="w-[510px] bg-white border-2 border-green px-2 py-2">
                                        <div id="Paychart" class="w-[475px] h-[300px] mt-4 ml-6"></div>
                                    </div>
                                    <div class="w-[510px] ml-8 bg-white border-2 border-green px-2 py-2">
                                        <div id="Refundchart" class="w-[475px] h-[300px] mt-4 ml-6"></div>
                                    </div>
                                </div>
                                <div class="mt-[2rem] w-[1050px] h-[275px] px-4 py-4 border-2 border-green bg-white">
                                    <div id="prCountchart" class="w-[970px] h-[250px]"></div>
                                </div>
                                @endif
                                <div class="mt-[2rem] w-[1050px] h-[320px] px-4 py-4 border-2 border-green bg-white">
                                    <div id="Educhart" class="ml-4 w-[970px] h-[295px]"></div>   
                                </div>
                                @if($request->gender != "M")
                                <div class="mt-[2rem] w-[1050px] h-[275px] px-4 py-4 border-2 border-green bg-white">
                                    <div id="Pregchart" class="w-[970px] h-[250px]"></div>   
                                </div>
                                @endif
                                <div class="my-[2rem] border-2 border-green"></div>
                            </div>
                            <div id="hhAddInfo" style="display: none;">
                                <p class="font-bold text-[22px] my-2">Household Additional Information</p>
                                <div class="flex flex-row mt-[2rem] w-[1050px] h-[350px]">
                                    <div class="w-[510px] bg-white border-2 border-green px-2 py-2">
                                        <div id="IPchart" class="w-[455px] h-[300px] mt-4 ml-6"></div>
                                    </div>
                                    <div class="w-[510px] ml-8 bg-white border-2 border-green px-2 py-2">
                                        <div id="NHTSchart" class="w-[455px] h-[300px] mt-4 ml-6"></div>
                                    </div>
                                </div>
                                <div class="flex flex-row mt-[2rem] w-[1050px] h-[350px]">
                                    <div class="w-[510px] bg-white border-2 border-green px-2 py-2">
                                        <div id="Waterchart" class="w-[455px] h-[300px] mt-4 ml-6"></div>
                                    </div>
                                    <div class="w-[510px] ml-8 bg-white border-2 border-green px-2 py-2">
                                        <div id="Toiletchart" class="w-[455px] h-[300px] mt-4 ml-6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="px-4 pt-10 self-center">
                        <p class="font-poppin text-[28px]">There is no data available with the filters selected.</p>
                    </div>
                    @endif
                @endif
            </div>
            @endhasanyrole


            @hasanyrole('User|Barangay Health Worker')
            <div class="w-max h-max grid grid-rows-2 grid-flow-col gap-16 ml-24 -mt-20 px-5 py-5 justify-between font-bold">
                <div class="flex flex-col">
                    <div class=" bg-dirty-white w-[472px] h-[421px] border-2 border-deep-green">
                        <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border px-1 py-1 text-center">BARANGAY CERTIFICATE</p>
                        <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">PURPOSES BARANGAY CERTIFICATION:</p>
                        <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                            @foreach($documents as $document)
                            @if($document->docType == "Barangay Certificate")
                            <li>{{$document->docName}}</li>
                            @endif
                            @endforeach
                        </ul>
                        <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">REQUIREMENTS</p>
                        <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                            <li>Residence Certificate</li>
                        </ul>
                    </div>
                    <div class="mt-4">
                            <a href="{{ route('services.request', ['docType' => 'Barangay Certificate']) }}" class="px-3 py-2 bg-deep-green text-dirty-white font-medium">REQUEST BARANGAY CERTIFICATE</a>
                    </div>
                </div>
                <div class="flex flex-col">
                <div class="bg-dirty-white w-[472px] h-[300px] border-2 border-deep-green mt-10">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border px-1 py-1 text-center">FILING OF COMPLAINTS</p>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">PURPOSE:</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        @foreach($documents as $document)
                        @if($document->docType == "File Complain")
                        <li>{{$document->docName}}</li>
                        @endif
                        @endforeach
                    </ul>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">REQUIREMENTS</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        <li>Complainant can either be a resident or not a resident of Barangay Poblacion</li>
                        <li>Complainee must be a resident of Barangay Poblacion</li>
                    </ul>
                </div>
                    <div class="mt-4">
                        <a href="{{ route('services.request', ['docType' => 'File Complain']) }}" class="px-3 py-2 bg-deep-green text-dirty-white font-medium">FILE COMPLAIN</a>
                    </div>
                </div>
                
                <div class="flex flex-col">
                    <div class="bg-dirty-white w-max h-[421px] border-2 border-deep-green">
                        <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border px-1 py-1 text-center">BARANGAY CLEARANCE</p>
                        <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">PURPOSE:</p>
                        <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                            @foreach($documents as $document)
                            @if($document->docType == "Barangay Clearance")
                            <li>{{$document->docName}}</li>
                            @endif
                            @endforeach
                        </ul>
                        <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">REQUIREMENTS</p>
                        <ul class="ml-10 mt-2 mr-2 list-disc font-roboto text-deep-green">
                            <li>Cedula</li>
                            <ul></ul>
                            <ul></ul>
                            <ul></ul>
                        </ul>
                  
                    </div>
                    <div class="mt-4">
                            <a href="{{ route('services.request', ['docType' => 'Barangay Clearance']) }}" class="px-3 py-2 bg-deep-green text-dirty-white font-medium">REQUEST BARANGAY CLEARANCE</a>
                        </div>
                </div>

                <div class="flex flex-col">
                <div class="bg-dirty-white w-[620px] h-[300px] border-2 border-deep-green mt-10">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border  px-1 py-1 text-center">PERSONAL INFORMATION CHANGE</p>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">PURPOSE:</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        <li>Up-to-date Personal Record</li>
                    </ul>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">REQUIREMENTS</p>
                 
                </div>
                <div class="mt-4">
                        <a href="{{ route('services.request', ['docType' => 'Account Information Change']) }}" class="px-3 py-2 bg-deep-green text-dirty-white font-medium">REQUEST PERSONAL INFORMATION CHANGE</a>
                    </div>
                </div>
                
            </div>

            @endhasanyrole
    </div>
    

</x-app-layout>