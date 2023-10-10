<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-1 mt-[8rem] flex flex-col justify-center bg-dirty-white">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            @role('Admin')
            <div class="absolute px-5 py-5 justify-center w-full h-[250px] bg-olive-green -mt-[300px] -ml-[556px]">
                <div class="mb-12 mt-[90px] ml-[590px] w-64 h-64 rounded-full border-2 bg-dirty-white border-green flex justify-center items-center">
                    <img src="{{ asset('images/PoblacionDalLogo.png') }}" alt="">
                </div>
            </div>

            <div class="bg-green w-[450px] h-[80px] text-center py-2 my-9 mt-[100px] -ml-8">
                <!-- <div class="admin-container self-center">
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Create Account</a>
                    </div> -->
                <a href="{{ route('accounts') }}" class="font-robotocondensed text-[40px] text-dirty-white text-center">MANAGE ACCOUNTS</a>
            </div>
            <div class="bg-green w-[450px] h-[80px] text-center py-2 my-9 -ml-8">
                <!-- <div class="admin-container self-center">
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Create Account</a>
                    </div> -->
                <a href="" class="font-robotocondensed text-[40px] text-dirty-white text-center">MANAGE REQUESTS</a>
            </div>

            <!-- Authentication -->
            <div class="bg-green h-[40px] w-[140px] text-center ml-32">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('LOGOUT') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @endrole

            @hasanyrole('Barangay Captain|Barangay Secretary')
            <div class="p-3 -mt-20 -ml-24 h-max w-[1342px] bg-dirty-white border-2 border-deep-green rounded-xl shadow-3xl ">

                <div class="flex px-4 py-3 items-center justify-between h-16 w-[1250px] ml-3 mt-3" style="justify-content:center;">
                    <form action="" method="GET">

                        <div class="float-left bg-transparent h-16 w-40">
                            <x-label for="sitio" :value="__('Sitio')" />
                            <select id="sitio" class="rounded-lg border-2 mt-1 w-full bg-dirty-white" name="sitio" :value="old('sitio')" required autofocus>
                                <option value="NULL">None</option>
                                @foreach ($sitioList as $sitio)
                                <option value="{{$sitio->id}}" class="bg-dirty-white">{{ $sitio->sitioName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="float-left bg-transparent h-16 w-40" style="margin-left: 50px;">
                            <x-label for="gender" :value="__('Gender')" />
                            <select id="gender" class="rounded-lg border-2 mt-1 w-full bg-dirty-white" name="gender" :value="old('gender')" required autofocus>
                                <option value="NULL">None</option>
                                @foreach ($gender as $gender)
                                <option value="{{$gender->genderGroup}}" class="bg-dirty-white">{{ $gender->genderGroup }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="float-left bg-transparent h-16 w-max" style="margin-left: 50px;">
                            <x-label for="ageclass" :value="__('Age Classification')" />
                            <select id="ageclass" class="rounded-lg border-2 mt-1 w-40 bg-dirty-white" name="ageclass" :value="old('ageclass')" required autofocus>
                                <option value="NULL">None</option>
                                @foreach ($ageClassification as $age)
                                <option value="{{$age->ageGroup}}" class="bg-dirty-white">{{ $age->ageGroup }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="float-left mt-12" type="submit"><i class="fa-solid fa-filter text-deep-green text-[28px] ml-96"></i></button>
                    </form>
                    <form class="flex flex-row" action="{{ route('exportpdf') }}" method="GET">
                        <input name="sitio" type="hidden" value="{{$request->sitio}}"></input>
                        <input name="gender" type="hidden" value="{{$request->gender}}"></input>
                        <input name="ageclass" type="hidden" value="{{$request->ageclass}}"></input>
                        <button type="submit" class="mt-12 ml-10">
                            <i class="fa-solid fa-print text-deep-green text-[28px]"></i>
                        </button>
                    </form>
                </div>

                <p class="font-robotocondensed mt-16 text-4xl p-3 text-deep-green text-center">BARANGAY POBLACION, DALAGUETE {{ date("Y") }} CENSUS DATA</p>
                @role('Barangay Secretary')
                <p class="font-robotocondensed mt-16 text-4xl p-3 text-deep-green text-center">Barangay Secretary</p>
                @endrole
                <div class="mt-0.5 ml-60 grid grid-cols-2 justify-center p-3">

                    <div class="bg-dirty-white mt-16 h-72 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                        <div class="-mt-[20px] mx-12 h-12 w-fit bg-olive-green border-2 border-green rounded-xl px-3 py-3">
                            <h1 class="font-robotocondensed text-base text-dirty-white text-center">
                                @if(!($request->sitio))
                                TOTAL RESIDENTS PER SITIO
                                @elseif ($request->sitio=="NULL")
                                TOTAL RESIDENTS PER SITIO
                                @else
                                RESIDENTS IN {{ $upperCaseSitio }}
                                @endif
                            </h1>
                        </div>
                        @if (($request->sitio || $request->gender || $request->ageclass) && $totalResidentCount>0)
                        <div class="w-[300px] l-[300px] mt-2 mx-auto" id="residentPiechart" style=""></div>
                        <a class="info w-[13px] ml-72"><i class="fa fa-question-circle-o text-[12px]"></i></a>
                        <div class="hide bg-green py-2 px-2 rounded-xl">
                            <p class="text-xs font-robotocondensed w-80 text-justify">
                                Hover over the colors in the legend to highlight the different Sitios of the Barangay. If the Pie Chart is not highlighting
                                the Sitio, that means there are currently 0 Residents there.
                            </p>
                        </div>
                        @else
                        <div class="w-[300px] l-[300px] mt-2 mx-auto" id="emptyPiechart" style=""></div>
                        @endif
                    </div>

                    <div class="bg-dirty-white mt-16 h-72 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                        <div class="-mt-[20px] mx-12 h-12 w-max bg-olive-green border-2 border-green rounded-xl px-3 py-3">
                            <h1 class="font-robotocondensed text-base text-dirty-white text-center">
                                @if(!($request->sitio))
                                TOTAL HOUSEHOLDS PER SITIO
                                @elseif ($request->sitio=="NULL")
                                TOTAL HOUSEHOLDS PER SITIO
                                @else
                                HOUSEHOLDS IN {{ $upperCaseSitio }}
                                @endif
                            </h1>
                        </div>
                        <div class="">
                            @if(isset($request->gender) || isset($request->ageclass) && $totalHouseholdCount>0)
                            @if ($request->gender=="NULL" && $request->ageclass=="NULL" && $totalHouseholdCount>0)
                            <div class="w-[300px] l-[300px] mt-2 mx-auto" id="householdPiechart" style=""></div>
                            <a class="info w-[13px] ml-72"><i class="fa fa-question-circle-o text-[12px]"></i></a>
                            <div class="hide bg-green py-2 px-2 rounded-xl">
                                <p class="text-xs font-robotocondensed w-80 text-justify">
                                    Hover over the colors in the legend to highlight the different Sitios of the Barangay. If the Pie Chart is not highlighting
                                    the Sitio, that means there are currently 0 Households there.
                                </p>
                            </div>
                            @else
                            <div class="w-[250px] h-[80px] mt-16 px-2 flex items-center justify-center">
                                <p class="font-roboto m-auto text-center font-black text-deep-green">
                                    Since Age/Gender filters are applied or there are no Households present in the Sitio, Household Information is unavailable.
                                </p>
                            </div>
                            @endif
                            @else
                            <div class="w-[300px] l-[300px] mt-2 mx-auto" id="emptyTwochart" style=""></div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-dirty-white mt-16 h-64 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                        <h1 class="font-robotocondensed text-base text-deep-green text-center">TOTAL RESIDENTS</h1>
                        <div class="w-[250px] h-[75px] mt-8 mx-auto flex items-center justify-center">
                            <p class="font-roboto m-auto text-center font-black text-8xl text-deep-green">
                                @if ($totalResidentCount>0)
                                {{ $totalResidentCount }}
                                @else
                                --
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="bg-dirty-white mt-16 h-64 w-80 border-2 border-deep-green shadow-inner rounded-xl">
                        <h1 class="font-robotocondensed text-base text-deep-green text-center">TOTAL HOUSEHOLDS</h1>
                        <div class="w-[250px] h-[75px] mt-8 mx-auto flex items-center justify-center">
                            <p class="font-roboto m-auto text-center font-black text-8xl text-deep-green">
                                @if ($totalHouseholdCount>0)
                                {{ $totalHouseholdCount }}
                                @else
                                --
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endhasanyrole


            @hasanyrole('User|Barangay Health Worker')
            <div class="w-max h-max grid grid-rows-2 grid-flow-col gap-16 -ml-32 -mt-20 px-5 py-5 justify-between font-bold">
                <div class="bg-dirty-white w-[472px] h-[421px] border">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border border-deep-green px-1 py-1 text-center">BARANGAY CERTIFICATE</p>
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
                    <div class="mt-16">
                        <a href="{{ route('services.request', ['docType' => 'Barangay Certificate']) }}" class="button">Request Barangay Certificate</a>
                    </div>
                </div>
                <div class="bg-dirty-white w-[472px] h-[300px] border">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border border-deep-green px-1 py-1 text-center">FILING OF COMPLAINTS</p>
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
                    <div class="mt-16">
                        <a href="{{ route('services.request', ['docType' => 'File Complain']) }}" class="button">File Complain</a>
                    </div>
                </div>
                <div class="bg-dirty-white w-max h-[421px] border">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border border-deep-green px-1 py-1 text-center">BARANGAY CLEARANCE</p>
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
                    <div class="mt-16">
                        <a href="{{ route('services.request', ['docType' => 'Barangay Clearance']) }}" class="button">Request Barangay Clearance</a>
                    </div>
                </div>
                <div class="bg-dirty-white w-[620px] h-[300px] border">
                    <p class="bg-green font-robotocondensed text-[24px] text-dirty-white border border-deep-green px-1 py-1 text-center">PERSONAL INFORMATION CHANGE</p>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">PURPOSE:</p>
                    <ul class="ml-10 mt-2 list-disc font-roboto text-deep-green">
                        <li>Up-to-date Personal Record</li>
                    </ul>
                    <p class="bg-olive-green mt-3 font-robotocondensed text-[18px] text-dirty-white border border-deep-green text-start px-1">REQUIREMENTS</p>
                    <ul class="ml-10 mt-2 mr-2 list-disc font-roboto text-deep-green">
                        <li>Supporting Documents that will validate the requested change</li>
                    </ul>
                    <div class="mt-28">
                        <x-button class="button">
                            Request Personal Information Change
                        </x-button>
                    </div>
                </div>
            </div>

            <div class="bg-green h-[40px] w-[140px] text-center ml-32">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('LOGOUT') }}
                    </x-responsive-nav-link>
                </form>
            </div>

            @endhasanyrole

        </div>
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