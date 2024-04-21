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
                <p>WRA - Not Pregnant and non-Post Partum (15-49 Years Old)</p>
                <p>P - Pregnant</p>
                <p>AP - Adolescent-Pregnant</p>
                <p>PP - Post Partum</p>
                <p>AB - Adult (20-59 Years Old, Male)</p>
                <p>SC - Senior Citizen (60 Years Old and Above)</p>
            <br>
        <hr>
            <br><br><br>
        @if($totalResidentCount !== 0)
        <h2>RESIDENTS</h2>
        <table>
            <tr>
                <th>#</th>
                <th>Sitio Name</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th># of Residents</th>
            </tr>
            @php($count = 0)
            @foreach ($residentCount as $resCount)
                @if($resCount->genderGroup != '--' && $resCount->ageGroup != '--')
                @php($count++)
                <tr>
                    <td>{{ $count }}</td>
                    <td>{{ $resCount->sitioName }}</td>
                    <td>{{ $resCount->genderGroup }}</td>
                    <td>{{ $resCount->ageGroup }}</td>
                    <td>{{ $resCount->residentCount }}</td>
                </tr>
                @endif
            @endforeach
        </table>
        @else
        <div>No Resident Data Found</div>
        @endif
    </div>
    
    <hr>
    
    <div class="page_break">
        @if($request->gender=="NULL" && $request->ageclass=="NULL" && $totalHouseholdCount > 0)
        <h2>HOUSEHOLDS</h2>
        <table>
            <tr>
                <th>#</th>
                <th>Sitio Name</th>
                <th># of Households</th>
            </tr>
            @foreach ($householdCount as $hCount)
            @if(isset($hCount['sitio']) || isset($hCount['houseCount']))
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $hCount['sitio'] }}</td>
                <td>{{ $hCount['houseCount'] }}</td>
            </tr>
            @endif
            @endforeach
        </table>
        @else
        <div>No Household Data Found</div>
        @endif
    </div>
    
    @else
        <h2>No options were selected and applied on the previous page. Please go back and try again.</h2>
    @endif
</body>
</html>