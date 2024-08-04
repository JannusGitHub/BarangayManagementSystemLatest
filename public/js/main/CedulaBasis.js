function addCedulaBasis(){
    let formData = new FormData($('#formAddCedulaBasis')[0]);

	$.ajax({
        url: "add_cedula_basis",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddCedulaBasis").addClass('spinner-border spinner-border-sm');
            $("#buttonAddCedulaBasis").addClass('disabled');
            $("#iconAddCedulaBasis").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                if(response['error']['name'] === undefined){
                    $("#selectAddName").removeClass('is-invalid');
                    $("#selectAddName").attr('title', '');
                }
                else{
                    $("#selectAddName").addClass('is-invalid');
                    $("#selectAddName").attr('title', response['error']['name']);
                }

                if(response['error']['amount'] === undefined){
                    $("#textAddCedulaAmount").removeClass('is-invalid');
                    $("#textAddCedulaAmount").attr('title', '');
                }
                else{
                    $("#textAddCedulaAmount").addClass('is-invalid');
                    $("#textAddCedulaAmount").attr('title', response['error']['amount']);
                }
                if(response['error']['processing_time'] === undefined){
                    $("#selectAddCedulaProcessingTime").removeClass('is-invalid');
                    $("#selectAddCedulaProcessingTime").attr('title', '');
                }
                else{
                    $("#selectAddCedulaProcessingTime").addClass('is-invalid');
                    $("#selectAddCedulaProcessingTime").attr('title', response['error']['processing_time']);
                }

            }else if(response['hasError'] == 0){
                dataTablesCedulaBasis.draw();
                $("#formAddCedulaBasis")[0].reset();
                $('#modalAddCedulaBasis').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddCedulaBasis").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddCedulaBasis").removeClass('disabled');
            $("#iconAddCedulaBasis").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getCedulaBasisById(id){
    $.ajax({
        url: "get_cedula_basis_by_id",
        method: "get",
        data: {
            cedulaBasisId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let cedulaBasisDetails = response['cedulaBasisDetails'];
            if(cedulaBasisDetails.length > 0){
                $("#selectAddName").val(cedulaBasisDetails[0].name);
                $("#textAddAmount").val(cedulaBasisDetails[0].amount);
                $("#selectAddProcessingTime").val(cedulaBasisDetails[0].processing_time).trigger('change');
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

function editCedulaBasisStatus(){
    $.ajax({
        url: "edit_cedula_basis_status",
        method: "post",
        data: $('#formEditCedulaBasisStatus').serialize(),
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
                        dataTablesCedulaBasis.draw();
                    }
                    else{
                        toastr.success('Activation success!');
                        dataTablesCedulaBasis.draw();
                    }
                }
                $("#modalEditCedulaBasisStatus").modal('hide');
                $("#formEditCedulaBasisStatus")[0].reset();
            }
            
            $("#iconEditCedulaBasis").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditCedulaBasisStatus").removeAttr('disabled');
            $("#iconEditCedulaBasis").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditCedulaBasis").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditCedulaBasisStatus").removeAttr('disabled');
            $("#iconEditCedulaBasis").addClass('fa fa-check');
        }
    });
}