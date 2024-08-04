function addBarangaySchool(){
    let formData = new FormData($('#formAddBarangaySchool')[0]);

	$.ajax({
        url: "add_barangay_school",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangaySchool").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangaySchool").addClass('disabled');
            $("#iconAddBarangaySchool").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                
                if(response['error']['pre_elementary'] === undefined){
                    $("#textAddPreElementary").removeClass('is-invalid');
                    $("#textAddPreElementary").attr('title', '');
                }
                else{
                    $("#textAddPreElementary").addClass('is-invalid');
                    $("#textAddPreElementary").attr('title', response['error']['pre_elementary']);
                }
                if(response['error']['pre_elementary_and_elementary'] === undefined){
                    $("#textAddPreElementaryAndElementary").removeClass('is-invalid');
                    $("#textAddPreElementaryAndElementary").attr('title', '');
                }
                else{
                    $("#textAddPreElementaryAndElementary").addClass('is-invalid');
                    $("#textAddPreElementaryAndElementary").attr('title', response['error']['pre_elementary_and_elementary']);
                }
                if(response['error']['secondary'] === undefined){
                    $("#textAddSecondary").removeClass('is-invalid');
                    $("#textAddSecondary").attr('title', '');
                }
                else{
                    $("#textAddSecondary").addClass('is-invalid');
                    $("#textAddSecondary").attr('title', response['error']['secondary']);
                }

            }else if(response['hasError'] == 0){
                dataTablesBarangaySchool.draw();
                $("#formAddBarangaySchool")[0].reset();
                $('#modalAddBarangaySchool').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangaySchool").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangaySchool").removeClass('disabled');
            $("#iconAddBarangaySchool").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconAddBarangaySchool").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangaySchool").addClass('disabled');
            $("#iconAddBarangaySchool").removeClass('fa fa-check');
        }
    });
}

function getBarangaySchoolById(id){
    $.ajax({
        url: "get_barangay_school_by_id",
        method: "get",
        data: {
            barangaySchoolId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let formAddBarangaySchool = $('#formAddBarangaySchool');
            let barangaySchoolDetails = response['barangaySchoolDetails'];
            
            if(barangaySchoolDetails.length > 0){
                $("#textAddPreElementary").val(barangaySchoolDetails[0].pre_elementary);
                $("#textAddPreElementaryAndElementary").val(barangaySchoolDetails[0].pre_elementary_and_elementary);
                $("#textAddSecondary").val(barangaySchoolDetails[0].secondary);
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

function editBarangaySchoolStatus(){
    $.ajax({
        url: "edit_barangay_school_status",
        method: "post",
        data: $('#formEditBarangaySchoolStatus').serialize(),
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
                        dataTablesBarangaySchool.draw();
                    }
                    else{
                        toastr.success('Activation success!');
                        dataTablesBarangaySchool.draw();
                    }
                }
                $("#modalEditBarangaySchoolStatus").modal('hide');
                $("#formEditBarangaySchoolStatus")[0].reset();
            }
            
            $("#iconEditBarangaySchoolStatus").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangaySchoolStatus").removeAttr('disabled');
            $("#iconEditBarangaySchoolStatus").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangaySchoolStatus").addClass('spinner-border spinner-border-sm');
            $("#buttonEditBarangaySchoolStatus").addClass('disabled');
            $("#iconEditBarangaySchoolStatus").removeClass('fa fa-check');
        }
    });
}