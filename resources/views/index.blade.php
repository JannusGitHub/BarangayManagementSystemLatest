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
        <div class="row align-items-center">
            <div class="col-md-6 mt-5">
                <img class="svg-images img-fluid" src="{{ asset('/images/img/calambago.jpg') }}">
            </div>
            <div class="col-md-6 mt-5">
                <h1 class="fw-bold">Welcome to Barangay IV!</h1>
                <p>Barangay IV is a community located at the municipality of Calamba City. It is home to over 3,000 residents who contribute to the beauty of the small community. 

                Our Administration is dedicated to ensuring the safety and well-being of our residents. Through this website, we aim to serve as a hub for important announcements, upcoming events, streamline barangay activities, 
                

                and increase barangay safety through our innovative solution, The Arduino-Guard.</p>
                <p>Everyone can now support directly to the Barangay. People and organizations who want to help plant a tree can now participate through the Barangay IV.</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 5rem">
        <h1 class="fw-bold mb-4"><span class="border-end border-secondary border-5 mr-3"></span>Recent Announcements</h1>
        <div id="divAnnouncements" class="mb-5">
            <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-1 row-cols-1 g-4">
            </div>
        </div>
    </div>
    
</body>
</html>

@include('shared.js_links.js_links')
<script type="text/javascript">
    function seeMore(text, announcementId) {
        $('#announcement_id_'+announcementId).append(text);

        $('#announcement_id_'+announcementId+' #seeMore').addClass('d-none');
        if($('#announcement_id_'+announcementId+' #seeMore').hasClass('d-none')){
            $('#announcement_id_'+announcementId+' #threeDots').addClass('d-none');
        }else{
            $('#announcement_id_'+announcementId+' #threeDots').removeClass('d-none');
        }
    };

    $(document).ready(function () {
        function setEllipsis(text, announcementId) {
            let len = text.length;
            let partialTexts = text.substring(150);

            // If text length is equal to or more than given size then add (...See more) 
            if (len >= 150) {
                text = text.substring(0, 150) + '<span id="threeDots">... </span>' + `<a id="seeMore" href="javascript:seeMore('${partialTexts}',${announcementId});">See more</a>`;
            }
            return text;
        };

        function getTotalAnnouncements(){
            console.log('getTotalAnnouncements()');
            $.ajax({
                url: "get_total_announcements",
                method: "get",
                dataType: "json",
                beforeSend: function(){

                },
                success: function(response){
                    let formAddAnnouncement = $('#formAddAnnouncement');
                    let totalAnnouncementDetails = response['totalAnnouncementDetails'];
                    if(totalAnnouncementDetails.length > 0){
                        for (let index = 0; index < totalAnnouncementDetails.length; index++) {
                            let announcementId = totalAnnouncementDetails[index].id;
                            let announcementTitle = totalAnnouncementDetails[index].title;
                            let announcementDetails = totalAnnouncementDetails[index].details;
                            let announcementDate = totalAnnouncementDetails[index].date;
                            let announcementImage = totalAnnouncementDetails[index].image;

                            let url = '';
                            if(announcementImage === null){
                                url = `{{ asset('/images/svg/no_image.svg') }}`;
                            }else{
                                url = `{{ asset('/storage/announcement_attachments/${announcementImage}') }}`;
                            }

                            let html = "";
                            html +='<div class="col">';
                            html +=    '<div class="card h-100">';
                            html +=        '<img src="'+url+'" style="max-height: 100%; height: 300px; object-fit:cover" class="card-img-top border" alt="'+announcementTitle+'">';
                            html +=        '<div class="card-body">';
                            html +=            '<h4 class="fw-bold">'+announcementTitle+'</h4>';
                            html +=            '<p class="card-text" id="announcement_id_'+announcementId+'">'+setEllipsis(announcementDetails, announcementId)+'</p>';
                            html +=        '</div>';
                            html +=        '<div class="card-footer">';
                            html +=            '<h5 class="text-center">'+moment(announcementDate).format("dddd, MMM Do YYYY"); +'</h5>';
                            html +=            '<h5 class="text-center">'+moment(announcementDate).format("h:mm A"); +'</h5>';
                            html +=        '</div>';
                            html +=    '</div>';
                            html +='</div>';
                            $('#divAnnouncements .row').append(html);
                        }
                    }
                    else{
                        let html = "";
                        html +='<div class="col">';
                        html +=     '<p>We have no announcement as of today</p>';
                        html +='</div>';
                        $('#divAnnouncements .row').append(html);
                    }
                },
                error: function(data, xhr, status){
                    toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                },
            });
        }
        getTotalAnnouncements();
    });
</script>
