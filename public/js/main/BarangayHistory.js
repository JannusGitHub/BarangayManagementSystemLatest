function addBarangayHistory(){
    let formData = new FormData($('#formAddBarangayHistory')[0]);

	$.ajax({
        url: "add_barangay_history",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayHistory").addClass('spinner-border spinner-border-sm');
            $("#btnAddBarangayHistory").addClass('disabled');
            $("#iconAddBarangayHistory").removeClass('fa fa-check');
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
                dataTablesBarangayHistory.draw();
                $("#formAddBarangayHistory")[0].reset();
                $('#modalAddBarangayHistory').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayHistory").removeClass('spinner-border spinner-border-sm');
            $("#btnAddBarangayHistory").removeClass('disabled');
            $("#iconAddBarangayHistory").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getBarangayHistoryById(id){
    $.ajax({
        url: "get_barangay_history_by_id",
        method: "get",
        data: {
            barangayHistoryId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let barangayHistoryDetails = response['barangayHistoryDetails'];
            if(barangayHistoryDetails.length > 0){
                $("#textAddTitle").val(barangayHistoryDetails[0].title);
                $("#textAddDetails").val(barangayHistoryDetails[0].details);
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

function editBarangayHistoryStatus(){
    $.ajax({
        url: "edit_barangay_history_status",
        method: "post",
        data: $('#formEditBarangayHistoryStatus').serialize(),
        dataType: "json",
        beforeSend: function(){
            // $("#iBtnAddUserIcon").addClass('fa fa-spinner fa-pulse');
            // $("#buttonEditUserStatus").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validationHasError'] == 1){
                toastr.error('Edit history status failed!');
            }else{
                if(response['hasError'] == 0){
                    if(response['status'] == 0){
                        toastr.success('Deactivation success!');
                        dataTablesBarangayHistory.draw();
                    }
                    else{
                        toastr.success('Activation success!');
                        dataTablesBarangayHistory.draw();
                    }
                }
                $("#modalEditBarangayHistoryStatus").modal('hide');
                $("#formEditBarangayHistoryStatus")[0].reset();
            }
            
            $("#iconEditBarangayHistory").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayHistoryStatus").removeAttr('disabled');
            $("#iconEditBarangayHistory").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayHistory").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayHistoryStatus").removeAttr('disabled');
            $("#iconEditBarangayHistory").addClass('fa fa-check');
        }
    });
}