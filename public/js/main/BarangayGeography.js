function addBarangayGeography(){
    let formData = new FormData($('#formAddBarangayGeography')[0]);

	$.ajax({
        url: "add_barangay_geography",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayGeography").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayGeography").addClass('disabled');
            $("#iconAddBarangayGeography").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                
                if(response['error']['land_area'] === undefined){
                    $("#textAddLandArea").removeClass('is-invalid');
                    $("#textAddLandArea").attr('title', '');
                }
                else{
                    $("#textAddLandArea").addClass('is-invalid');
                    $("#textAddLandArea").attr('title', response['error']['land_area']);
                }
                if(response['error']['boundaries'] === undefined){
                    $("#textAddboundaries").removeClass('is-invalid');
                    $("#textAddboundaries").attr('title', '');
                }
                else{
                    $("#textAddboundaries").addClass('is-invalid');
                    $("#textAddboundaries").attr('title', response['error']['boundaries']);
                }

            }else if(response['hasError'] == 0){
                dataTablesBarangayGeography.draw();
                $("#formAddBarangayGeography")[0].reset();
                $('#modalAddBarangayGeography').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayGeography").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayGeography").removeClass('disabled');
            $("#iconAddBarangayGeography").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconAddBarangayGeography").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayGeography").addClass('disabled');
            $("#iconAddBarangayGeography").removeClass('fa fa-check');
        }
    });
}

function getBarangayGeographyById(id){
    $.ajax({
        url: "get_barangay_geography_by_id",
        method: "get",
        data: {
            barangayGeographyId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let formAddBarangayGeography = $('#formAddBarangayGeography');
            let barangayGeographyDetails = response['barangayGeographyDetails'];
            if(barangayGeographyDetails.length > 0){
                $("#textAddLandArea").val(barangayGeographyDetails[0].land_area);
                $("#textAddboundaries").val(barangayGeographyDetails[0].boundaries);
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

function editBarangayGeographyStatus(){
    $.ajax({
        url: "edit_barangay_geography_status",
        method: "post",
        data: $('#formEditBarangayGeographyStatus').serialize(),
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
                        dataTablesBarangayGeography.draw();
                    }
                    else{
                        toastr.success('Activation success!');
                        dataTablesBarangayGeography.draw();
                    }
                }
                $("#modalEditBarangayGeographyStatus").modal('hide');
                $("#formEditBarangayGeographyStatus")[0].reset();
            }
        
            $("#iconEditBarangayGeographyStatus").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayGeographyStatus").removeAttr('disabled');
            $("#iconEditBarangayGeographyStatus").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayGeographyStatus").addClass('spinner-border spinner-border-sm');
            $("#buttonEditBarangayGeographyStatus").addClass('disabled');
            $("#iconEditBarangayGeographyStatus").removeClass('fa fa-check');
        }
    });
}