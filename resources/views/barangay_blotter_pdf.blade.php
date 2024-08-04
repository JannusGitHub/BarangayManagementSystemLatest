<!DOCTYPE html>
<html>
<head>
    <title>Barangay Certificate</title>
</head>
<style>
    p{
        font-size: 18px;
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
    <h2 style="text-align: center;"><u><strong>BLOTTER</strong></u></h2><br>

    <p><span>Barangay Case No: <strong>{{ $data[0]->case_number }}</strong></span></p>
    
    <p><span style="text-transform: capitalize;"><strong>{{ $data[0]->resident_info->user_info->firstname .' '. $data[0]->resident_info->user_info->lastname }}</strong></span></p>
    <p><span>Complainants,</span></p>
    <br>
    <p><span style="text-transform: capitalize;"><strong>{{ $data[0]->respondent}}</strong></span></p>
    <p><span>Defendant,</span></p>

    <p style="font-size: 20px; margin-left: auto; margin-right:auto; text-align:center"><strong>Complaint</strong></p>
    <p style="margin-left: 50px; margin-right:50px; text-align:center">We hereby complain against above named defendant for violating our rights and interests in the following manner:</p>
    <p style="margin-left: 50px; margin-right:50px; text-align:center;"><strong>{{ $data[0]->complainant_statement}}</strong></p>

    <br>
    <p style="margin-right:50px;">THEREFORE, We pray that the following reliefs be granted to us in accordance with the law and/or equity.</p>
    <p style="margin-right:50px;">1. That the defendant <span><strong>{{ $data[0]->respondent}}</strong></span> be made to appear before the Lupong Tagapamayapa of Brgy. IV</p>
    <p style="margin-right:50px;">2. That after the notice and hearing, respondent be directed to avoid contact with the complainants.</p>

    {{-- <p>LAST NAME <span><strong style="margin-left:100px;">:</strong></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->resident_info->user_info->lastname }}</span><br>
    <span>GIVEN NAME<span><strong style="margin-left:94px;">:</strong></span></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->resident_info->user_info->firstname }}</span><br>
    <span>MIDDLE NAME<span><strong style="margin-left:81px;">:</strong></span></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->resident_info->user_info->middle_initial }}</span><br>
    <span>ADDRESS<span><strong style="margin-left:121px;">:</strong></span></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->resident_info->purok .' '. $data[0]->resident_info->street .' '. $data[0]->resident_info->block }}</span><br>
    <span>PLACE OF BIRTH<span><strong style="margin-left:67px;">:</strong></span></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->resident_info->birth_place }}</span><br>
    <span>DATE OF BIRTH<span><strong style="margin-left:75px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->resident_info->birthdate }}</span><br>
    <span>AGE<span><strong style="margin-left:161px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->resident_info->age }}</span><br>
    <span>GENDER<span><strong style="margin-left:129px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->resident_info->gender }}</span><br>
    <span>CIVIL STATUS<span><strong style="margin-left:87px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->resident_info->civil_status }}</span><br>
    <span>LENGTH OF STAY<span><strong style="margin-left:60px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->resident_info->length_of_stay }}</span><br>
    <span>REMARKS<span><strong style="margin-left:117px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->remarks }}</span><br>
    <span>PURPOSE<span><strong style="margin-left:124px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->purpose }}</span><br>
    <span>PLACE UNDER OR No.<span><strong style="margin-left: 30px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->or_number }}</span><br>
    <span>AMOUNT COLLECTION<span><strong style="margin-left: 19px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->amount_collection }}</span><br>
    <span>ISSUED ON<span><strong style="margin-left: 110px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->issued_on }}</span><br> --}}

    {{-- <p style="margin-left: 50%;"><strong>APPROVED BY:</strong></p><br>
    <hr style="width:40%;text-align:right;margin-left:60%;">

    <p style="margin-left: 68%; margin-top:20px;"><strong>JOSEPH L. EMERGO</strong>
        <span style="margin-left: 10%;"><strong>PUNONG BARANGAY</strong> </span><br>
    </p>
    <p style="font-size:15px;"><span><strong text-align: left;">NOTE:</strong></span>
        <span><i>Not valid without official dry seal. This Barangay Clearane is valid until (6) months from the date of issue. </i></span></p>

    <hr>
    <p style="text-align:center;"><strong>JOSEPH L. EMERGO</strong></p> --}}

</body>
</html>
