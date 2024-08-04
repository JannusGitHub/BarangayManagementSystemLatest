<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Report</title>
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
    <h2 style="text-align: center;"><strong>LIST OF USER</strong><br>
    <table style="width:100%">
        <tr>
            <th style="text-transform: uppercase; white-space: normal; width: 120px; border: 1px solid black;">Firstname</th>
            <th style="text-transform: uppercase; white-space: normal; width: 120px; border: 1px solid black;">Lastname</th>
            <th style="text-transform: uppercase; white-space: normal; width: 120px; border: 1px solid black;">Middle Initial</th>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">Email</th>
            <th style="text-transform: uppercase; white-space: normal; width: 100px; border: 1px solid black;">User Role</th>
        </tr>

        @foreach ($data as $row)
            <tr>
                <td style="white-space: normal; border: 1px solid black; text-transform:capitalize;">{{ $row->firstname }}</td>
                <td style="white-space: normal; border: 1px solid black; text-transform:capitalize;">{{ $row->lastname }}</td>
                <td style="white-space: normal; border: 1px solid black; text-transform:capitalize;">{{ $row->middle_initial }}</td>
                <td style="white-space: normal; border: 1px solid black;">{{ $row->email }}</td>
                <td style="white-space: normal; border: 1px solid black; text-transform:capitalize;">{{ $row->user_levels->name }}</td>
            </tr>
        @endforeach
    </table>




</body>
</html>
