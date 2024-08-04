function addIndigencyCertificate(){
    let formData = new FormData($('#formAddIndigencyCertificate')[0]);

	$.ajax({
        url: "add_indigency_certificate",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddIndigencyCertificate").addClass('spinner-border spinner-border-sm');
            $("#buttonAddIndigencyCertificate").addClass('disabled');
            $("#iconAddIndigencyCertificate").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                
                if(response['error']['purpose'] === undefined){
                    $("#textPurpose").removeClass('is-invalid');
                    $("#textPurpose").attr('title', '');
                }
                else{
                    $("#textPurpose").addClass('is-invalid');
                    $("#textPurpose").attr('title', response['error']['purpose']);
                }
                if(response['error']['or_number'] === undefined){
                    $("#textORNumber").removeClass('is-invalid');
                    $("#textORNumber").attr('title', '');
                }
                else{
                    $("#textORNumber").addClass('is-invalid');
                    $("#textORNumber").attr('title', response['error']['or_number']);
                }
                if(response['error']['issued_on'] === undefined){
                    $("#textIssuedOn").removeClass('is-invalid');
                    $("#textIssuedOn").attr('title', '');
                }
                else{
                    $("#textIssuedOn").addClass('is-invalid');
                    $("#textIssuedOn").attr('title', response['error']['issued_on']);
                }
                if(response['error']['remarks'] === undefined){
                    $("#textRemarks").removeClass('is-invalid');
                    $("#textRemarks").attr('title', '');
                }
                else{
                    $("#textRemarks").addClass('is-invalid');
                    $("#textRemarks").attr('title', response['error']['remarks']);
                }
                if(response['error']['status'] === undefined){
                    $("#textStatus").removeClass('is-invalid');
                    $("#textStatus").attr('title', '');
                }
                else{
                    $("#textStatus").addClass('is-invalid');
                    $("#textStatus").attr('title', response['error']['status']);
                }

            }else if(response['hasError'] == 0){
                dataTablesIndigencyCertificate.draw();
                $("#formAddIndigencyCertificate")[0].reset();
                $('#modalAddIndigencyCertificate').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddIndigencyCertificate").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddIndigencyCertificate").removeClass('disabled');
            $("#iconAddIndigencyCertificate").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getIndigencyCertificateById(id){
    $.ajax({
        url: "get_indigency_certificate_by_id",
        method: "get",
        data: {
            indigencyCertificateId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let indigencyCertificateDetails = response['indigencyCertificateDetails'];
            if(indigencyCertificateDetails.length > 0){
                $("#selectResident").val(indigencyCertificateDetails[0].barangay_resident_id).trigger('change');
                $("#textPurpose").val(indigencyCertificateDetails[0].purpose);
                $("#textORNumber").val(indigencyCertificateDetails[0].or_number);
                $("#textIssuedOn").val(moment(indigencyCertificateDetails[0].issued_on).format("YYYY-MM-DD"));
                $("#textRemarks").val(indigencyCertificateDetails[0].remarks);
                $("#selectStatus").val(indigencyCertificateDetails[0].status).trigger('change');
                $("#textTicketNumber").val(indigencyCertificateDetails[0].ticket_number).trigger('change');
                $("#textTicketDate").val(indigencyCertificateDetails[0].ticket_datetime).trigger('change');

                if(indigencyCertificateDetails[0]['issuance_configuration_info'] != null){
                    let processingTime = "";
                    if(indigencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 1){
                        processingTime = '1 Day';
                    }
                    else if(indigencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 2){
                        processingTime = '2 Days';
                    }
                    else if(indigencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 3){
                        processingTime = '3 Days';
                    }
                    else if(indigencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 4){
                        processingTime = '4 Days';
                    }
                    else if(indigencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 5){
                        processingTime = '5 Days';
                    }
                    else if(indigencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 6){
                        processingTime = '1 Week';
                    }
                    else if(indigencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 7){
                        processingTime = '2 Weeks';
                    }
                    else if(indigencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 8){
                        processingTime = '3 Weeks';
                    }
                    else if(indigencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 9){
                        processingTime = '1 Month';
                    }

                    $("#textTotalAmount").val(indigencyCertificateDetails[0]['issuance_configuration_info'].amount).trigger('change');
                    $("#textProcessingTime").val(processingTime).trigger('change');
                    $("#issuanceConfigurationId").val(indigencyCertificateDetails[0].issuance_configuration_id).trigger('change');
                }
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

function addRequestIndigencyCertificate(){
    let formData = new FormData($('#formAddRequestIndigencyCertificate')[0]);

	$.ajax({
        url: "add_request_indigency_certificate",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddRequestIndigencyCertificate").addClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestIndigencyCertificate").addClass('disabled');
            $("#iconAddRequestIndigencyCertificate").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                
                if(response['error']['purpose'] === undefined){
                    $("#textPurpose").removeClass('is-invalid');
                    $("#textPurpose").attr('title', '');
                }
                else{
                    $("#textPurpose").addClass('is-invalid');
                    $("#textPurpose").attr('title', response['error']['purpose']);
                }
                if(response['error']['or_number'] === undefined){
                    $("#textORNumber").removeClass('is-invalid');
                    $("#textORNumber").attr('title', '');
                }
                else{
                    $("#textORNumber").addClass('is-invalid');
                    $("#textORNumber").attr('title', response['error']['or_number']);
                }
                if(response['error']['amount_collection'] === undefined){
                    $("#textAmountCollection").removeClass('is-invalid');
                    $("#textAmountCollection").attr('title', '');
                }
                else{
                    $("#textAmountCollection").addClass('is-invalid');
                    $("#textAmountCollection").attr('title', response['error']['amount_collection']);
                }
                if(response['error']['issued_on'] === undefined){
                    $("#textIssuedOn").removeClass('is-invalid');
                    $("#textIssuedOn").attr('title', '');
                }
                else{
                    $("#textIssuedOn").addClass('is-invalid');
                    $("#textIssuedOn").attr('title', response['error']['issued_on']);
                }
                if(response['error']['remarks'] === undefined){
                    $("#textRemarks").removeClass('is-invalid');
                    $("#textRemarks").attr('title', '');
                }
                else{
                    $("#textRemarks").addClass('is-invalid');
                    $("#textRemarks").attr('title', response['error']['remarks']);
                }
                if(response['error']['status'] === undefined){
                    $("#textStatus").removeClass('is-invalid');
                    $("#textStatus").attr('title', '');
                }
                else{
                    $("#textStatus").addClass('is-invalid');
                    $("#textStatus").attr('title', response['error']['status']);
                }

            }else if(response['hasError'] == 0){
                dataTablesRequestIndigencyCertificate.draw();
                $("#formAddRequestIndigencyCertificate")[0].reset();
                $('#modalAddRequestIndigencyCertificate').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddRequestIndigencyCertificate").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestIndigencyCertificate").removeClass('disabled');
            $("#iconAddRequestIndigencyCertificate").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}