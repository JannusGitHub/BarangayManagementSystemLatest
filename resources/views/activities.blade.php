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
        {{-- <h1 class="fw-bold text-md-center mb-5">Activities</h1> --}}
        <h1 class="fw-bold mb-5"><span class="border-end border-secondary border-5 mr-3"></span>Recent Activities</h1>
        <div id="divActivities" class="mb-5">
            <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-1 row-cols-1 g-4">
            </div>
        </div>
    </div>
    
</body>
</html>

@include('shared.js_links.js_links')
<script type="text/javascript">
    function seeMore(text, barangayActivitiesId) {
        $('#barangay_activities_id_'+barangayActivitiesId).append(text);

        $('#barangay_activities_id_'+barangayActivitiesId+' #seeMore').addClass('d-none');
        if($('#barangay_activities_id_'+barangayActivitiesId+' #seeMore').hasClass('d-none')){
            $('#barangay_activities_id_'+barangayActivitiesId+' #threeDots').addClass('d-none');
        }else{
            $('#barangay_activities_id_'+barangayActivitiesId+' #threeDots').removeClass('d-none');
        }
    };

    $(document).ready(function () {
        function setEllipsis(text, barangayActivitiesId) {
            let len = text.length;
            let partialTexts = text.substring(150);

            // If text length is equal to or more than given size then add (...See more) 
            if (len >= 150) {
                text = text.substring(0, 150) + '<span id="threeDots">... </span>' + `<a id="seeMore" href="javascript:seeMore('${partialTexts}',${barangayActivitiesId});">See more</a>`;
            }
            return text;
        };

        function getTotalActivities(){
            console.log('getTotalActivities()');
            $.ajax({
                url: "get_total_barangay_activities",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(response){
                    let totalBarangayActivitiesDetails = response['totalBarangayActivitiesDetails'];
                    if(totalBarangayActivitiesDetails.length > 0){
                        for (let index = 0; index < totalBarangayActivitiesDetails.length; index++) {
                            let barangayActivitiesId = totalBarangayActivitiesDetails[index].id;
                            let barangayActivitiesTitle = totalBarangayActivitiesDetails[index].title;
                            let barangayActivitiesDetails = totalBarangayActivitiesDetails[index].details;
                            let barangayActivitiesDate = totalBarangayActivitiesDetails[index].date;
                            let barangayActivitiesImage = totalBarangayActivitiesDetails[index].image;

                            let url = '';
                            if(barangayActivitiesImage === null){
                                url = `{{ asset('/images/svg/no_image.svg') }}`;
                            }else{
                                url = `{{ asset('/storage/activities_attachments/${barangayActivitiesImage}') }}`;
                            }

                            let html = "";
                            html +='<div class="col">';
                            html +=    '<div class="card h-100">';
                            html +=        '<img src="'+url+'" style="max-height: 100%; height: 300px; object-fit:cover" class="card-img-top border" alt="'+barangayActivitiesTitle+'">';
                            html +=        '<div class="card-body">';
                            html +=            '<h4 class="fw-bold">'+barangayActivitiesTitle+'</h4>';
                            html +=            '<p class="card-text" id="barangay_activities_id_'+barangayActivitiesId+'">'+setEllipsis(barangayActivitiesDetails, barangayActivitiesId)+'</p>';
                            html +=        '</div>';
                            html +=        '<div class="card-footer">';
                            html +=            '<h5 class="text-center">'+moment(barangayActivitiesDate).format("dddd, MMM Do YYYY"); +'</h5>';
                            html +=            '<h5 class="text-center">'+moment(barangayActivitiesDate).format("h:mm A"); +'</h5>';
                            html +=        '</div>';
                            html +=    '</div>';
                            html +='</div>';
                            $('#divActivities .row').append(html);
                        }
                    }
                    else{
                        let html = "";
                        html +='<div class="col">';
                        html +=     '<p>We have no activities as of today</p>';
                        html +='</div>';
                        $('#divActivities .row').append(html);
                    }
                },
                error: function(data, xhr, status){
                    toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                },
            });
        }
        getTotalActivities();
    });
</script>