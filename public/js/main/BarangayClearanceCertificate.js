function addBarangayClearanceCertificate(){
    let formData = new FormData($('#formAddBarangayClearanceCertificate')[0]);

	$.ajax({
        url: "add_barangay_clearance_certificate",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayClearanceCertificate").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayClearanceCertificate").addClass('disabled');
            $("#iconAddBarangayClearanceCertificate").removeClass('fa fa-check');
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
                dataTablesBarangayClearanceCertificate.draw();
                $("#formAddBarangayClearanceCertificate")[0].reset();
                $('#modalAddBarangayClearanceCertificate').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayClearanceCertificate").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayClearanceCertificate").removeClass('disabled');
            $("#iconAddBarangayClearanceCertificate").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}


function getBarangayClearanceCertificateById(id){
    $.ajax({
        url: "get_barangay_clearance_certificate_by_id",
        method: "get",
        data: {
            barangayClearanceCertificateId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let barangayClearanceCertificateDetails = response['barangayClearanceCertificateDetails'];
            if(barangayClearanceCertificateDetails.length > 0){
                let processingTime = "";

                if(barangayClearanceCertificateDetails[0]['issuance_configuration_info'].processing_time == 1){
                    processingTime = '1 Day';
                }
                else if(barangayClearanceCertificateDetails[0]['issuance_configuration_info'].processing_time == 2){
                    processingTime = '2 Days';
                }
                else if(barangayClearanceCertificateDetails[0]['issuance_configuration_info'].processing_time == 3){
                    processingTime = '3 Days';
                }
                else if(barangayClearanceCertificateDetails[0]['issuance_configuration_info'].processing_time == 4){
                    processingTime = '4 Days';
                }
                else if(barangayClearanceCertificateDetails[0]['issuance_configuration_info'].processing_time == 5){
                    processingTime = '5 Days';
                }
                else if(barangayClearanceCertificateDetails[0]['issuance_configuration_info'].processing_time == 6){
                    processingTime = '1 Week';
                }
                else if(barangayClearanceCertificateDetails[0]['issuance_configuration_info'].processing_time == 7){
                    processingTime = '2 Weeks';
                }
                else if(barangayClearanceCertificateDetails[0]['issuance_configuration_info'].processing_time == 8){
                    processingTime = '3 Weeks';
                }
                else if(barangayClearanceCertificateDetails[0]['issuance_configuration_info'].processing_time == 9){
                    processingTime = '1 Month';
                }

                $("#selectResident").val(barangayClearanceCertificateDetails[0].barangay_resident_id).trigger('change');
                $("#textPurpose").val(barangayClearanceCertificateDetails[0].purpose);
                $("#textORNumber").val(barangayClearanceCertificateDetails[0].or_number);
                $("#textAmountCollection").val(barangayClearanceCertificateDetails[0].amount_collection);
                $("#textIssuedOn").val(moment(barangayClearanceCertificateDetails[0].issued_on).format("YYYY-MM-DD"));
                $("#textRemarks").val(barangayClearanceCertificateDetails[0].remarks);
                $("#selectStatus").val(barangayClearanceCertificateDetails[0].status).trigger('change');

                $("#textTicketNumber").val(barangayClearanceCertificateDetails[0].ticket_number).trigger('change');
                $("#textTicketDate").val(barangayClearanceCertificateDetails[0].ticket_datetime).trigger('change');
                $("#textTotalAmount").val(barangayClearanceCertificateDetails[0]['issuance_configuration_info'].amount).trigger('change');
                $("#textProcessingTime").val(processingTime).trigger('change');
                $("#issuanceConfigurationId").val(barangayClearanceCertificateDetails[0].issuance_configuration_id).trigger('change');
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


function addRequestBarangayClearanceCertificate(){
    let formData = new FormData($('#formAddRequestBarangayClearanceCertificate')[0]);

	$.ajax({
        url: "add_request_barangay_clearance_certificate",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddRequestBarangayClearanceCertificate").addClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestBarangayClearanceCertificate").addClass('disabled');
            $("#iconAddRequestBarangayClearanceCertificate").removeClass('fa fa-check');
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
                dataTablesRequestBarangayClearanceCertificate.draw();
                $("#formAddRequestBarangayClearanceCertificate")[0].reset();
                $('#modalAddRequestBarangayClearanceCertificate').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddRequestBarangayClearanceCertificate").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestBarangayClearanceCertificate").removeClass('disabled');
            $("#iconAddRequestBarangayClearanceCertificate").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getRequestBarangayClearanceCertificateById(id){
    $.ajax({
        url: "get_request_barangay_clearance_certificate_by_id",
        method: "get",
        data: {
            barangayClearanceCertificateId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let barangayClearanceCertificateDetails = response['barangayClearanceCertificateDetails'];
            if(barangayClearanceCertificateDetails.length > 0){
                console.log('moment ',moment(barangayClearanceCertificateDetails[0].issued_on).format("YYYY/MM/DD"));
                $("#selectResident").val(barangayClearanceCertificateDetails[0].barangay_resident_id).trigger('change');
                $("#textPurpose").val(barangayClearanceCertificateDetails[0].purpose);
                $("#textORNumber").val(barangayClearanceCertificateDetails[0].or_number);
                $("#textAmountCollection").val(barangayClearanceCertificateDetails[0].amount_collection);
                $("#textIssuedOn").val(moment(barangayClearanceCertificateDetails[0].issued_on).format("YYYY-MM-DD"));
                $("#textRemarks").val(barangayClearanceCertificateDetails[0].remarks);
                $("#selectStatus").val(barangayClearanceCertificateDetails[0].status).trigger('change');
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

function getResidentsBarangayClearance(cboElement){
	let result = '<option value="0" disabled selected>Select One</option>';
	$.ajax({
		url: 'get_residents',
		method: 'get',
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>Loading</option>';
			cboElement.html(result);
		},
		success: function(response){
			let disabled = '';
			if(response['residentsDetails'].length > 0){
				result = '<option value="0" disabled selected>Select One</option>';
                let residentsDetails = response['residentsDetails'];
				for(let index = 0; index < residentsDetails.length; index++){
                    const firstname = residentsDetails[index]['user_info'].firstname;
                    const firstnameCapitalized = capitalizeFirstLetter(firstname);
                    const lastname = residentsDetails[index]['user_info'].lastname;
                    const lastnameCapitalized = capitalizeFirstLetter(lastname);
                    let civil_status = '';
                    if(residentsDetails[index].civil_status == 1){
                        civil_status = "Single";
                    } 
                    else if(residentsDetails[index].civil_status == 2){
                        civil_status = "Married";
                    }
                    else if(residentsDetails[index].civil_status == 3){
                        civil_status = "Widow/er";
                    }
                    else if(residentsDetails[index].civil_status == 4){
                        civil_status = "Annulled";
                    }
                    else if(residentsDetails[index].civil_status == 5){
                        civil_status = "Legally Separated";
                    }
                    else if(residentsDetails[index].civil_status == 6){
                        civil_status = "Others";
                    }
                    result += '<option value="' + residentsDetails[index].id + '" purok="' + residentsDetails[index].purok + '" block="' + residentsDetails[index].block + '" lot="' + residentsDetails[index].lot + '" street="' + residentsDetails[index].street + '" nationality="' + residentsDetails[index].nationality + '" birth_place="' + residentsDetails[index].birth_place + '" gender="' + residentsDetails[index].gender + '" civil_status="' + civil_status + '">' + lastnameCapitalized + ', ' + firstnameCapitalized + '</option>';
				}
			}
			else{
				result = '<option value="0" disabled>No user found!</option>';
                $('#selectUser').attr("style", "pointer-events: auto;");
			}
			cboElement.html(result);
		},
		error: function(data, xhr, status){
			result = '<option value="0" disabled>Reload again!</option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}