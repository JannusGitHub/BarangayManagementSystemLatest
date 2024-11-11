<!DOCTYPE html>
<html>
<head>
    <title>Registration Certificate</title>
</head>

<style>
    .certificate-container {
        position: relative;
        width: 100%; /* Adjust width as needed */
        max-width: 800px; /* Ensure image scales correctly */
    }

    .certificate-image {
        width: 100%; /* Image fills the container */
        height: auto;
    }

    .field {
        position: absolute;
        font-family: Arial, sans-serif; /* Match the font style */
        color: black; /* Text color */
        font-size: 14px; /* Adjust font size as needed */
        text-transform: capitalize;
        font-weight: bold;
    }

    /* Positioning each field individually */
    .field.fullname {
        top: 212px; /* Adjust these values */
        left: 460px;
    }
    .field.age {
        top: 235px; /* Adjust these values */
        left: 180px;
    }
    .field.birthdate {
        top: 258px; /* Adjust these values */
        left: 195px;
    }
    .field.address {
        top: 258px; /* Adjust these values */
        left: 500px;
    }
    .field.stay {
        top: 305px; /* Adjust these values */
        left: 280px;
    }
    .field.pinagkakaloob {
        top: 485px; /* Adjust these values */
        left: 250px;
    }
    .field.pinagkakaloobIka {
        top: 623px; /* Adjust these values */
        left: 400px;
    }
    .field.pinagkakaloobBuwan {
        top: 623px; /* Adjust these values */
        left: 510px;
    }
</style>
<body>

    @php
        $link='';
        if(isset($data[0]->resident_info->photo)){
            $link = public_path('images/png/certificate_format.png') ;
        }
    @endphp
    <div class="certificate-container">
        <img src="{{ $link }}" class="certificate-image">
    </div>

    <span class="field fullname" style="font-size: 16px !important">
        {{ $data[0]->resident_info->user_info->lastname .' '. $data[0]->resident_info->user_info->firstname }}
    </span>

    <span class="field age">
        {{ $data[0]->resident_info->age }}
    </span>

    <span class="field birthdate">
        {{ $data[0]->resident_info->birthdate }}
    </span>

    <span class="field address">
        {{ 'Purok '.$data[0]->resident_info->purok .' Street '. $data[0]->resident_info->street .' Block '. $data[0]->resident_info->block }}
    </span>

    <span class="field stay">
        @php
            $lengthOfStay = $data[0]->resident_info->length_of_stay;
            $date = date('Y-m-d', strtotime('-'.$lengthOfStay.' years'));
            echo $date;
        @endphp
    </span>

    <span class="field pinagkakaloob">
        {{ $data[0]->resident_info->user_info->lastname .' '. $data[0]->resident_info->user_info->firstname }}
    </span>

    <span class="field pinagkakaloobIka">
        @php
            $date = date('d');
            echo $date;
        @endphp
    </span>

    <span class="field pinagkakaloobBuwan">
        @php
            $date = date('F');
            echo $date;
        @endphp
    </span>






    {{-- <h1 style="text-align: center; font-size: 20px;" ><strong>{{ $repub_title }}</strong></h1>
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

    <p style="margin-left: 68%; margin-top:30px;">
        <strong>JOSEPH L. EMERGO</strong>
        <strong style="font-size: 13px; margin-left: 15px;">PUNONG BARANGAY</strong>
    </p><br><br>

    <p>O.R NO.<span style="margin-left:35px;">:</span><span style="margin-left:150px;">{{ $data[0]->or_number }}</span></p>
    <p>ISSUED AT<span style="margin-left:10px;">:</span><span style="margin-left:150px;">{{ $data[0]->issued_at }}</span></p>
    <p>ISSUED ON<span style="margin-left:8px;">:</span><span style="margin-left:150px;">{{ $data[0]->issued_on }}</span></p> --}}
    {{-- <p>KIDNENY COLLECTED<span style="margin-left:8px;">:</span><span style="margin-left:150px;">{{ $data[0]->or_number }}</span></p> --}}


</body>
</html>
