function addBarangayOthers(){
    let formData = new FormData($('#formAddBarangayOthers')[0]);

	$.ajax({
        url: "add_barangay_others",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayOthers").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayOthers").addClass('disabled');
            $("#iconAddBarangayOthers").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                
                if(response['error']['classification'] === undefined){
                    $("#textAddClassification").removeClass('is-invalid');
                    $("#textAddClassification").attr('title', '');
                }
                else{
                    $("#textAddClassification").addClass('is-invalid');
                    $("#textAddClassification").attr('title', response['error']['classification']);
                }
                if(response['error']['zoning_classification'] === undefined){
                    $("#textAddZoningClassification").removeClass('is-invalid');
                    $("#textAddZoningClassification").attr('title', '');
                }
                else{
                    $("#textAddZoningClassification").addClass('is-invalid');
                    $("#textAddZoningClassification").attr('title', response['error']['zoning_classification']);
                }
                if(response['error']['fiesta'] === undefined){
                    $("#textAddFiesta").removeClass('is-invalid');
                    $("#textAddFiesta").attr('title', '');
                }
                else{
                    $("#textAddFiesta").addClass('is-invalid');
                    $("#textAddFiesta").attr('title', response['error']['fiesta']);
                }
                if(response['error']['distance_to_poblacion'] === undefined){
                    $("#textAddDistanceToPoblacion").removeClass('is-invalid');
                    $("#textAddDistanceToPoblacion").attr('title', '');
                }
                else{
                    $("#textAddDistanceToPoblacion").addClass('is-invalid');
                    $("#textAddDistanceToPoblacion").attr('title', response['error']['distance_to_poblacion']);
                }
                if(response['error']['travel_time_to_poblacion'] === undefined){
                    $("#textAddTravelTimeToPoblacion").removeClass('is-invalid');
                    $("#textAddTravelTimeToPoblacion").attr('title', '');
                }
                else{
                    $("#textAddTravelTimeToPoblacion").addClass('is-invalid');
                    $("#textAddTravelTimeToPoblacion").attr('title', response['error']['travel_time_to_poblacion']);
                }

            }else if(response['hasError'] == 0){
                dataTablesBarangayOthers.draw();
                $("#formAddBarangayOthers")[0].reset();
                $('#modalAddBarangayOthers').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayOthers").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayOthers").removeClass('disabled');
            $("#iconAddBarangayOthers").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconAddBarangayOthers").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayOthers").addClass('disabled');
            $("#iconAddBarangayOthers").removeClass('fa fa-check');
        }
    });
}

function getBarangayOthersById(id){
    $.ajax({
        url: "get_barangay_others_by_id",
        method: "get",
        data: {
            barangayOthersId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let formAddBarangayOthers = $('#formAddBarangayOthers');
            let barangayOthersDetails = response['barangayOthersDetails'];
            
            if(barangayOthersDetails.length > 0){
                $("#textAddClassification").val(barangayOthersDetails[0].classification);
                $("#textAddZoningClassification").val(barangayOthersDetails[0].zoning_classification);
                $("#textAddDistanceToPoblacion").val(barangayOthersDetails[0].distance_to_poblacion);
                $("#textAddTravelTimeToPoblacion").val(barangayOthersDetails[0].travel_time_to_poblacion);
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

function editBarangayOthersStatus(){
    $.ajax({
        url: "edit_barangay_others_status",
        method: "post",
        data: $('#formEditBarangayOthersStatus').serialize(),
        dataType: "json",
        beforeSend: function(){
        },
        success: function(response){

            if(response['validationHasError'] == 1){
                toastr.error('Edit status failed!');
            }else{
                if(response['hasError'] == 0){
                    if(response['status'] == 0){
                        toastr.success('Deactivation success!');
                        dataTablesBarangayOthers.draw();
                    }
                    else{
                        toastr.success('Activation success!');
                        dataTablesBarangayOthers.draw();
                    }
                }
                $("#modalEditBarangayOthersStatus").modal('hide');
                $("#formEditBarangayOthersStatus")[0].reset();
            }
            
            $("#iconEditBarangayOthersStatus").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayOthersStatus").removeAttr('disabled');
            $("#iconEditBarangayOthersStatus").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayOthersStatus").addClass('spinner-border spinner-border-sm');
            $("#buttonEditBarangayOthersStatus").addClass('disabled');
            $("#iconEditBarangayOthersStatus").removeClass('fa fa-check');
        }
    });
}