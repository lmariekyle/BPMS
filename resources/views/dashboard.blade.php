<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-1 ml-[8rem] mt-[8rem] flex flex-col justify-center bg-dirty-white">

            @role('Admin')
            <div class="px-5 py-5 flex flex-col justify-center h-[250px] bg-olive-green w-full -mt-[10rem]">
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
            
            <div class="flex flex-col p-3 -mt-20 -ml-24 h-max w-[1342px]">
                <p class="ml-3 mt-3 mb-2 font-robotocondensed text-[24px] text-black">FILTER STATISTICS</p>
                <div class="flex flex-row px-10 py-6 items-center justify-between w-[1250px] ml-3 border-b-2 border-black rounded-sm h-max">
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
                            <select id="ageclass" class="rounded-lg border-2 mt-1 w-40 bg-transparent" name="ageclass" :value="old('ageclass')" required autofocus>
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
                            <button type="submit" class="">
                                <i class="fa-solid fa-print text-deep-green text-[28px]"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="flex flex-col bg-dirty-white h-max w-[1200px] px-4 ml-10 mt-[5rem]">
                    <div class="bg-green px-4 py-2 self-center w-max border-1 -mt-5 border-black rounded-md shadow-md">
                        <p class="font-poppin text-[28px] text-dirty-white">BARANGAY POBLACION, DALAGUETE CENSUS DATA</p>
                    </div>


                    <div class="flex flex-row self-center space-x-8 mt-[4rem] mb-[4rem]">
                        <div class="flex flex-col self-start bg-dirty-white shadow-lg border-2 border-green mt-[2rem] ml-2 px-3 py-2">
                            <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max self-center -mt-8">
                                <h1 class="font-poppin text-[18px] text-dirty-white text-center">
                                    @if(!($request->sitio))
                                    TOTAL RESIDENTS PER SITIO
                                    @elseif ($request->sitio=="NULL")
                                    TOTAL RESIDENTS PER SITIO
                                    @else
                                    RESIDENTS IN {{ $nameSitio }}
                                    @endif
                                </h1>
                            </div>
                            @if (($request->sitio || $request->gender || $request->ageclass) && $totalResidentCount>0)
                            <div class="w-[525px] h-[300px] mt-2 mx-auto" id="residentPiechart" style=""></div>
                            <a class="info w-[13px] self-end"><i class="fa fa-question-circle-o text-[12px]"></i></a>
                            <div class="text-dirty-white text-xs font-robotocondensed hide bg-green py-2 px-2 border-2 rounded-xl self-end mt-[15rem] mr-8">
                                <div class="mb-2 w-80 text-justify">
                                    <p class="py-2 text-xl">LEGEND</p>
                                    <p>FORMAT: Sitio Name (Gender - Age Classification)*</p>
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
                                <p class="mt-2 w-80 text-justify">
                                    Hover over the colors in the legend to highlight the different Sitios of the Barangay.
                                    If nothing is highlighted after hovering, it means there are 0 Residents on that particular category.
                                </p>
                            </div>
                            @else
                            <div class="w-[525px] h-[300px] mt-2 mx-auto font-poppin text-[18px] text-dirty-white text-center" id="emptyPiechart" style=""></div>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-row self-center space-x-8 mt-[4rem] mb-[4rem]">
                        <div class="flex flex-col self-start bg-dirty-white shadow-lg border-2 border-green mt-[2rem] ml-2 px-3 py-2">
                            <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max self-center -mt-8">
                                <h1 class="font-poppin text-[18px] text-dirty-white text-center">
                                    @if(!($request->sitio))
                                    TOTAL HOUSEHOLDS PER SITIO
                                    @elseif ($request->sitio=="NULL")
                                    TOTAL HOUSEHOLDS PER SITIO
                                    @else
                                    HOUSEHOLDS IN {{ $nameSitio }}
                                    @endif
                                </h1>
                            </div>
                            <div class="">
                                @if(($request->sitio || $request->gender || $request->ageclass) || $totalHouseholdCount>0)
                                    @if($request->gender=="NULL" && $request->ageclass=="NULL")
                                    <div class="w-[525px] h-[300px] mt-2 mx-auto" id="householdPiechart"></div>
                                        @if($request->sitio=="NULL")
                                        <a class="info w-[13px] self-end"><i class="fa fa-question-circle-o text-[12px]"></i></a>
                                        <div class="text-dirty-white text-xs font-robotocondensed hide bg-green py-2 px-2 border-2 rounded-xl self-end ml-8 w-80 text-justify">
                                            <p class="py-1">
                                                Hover over the colors in the legend to highlight the different Sitios of the Barangay.
                                                If nothing is highlighted after hovering, it means there are 0 Households on that particular Sitio.
                                            </p>
                                        </div>
                                        @endif
                                    @else
                                    <div class="w-[525px] h-[324px] mt-2 px-2 flex items-center justify-center">
                                        <p class="text-xl font-robotocondensed w-80 text-center text-deep-green">
                                            Since Age/Gender filters are applied, Household Information is unavailable.
                                        </p>
                                    </div>
                                    @endif
                                @elseif ($totalHouseholdCount<=0)
                                <div class="w-[525px] h-[300px] mt-2 mx-auto font-poppin text-[18px] text-dirty-white text-center" id="emptyTwochart"></div>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col self-start bg-dirty-white shadow-lg border-2 border-green mt-[2rem] py-10">
                            <div>
                                <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max mx-auto -mt-[4rem]">
                                    <p class="font-poppin text-[18px] text-dirty-white text-center">TOTAL RESIDENTS</p>
                                </div>
                                <div class="bg-green w-[525px] h-[95px] m-auto flex items-center justify-center mt-8 shadow-lg">
                                    <p class="font-poppin text-center font-black text-[60px] text-dirty-white">
                                        {{ $totalResidentCount }} RESIDENTS
                                    </p>
                                </div>-
                            </div>
                            <div class="mt-[4rem]">
                                <div class="px-4 py-3 bg-deep-green border-4 border-dirty-white rounded-md w-max mx-auto -mt-[2rem]">
                                    <p class="font-poppin text-[18px] text-dirty-white text-center">TOTAL HOUSEHOLDS AS OF {{ date("Y") }}</p>
                                </div>
                                <div class="bg-green w-[525px] h-[95px] m-auto flex items-center justify-center mt-8 shadow-lg">
                                    <p class="font-poppin text-center font-black text-[60px] text-dirty-white">
                                        @if($request->gender=="NULL" && $request->ageclass=="NULL")
                                        {{ $totalHouseholdCount }}
                                        @else
                                        --
                                        @endif
                                        HOUSEHOLDS
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endhasanyrole


            @hasanyrole('User|Barangay Health Worker')
            <div class="w-max h-max grid grid-rows-2 grid-flow-col gap-16 -ml-32 -mt-20 px-5 py-5 justify-between font-bold">
                <div class="bg-dirty-white w-[472px] h-[421px] border-2 border-deep-green">
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
                    <div class="mt-[2rem]">
                        <a href="{{ route('services.request', ['docType' => 'Barangay Certificate']) }}" class="px-3 py-2 bg-deep-green text-dirty-white font-medium">REQUEST BARANGAY CERTIFICATE</a>
                    </div>
                </div>
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
                    <div class="mt-[5rem]">
                        <a href="{{ route('services.request', ['docType' => 'File Complain']) }}" class="px-3 py-2 bg-deep-green text-dirty-white font-medium">FILE COMPLAIN</a>
                    </div>
                </div>
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
                        <li>Copy of the previous permit (If Any) for Building, Fencing, Electrical Permit</li>
                        <li>Tax Declaration or Lot Title (If the applicant is not the registered owner of the lot) </li>
                        <li>Affidavit of consent, deed of sale, or contact whichever is applicable</li>
                    </ul>
                    <div class="mt-[5rem]">
                        <a href="{{ route('services.request', ['docType' => 'Barangay Clearance']) }}" class="px-3 py-2 bg-deep-green text-dirty-white font-medium">REQUEST BARANGAY CLEARANCE</a>
                    </div>
                </div>
                <div class="bg-dirty-white w-[620px] h-[300px] border-2 border-deep-green mt-10">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border  px-1 py-1 text-center">PERSONAL INFORMATION CHANGE</p>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">PURPOSE:</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        <li>Up-to-date Personal Record</li>
                    </ul>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">REQUIREMENTS</p>
                    <ul class="ml-10 mt-2 mr-2 list-disc font-roboto text-deep-green">
                        <li>Supporting Documents that will validate the requested change</li>
                    </ul>
                    <div class="mt-[8rem]">
                        <a href="{{ route('services.request', ['docType' => 'Account Information Change']) }}" class="px-3 py-2 bg-deep-green text-dirty-white font-medium">REQUEST PERSONAL INFORMATION CHANGE</a>
                    </div>
                </div>
            </div>

            @endhasanyrole
    </div>
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChartResident);
        google.charts.setOnLoadCallback(drawChartHousehold);
        google.charts.setOnLoadCallback(drawChartEmpty);
        google.charts.setOnLoadCallback(drawChartEmptyTwo);

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

        function drawChartEmpty() {

            var data = google.visualization.arrayToDataTable([
                ['EMPTY', 'EMPTY'],

            ]);

            var options = {
                width: '100%',
                height: '100%',
                pieSliceText: 'value',
                backgroundColor: 'none',
                chartArea: {
                    height: "95%",
                    width: "95%"
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('emptyPiechart'));

            chart.draw(data, options);
        }

        function drawChartEmptyTwo() {

            var data = google.visualization.arrayToDataTable([
                ['EMPTY', 'EMPTY'],

            ]);

            var options = {
                width: '100%',
                height: '100%',
                pieSliceText: 'value',
                backgroundColor: 'none',
                chartArea: {
                    height: "95%",
                    width: "95%"
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('emptyTwochart'));

            chart.draw(data, options);
        }
    </script>

</x-app-layout>