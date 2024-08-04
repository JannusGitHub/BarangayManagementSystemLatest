function addBarangayDemography(){
    let formData = new FormData($('#formAddBarangayDemography')[0]);

	$.ajax({
        url: "add_barangay_demography",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayDemography").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayDemography").addClass('disabled');
            $("#iconAddBarangayDemography").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                
                if(response['error']['year'] === undefined){
                    $("#textAddYear").removeClass('is-invalid');
                    $("#textAddYear").attr('title', '');
                }
                else{
                    $("#textAddYear").addClass('is-invalid');
                    $("#textAddYear").attr('title', response['error']['year']);
                }
                if(response['error']['total_population'] === undefined){
                    $("#textAddTotalPopulation").removeClass('is-invalid');
                    $("#textAddTotalPopulation").attr('title', '');
                }
                else{
                    $("#textAddTotalPopulation").addClass('is-invalid');
                    $("#textAddTotalPopulation").attr('title', response['error']['total_population']);
                }
                if(response['error']['number_of_household'] === undefined){
                    $("#textAddNumberOfHousehold").removeClass('is-invalid');
                    $("#textAddNumberOfHousehold").attr('title', '');
                }
                else{
                    $("#textAddNumberOfHousehold").addClass('is-invalid');
                    $("#textAddNumberOfHousehold").attr('title', response['error']['number_of_household']);
                }

            }else if(response['hasError'] == 0){
                dataTablesBarangayDemography.draw();
                $("#formAddBarangayDemography")[0].reset();
                $('#modalAddBarangayDemography').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayDemography").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayDemography").removeClass('disabled');
            $("#iconAddBarangayDemography").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconAddBarangayDemography").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayDemography").addClass('disabled');
            $("#iconAddBarangayDemography").removeClass('fa fa-check');
        }
    });
}

function getBarangayDemographyById(id){
    $.ajax({
        url: "get_barangay_demography_by_id",
        method: "get",
        data: {
            barangayDemographyId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let formAddBarangayDemography = $('#formAddBarangayDemography');
            let barangayDemographyDetails = response['barangayDemographyDetails'];
            if(barangayDemographyDetails.length > 0){
                $("#textAddYear").val(barangayDemographyDetails[0].year);
                $("#textAddTotalPopulation").val(barangayDemographyDetails[0].total_population);
                $("#textAddNumberOfHousehold").val(barangayDemographyDetails[0].number_of_household);
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

function editBarangayDemographyStatus(){
    $.ajax({
        url: "edit_barangay_demography_status",
        method: "post",
        data: $('#formEditBarangayDemographyStatus').serialize(),
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
                        dataTablesBarangayDemography.draw();
                    }
                    else{
                        toastr.success('Activation success!');
                        dataTablesBarangayDemography.draw();
                    }
                }
                $("#modalEditBarangayDemographyStatus").modal('hide');
                $("#formEditBarangayDemographyStatus")[0].reset();
            }
            
            $("#iconEditBarangayDemographyStatus").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayDemographyStatus").removeAttr('disabled');
            $("#iconEditBarangayDemographyStatus").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayDemographyStatus").addClass('spinner-border spinner-border-sm');
            $("#buttonEditBarangayDemographyStatus").addClass('disabled');
            $("#iconEditBarangayDemographyStatus").removeClass('fa fa-check');
        }
    });
}