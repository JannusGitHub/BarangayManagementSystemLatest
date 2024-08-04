function addBarangayMissionVision(){
    let formData = new FormData($('#formAddBarangayMissionVision')[0]);

	$.ajax({
        url: "add_barangay_mission_vision",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayMissionVision").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayMissionVision").addClass('disabled');
            $("#iconAddBarangayMissionVision").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                if(response['error']['mission'] === undefined){
                    $("#textAddMission").removeClass('is-invalid');
                    $("#textAddMission").attr('title', '');
                }
                else{
                    $("#textAddMission").addClass('is-invalid');
                    $("#textAddMission").attr('title', response['error']['mission']);
                }
                if(response['error']['vision'] === undefined){
                    $("#textAddVision").removeClass('is-invalid');
                    $("#textAddVision").attr('title', '');
                }
                else{
                    $("#textAddVision").addClass('is-invalid');
                    $("#textAddVision").attr('title', response['error']['vision']);
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
                dataTablesBarangayMissionVision.draw();
                $("#formAddBarangayMissionVision")[0].reset();
                $('#modalAddBarangayMissionVision').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayMissionVision").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayMissionVision").removeClass('disabled');
            $("#iconAddBarangayMissionVision").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getBarangayMissionVisionById(id){
    $.ajax({
        url: "get_barangay_mission_vision_by_id",
        method: "get",
        data: {
            barangayMissionVisionId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let barangayMissionVisionDetails = response['barangayMissionVisionDetails'];
            if(barangayMissionVisionDetails.length > 0){
                $("#textAddMission").val(barangayMissionVisionDetails[0].mission);
                $("#textAddVision").val(barangayMissionVisionDetails[0].vision);
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

function editBarangayMissionVisionStatus(){
    $.ajax({
        url: "edit_barangay_mission_vision_status",
        method: "post",
        data: $('#formEditBarangayMissionVisionStatus').serialize(),
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
                        dataTablesBarangayMissionVision.draw();
                    }
                    else{
                        toastr.success('Activation success!');
                        dataTablesBarangayMissionVision.draw();
                    }
                }
                $("#modalEditBarangayMissionVisionStatus").modal('hide');
                $("#formEditBarangayMissionVisionStatus")[0].reset();
            }
            
            $("#iconEditBarangayMissionVision").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayMissionVisionStatus").removeAttr('disabled');
            $("#iconEditBarangayMissionVision").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayMissionVision").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayMissionVisionStatus").removeAttr('disabled');
            $("#iconEditBarangayMissionVision").addClass('fa fa-check');
        }
    });
}