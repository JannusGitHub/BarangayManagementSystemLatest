<!DOCTYPE html>
<html>
<head>
    <title>Barangay Certificate</title>
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
        font-size: 16px; /* Adjust font size as needed */
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
    
    {{-- <p>LAST NAME <span><strong style="margin-left:100px;">:</strong></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->resident_info->user_info->lastname }}</span><br> --}}
    {{-- <span>GIVEN NAME<span><strong style="margin-left:94px;">:</strong></span></span><span style="margin-left:150px; text-transform: capitalize;">{{ $data[0]->resident_info->user_info->firstname }}</span><br>
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
    <span>ISSUED ON<span><strong style="margin-left: 110px;">:</strong></span></span><span style="margin-left:150px;">{{ $data[0]->issued_on }}</span><br>     --}}


    </p><br>
{{-- 
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
    <p style="text-align:center;"><strong>JOSEPH L. EMERGO</strong></p> --}}

</body>
</html>
