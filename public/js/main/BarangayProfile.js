function addBarangayProfile(){
    let formData = new FormData($('#formAddBarangayProfile')[0]);

	$.ajax({
        url: "add_barangay_profile",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayProfile").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayProfile").addClass('disabled');
            $("#iconAddBarangayProfile").removeClass('fa fa-check');
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

            }else if(response['hasError'] == 0){
                dataTablesBarangayProfile.draw();
                $("#formAddBarangayProfile")[0].reset();
                $('#modalAddBarangayProfile').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayProfile").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayProfile").removeClass('disabled');
            $("#iconAddBarangayProfile").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getBarangayProfileById(id){
    $.ajax({
        url: "get_barangay_profile_by_id",
        method: "get",
        data: {
            barangayProfileId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let formAddBarangayProfile = $('#formAddBarangayProfile');
            let barangayProfileDetails = response['barangayProfileDetails'];
            if(barangayProfileDetails.length > 0){
                $("#textAddTitle").val(barangayProfileDetails[0].title);
                $("#textAddDetails").val(barangayProfileDetails[0].details);
            }
            else{
                toastr.warning('No records found!');
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        },
    });
}

function editBarangayProfileStatus(){
    $.ajax({
        url: "edit_barangay_profile_status",
        method: "post",
        data: $('#formEditBarangayProfileStatus').serialize(),
        dataType: "json",
        beforeSend: function(){
            // $("#iBtnAddUserIcon").addClass('fa fa-spinner fa-pulse');
            // $("#buttonEditUserStatus").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validationHasError'] == 1){
                toastr.error('Edit status failed!');
            }else{
                if(response['hasError'] == 0){
                    if(response['status'] == 0){
                        toastr.success('Deactivation success!');
                        dataTablesBarangayProfile.draw();
                    }
                    else{
                        toastr.success('Activation success!');
                        dataTablesBarangayProfile.draw();
                    }
                }
                $("#modalEditBarangayProfileStatus").modal('hide');
                $("#formEditBarangayProfileStatus")[0].reset();
            }
        
            $("#iconEditBarangayProfileStatus").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayProfileStatus").removeAttr('disabled');
            $("#iconEditBarangayProfileStatus").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayProfileStatus").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayProfileStatus").removeAttr('disabled');
            $("#iconEditBarangayProfileStatus").addClass('fa fa-check');
        }
    });
}