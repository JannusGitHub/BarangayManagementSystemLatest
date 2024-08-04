function addAnnouncement(){
    let formData = new FormData($('#formAddAnnouncement')[0]);

	$.ajax({
        url: "add_announcement",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddAnnouncement").addClass('spinner-border spinner-border-sm');
            $("#btnAddAnnouncement").addClass('disabled');
            $("#iconAddAnnouncement").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                if(response['error']['title'] === undefined){
                    $("#textAddTitle").removeClass('is-invalid');
                    $("#textAddTitle").attr('title', '');
                }
                else{
                    $("#textAddTitle").addClass('is-invalid');
                    $("#textAddTitle").attr('title', response['error']['title']);
                }
                if(response['error']['details'] === undefined){
                    $("#textAddDetails").removeClass('is-invalid');
                    $("#textAddDetails").attr('title', '');
                }
                else{
                    $("#textAddDetails").addClass('is-invalid');
                    $("#textAddDetails").attr('title', response['error']['details']);
                }
                if(response['error']['date'] === undefined){
                    $("#textAddDate").removeClass('is-invalid');
                    $("#textAddDate").attr('title', '');
                }
                else{
                    $("#textAddDate").addClass('is-invalid');
                    $("#textAddDate").attr('title', response['error']['date']);
                }

            }else if(response['hasError'] == 0){
                dataTablesAnnouncements.draw();
                $("#formAddAnnouncement")[0].reset();
                $('#modalAddAnnouncement').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddAnnouncement").removeClass('spinner-border spinner-border-sm');
            $("#btnAddAnnouncement").removeClass('disabled');
            $("#iconAddAnnouncement").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getAnnouncementById(announcementId){
    $.ajax({
        url: "get_announcement_by_id",
        method: "get",
        data: {
            announcementId : announcementId,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let formAddAnnouncement = $('#formAddAnnouncement');
            let announcementDetails = response['announcementDetails'];
            if(announcementDetails.length > 0){
                $("#textAddTitle").val(announcementDetails[0].title);
                $("#textAddDetails").val(announcementDetails[0].details);
                $("#textAddImage").val(announcementDetails[0].image);

                /**
                 * For disabling past dates to be select
                */
                let dateNow = new Date(announcementDetails[0].date);
                console.log('dateNow ', dateNow);

                let today = new Date().getTimezoneOffset() * 60000; // offset in milliseconds
                console.log('today with getTimezoneOffset()',today);
                
                let localISOTime = (new Date(dateNow - today)).toISOString();
                console.log('localISOTime ',localISOTime);

                let fullLocalISOTime = localISOTime.slice(0, localISOTime.lastIndexOf(":")); // or .substring(0, 16)
                console.log('localISOTime ',fullLocalISOTime);
                
                $("#textAddDate").prop('min',fullLocalISOTime);
                $("#textAddDate").val(announcementDetails[0].date);
                

                if(announcementDetails[0].image != null){
                    $('#fileAddImage').addClass('d-none');
                    $('#textAddImage').removeClass('d-none');
                    $('#checkboxDivision').removeClass('d-none');
                }else{
                    $('#fileAddImage').removeClass('d-none');
                    $('#textAddImage').addClass('d-none');
                    $('#checkboxDivision').addClass('d-none');
                }

                $('#checkboxImage').on('click', function(){
                    if($('#checkboxImage').is(':checked')){
                        console.log('checked');
                        $('#fileAddImage').removeClass('d-none');
                        $('#textAddImage').addClass('d-none');
                    }else{
                        console.log('not checked');
                        $('#fileAddImage').addClass('d-none');
                        $('#textAddImage').removeClass('d-none');
                    }
                });
            }
            else{
                toastr.warning('No Announcement records found!');
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        },
    });
}

function editAnnouncementStatus(){
    $.ajax({
        url: "edit_announcement_status",
        method: "post",
        data: $('#formEditAnnouncementStatus').serialize(),
        dataType: "json",
        beforeSend: function(){
            // $("#iBtnAddUserIcon").addClass('fa fa-spinner fa-pulse');
            // $("#buttonEditUserStatus").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validationHasError'] == 1){
                toastr.error('Edit announcement status failed!');
            }else{
                if(response['hasError'] == 0){
                    if(response['status'] == 0){
                        toastr.success('Announcement deactivation success!');
                        dataTablesAnnouncements.draw();
                    }
                    else{
                        toastr.success('Announcement activation success!');
                        dataTablesAnnouncements.draw();
                    }
                }
                $("#modalEditAnnouncementStatus").modal('hide');
                $("#formEditAnnouncementStatus")[0].reset();
            }
            
            $("#iconEditAnnouncement").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditAnnouncementStatus").removeAttr('disabled');
            $("#iconEditAnnouncement").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditAnnouncement").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditAnnouncementStatus").removeAttr('disabled');
            $("#iconEditAnnouncement").addClass('fa fa-check');
        }
    });
}