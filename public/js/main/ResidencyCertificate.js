function addResidencyCertificate(){
    let formData = new FormData($('#formAddResidencyCertificate')[0]);

	$.ajax({
        url: "add_residency_certificate",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddResidencyCertificate").addClass('spinner-border spinner-border-sm');
            $("#buttonAddResidencyCertificate").addClass('disabled');
            $("#iconAddResidencyCertificate").removeClass('fa fa-check');
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
                dataTablesResidencyCertificate.draw();
                $("#formAddResidencyCertificate")[0].reset();
                $('#modalAddResidencyCertificate').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddResidencyCertificate").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddResidencyCertificate").removeClass('disabled');
            $("#iconAddResidencyCertificate").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getResidencyCertificateById(id){
    $.ajax({
        url: "get_residency_certificate_by_id",
        method: "get",
        data: {
            residencyCertificateId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let residencyCertificateDetails = response['residencyCertificateDetails'];
            if(residencyCertificateDetails.length > 0){
                console.log('moment ',moment(residencyCertificateDetails[0].issued_on).format("YYYY/MM/DD"));
                $("#selectResident").val(residencyCertificateDetails[0].barangay_resident_id).trigger('change');
                $("#textPurpose").val(residencyCertificateDetails[0].purpose);
                $("#textORNumber").val(residencyCertificateDetails[0].or_number);
                $("#textIssuedOn").val(moment(residencyCertificateDetails[0].issued_on).format("YYYY-MM-DD"));
                $("#textRemarks").val(residencyCertificateDetails[0].remarks);
                $("#selectStatus").val(residencyCertificateDetails[0].status).trigger('change');

                $("#textTicketNumber").val(residencyCertificateDetails[0].ticket_number).trigger('change');
                $("#textTicketDate").val(residencyCertificateDetails[0].ticket_datetime).trigger('change');
                if(residencyCertificateDetails[0]['issuance_configuration_info'] != null){
                    let processingTime = "";
                    if(residencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 1){
                        processingTime = '1 Day';
                    }
                    else if(residencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 2){
                        processingTime = '2 Days';
                    }
                    else if(residencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 3){
                        processingTime = '3 Days';
                    }
                    else if(residencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 4){
                        processingTime = '4 Days';
                    }
                    else if(residencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 5){
                        processingTime = '5 Days';
                    }
                    else if(residencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 6){
                        processingTime = '1 Week';
                    }
                    else if(residencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 7){
                        processingTime = '2 Weeks';
                    }
                    else if(residencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 8){
                        processingTime = '3 Weeks';
                    }
                    else if(residencyCertificateDetails[0]['issuance_configuration_info'].processing_time == 9){
                        processingTime = '1 Month';
                    }

                    $("#textTotalAmount").val(residencyCertificateDetails[0]['issuance_configuration_info'].amount).trigger('change');
                    $("#textProcessingTime").val(processingTime).trigger('change');
                    $("#issuanceConfigurationId").val(residencyCertificateDetails[0].issuance_configuration_id).trigger('change');
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


function addRequestResidencyCertificate(){
    let formData = new FormData($('#formAddRequestResidencyCertificate')[0]);

	$.ajax({
        url: "add_request_residency_certificate",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddRequestResidencyCertificate").addClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestResidencyCertificate").addClass('disabled');
            $("#iconAddRequestResidencyCertificate").removeClass('fa fa-check');
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
                dataTablesRequestResidencyCertificate.draw();
                $("#formAddRequestResidencyCertificate")[0].reset();
                $('#modalAddRequestResidencyCertificate').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddRequestResidencyCertificate").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestResidencyCertificate").removeClass('disabled');
            $("#iconAddRequestResidencyCertificate").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}