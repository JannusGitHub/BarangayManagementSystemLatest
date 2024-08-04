<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indigency Certificate</title>
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
    <h2 style="text-align: center;"><strong>LIST OF REGISTRATION CERTIFICATES</strong><br>
    <table style="width:100%">
        <tr>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">OR Number</th>
            <th style="text-transform: uppercase; white-space: normal; width: 120px; border: 1px solid black;">Requested By</th>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">Purpose</th>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">Amount</th>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">Issued On</th>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">Remarks</th>
        </tr>

        @foreach ($data as $row)
            <tr>
                <td style="white-space: normal; border: 1px solid black;">{{ $row->or_number }}</td>
                <td style="white-space: normal; border: 1px solid black; text-transform:capitalize;">{{ $row->resident_info->user_info->firstname ." ". $row->resident_info->user_info->lastname }}</td>
                <td style="white-space: normal; border: 1px solid black;">{{ $row->purpose }}</td>
                <td style="white-space: normal; border: 1px solid black;">{{ $row->total_amount_paid }}</td>
                @php
                    $date=date_create($row->issued_on);
                    $issued_on = date_format($date,"Y-m-d");
                @endphp
                <td style="white-space: normal; border: 1px solid black;">{{ $issued_on }}</td>
                <td style="white-space: normal; border: 1px solid black;">{{ $row->remarks }}</td>
            </tr>
        @endforeach
    </table>




</body>
</html>
