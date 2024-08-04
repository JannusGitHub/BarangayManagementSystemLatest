<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resident Certificate</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>
    <h1 style="text-align: center; font-size: 20px;" ><strong>{{ $repub_title }}</strong></h1>
    <p style="text-align: center; font-size: 15px;">{{ $province_title }}<br>
        <span>{{ $city_title }}</span><br>
        <span style="font-size: 18px; color:dodgerblue;"><strong>{{ $brgy_title }}</strong></span><br>
        <span style="font-size: 12px;"><strong>{{ $telephone_title }}</strong></span>
    </p>

    <hr style="width:100%;text-align:left;margin-left:0">
    <h2 style="text-align: center;"><strong>LIST OF RESIDENT</strong><br>
    <table style="width:100%">
        <tr>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">Barangay ID Number</th>
            <th style="text-transform: uppercase; white-space: normal; width: 120px; border: 1px solid black;">Resident</th>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">Age</th>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">Gender</th>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">Civil Status</th>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">Contact Number</th>
        </tr>

        @foreach ($data as $row)
            <tr>
                <td style="white-space: normal; border: 1px solid black;">{{ $row->barangay_id_number }}</td>
                <td style="white-space: normal; border: 1px solid black; text-transform:capitalize;">{{ $row->user_info->firstname ." ". $row->user_info->lastname }}</td>
                <td style="white-space: normal; border: 1px solid black;">{{ $row->age }}</td>
                
                @if ($row->gender == 1)
                    <td style="white-space: normal; border: 1px solid black;">Male</td>
                @elseif ($row->gender == 2)
                    <td style="white-space: normal; border: 1px solid black;">Female</td>
                @else
                    <td style="white-space: normal; border: 1px solid black;">Other</td>
                @endif

                @if ($row->civil_status == 1)
                    <td style="white-space: normal; border: 1px solid black;">Single</td>
                @elseif ($row->civil_status == 2)
                    <td style="white-space: normal; border: 1px solid black;">Married</td>
                @elseif ($row->civil_status == 3)
                    <td style="white-space: normal; border: 1px solid black;">Widow/er</td>
                @elseif ($row->civil_status == 4)
                    <td style="white-space: normal; border: 1px solid black;">Annulled</td>
                @elseif ($row->civil_status == 5)
                    <td style="white-space: normal; border: 1px solid black;">Legally Separated</td>
                @else
                    <td style="white-space: normal; border: 1px solid black;">Others</td>
                @endif

                <td style="white-space: normal; border: 1px solid black; text-transform:capitalize;">{{ $row->user_info->contact_number}}</td>
            </tr>
        @endforeach
    </table>




</body>
</html>
