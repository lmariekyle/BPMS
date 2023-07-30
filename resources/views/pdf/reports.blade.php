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
    @if($request->sitio || $request->gender || $request->ageclass)
    <div>
        <h1>Status Report (as of {{ date("Y") }})</h1>
        <h3>
            Sitio:
                @if($request->sitio != "NULL")
                {{ $request->sitio }}
                @else
                --
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
                        --
                    @endif
                @else
                --
                @endif
        </h3>
        <h3>
            Age Group:
                @if($request->ageclass != "NULL")
                {{ $request->ageclass }}
                @else
                --
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
                @if($request->gender=="NULL" && $request->ageclass=="NULL")
                {{ $totalHouseholdCount }}
                @else
                Not Applicable
                @endif
            @elseif ($totalHouseholdCount==0)
            --
            @else
            --
            @endif
        </h2>
        <hr>
        @if($totalResidentCount !== 0)
        <h2>RESIDENTS</h2>
        <table>
            <tr>
                <th>Sitio Name</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th># of Residents</th>
            </tr>
            @foreach ($residentCount as $resCount)
            <tr>
                <td>{{ $resCount->sitioName }}</td>
                <td>{{ $resCount->genderGroup }}</td>
                <td>{{ $resCount->ageGroup }}</td>
                <td>{{ $resCount->residentCount }}</td>
            </tr>
            @endforeach
        </table>
        @else
        <div>No Data Available</div>
        @endif
    </div>
    
    <hr>
    
    <div class="page_break">
        @if($request->gender=="NULL" && $request->ageclass=="NULL" && $totalHouseholdCount > 0)
        <h2>HOUSEHOLDS</h2>
        <table>
            <tr>
                <th>Sitio Name</th>
                <th># of Households</th>
            </tr>
            @foreach ($householdCount as $hCount)
            @if(isset($hCount['sitio']) || isset($hCount['houseCount']))
            <tr>
                <td>{{ $hCount['sitio'] }}</td>
                <td>{{ $hCount['houseCount'] }}</td>
            </tr>
            @endif
            @endforeach
        </table>
        @endif
    </div>
    
    @else
        <h2>No options were selected and applied on the previous page. Please go back and try again.</h2>
        <h3>LOSER</h3>
    @endif
</body>
</html>
