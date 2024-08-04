<!DOCTYPE html>
<html>
<head>
    <title>Barangay Certificate</title>
</head>
<body>
    <h1 style="text-align: center; font-size: 20px;" ><strong>{{ $repub_title }}</strong></h1>
    <p style="text-align: center; font-size: 15px;">{{ $province_title }}<br>
        <span>{{ $city_title }}</span><br>
        <span style="font-size: 18px; color:dodgerblue;"><strong>{{ $brgy_title }}</strong></span><br>
        <span style="font-size: 12px;"><strong>{{ $telephone_title }}</strong></span>
    </p>

    <hr style="width:100%;text-align:left;margin-left:0">
    <h2 style="text-align: center;"><u><strong>CERTIFICATION</strong></u></h2><br>
    @php
        $link='';
        if(isset($data[0]->resident_info->photo)){
            $link = public_path('storage/resident_photo/'.$data[0]->resident_info->photo) ;
        }
    @endphp
    <img src="{{ $link }}" style="max-width: 120px !important; max-height: 120px !important; margin-left:550px">
    <p><strong>TO WHOM IT MAY CONCERN:</strong></p>

    <p style="margin-left: 50px;">This is to certify that the person whose named, picture, right thumb print and signature appear here on
    </p>
    <span style="">has requested a <strong>BARANGAY CLEARANCE</strong></span> from this office with the following information.

    <p>LAST NAME <span><strong style="margin-left:100px;">:</strong></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->resident_info->user_info->lastname }}</span><br>
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
    <span>ISSUED ON<span><strong style="margin-left: 110px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->issued_on }}</span><br>    


    </p><br>

<!--  -->
    <p style="margin-left: 50%;"><strong>APPROVED BY:</strong></p><br>
    @php
        $photo='';
        if(isset($data[0]->resident_info->photo)){
            $photo = public_path('storage/official_attachments/e_signature/'.$officialsDetails[0]->signature) ;
        }
    @endphp
    <img src="{{ $photo }}" style="max-width: 100px !important; max-height: 120px !important; margin-left:550px">
    <hr style="width:40%;text-align:right;margin-left:60%;">

    <p style="margin-left: 68%; margin-top:20px;"><strong>JOSEPH L. EMERGO</strong>
        <span style="margin-left: 10%;"><strong>PUNONG BARANGAY</strong> </span><br>
    </p>
    <p style="font-size:15px;"><span><strong text-align: left;">NOTE:</strong></span>
        <span><i>Not valid without official dry seal. This Barangay Clearane is valid until (6) months from the date of issue. </i></span></p>

    <hr>
    <p style="text-align:center;"><strong>JOSEPH L. EMERGO</strong></p>

</body>
</html>
