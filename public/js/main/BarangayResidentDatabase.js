function addBarangayResidentDatabase(){
    let formData = new FormData($('#formAddBarangayResidentDatabase')[0]);

	$.ajax({
        url: "add_barangay_resident_database",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayResidentDatabase").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayResidentDatabase").addClass('disabled');
            $("#iconAddBarangayResidentDatabase").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                if(response['error']['firstname'] === undefined){
                    $("#textFirstname").removeClass('is-invalid');
                    $("#textFirstname").attr('title', '');
                }
                else{
                    $("#textFirstname").addClass('is-invalid');
                    $("#textFirstname").attr('title', response['error']['firstname']);
                }

                if(response['error']['lastname'] === undefined){
                    $("#textLastname").removeClass('is-invalid');
                    $("#textLastname").attr('title', '');
                }
                else{
                    $("#textLastname").addClass('is-invalid');
                    $("#textLastname").attr('title', response['error']['lastname']);
                }

                if(response['error']['middle_initial'] === undefined){
                    $("#textMiddleInitial").removeClass('is-invalid');
                    $("#textMiddleInitial").attr('title', '');
                }
                else{
                    $("#textMiddleInitial").addClass('is-invalid');
                    $("#textMiddleInitial").attr('title', response['error']['middle_initial']);
                }

                if(response['error']['address'] === undefined){
                    $("#selectAddress").removeClass('is-invalid');
                    $("#selectAddress").attr('title', '');
                }
                else{
                    $("#selectAddress").addClass('is-invalid');
                    $("#selectAddress").attr('title', response['error']['address']);
                }

                if(response['error']['gender'] === undefined){
                    $("#selectGender").removeClass('is-invalid') ;
                    $("#selectGender").attr('title', '');
                }
                else{
                    $("#selectGender").addClass('is-invalid');
                    $("#selectGender").attr('title', response['error']['gender']);
                }

                if(response['error']['age'] === undefined){
                    $("#textAge").removeClass('is-invalid');
                    $("#textAge").attr('title', '');
                }
                else{
                    $("#textAge").addClass('is-invalid');
                    $("#textAge").attr('title', response['error']['age']);
                }
            }else if(response['hasError'] == 0){
                dataTablesBarangayResidentDatabase.draw();
                $("#formAddBarangayResidentDatabase")[0].reset();
                $('#modalAddBarangayResidentDatabase').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayResidentDatabase").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayResidentDatabase").removeClass('disabled');
            $("#iconAddBarangayResidentDatabase").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getBarangayResidentDatabaseById(id){
    $.ajax({
        url: "get_barangay_resident_database_by_id",
        method: "get",
        data: {
            barangayResidentDatabaseId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let barangayResidentDatabaseDetails = response['barangayResidentDatabaseDetails'];
            if(barangayResidentDatabaseDetails.length > 0){
                $("#textFirstname").val(barangayResidentDatabaseDetails[0].firstname);
                $("#textLastname").val(barangayResidentDatabaseDetails[0].lastname);
                $("#textMiddleInitial").val(barangayResidentDatabaseDetails[0].middle_initial);
                $("#selectAddress").val(barangayResidentDatabaseDetails[0].address).trigger('change');
                $("#selectGender").val(barangayResidentDatabaseDetails[0].gender).trigger('change');
                $("#textAge").val(barangayResidentDatabaseDetails[0].age);
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

function editBarangayResidentDatabaseStatus(){
    $.ajax({
        url: "edit_barangay_resident_database_status",
        method: "post",
        data: $('#formEditBarangayResidentDatabaseStatus').serialize(),
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
                        toastr.success('Successfully disabled!');
                        dataTablesBarangayResidentDatabase.draw();
                    }
                    else{
                        toastr.success('Successfully enabled!');
                        dataTablesBarangayResidentDatabase.draw();
                    }
                }
                $("#modalEditBarangayResidentDatabaseStatus").modal('hide');
                $("#formEditBarangayResidentDatabaseStatus")[0].reset();
            }
            
            $("#iconEditBarangayResidentDatabase").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayResidentDatabaseStatus").removeAttr('disabled');
            $("#iconEditBarangayResidentDatabase").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayResidentDatabase").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayResidentDatabaseStatus").removeAttr('disabled');
            $("#iconEditBarangayResidentDatabase").addClass('fa fa-check');
        }
    });
}