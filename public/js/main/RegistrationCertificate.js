function addRegistrationCertificate(){
    let formData = new FormData($('#formAddRegistrationCertificate')[0]);

	$.ajax({
        url: "add_registration_certificate",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddRegistrationCertificate").addClass('spinner-border spinner-border-sm');
            $("#buttonAddRegistrationCertificate").addClass('disabled');
            $("#iconAddRegistrationCertificate").removeClass('fa fa-check');
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
                if(response['error']['name_of_driver'] === undefined){
                    $("#textNameOfDriver").removeClass('is-invalid');
                    $("#textNameOfDriver").attr('title', '');
                }
                else{
                    $("#textNameOfDriver").addClass('is-invalid');
                    $("#textNameOfDriver").attr('title', response['error']['name_of_driver']);
                }
                if(response['error']['license_number'] === undefined){
                    $("#textLicenseNumber").removeClass('is-invalid');
                    $("#textLicenseNumber").attr('title', '');
                }
                else{
                    $("#textLicenseNumber").addClass('is-invalid');
                    $("#textLicenseNumber").attr('title', response['error']['license_number']);
                }
                if(response['error']['registered_plate_number'] === undefined){
                    $("#textRegisteredPlateNumber").removeClass('is-invalid');
                    $("#textRegisteredPlateNumber").attr('title', '');
                }
                else{
                    $("#textRegisteredPlateNumber").addClass('is-invalid');
                    $("#textRegisteredPlateNumber").attr('title', response['error']['registered_plate_number']);
                }
                if(response['error']['issued_on'] === undefined){
                    $("#textIssuedOn").removeClass('is-invalid');
                    $("#textIssuedOn").attr('title', '');
                }
                else{
                    $("#textIssuedOn").addClass('is-invalid');
                    $("#textIssuedOn").attr('title', response['error']['issued_on']);
                }
                if(response['error']['issued_at'] === undefined){
                    $("#textIssuedAt").removeClass('is-invalid');
                    $("#textIssuedAt").attr('title', '');
                }
                else{
                    $("#textIssuedAt").addClass('is-invalid');
                    $("#textIssuedAt").attr('title', response['error']['issued_at']);
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
                dataTablesRegistrationCertificate.draw();
                $("#formAddRegistrationCertificate")[0].reset();
                $('#modalAddRegistrationCertificate').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddRegistrationCertificate").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddRegistrationCertificate").removeClass('disabled');
            $("#iconAddRegistrationCertificate").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getRegistrationCertificateById(id){
    $.ajax({
        url: "get_registration_certificate_by_id",
        method: "get",
        data: {
            registrationCertificateId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let registrationCertificateDetails = response['registrationCertificateDetails'];
            if(registrationCertificateDetails.length > 0){
                console.log('moment ',moment(registrationCertificateDetails[0].issued_on).format("YYYY/MM/DD"));
                $("#selectResident").val(registrationCertificateDetails[0].barangay_resident_id).trigger('change');
                $("#textPurpose").val(registrationCertificateDetails[0].purpose);
                $("#textORNumber").val(registrationCertificateDetails[0].or_number);
                $("#textNameOfDriver").val(registrationCertificateDetails[0].name_of_driver);
                $("#textLicenseNumber").val(registrationCertificateDetails[0].license_number);
                $("#textRegisteredPlateNumber").val(registrationCertificateDetails[0].registered_plate_number);
                $("#textIssuedOn").val(moment(registrationCertificateDetails[0].issued_on).format("YYYY-MM-DD"));
                $("#textIssuedAt").val(registrationCertificateDetails[0].issued_at);
                $("#textRemarks").val(registrationCertificateDetails[0].remarks);
                $("#selectStatus").val(registrationCertificateDetails[0].status).trigger('change');

                $("#textTicketNumber").val(registrationCertificateDetails[0].ticket_number).trigger('change');
                $("#textTicketDate").val(registrationCertificateDetails[0].ticket_datetime).trigger('change');
                if(registrationCertificateDetails[0]['issuance_configuration_info'] != null){
                    let processingTime = "";
                    if(registrationCertificateDetails[0]['issuance_configuration_info'].processing_time == 1){
                        processingTime = '1 Day';
                    }
                    else if(registrationCertificateDetails[0]['issuance_configuration_info'].processing_time == 2){
                        processingTime = '2 Days';
                    }
                    else if(registrationCertificateDetails[0]['issuance_configuration_info'].processing_time == 3){
                        processingTime = '3 Days';
                    }
                    else if(registrationCertificateDetails[0]['issuance_configuration_info'].processing_time == 4){
                        processingTime = '4 Days';
                    }
                    else if(registrationCertificateDetails[0]['issuance_configuration_info'].processing_time == 5){
                        processingTime = '5 Days';
                    }
                    else if(registrationCertificateDetails[0]['issuance_configuration_info'].processing_time == 6){
                        processingTime = '1 Week';
                    }
                    else if(registrationCertificateDetails[0]['issuance_configuration_info'].processing_time == 7){
                        processingTime = '2 Weeks';
                    }
                    else if(registrationCertificateDetails[0]['issuance_configuration_info'].processing_time == 8){
                        processingTime = '3 Weeks';
                    }
                    else if(registrationCertificateDetails[0]['issuance_configuration_info'].processing_time == 9){
                        processingTime = '1 Month';
                    }

                    $("#textTotalAmount").val(registrationCertificateDetails[0]['issuance_configuration_info'].amount).trigger('change');
                    $("#textProcessingTime").val(processingTime).trigger('change');
                    $("#issuanceConfigurationId").val(registrationCertificateDetails[0].issuance_configuration_id).trigger('change');
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

function addRequestRegistrationCertificate(){
    let formData = new FormData($('#formAddRequestRegistrationCertificate')[0]);

	$.ajax({
        url: "add_request_registration_certificate",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddRequestRegistrationCertificate").addClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestRegistrationCertificate").addClass('disabled');
            $("#iconAddRequestRegistrationCertificate").removeClass('fa fa-check');
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
                if(response['error']['name_of_driver'] === undefined){
                    $("#textNameOfDriver").removeClass('is-invalid');
                    $("#textNameOfDriver").attr('title', '');
                }
                else{
                    $("#textNameOfDriver").addClass('is-invalid');
                    $("#textNameOfDriver").attr('title', response['error']['name_of_driver']);
                }
                if(response['error']['license_number'] === undefined){
                    $("#textLicenseNumber").removeClass('is-invalid');
                    $("#textLicenseNumber").attr('title', '');
                }
                else{
                    $("#textLicenseNumber").addClass('is-invalid');
                    $("#textLicenseNumber").attr('title', response['error']['license_number']);
                }
                if(response['error']['registered_plate_number'] === undefined){
                    $("#textRegisteredPlateNumber").removeClass('is-invalid');
                    $("#textRegisteredPlateNumber").attr('title', '');
                }
                else{
                    $("#textRegisteredPlateNumber").addClass('is-invalid');
                    $("#textRegisteredPlateNumber").attr('title', response['error']['registered_plate_number']);
                }
                if(response['error']['remarks'] === undefined){
                    $("#textRemarks").removeClass('is-invalid');
                    $("#textRemarks").attr('title', '');
                }
                else{
                    $("#textRemarks").addClass('is-invalid');
                    $("#textRemarks").attr('title', response['error']['remarks']);
                }

            }else if(response['hasError'] == 0){
                dataTablesRequestRegistrationCertificate.draw();
                $("#formAddRequestRegistrationCertificate")[0].reset();
                $('#modalAddRequestRegistrationCertificate').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddRequestRegistrationCertificate").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestRegistrationCertificate").removeClass('disabled');
            $("#iconAddRequestRegistrationCertificate").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}