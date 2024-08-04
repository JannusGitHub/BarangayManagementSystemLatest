function addCedula(){
    let formData = new FormData($('#formAddCedula')[0]);

	$.ajax({
        url: "add_cedula",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddCedula").addClass('spinner-border spinner-border-sm');
            $("#buttonAddCedula").addClass('disabled');
            $("#iconAddCedula").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                if(response['error']['barangay_resident_id'] === undefined){
                    $("#selectResident").removeClass('is-invalid');
                    $("#selectResident").attr('title', '');
                }
                else{
                    $("#selectResident").addClass('is-invalid');
                    $("#selectResident").attr('title', response['error']['barangay_resident_id']);
                }

                if(response['error']['purok'] === undefined){
                    $("#textPurok").removeClass('is-invalid');
                    $("#textPurok").attr('title', '');
                }
                else{
                    $("#textPurok").addClass('is-invalid');
                    $("#textPurok").attr('title', response['error']['purok']);
                }

                if(response['error']['block'] === undefined){
                    $("#textBlock").removeClass('is-invalid');
                    $("#textBlock").attr('title', '');
                }
                else{
                    $("#textBlock").addClass('is-invalid');
                    $("#textBlock").attr('title', response['error']['block']);
                }

                if(response['error']['lot'] === undefined){
                    $("#textLot").removeClass('is-invalid');
                    $("#textLot").attr('title', '');
                }
                else{
                    $("#textLot").addClass('is-invalid');
                    $("#textLot").attr('title', response['error']['lot']);
                }

                if(response['error']['street'] === undefined){
                    $("#textStreet").removeClass('is-invalid');
                    $("#textStreet").attr('title', '');
                }
                else{
                    $("#textStreet").addClass('is-invalid');
                    $("#textStreet").attr('title', response['error']['street']);
                }

                if(response['error']['nationality'] === undefined){
                    $("#textCitizenship").removeClass('is-invalid');
                    $("#textCitizenship").attr('title', '');
                }
                else{
                    $("#textCitizenship").addClass('is-invalid');
                    $("#textCitizenship").attr('title', response['error']['nationality']);
                }

                if(response['error']['birth_place'] === undefined){
                    $("#textPlaceOfBirth").removeClass('is-invalid');
                    $("#textPlaceOfBirth").attr('title', '');
                }
                else{
                    $("#textPlaceOfBirth").addClass('is-invalid');
                    $("#textPlaceOfBirth").attr('title', response['error']['birth_place']);
                }

                if(response['error']['gender'] === undefined){
                    $("#textSex").removeClass('is-invalid');
                    $("#textSex").attr('title', '');
                }
                else{
                    $("#textSex").addClass('is-invalid');
                    $("#textSex").attr('title', response['error']['gender']);
                }

                if(response['error']['civil_status'] === undefined){
                    $("#textCivilStatus").removeClass('is-invalid');
                    $("#textCivilStatus").attr('title', '');
                }
                else{
                    $("#textCivilStatus").addClass('is-invalid');
                    $("#textCivilStatus").attr('title', response['error']['civil_status']);
                }
                
                if(response['error']['cedula_number'] === undefined){
                    $("#textCedulaNumber").removeClass('is-invalid');
                    $("#textCedulaNumber").attr('title', '');
                }
                else{
                    $("#textCedulaNumber").addClass('is-invalid');
                    $("#textCedulaNumber").attr('title', response['error']['cedula_number']);
                }

                if(response['error']['or_number'] === undefined){
                    $("#textORNumber").removeClass('is-invalid');
                    $("#textORNumber").attr('title', '');
                }
                else{
                    $("#textORNumber").addClass('is-invalid');
                    $("#textORNumber").attr('title', response['error']['or_number']);
                }

                if(response['error']['height'] === undefined){
                    $("#textHeight").removeClass('is-invalid');
                    $("#textHeight").attr('title', '');
                }
                else{
                    $("#textHeight").addClass('is-invalid');
                    $("#textHeight").attr('title', response['error']['height']);
                }

                if(response['error']['weight'] === undefined){
                    $("#textWeight").removeClass('is-invalid');
                    $("#textWeight").attr('title', '');
                }
                else{
                    $("#textWeight").addClass('is-invalid');
                    $("#textWeight").attr('title', response['error']['weight']);
                }

                if(response['error']['tin_number'] === undefined){
                    $("#textTinNumber").removeClass('is-invalid');
                    $("#textTinNumber").attr('title', '');
                }
                else{
                    $("#textTinNumber").addClass('is-invalid');
                    $("#textTinNumber").attr('title', response['error']['tin_number']);
                }

                if(response['error']['date_issued'] === undefined){
                    $("#textDateIssued").removeClass('is-invalid');
                    $("#textDateIssued").attr('title', '');
                }
                else{
                    $("#textDateIssued").addClass('is-invalid');
                    $("#textDateIssued").attr('title', response['error']['date_issued']);
                }

                if(response['error']['issued_at'] === undefined){
                    $("#textIssuedAt").removeClass('is-invalid');
                    $("#textIssuedAt").attr('title', '');
                }
                else{
                    $("#textIssuedAt").addClass('is-invalid');
                    $("#textIssuedAt").attr('title', response['error']['issued_at']);
                }

                if(response['error']['status'] === undefined){
                    $("#selectStatus").removeClass('is-invalid');
                    $("#selectStatus").attr('title', '');
                }
                else{
                    $("#selectStatus").addClass('is-invalid');
                    $("#selectStatus").attr('title', response['error']['status']);
                }

            }else if(response['hasError'] == 0){
                dataTablesCedula.draw();
                $("#formAddCedula")[0].reset();
                $('#modalAddCedula').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddCedula").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddCedula").removeClass('disabled');
            $("#iconAddCedula").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getCedulaById(id){
    $.ajax({
        url: "get_cedula_by_id",
        method: "get",
        data: {
            cedulaId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let cedulaDetails = response['cedulaDetails'];
            if(cedulaDetails.length > 0){
                let processingTime = "";

                if(cedulaDetails[0]['issuance_configuration_info'].processing_time == 1){
                    processingTime = '1 Day';
                }
                else if(cedulaDetails[0]['issuance_configuration_info'].processing_time == 2){
                    processingTime = '2 Days';
                }
                else if(cedulaDetails[0]['issuance_configuration_info'].processing_time == 3){
                    processingTime = '3 Days';
                }
                else if(cedulaDetails[0]['issuance_configuration_info'].processing_time == 4){
                    processingTime = '4 Days';
                }
                else if(cedulaDetails[0]['issuance_configuration_info'].processing_time == 5){
                    processingTime = '5 Days';
                }
                else if(cedulaDetails[0]['issuance_configuration_info'].processing_time == 6){
                    processingTime = '1 Week';
                }
                else if(cedulaDetails[0]['issuance_configuration_info'].processing_time == 7){
                    processingTime = '2 Weeks';
                }
                else if(cedulaDetails[0]['issuance_configuration_info'].processing_time == 8){
                    processingTime = '3 Weeks';
                }
                else if(cedulaDetails[0]['issuance_configuration_info'].processing_time == 9){
                    processingTime = '1 Month';
                }
                $("#selectResident").val(cedulaDetails[0].barangay_resident_id).trigger('change');
                $("#textCedulaNumber").val(cedulaDetails[0].cedula_number);
                $("#textORNumber").val(cedulaDetails[0].or_number);
                $("#textHeight").val(cedulaDetails[0].height);
                $("#textWeight").val(cedulaDetails[0].weight);
                $("#textTinNumber").val(cedulaDetails[0].tin_number);
                $("#textDateIssued").val(cedulaDetails[0].date_issued);
                $("#textIssuedAt").val(cedulaDetails[0].issued_at);
                $("#selectStatus").val(cedulaDetails[0].status).trigger('change');
                $("#textTicketNumber").val(cedulaDetails[0].ticket_number).trigger('change');
                $("#textTicketDate").val(cedulaDetails[0].ticket_datetime).trigger('change');
                $("#textTotalAmount").val(cedulaDetails[0]['issuance_configuration_info'].amount).trigger('change');
                $("#textProcessingTime").val(processingTime).trigger('change');
                $("#issuanceConfigurationId").val(cedulaDetails[0].issuance_configuration_id).trigger('change');
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

function addRequestCedula(){
    let formData = new FormData($('#formAddRequestCedula')[0]);

	$.ajax({
        url: "add_request_cedula",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddRequestCedula").addClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestCedula").addClass('disabled');
            $("#iconAddRequestCedula").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');
                
                if(response['error']['barangay_resident_id'] === undefined){
                    $("#selectResident").removeClass('is-invalid');
                    $("#selectResident").attr('title', '');
                }
                else{
                    $("#selectResident").addClass('is-invalid');
                    $("#selectResident").attr('title', response['error']['barangay_resident_id']);
                }

                if(response['error']['purok'] === undefined){
                    $("#textPurok").removeClass('is-invalid');
                    $("#textPurok").attr('title', '');
                }
                else{
                    $("#textPurok").addClass('is-invalid');
                    $("#textPurok").attr('title', response['error']['purok']);
                }

                if(response['error']['block'] === undefined){
                    $("#textBlock").removeClass('is-invalid');
                    $("#textBlock").attr('title', '');
                }
                else{
                    $("#textBlock").addClass('is-invalid');
                    $("#textBlock").attr('title', response['error']['block']);
                }

                if(response['error']['lot'] === undefined){
                    $("#textLot").removeClass('is-invalid');
                    $("#textLot").attr('title', '');
                }
                else{
                    $("#textLot").addClass('is-invalid');
                    $("#textLot").attr('title', response['error']['lot']);
                }

                if(response['error']['street'] === undefined){
                    $("#textStreet").removeClass('is-invalid');
                    $("#textStreet").attr('title', '');
                }
                else{
                    $("#textStreet").addClass('is-invalid');
                    $("#textStreet").attr('title', response['error']['street']);
                }

                if(response['error']['nationality'] === undefined){
                    $("#textCitizenship").removeClass('is-invalid');
                    $("#textCitizenship").attr('title', '');
                }
                else{
                    $("#textCitizenship").addClass('is-invalid');
                    $("#textCitizenship").attr('title', response['error']['nationality']);
                }

                if(response['error']['birth_place'] === undefined){
                    $("#textPlaceOfBirth").removeClass('is-invalid');
                    $("#textPlaceOfBirth").attr('title', '');
                }
                else{
                    $("#textPlaceOfBirth").addClass('is-invalid');
                    $("#textPlaceOfBirth").attr('title', response['error']['birth_place']);
                }

                if(response['error']['gender'] === undefined){
                    $("#textSex").removeClass('is-invalid');
                    $("#textSex").attr('title', '');
                }
                else{
                    $("#textSex").addClass('is-invalid');
                    $("#textSex").attr('title', response['error']['gender']);
                }

                if(response['error']['civil_status'] === undefined){
                    $("#textCivilStatus").removeClass('is-invalid');
                    $("#textCivilStatus").attr('title', '');
                }
                else{
                    $("#textCivilStatus").addClass('is-invalid');
                    $("#textCivilStatus").attr('title', response['error']['civil_status']);
                }
                
                if(response['error']['cedula_number'] === undefined){
                    $("#textCedulaNumber").removeClass('is-invalid');
                    $("#textCedulaNumber").attr('title', '');
                }
                else{
                    $("#textCedulaNumber").addClass('is-invalid');
                    $("#textCedulaNumber").attr('title', response['error']['cedula_number']);
                }

                if(response['error']['or_number'] === undefined){
                    $("#textORNumber").removeClass('is-invalid');
                    $("#textORNumber").attr('title', '');
                }
                else{
                    $("#textORNumber").addClass('is-invalid');
                    $("#textORNumber").attr('title', response['error']['or_number']);
                }

                if(response['error']['height'] === undefined){
                    $("#textHeight").removeClass('is-invalid');
                    $("#textHeight").attr('title', '');
                }
                else{
                    $("#textHeight").addClass('is-invalid');
                    $("#textHeight").attr('title', response['error']['height']);
                }

                if(response['error']['weight'] === undefined){
                    $("#textWeight").removeClass('is-invalid');
                    $("#textWeight").attr('title', '');
                }
                else{
                    $("#textWeight").addClass('is-invalid');
                    $("#textWeight").attr('title', response['error']['weight']);
                }

                if(response['error']['tin_number'] === undefined){
                    $("#textTinNumber").removeClass('is-invalid');
                    $("#textTinNumber").attr('title', '');
                }
                else{
                    $("#textTinNumber").addClass('is-invalid');
                    $("#textTinNumber").attr('title', response['error']['tin_number']);
                }

                if(response['error']['date_issued'] === undefined){
                    $("#textDateIssued").removeClass('is-invalid');
                    $("#textDateIssued").attr('title', '');
                }
                else{
                    $("#textDateIssued").addClass('is-invalid');
                    $("#textDateIssued").attr('title', response['error']['date_issued']);
                }

                if(response['error']['issued_at'] === undefined){
                    $("#textIssuedAt").removeClass('is-invalid');
                    $("#textIssuedAt").attr('title', '');
                }
                else{
                    $("#textIssuedAt").addClass('is-invalid');
                    $("#textIssuedAt").attr('title', response['error']['issued_at']);
                }

                if(response['error']['status'] === undefined){
                    $("#selectStatus").removeClass('is-invalid');
                    $("#selectStatus").attr('title', '');
                }
                else{
                    $("#selectStatus").addClass('is-invalid');
                    $("#selectStatus").attr('title', response['error']['status']);
                }

            }else if(response['hasError'] == 0){
                dataTablesRequestCedula.draw();
                $("#formAddRequestCedula")[0].reset();
                $('#modalAddRequestCedula').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddRequestCedula").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddRequestCedula").removeClass('disabled');
            $("#iconAddRequestCedula").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getResidentsForCedula(cboElement){
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

/**
 * For User
 */
function getResidentForCedulaByUserId(user_id){
	$.ajax({
		url: 'get_resident_for_cedula_by_user_id',
        method: "get",
        data: {
            userId : user_id,
        },
		dataType: 'json',
		success: function(response){
			if(response['cedulaDetails'].length > 0){
                let cedulaDetails = response['cedulaDetails'];
                console.log('cedulaDetails ',cedulaDetails);
                
                $('#textPurok').val(cedulaDetails[0].purok);
                $('#textBlock').val(cedulaDetails[0].block);
                $('#textLot').val(cedulaDetails[0].lot);
                $('#textStreet').val(cedulaDetails[0].street);
                $('#textCitizenship').val(cedulaDetails[0].nationality);
                $('#textPlaceOfBirth').val(cedulaDetails[0].birth_place);
                let gender = "";
                if(cedulaDetails[0].gender == 1){
                    gender = "Male";
                }else if(cedulaDetails[0].gender == 2){
                    gender = "Female";
                }else{
                    gender = "Other";
                }
                $('#textSex').val(gender);
                $('#textCivilStatus').val(cedulaDetails[0].civil_status);
			}else{
                console.log('not found');
            }
		},
		error: function(data, xhr, status){
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}