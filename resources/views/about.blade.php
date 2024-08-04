<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barangay Management System</title>
    @include('shared.css_links.css_links')

</head>
<body>
    @include('shared.pages.index_nav')

    <div class="container" style="margin-top: 7rem">
        <h1 class="fw-bold mb-5"><span class="border-end border-secondary border-5 mr-3"></span>About us</h1>
        <div id="divBarangayProfile" class="mb-5">
            <!-- Auto Generated -->
        </div>
    </div>

    <div class="container" style="margin-top: 2rem">
        <h5 class="mt-3">Geography</h5>
        <table class="table border table-borderless" id="tableGeography">
            <thead>
                <tr>
                    <th>Land Area</th>
                    <th>Boundaries (West, East, South, North)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Auto Generated -->
            </tbody>
        </table>
    </div>

    <div class="container" style="margin-top: 2rem">
        <h5 class="mt-3">Demography</h5>
        <table class="table border table-borderless" id="tableDemography">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Total Population</th>
                    <th>Number of Household</th>
                </tr>
            </thead>
            <tbody>
                <!-- Auto Generated -->
                {{-- <tr>
                    <td>Year 2018</td>
                    <td>23,591</td>
                    <td>6,388</td>
                </tr>
                <tr>
                    <td>Year 2015</td>
                    <td>21,754</td>
                    <td>5,891</td>
                </tr>
                <tr>
                    <td>Year 2010</td>
                    <td>14,524</td>
                    <td>2,810</td>
                </tr>
                <tr>
                    <td>Year 2007</td>
                    <td>12,444</td>
                    <td>2,676</td>
                </tr>
                <tr>
                    <td>Year 2000</td>
                    <td>7,903</td>
                    <td>1,813</td>
                </tr>
                <tr>
                    <td>Year 1995</td>
                    <td>5,558</td>
                    <td>Unknown</td>
                </tr>
                <tr>
                    <td>Year 1990</td>
                    <td>5,267</td>
                    <td>Unknown</td>
                </tr>
                <tr>
                    <td>Year 1980</td>
                    <td>3,534</td>
                    <td>Unknown</td>
                </tr> --}}
            </tbody>
        </table>
    </div>
    
    <div class="container" style="margin-top: 2rem">
        <h5 class="mt-3">School</h5>
        <table class="table table-responsive border table-borderless text-nowrap" id="tableSchool">
            <thead>
                <tr>
                    <th>Pre-Elementary</th>
                    <th>Pre-Elementary & Elementary</th>
                    <th>Secondary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Auto Generated -->
                    {{-- <td>Looc Day Care Center</td>
                    <td>Looc Elementary School St. Mary Magdalene Learning Center</td>
                    <td>Looc National Highschool</td> --}}
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container" style="margin-top: 2rem">
        <h5 class="mt-3">Others</h5>
        <table class="table table-responsive border table-borderless text-nowrap" id="tableOthers">
            <thead>
                <tr>
                    <th>Classification</th>
                    <th>Zoning Classification</th>
                    <th>Fiesta</th>
                    <th>Distance to Poblacion</th>
                    <th>Travel time to Poblacion</th>
                </tr>
            </thead>
            <tbody>
                <!-- Auto Generated -->
                {{-- <tr>
                    <td>Urban</td>
                    <td>Agricultural</td>
                    <td>May 6</td>
                    <td>1 kms. (+-)</td>
                    <td>30 mins.</td>
                </tr> --}}
            </tbody>
        </table>
    </div>

    {{-- <div class="container" style="margin-top: 5rem">
        <div class="row">
            <div class="col-lg-4 col-md-6 mt-sm-3">
                <div class="card">
                    <h6 class="card-header fw-bold text-white" style="background: #4b545c"><span><i class="fa-solid fa-lg fa-house-chimney-user"></i></span>&nbsp;Total Households</h6>
                    <div class="card-body">
                        <h1 class="fw-bold">0</h1>
                        <p class="card-text">Total list of barangay households</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-sm-3">
                <div class="card">
                    <h6 class="card-header fw-bold text-white" style="background: #4b545c"><span><i class="fa-solid fa-user-group"></i></span>&nbsp;Total Registered Accounts</h6>
                    <div class="card-body">
                        <h1 class="fw-bold">0</h1>
                        <p class="card-text">Total list of registered users</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mx-md-auto mt-sm-3">
                <div class="card">
                    <h6 class="card-header fw-bold text-white" style="background: #4b545c"><span><i class="fa-solid fa-lg fa-house-chimney-user"></i></span>&nbsp;Total Officials</h6>
                    <div class="card-body">
                        <h1 class="fw-bold">0</h1>
                        <p class="card-text">Total list of barangay officials</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
</body>
</html>

@include('shared.js_links.js_links')
<script type="text/javascript">
    $(document).ready(function () {
        function getTotalBarangayProfile(){
            console.log('getTotalBarangayProfile()');
            $.ajax({
                url: "get_total_barangay_profile",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(response){
                    let formAddAnnouncement = $('#formAddAnnouncement');
                    let totalBarangayProfileDetails = response['totalBarangayProfileDetails'];
                    if(totalBarangayProfileDetails.length > 0){
                        for (let index = 0; index < totalBarangayProfileDetails.length; index++) {
                            let barangayProfileId = totalBarangayProfileDetails[index].id;
                            let barangayProfileTitle = totalBarangayProfileDetails[index].title;
                            let barangayProfileDetails = totalBarangayProfileDetails[index].details;

                            let html = "";
                            html +='<div class="row">';
                            html +=     '<h5>'+barangayProfileTitle+'</h5>';
                            html +=     '<p>'+barangayProfileDetails+'</p>';
                            html +='</div>';
                            $('#divBarangayProfile').append(html);
                        }
                    }
                    // else{
                    //     toastr.warning('No Announcement records found!');
                    // }
                },
                error: function(data, xhr, status){
                    toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                },
            });
        }
        getTotalBarangayProfile();

        
        function getTotalBarangayGeography(){
            console.log('getTotalBarangayGeography()');
            $.ajax({
                url: "get_total_barangay_geography",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(response){
                    let totalBarangayGeographyDetails = response['totalBarangayGeographyDetails'];
                    if(totalBarangayGeographyDetails.length > 0){
                        for (let index = 0; index < totalBarangayGeographyDetails.length; index++) {
                            let barangayGeographyId = totalBarangayGeographyDetails[index].id;
                            let barangayGeographyLandArea = totalBarangayGeographyDetails[index].land_area;
                            let barangayGeographyBoundaries = totalBarangayGeographyDetails[index].boundaries;

                            let html = "";
                            html +=    '<tr>';
                            html +=        '<td>'+barangayGeographyLandArea+'</td>';
                            html +=        '<td>'+barangayGeographyBoundaries+'</td>';
                            html +=    '</tr>';
                            $('#tableGeography tbody').append(html);
                        }
                    }
                    // else{
                    //     toastr.warning('No Announcement records found!');
                    // }
                },
                error: function(data, xhr, status){
                    toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                },
            });
        }
        getTotalBarangayGeography();


        function getTotalBarangayDemography(){
            console.log('getTotalBarangayDemography()');
            $.ajax({
                url: "get_total_barangay_demography",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(response){
                    let totalBarangayDemographyDetails = response['totalBarangayDemographyDetails'];
                    if(totalBarangayDemographyDetails.length > 0){
                        for (let index = 0; index < totalBarangayDemographyDetails.length; index++) {
                            let barangayDemographyYear = totalBarangayDemographyDetails[index].year;
                            let barangayDemographyTotalPopulation = totalBarangayDemographyDetails[index].total_population;
                            let barangayDemographyNumberOfHousehold = totalBarangayDemographyDetails[index].number_of_household;

                            let html = "";
                            html +=    '<tr>';
                            html +=        '<td>'+barangayDemographyYear+'</td>';
                            html +=        '<td>'+barangayDemographyTotalPopulation+'</td>';
                            html +=        '<td>'+barangayDemographyNumberOfHousehold+'</td>';
                            html +=    '</tr>';
                            $('#tableDemography tbody').append(html);
                        }
                    }
                    // else{
                    //     toastr.warning('No Announcement records found!');
                    // }
                },
                error: function(data, xhr, status){
                    toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                },
            });
        }
        getTotalBarangayDemography();


        function getTotalBarangaySchool(){
            console.log('getTotalBarangaySchool()');
            $.ajax({
                url: "get_total_barangay_school",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(response){
                    let totalBarangaySchoolDetails = response['totalBarangaySchoolDetails'];
                    if(totalBarangaySchoolDetails.length > 0){
                        for (let index = 0; index < totalBarangaySchoolDetails.length; index++) {
                            let barangaySchoolPreElementary = totalBarangaySchoolDetails[index].pre_elementary;
                            let barangaySchoolPreElementaryAndElementary = totalBarangaySchoolDetails[index].pre_elementary_and_elementary;
                            let barangaySchoolSecondary = totalBarangaySchoolDetails[index].secondary;

                            let html = "";
                            html +=    '<tr>';
                            html +=        '<td>'+barangaySchoolPreElementary+'</td>';
                            html +=        '<td>'+barangaySchoolPreElementaryAndElementary+'</td>';
                            html +=        '<td>'+barangaySchoolSecondary+'</td>';
                            html +=    '</tr>';
                            $('#tableSchool tbody').append(html);
                        }
                    }
                    // else{
                    //     toastr.warning('No Announcement records found!');
                    // }
                },
                error: function(data, xhr, status){
                    toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                },
            });
        }
        getTotalBarangaySchool();


        function getTotalBarangayOthers(){
            console.log('getTotalBarangayOthers()');
            $.ajax({
                url: "get_total_barangay_others",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(response){
                    let totalBarangayOthersDetails = response['totalBarangayOthersDetails'];
                    if(totalBarangayOthersDetails.length > 0){
                        for (let index = 0; index < totalBarangayOthersDetails.length; index++) {
                            let barangayOthersClassification = totalBarangayOthersDetails[index].classification;
                            let barangayOthersZoningClassification = totalBarangayOthersDetails[index].zoning_classification;
                            let barangayOthersFiesta = totalBarangayOthersDetails[index].fiesta;
                            let barangayOthersDistanceToPoblacion = totalBarangayOthersDetails[index].distance_to_poblacion;
                            let barangayOthersTravelTimeToPoblacion = totalBarangayOthersDetails[index].travel_time_to_poblacion;

                            let html = "";
                            html +=    '<tr>';
                            html +=        '<td>'+barangayOthersClassification+'</td>';
                            html +=        '<td>'+barangayOthersZoningClassification+'</td>';
                            html +=        '<td>'+barangayOthersFiesta+'</td>';
                            html +=        '<td>'+barangayOthersDistanceToPoblacion+'</td>';
                            html +=        '<td>'+barangayOthersTravelTimeToPoblacion+'</td>';
                            html +=    '</tr>';
                            $('#tableOthers tbody').append(html);
                        }
                    }
                    // else{
                    //     toastr.warning('No Announcement records found!');
                    // }
                },
                error: function(data, xhr, status){
                    toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                },
            });
        }
        getTotalBarangayOthers();
    });
</script>