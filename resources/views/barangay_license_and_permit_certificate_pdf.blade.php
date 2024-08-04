<!DOCTYPE html>
<html>
<head>
    <title>Barangay License and Permit Certificate</title>
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
        <span><u><strong style="font-size: 23px;">BARANGAY CLEARANCE FOR LICENSE AND PERMIT</strong></u></span>
    </h2><br>

    <p>BUSINESS NAME<span><strong style="margin-left:30px;">:</strong></span><span style="margin-left:150px;">{{ $data[0]->business_name }}</span><br></p>
    <p>LOCATION<span><strong style="margin-left:75px;">:</strong></span><span style="margin-left:150px;">{{ $data[0]->location }}</span><br></p>    

    <p>NATURE OF BUSINESS<span><strong style="margin-left:30px;">:</strong></span><span style="margin-left:150px;">{{ $data[0]->nature_of_business }}</span><br></p>
    <p>NAME OF OWNER<span><strong style="margin-left:65px;">:</strong></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->resident_info->user_info->firstname ." ". $data[0]->resident_info->user_info->lastname }}</span><br></p>
    <p>COMMUNITY TAX CERT.<span><strong style="margin-left:15px;">:</strong></span><span style="margin-left:150px;">{{ $data[0]->community_tax_cert }}</span><br></p>
    <p>GROSS SALES/INCOME<span><strong style="margin-left:30px;">:</strong></span><span style="margin-left:150px;">{{ $data[0]->gross_sales_income }}</span><br></p><br>

    <hr style="width: 35%; text-align:right; margin-left:62%;">
    <p style="margin-left: 65%;"><strong>APPLICANT SIGNATURE</strong></p><br>

    <p>O.R NO.<span style="margin-left:35px;">:</span><span style="margin-left:150px;">{{ $data[0]->or_number }}</span></p>
    <p>ISSUED AT<span style="margin-left:10px;">:</span><span style="margin-left:150px;">{{ $data[0]->issued_at }}</span></p>
    <p>ISSUED ON<span style="margin-left:8px;">:</span><span style="margin-left:150px;">{{ $data[0]->issued_on }}</span></p>
    <p>AMOUNT COLLECTED<span style="margin-left:8px;">:</span><span style="margin-left:150px;">{{ $data[0]->amount_collected }}</span></p>

    <p style="margin-left: 50%;"><strong>APPROVED BY:</strong></p><br>
    @php
        $photo='';
        if(isset($officialsDetails[0]->signature)){
            $photo = public_path('storage/official_attachments/e_signature/'.$officialsDetails[0]->signature);
        }
    @endphp
    <img src="{{ $photo }}" style="max-width: 120px !important; max-height: 120px !important; margin-left:500px">
    <hr style="width:35%;text-align:right;margin-left:62%;">
    {{-- <hr style="width:40%;text-align:left;margin-left:0; margin-top:-8px;"> --}}

    <p style="margin-left: 68%; margin-top:20px;">
        <strong>JOSEPH L. EMERGO</strong>
        <strong style="font-size: 13px; margin-left: 15px;">PUNONG BARANGAY</strong>
    </p><br>

    <p><strong>Registration Number:</strong><span style="margin-left:150px;">{{ $data[0]->registration_number }}</span></p>




</body>
</html>
