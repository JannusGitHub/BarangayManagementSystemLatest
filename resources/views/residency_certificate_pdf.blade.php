<!DOCTYPE html>
<html>
<head>
    <title>Certificate of Residency</title>
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
    <p>TO WHOM IT MAY CONCERN:</p>

    <p style="margin-left: 50px;">This is to certify that <span style="text-transform: capitalize"><u>{{ $name }}</u></span> legal age, <span><u>{{ $data[0]->resident_info->age }}</u></span> Filipino Citizen
        and residing at <span><u>{{ $data[0]->resident_info->street .' '. $data[0]->resident_info->block }}</u></span> Barangay IV, Calamba City since <span><u>{{ $data[0]->resident_info->length_of_stay }}</u></span> up to present.
    </p>

    <p>This certification is issued accordance to the implementation of the provision of the NEW LOCAL GOVERNMENT CODE of 1991 and for whatever legal purpose it may serve him/her.</p>

    <p>Signed this __ day of _______, _____ at Barangay IV, Calamba City, Laguna, Philippines.</p><br><br><br><br>


    <p style="margin-left: 50%;">Approved by:</p><br>
    @php
        $photo='';
        if(isset($officialsDetails[0]->signature)){
            $photo = public_path('storage/official_attachments/e_signature/'.$officialsDetails[0]->signature);
        }
    @endphp
    <img src="{{ $photo }}" style="max-width: 120px !important; max-height: 120px !important; margin-left:500px">
    <hr style="width:40%;text-align:right;margin-left:60%;">
    <hr style="width:40%;text-align:left;margin-left:0; margin-top:-8px;">

    <p style="margin-left:25px;">Name and Signature of Applicant</p>
    <p style="margin-left: 68%; margin-top:-50px;"><strong>JOSEPH L. EMERGO</strong></p>
    <p style="margin-left: 72%;">Punong Barangay</p>

</body>
</html>
