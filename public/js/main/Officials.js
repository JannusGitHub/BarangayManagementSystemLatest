function addBarangayOfficial(){
    let formData = new FormData($('#formAddBarangayOfficial')[0]);

	$.ajax({
        url: "add_barangay_official",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayOfficial").addClass('spinner-border spinner-border-sm');
            $("#btnAddBarangayOfficial").addClass('disabled');
            $("#iconAddBarangayOfficial").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                if(response['error']['name'] === undefined){
                    $("#textAddName").removeClass('is-invalid');
                    $("#textAddName").attr('title', '');
                }
                else{
                    $("#textAddName").addClass('is-invalid');
                    $("#textAddName").attr('title', response['error']['name']);
                }
                if(response['error']['position'] === undefined){
                    $("#selectAddPosition").removeClass('is-invalid');
                    $("#selectAddPosition").attr('title', '');
                }
                else{
                    $("#selectAddPosition").addClass('is-invalid');
                    $("#selectAddPosition").attr('title', response['error']['position']);
                }
                if(response['error']['start_term'] === undefined){
                    $("#textAddStartTerm").removeClass('is-invalid');
                    $("#textAddStartTerm").attr('title', '');
                }
                else{
                    $("#textAddStartTerm").addClass('is-invalid');
                    $("#textAddStartTerm").attr('title', response['error']['start_term']);
                }

                if(response['error']['end_term'] === undefined){
                    $("#textAddEndTerm").removeClass('is-invalid');
                    $("#textAddEndTerm").attr('title', '');
                }
                else{
                    $("#textAddEndTerm").addClass('is-invalid');
                    $("#textAddEndTerm").attr('title', response['error']['end_term']);
                }

                if(response['error']['image'] === undefined){
                    $("#fileAddImage").removeClass('is-invalid');
                    $("#fileAddImage").attr('title', '');
                }
                else{
                    $("#fileAddImage").addClass('is-invalid');
                    $("#fileAddImage").attr('title', response['error']['image']);
                }

                if(response['error']['signature'] === undefined){
                    $("#fileAddSignature").removeClass('is-invalid');
                    $("#fileAddSignature").attr('title', '');
                }
                else{
                    $("#fileAddSignature").addClass('is-invalid');
                    $("#fileAddSignature").attr('title', response['error']['signature']);
                }

            }else if(response['hasError'] == 0){
                dataTablesBarangayOfficial.draw();
                $("#formAddBarangayOfficial")[0].reset();
                $('#modalAddBarangayOfficial').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayOfficial").removeClass('spinner-border spinner-border-sm');
            $("#btnAddBarangayOfficial").removeClass('disabled');
            $("#iconAddBarangayOfficial").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getBarangayOfficialById(id){
    $.ajax({
        url: "get_barangay_official_by_id",
        method: "get",
        data: {
            barangayOfficialId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let formAddBarangayOfficial = $('#formAddBarangayOfficial');
            let barangayOfficialDetails = response['barangayOfficialDetails'];
            if(barangayOfficialDetails.length > 0){
                $("#textAddName").val(barangayOfficialDetails[0].name);
                $("#selectAddPosition").val(barangayOfficialDetails[0].position);
                $("#textAddStartTerm").val(barangayOfficialDetails[0].start_term);
                $("#textAddEndTerm").val(barangayOfficialDetails[0].end_term);

                if(barangayOfficialDetails[0].photo != null){
                    $('#fileAddImage').addClass('d-none');
                    $('#textAddImage').removeClass('d-none');
                    $('#divReuploadImage').removeClass('d-none');

                    $('#textAddImage').val(barangayOfficialDetails[0].photo);
                }else{
                    $('#fileAddImage').removeClass('d-none');
                    $('#textAddImage').addClass('d-none');
                    $('#divReuploadImage').addClass('d-none');

                    $('#textAddImage').val('');
                }

                if(barangayOfficialDetails[0].signature != null){
                    $('#fileAddSignature').addClass('d-none');
                    $('#textAddSignature').removeClass('d-none');
                    $('#divReuploadSignature').removeClass('d-none');
                    $('#divUploadSignature').removeClass('d-none');

                    $('#textAddSignature').val(barangayOfficialDetails[0].signature);
                }else{
                    $('#fileAddSignature').removeClass('d-none');
                    $('#textAddSignature').addClass('d-none');
                    $('#divReuploadSignature').addClass('d-none');
                    $('#divUploadSignature').addClass('d-none');

                    $('#textAddSignature').val('');
                }

                $('#checkboxImage').on('click', function(){
                    if($('#checkboxImage').is(':checked')){
                        console.log('checked checkboxImage');
                        $('#fileAddImage').removeClass('d-none');
                        $('#textAddImage').addClass('d-none');
                    }else{
                        console.log('not checked checkboxImage');
                        $('#fileAddImage').addClass('d-none');
                        $('#textAddImage').removeClass('d-none');
                    }
                });
                
                $('#checkboxSignature').on('click', function(){
                    if($('#checkboxSignature').is(':checked')){
                        console.log('checked checkboxSignature');
                        $('#fileAddSignature').removeClass('d-none');
                        $('#textAddSignature').addClass('d-none');
                    }else{
                        console.log('not checked checkboxSignature');
                        $('#fileAddSignature').addClass('d-none');
                        $('#textAddSignature').removeClass('d-none');
                    }
                });
            }
            else{
                toastr.warning('No Barangay Official records found!');
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        },
    });
}

function editBarangayOfficialStatus(){
    $.ajax({
        url: "edit_barangay_official_status",
        method: "post",
        data: $('#formEditBarangayOfficialStatus').serialize(),
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
                        toastr.success('Disabled success!');
                        dataTablesBarangayOfficial.draw();
                    }
                    else{
                        toastr.success('Enabled success!');
                        dataTablesBarangayOfficial.draw();
                    }
                }
                $("#modalEditBarangayOfficialStatus").modal('hide');
                $("#formEditBarangayOfficialStatus")[0].reset();
            }
            
            $("#iconEditBarangayOfficial").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayOfficialStatus").removeAttr('disabled');
            $("#iconEditBarangayOfficial").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayOfficial").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayOfficialStatus").removeAttr('disabled');
            $("#iconEditBarangayOfficial").addClass('fa fa-check');
        }
    });
}