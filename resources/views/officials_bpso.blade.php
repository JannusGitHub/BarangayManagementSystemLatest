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
        <h1 class="fw-bold text-center"><span class="border-end border-secondary border-5 mr-3"></span>Organizational Chart</h1>
        <div id="divOfficial" class="my-5">

            <div class="row-chairman">
            </div>
            <div class="row-bpso-chief">
            </div>
            <div class="row-deputy-chief-and-operation row row-cols-xl-3 row-cols-lg-2 row-cols-md-1 row-cols-1 g-4">
            </div>
            <div class="row row-investigator">
            </div>
        </div>
    </div>
    
</body>
</html>

@include('shared.js_links.js_links')
<script type="text/javascript">
    $(document).ready(function () {
        function getTotalOfficial(){
            console.log('getTotalOfficial()');
            $.ajax({
                url: "get_total_barangay_official",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(response){
                    let totalBarangayOfficialDetails = response['totalBarangayOfficialDetails'];
                    if(totalBarangayOfficialDetails.length > 0){
                        for (let index = 0; index < totalBarangayOfficialDetails.length; index++) {
                            let barangayOfficialId = totalBarangayOfficialDetails[index].id;
                            let barangayOfficialName = totalBarangayOfficialDetails[index].name;
                            let barangayOfficialPosition = totalBarangayOfficialDetails[index].position;
                            let barangayOfficialStartTerm = totalBarangayOfficialDetails[index].start_term;
                            let barangayOfficialEndTerm = totalBarangayOfficialDetails[index].end_term;
                            let barangayOfficialPhoto = totalBarangayOfficialDetails[index].photo;
                            let barangayOfficialStatus = totalBarangayOfficialDetails[index].status;

                            let url = '';
                            if(barangayOfficialPhoto === null){
                                url = `{{ asset('/images/svg/no_image.svg') }}`;
                            }else{
                                url = `{{ asset('/storage/official_attachments/photo/${barangayOfficialPhoto}') }}`;
                            }

                            let position = '';
                            if(barangayOfficialPosition == 1){
                                position = 'Chairman';
                            }else if(barangayOfficialPosition == 2){
                                position = 'Councilor';
                            }
                            else if(barangayOfficialPosition == 3){
                                position = 'SK Chairman';
                            }
                            else if(barangayOfficialPosition == 4){
                                position = 'SK Councilor';
                            }
                            else if(barangayOfficialPosition == 5){
                                position = 'Treasurer';
                            }
                            else if(barangayOfficialPosition == 6){
                                position = 'Secretary';
                            }
                            else if(barangayOfficialPosition == 7){
                                position = 'BPSO Chief';
                            }
                            else if(barangayOfficialPosition == 8){
                                position = 'Deputy Chief';
                            }
                            else if(barangayOfficialPosition == 9){
                                position = 'Deputy On Operation';
                            }
                            else if(barangayOfficialPosition == 10){
                                position = 'Investigator';
                            }
                            else{
                                position = 'Others';
                            }

                            let status ='';
                            if(barangayOfficialStatus === 1){
                                status = 'Active';
                            }else{
                                status = 'Not Active';
                            }
                            
                            let html = "";
                            if(barangayOfficialPosition == 1){
                                html +='<div class="col-12 mt-5 mx-auto">';
                                html +=    '<div class="card d-block mx-auto" style="width: 18rem;">';
                                html +=        '<img class="img-fluid" src="'+url+'" alt="image" style="max-height: 100%; height: 200px; width:100%; object-fit:cover">';
                                html +=        '<div class="card-body">';
                                html +=            '<h5 class="card-title fw-bold name">'+barangayOfficialName+'</h5>';
                                html +=            '<p class="card-text position">'+position+'</p>';
                                html +=            '<small class="text-success status">'+status+'</small>';
                                html +=        '</div>';
                                html +=    '</div>';
                                html +='</div>';
                                $('#divOfficial .row-chairman').append(html);
                            }
                            else if(barangayOfficialPosition == 7){
                                html +='<div class="col-12 mt-5 mx-auto">';
                                html +=    '<div class="card d-block mx-auto" style="width: 18rem;">';
                                html +=        '<img class="img-fluid" src="'+url+'" alt="image" style="max-height: 100%; height: 200px; width:100%; object-fit:cover">';
                                html +=        '<div class="card-body">';
                                html +=            '<h5 class="card-title fw-bold name">'+barangayOfficialName+'</h5>';
                                html +=            '<p class="card-text position">'+position+'</p>';
                                html +=            '<small class="text-success status">'+status+'</small>';
                                html +=        '</div>';
                                html +=    '</div>';
                                html +='</div>';
                                $('#divOfficial .row-bpso-chief').append(html);
                            }
                            else if(barangayOfficialPosition == 8 || barangayOfficialPosition == 9){
                                html +='<div class="col-lg-4 col-md-6 mt-5 mx-auto">';
                                html +=    '<div class="card d-block mx-auto" style="width: 18rem;">';
                                html +=        '<img class="img-fluid" src="'+url+'" alt="image" style="max-height: 100%; height: 200px; width:100%; object-fit:cover">';
                                html +=        '<div class="card-body">';
                                html +=            '<h5 class="card-title fw-bold name">'+barangayOfficialName+'</h5>';
                                html +=            '<p class="card-text position">'+position+'</p>';
                                html +=            '<small class="text-success status">'+status+'</small>';
                                html +=        '</div>';
                                html +=    '</div>';
                                html +='</div>';
                                $('#divOfficial .row-deputy-chief-and-operation').append(html);
                            }else if(barangayOfficialPosition == 10){
                                html +='<div class="col-lg-4 col-md-6 mt-5">';
                                html +=    '<div class="card d-block mx-auto" style="width: 18rem;">';
                                html +=        '<img class="img-fluid" src="'+url+'" alt="image" style="max-height: 100%; height: 200px; width:100%; object-fit:cover">';
                                html +=        '<div class="card-body">';
                                html +=            '<h5 class="card-title fw-bold name">'+barangayOfficialName+'</h5>';
                                html +=            '<p class="card-text position">'+position+'</p>';
                                html +=            '<small class="text-success status">'+status+'</small>';
                                html +=        '</div>';
                                html +=    '</div>';
                                html +='</div>';
                                $('#divOfficial .row-investigator').append(html);
                            }
                            
                        }
                    }
                    else{
                        let html = "";
                        html +='<div class="col">';
                        html +=     '<p>We have no official as of today</p>';
                        html +='</div>';
                        $('#divOfficial .row').append(html);
                    }
                },
                error: function(data, xhr, status){
                    toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                },
            });
        }
        getTotalOfficial();
    });
</script>