function addLicensePermitCertificate(){
    let formData = new FormData($('#formAddLicensePermitCertificate')[0]);

	$.ajax({
        url: "add_license_permit_certificate",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddLicensePermitCertificate").addClass('spinner-border spinner-border-sm');
            $("#buttonAddLicensePermitCertificate").addClass('disabled');
            $("#iconAddLicensePermitCertificate").removeClass('fa fa-check');
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
                if(response['error']['business_name'] === undefined){
                    $("#textBusinessName").removeClass('is-invalid');
                    $("#textBusinessName").attr('title', '');
                }
                else{
                    $("#textBusinessName").addClass('is-invalid');
                    $("#textBusinessName").attr('title', response['error']['business_name']);
                }
                if(response['error']['location'] === undefined){
                    $("#textLocation").removeClass('is-invalid');
                    $("#textLocation").attr('title', '');
                }
                else{
                    $("#textLocation").addClass('is-invalid');
                    $("#textLocation").attr('title', response['error']['location']);
                }
                if(response['error']['nature_of_business'] === undefined){
                    $("#textNatureOfBusiness").removeClass('is-invalid');
                    $("#textNatureOfBusiness").attr('title', '');
                }
                else{
                    $("#textNatureOfBusiness").addClass('is-invalid');
                    $("#textNatureOfBusiness").attr('title', response['error']['nature_of_business']);
                }
                if(response['error']['community_tax_cert'] === undefined){
                    $("#textCommunityTaxCert").removeClass('is-invalid');
                    $("#textCommunityTaxCert").attr('title', '');
                }
                else{
                    $("#textCommunityTaxCert").addClass('is-invalid');
                    $("#textCommunityTaxCert").attr('title', response['error']['community_tax_cert']);
                }
                if(response['error']['gross_sales_income'] === undefined){
                    $("#textGrossSalesIncome").removeClass('is-invalid');
                    $("#textGrossSalesIncome").attr('title', '');
                }
                else{
                    $("#textGrossSalesIncome").addClass('is-invalid');
                    $("#textGrossSalesIncome").attr('title', response['error']['gross_sales_income']);
                }
                if(response['error']['amount_collected'] === undefined){
                    $("#textAmountCollected").removeClass('is-invalid');
                    $("#textAmountCollected").attr('title', '');
                }
                else{
                    $("#textAmountCollected").addClass('is-invalid');
                    $("#textAmountCollected").attr('title', response['error']['amount_collected']);
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
                if(response['error']['registration_number'] === undefined){
                    $("#textRegistrationNumber").removeClass('is-invalid');
                    $("#textRegistrationNumber").attr('title', '');
                }
                else{
                    $("#textRegistrationNumber").addClass('is-invalid');
                    $("#textRegistrationNumber").attr('title', response['error']['registration_number']);
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
                dataTablesLicensePermitCertificate.draw();
                $("#formAddLicensePermitCertificate")[0].reset();
                $('#modalAddLicensePermitCertificate').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddLicensePermitCertificate").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddLicensePermitCertificate").removeClass('disabled');
            $("#iconAddLicensePermitCertificate").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getLicensePermitCertificateById(id){
    $.ajax({
        url: "get_license_permit_certificate_by_id",
        method: "get",
        data: {
            licensePermitCertificateId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let licensePermitCertificateDetails = response['licensePermitCertificateDetails'];
            if(licensePermitCertificateDetails.length > 0){
                // console.log('moment ',moment(liscensePermitCertificateDetails[0].issued_on).format("YYYY/MM/DD"));
                $("#selectResident").val(licensePermitCertificateDetails[0].barangay_resident_id).trigger('change');
                $("#textPurpose").val(licensePermitCertificateDetails[0].purpose);
                $("#textORNumber").val(licensePermitCertificateDetails[0].or_number);
                $("#textBusinessName").val(licensePermitCertificateDetails[0].business_name);
                $("#textLocation").val(licensePermitCertificateDetails[0].location);
                $("#textNatureOfBusiness").val(licensePermitCertificateDetails[0].nature_of_business);
                $("#textCommunityTaxCert").val(licensePermitCertificateDetails[0].community_tax_cert);
                $("#textGrossSalesIncome").val(licensePermitCertificateDetails[0].gross_sales_income);
                $("#textAmountCollected").val(licensePermitCertificateDetails[0].amount_collected);
                $("#textRegistrationNumber").val(licensePermitCertificateDetails[0].registration_number);
                $("#textIssuedOn").val(moment(licensePermitCertificateDetails[0].issued_on).format("YYYY-MM-DD"));
                $("#textIssuedAt").val(licensePermitCertificateDetails[0].issued_at);
                $("#textRemarks").val(licensePermitCertificateDetails[0].remarks);
                $("#selectStatus").val(licensePermitCertificateDetails[0].status).trigger('change');

                $("#textTicketNumber").val(licensePermitCertificateDetails[0].ticket_number).trigger('change');
                $("#textTicketDate").val(licensePermitCertificateDetails[0].ticket_datetime).trigger('change');
                if(licensePermitCertificateDetails[0]['issuance_configuration_info'] != null){
                    console.log('not null');
                    let processingTime = "";
                    if(licensePermitCertificateDetails[0]['issuance_configuration_info'].processing_time == 1){
                        processingTime = '1 Day';
                    }
                    else if(licensePermitCertificateDetails[0]['issuance_configuration_info'].processing_time == 2){
                        processingTime = '2 Days';
                    }
                    else if(licensePermitCertificateDetails[0]['issuance_configuration_info'].processing_time == 3){
                        processingTime = '3 Days';
                    }
                    else if(licensePermitCertificateDetails[0]['issuance_configuration_info'].processing_time == 4){
                        processingTime = '4 Days';
                    }
                    else if(licensePermitCertificateDetails[0]['issuance_configuration_info'].processing_time == 5){
                        processingTime = '5 Days';
                    }
                    else if(licensePermitCertificateDetails[0]['issuance_configuration_info'].processing_time == 6){
                        processingTime = '1 Week';
                    }
                    else if(licensePermitCertificateDetails[0]['issuance_configuration_info'].processing_time == 7){
                        processingTime = '2 Weeks';
                    }
                    else if(licensePermitCertificateDetails[0]['issuance_configuration_info'].processing_time == 8){
                        processingTime = '3 Weeks';
                    }
                    else if(licensePermitCertificateDetails[0]['issuance_configuration_info'].processing_time == 9){
                        processingTime = '1 Month';
                    }

                    $("#textTotalAmount").val(licensePermitCertificateDetails[0]['issuance_configuration_info'].amount).trigger('change');
                    $("#textProcessingTime").val(processingTime).trigger('change');
                    $("#issuanceConfigurationId").val(licensePermitCertificateDetails[0].issuance_configuration_id).trigger('change');
                }else{
                    console.log('null');
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

function addRequestLicensePermitCertificate(){
    let formData = new FormData($('#formAddRequestLicensePermitCertificate')[0]);

	$.ajax({
        url: "add_request_license_permit_certificate",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddRequestLicensePermitCertificate").addClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestLicensePermitCertificate").addClass('disabled');
            $("#iconAddRequestLicensePermitCertificate").removeClass('fa fa-check');
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
                if(response['error']['business_name'] === undefined){
                    $("#textBusinessName").removeClass('is-invalid');
                    $("#textBusinessName").attr('title', '');
                }
                else{
                    $("#textBusinessName").addClass('is-invalid');
                    $("#textBusinessName").attr('title', response['error']['business_name']);
                }
                if(response['error']['location'] === undefined){
                    $("#textLocation").removeClass('is-invalid');
                    $("#textLocation").attr('title', '');
                }
                else{
                    $("#textLocation").addClass('is-invalid');
                    $("#textLocation").attr('title', response['error']['location']);
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
                dataTablesRequestLicensePermitCertificate.draw();
                $("#formAddRequestLicensePermitCertificate")[0].reset();
                $('#modalAddRequestLicensePermitCertificate').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddRequestLicensePermitCertificate").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestLicensePermitCertificate").removeClass('disabled');
            $("#iconAddRequestLicensePermitCertificate").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}