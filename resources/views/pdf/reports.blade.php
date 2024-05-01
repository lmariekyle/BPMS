<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        table{
            width:100%;
            margin-bottom:30px;
        }

        th{
            text-align: left;
            padding-left: 3px;
        }

        td{
            padding-left: 7px;
        }

        table, th, td {
            border: 1.5px solid;
            border-collapse: collapse
        }

        div.page_break + div.page_break{
            page-break-before: always;
        }
    </style>

    <title>Reports PDF</title>
</head>
<body>
    @if($request->sitio || $request->gender || $request->ageclass || $request->year || $request->quarter)
    <div>
        <h1>Status Report as of {{ $request->year }} 
            (
            @php
                $quarters = ["January - March","April - June","July - September","October - December"];

                $currentYear = date('Y');
                $currentDate = date('m-d');

                if($request->year == $currentYear){
                    if($currentDate >= '01-01' && $currentDate <= '03-31'){
                        array_splice($quarters, 0, 1, ['January - PRESENT']);
                    } else if($currentDate >= '04-01' && $currentDate <= '06-30'){
                        array_splice($quarters, 1, 1, ['April - PRESENT']);
                    } else if($currentDate >= '07-01' && $currentDate <= '09-30'){
                        array_splice($quarters, 2, 1, ['July - PRESENT']);
                    } else {
                        array_splice($quarters, 3, 1, ['October - PRESENT']);
                    }
                }
            @endphp

            @switch($request->quarter)
                @case(1)
                   {{ $quarters[0] }} 
                @break
                @case(2)
                    {{ $quarters[1] }}
                @break
                @case(3)
                    {{ $quarters[2] }}    
                @break
                @case(4)
                    {{ $quarters[3] }}
                @break
                @default
                    --
            @endswitch
            )
                </h1>
            
        <h3>
            Sitio:
                @if($request->sitio != "NULL")
                {{ $nameSitio }}
                @else
                ALL 
                @endif
        </h3>
        <h3>
            Gender Group:
                @if($request->gender != "NULL")
                    @if($request->gender == "M")
                        Male
                    @elseif($request->gender == "F")
                        Female
                    @else
                        ALL
                    @endif
                @else
                ALL
                @endif
        </h3>
        <h3>
            Age Group:
                @if($request->ageclass != "NULL")
                {{ $request->ageclass }}
                @else
                ALL
                @endif
        </h3>
        <h2>Total Residents:
            @if ($totalResidentCount>0)
            {{ $totalResidentCount }}
            @else
            --
            @endif 
        </h2>
        <h2>Total Households:
            @if ($totalHouseholdCount>0) 
            {{ $totalHouseholdCount }}
            @else
            --
            @endif
        </h2>
        <hr>
            <h2>LEGEND</h2>
            <h3>Gender:</h3>
                <p>M - Male</p>
                <p>F - Female</p>
            <h3>Age Classification:</h3>
                <p>N - Newborn (0-28 Days Old)</p>
                <p>I - Infant (29 Days - 11 Months Old)</p>
                <p>U - Under-five (1-4 Years Old)</p>
                <p>S - School-Aged Children (5-9 Years Old)</p>
                <p>A - Adolescents (10-19 Years Old)</p>
                <p>WRA - Not Pregnant and non-Post Partum (15-49 Years Old, Female)</p>
                <p>P - Pregnant</p>
                <p>AP - Adolescent-Pregnant</p>
                <p>PP - Post Partum</p>
                <p>AB - Adult (20-59 Years Old, Male)</p>
                <p>SC - Senior Citizen (60 Years Old and Above)</p>
            <br>
        <hr>
            <br><br><br>
        <h2>RESIDENTS</h2>
            <h3>Population</h3>
            @foreach ($residentCount->groupBy('sitioName') as $sitioName => $sitioInfo)
            @php($sumSitio = 0)
            <table>
                <tr>
                    <th colspan="4" style="margin-left: 2px; padding: 4px;">{{ $sitioName }}</th>
                </tr>
                <tr>
                    <th>AGE GROUP</th>
                    <th>MALE</th>
                    <th>FEMALE</th>
                    <th>TOTAL</th>
                </tr>
                @foreach ($sitioInfo as $SI)
                <tr>
                    <td style="padding-right: 5px; text-align: right;">{{ $SI->ageGroup }}</td>
                    <td>{{ $SI->maleResident == 0 ? '--' : $SI->maleResident }}</td>
                    <td>{{ $SI->femaleResident == 0 ? '--' : $SI->femaleResident }}</td>
                    <td>{{ $SI->totalResident }}</td>
                    @php($sumSitio += $SI->totalResident)
                </tr>
                @endforeach
                <tr>
                    <th colspan="4" style="padding-right: 35px; text-align: right;">TOTAL: {{ $sumSitio }}</th>
                </tr>
            </table>
            @endforeach

            <h3>Monthly Income</h3>
            <table>
                <tr>
                    <th></th>
                    @foreach ($MonthlyIncome as $MI)
                    <th>{{ $MI }}</th>
                    @endforeach
                </tr>
                @foreach ($dataIncome as $sitioName => $DI)
                <tr>
                    <td>{{ $sitioName }}</td>
                    @foreach ($MonthlyIncome as $MI)
                    <td>{{ isset($DI[$MI]) ? $DI[$MI] : 0 }}</td>
                    @endforeach
                </tr>
                @endforeach
            </table>

            @if($request->sitio == "NULL")
            <h3>Payment / Refund Transaction Information</h3>
            <table>
                <tr>
                    <th>Paid</th>
                    <th>Paid Amount</th>
                    <th>Refunded</th>
                    <th>Refunded Amount</th>
                </tr>
                <tr>
                    <td>{{ $prInfo[0]['pCtr'] }}</td>
                    <td>{{ $prInfo[0]['pAmount'] }}</td>
                    <td>{{ $prInfo[0]['rCtr'] }}</td>
                    <td>{{ $prInfo[0]['rAmount'] }}</td>
                </tr>
            </table>
            @endif

            <h3>Educational Attainment</h3>
            <table>
                <tr>
                    <th></th>
                    @foreach ($EducationAtt as $EA)
                    <th>{{ $EA }}</th>
                    @endforeach
                </tr>
                @foreach ($dataEducation as $sitioName => $DE)
                <tr>
                    <td>{{ $sitioName }}</td>
                    @foreach ($EducationAtt as $EA)
                    <td>{{ isset($DE[$EA]) ? $DE[$EA] : 0 }}</td>
                    @endforeach
                </tr>
                @endforeach
            </table>

            <h3>Pregnancy</h3>
            <table>
                <tr>
                    <th></th>
                    @foreach ($Pregnancy as $P)
                    <th>{{ $P }}</th>
                    @endforeach
                </tr>
                @foreach ($dataPreg as $sitioName => $DP)
                <tr>
                    <td>{{ $sitioName }}</td>
                    @foreach ($Pregnancy as $P)
                    <td>{{ isset($DP[$P]) ? $DP[$P] : 0 }}</td>
                    @endforeach
                </tr>
                @endforeach
            </table>
    </div>
    
    <hr>
    
    <div class="page_break">
        <h2>HOUSEHOLDS</h2>
            <h3>Households</h3>
            <table>
                <tr>
                    <th>#</th>
                    <th>Sitio</th>
                    <th># of Households</th>
                </tr>
                @foreach ($householdCount as $hCount)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hCount['sitio'] }}</td>
                    <td>{{ $hCount['houseCount'] }}</td>
                </tr>
                @endforeach
            </table>

            <h3>IP & NHTS Households</h3>
            <table>
                <tr>
                    <th>Sitio</th>
                    @foreach ($IP as $I)
                    <th>{{ $I }}</th>
                    @endforeach
                    @foreach ($NHTS as $N)
                    <th>{{ $N }}</th>
                    @endforeach
                </tr>
                @foreach ($dataIP as $sitioName => $DI)
                <tr>
                    <td>{{ $sitioName }}</td>
                    @foreach ($IP as $I)
                    <td>{{ isset($DI[$I]) ? $DI[$I] : 0 }}</td>
                    @endforeach
                    @foreach ($NHTS as $N)
                    <td>{{ isset($dataNHTS[$sitioName][$N]) ? $dataNHTS[$sitioName][$N] : 0 }}</td>
                    @endforeach
                </tr>
                @endforeach
            </table>

            <h3>Water Access</h3>
            <table>
                <tr>
                    <th></th>
                    @foreach ($WaterAccess as $WA)
                    <th>{{ $WA }}</th>
                    @endforeach
                </tr>
                @foreach ($dataWater as $sitioName => $DW)
                <tr>
                    <td>{{ $sitioName }}</td>
                    @foreach ($WaterAccess as $WA)
                    <td>{{ isset($DW[$WA]) ? $DW[$WA] : 0 }}</td>
                    @endforeach
                </tr>
                @endforeach
            </table>

            <h3>Toilet Facilities</h3>
            <table>
                <tr>
                    <th></th>
                    @foreach ($ToiletFacilities as $TF)
                    <th>{{ $TF }}</th>
                    @endforeach
                </tr>
                @foreach ($dataToilet as $sitioName => $DT)
                <tr>
                    <td>{{ $sitioName }}</td>
                    @foreach ($ToiletFacilities as $TF)
                    <td>{{ isset($DT[$TF]) ? $DT[$TF] : 0 }}</td>
                    @endforeach
                </tr>
                @endforeach
            </table>
    </div>
    @else
        <h2>No options were selected and applied on the previous page. Please go back and try again.</h2>
    @endif
</body>
</html>