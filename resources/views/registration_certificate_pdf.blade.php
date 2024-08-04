<!DOCTYPE html>
<html>
<head>
    <title>Registration Certificate</title>
</head>
<body>
    <h1 style="text-align: center; font-size: 20px;" ><strong>{{ $repub_title }}</strong></h1>
    <p style="text-align: center; font-size: 15px;">{{ $province_title }}<br>
        <span>{{ $city_title }}</span><br>
        <span style="font-size: 18px; color:dodgerblue;"><strong>{{ $brgy_title }}</strong></span><br>
        <span style="font-size: 12px;"><strong>{{ $telephone_title }}</strong></span>
    </p>

    <hr style="width:100%;text-align:left;margin-left:0">
    <h2 style="text-align: center;"><strong>OFFICE OF THE PUNONG BARANGAY</strong><br>
        <span><u><strong style="font-size: 23px;">CERTIFICATION OF REGISTRATION</strong></u></span>
    </h2><br>

    <p>NAME OF OWNER<span><strong style="margin-left:30px;">:</strong></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->resident_info->user_info->firstname ." ". $data[0]->resident_info->user_info->lastname }}</span><br></p>
    <p>ADDRESS<span><strong style="margin-left:91px;">:</strong></span><span style="margin-left:150px; text-transform: capitalize;"><u>{{ $data[0]->resident_info->street .' '. $data[0]->resident_info->block }}</u></span><br></p>

    <p>NAME OF DRIVER<span><strong style="margin-left:30px;">:</strong></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->name_of_driver }}</span><br></p>
    <p>LICENSE NO.<span><strong style="margin-left:68px;">:</strong></span><span style="margin-left:150px;">{{ $data[0]->license_number }}</span><br></p>
    <p>REGISTERED PLATE NO.<span><strong style="margin-left:18px;">:</strong></span><span style="margin-left:150px;">{{ $data[0]->registered_plate_number }}</span><br></p>
    <p>O.R OF REGISTRATION<span><strong style="margin-left:30px;">:</strong></span><span style="margin-left:150px;">{{ $data[0]->or_number }}</span><br></p><br>

    <p style="text-align: center;"><i><strong style="text-align: center; font-size: 12px;">This Certification is issued upon the request of (NAME OF APPLICANT)</strong></i></p><br><br>





    <p style="margin-left: 50%;">Approved by:</p><br>
    @php
        $photo='';
        if(isset($officialsDetails[0]->signature)){
            $photo = public_path('storage/official_attachments/e_signature/'.$officialsDetails[0]->signature);
        }
    @endphp
    <img src="{{ $photo }}" style="max-width: 120px !important; max-height: 120px !important; margin-left:500px">
    <hr style="width:35%;text-align:right;margin-left:62%;">
    {{-- <hr style="width:40%;text-align:left;margin-left:0; margin-top:-8px;"> --}}

    <p style="margin-left: 68%; margin-top:30px;">
        <strong>JOSEPH L. EMERGO</strong>
        <strong style="font-size: 13px; margin-left: 15px;">PUNONG BARANGAY</strong>
    </p><br><br>

    <p>O.R NO.<span style="margin-left:35px;">:</span><span style="margin-left:150px;">{{ $data[0]->or_number }}</span></p>
    <p>ISSUED AT<span style="margin-left:10px;">:</span><span style="margin-left:150px;">{{ $data[0]->issued_at }}</span></p>
    <p>ISSUED ON<span style="margin-left:8px;">:</span><span style="margin-left:150px;">{{ $data[0]->issued_on }}</span></p>
    {{-- <p>KIDNENY COLLECTED<span style="margin-left:8px;">:</span><span style="margin-left:150px;">{{ $data[0]->or_number }}</span></p> --}}


</body>
</html>
