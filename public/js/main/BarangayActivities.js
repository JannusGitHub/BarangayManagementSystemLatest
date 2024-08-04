function addBarangayActivities(){
    let formData = new FormData($('#formAddBarangayActivities')[0]);

	$.ajax({
        url: "add_barangay_activities",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayActivities").addClass('spinner-border spinner-border-sm');
            $("#btnAddBarangayActivities").addClass('disabled');
            $("#iconAddBarangayActivities").removeClass('fa fa-check');
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
                dataTablesBarangayActivities.draw();
                $("#formAddBarangayActivities")[0].reset();
                $('#modalAddBarangayActivities').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayActivities").removeClass('spinner-border spinner-border-sm');
            $("#btnAddBarangayActivities").removeClass('disabled');
            $("#iconAddBarangayActivities").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getBarangayActivitiesById(id){
    $.ajax({
        url: "get_barangay_activities_by_id",
        method: "get",
        data: {
            barangayActivitiesId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let formAddBarangayActivities = $('#formAddBarangayActivities');
            let barangayActivitiesDetails = response['barangayActivitiesDetails'];
            if(barangayActivitiesDetails.length > 0){
                $("#textAddTitle").val(barangayActivitiesDetails[0].title);
                $("#textAddDetails").val(barangayActivitiesDetails[0].details);
                $("#textAddDate").val(barangayActivitiesDetails[0].date);
                $("#textAddImage").val(barangayActivitiesDetails[0].image);

                if(barangayActivitiesDetails[0].image != null){
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
                toastr.warning('No BarangayActivities records found!');
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        },
    });
}

function editBarangayActivitiesStatus(){
    $.ajax({
        url: "edit_barangay_activities_status",
        method: "post",
        data: $('#formEditBarangayActivitiesStatus').serialize(),
        dataType: "json",
        beforeSend: function(){
            // $("#iBtnAddUserIcon").addClass('fa fa-spinner fa-pulse');
            // $("#buttonEditUserStatus").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validationHasError'] == 1){
                toastr.error('Edit activities status failed!');
            }else{
                if(response['hasError'] == 0){
                    if(response['status'] == 0){
                        toastr.success('Deactivation success!');
                        dataTablesBarangayActivities.draw();
                    }
                    else{
                        toastr.success('Activation success!');
                        dataTablesBarangayActivities.draw();
                    }
                }
                $("#modalEditBarangayActivitiesStatus").modal('hide');
                $("#formEditBarangayActivitiesStatus")[0].reset();
            }
            
            $("#iconEditBarangayActivities").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayActivitiesStatus").removeAttr('disabled');
            $("#iconEditBarangayActivities").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayActivities").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayActivitiesStatus").removeAttr('disabled');
            $("#iconEditBarangayActivities").addClass('fa fa-check');
        }
    });
}