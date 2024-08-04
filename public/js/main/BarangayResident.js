function addBarangayResident(){
    let formData = new FormData($('#formAddBarangayResident')[0]);

	$.ajax({
        url: "add_barangay_resident",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayResident").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayResident").addClass('disabled');
            $("#iconAddBarangayResident").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving failed!');

                if(response['error']['user_id'] === undefined){
                    $("#selectUser").removeClass('is-invalid');
                    $("#selectUser").attr('title', '');
                }
                else{
                    $("#selectUser").addClass('is-invalid');
                    $("#selectUser").attr('title', response['error']['user_id']);
                }

                if(response['error']['gender'] === undefined){
                    $("#selectGender").removeClass('is-invalid');
                    $("#selectGender").attr('title', '');
                }
                else{
                    $("#selectGender").addClass('is-invalid');
                    $("#selectGender").attr('title', response['error']['gender']);
                }

                if(response['error']['civil_status'] === undefined){
                    $("#selectCivilStatus").removeClass('is-invalid');
                    $("#selectCivilStatus").attr('title', '');
                }
                else{
                    $("#selectCivilStatus").addClass('is-invalid');
                    $("#selectCivilStatus").attr('title', response['error']['civil_status']);
                }

                if(response['error']['birthdate'] === undefined){
                    $("#textBirthdate").removeClass('is-invalid');
                    $("#textBirthdate").attr('title', '');
                }
                else{
                    $("#textBirthdate").addClass('is-invalid');
                    $("#textBirthdate").attr('title', response['error']['birthdate']);
                }
                
                if(response['error']['length_of_stay'] === undefined){
                    $("#textLengthOfStay").removeClass('is-invalid');
                    $("#textLengthOfStay").attr('title', '');
                }
                else{
                    $("#textLengthOfStay").addClass('is-invalid');
                    $("#textLengthOfStay").attr('title', response['error']['length_of_stay']);
                }

                if(response['error']['age'] === undefined){
                    $("#textAge").removeClass('is-invalid');
                    $("#textAge").attr('title', '');
                }
                else{
                    $("#textAge").addClass('is-invalid');
                    $("#textAge").attr('title', response['error']['age']);
                }

                if(response['error']['birth_place'] === undefined){
                    $("#textBirthPlace").removeClass('is-invalid');
                    $("#textBirthPlace").attr('title', '');
                }
                else{
                    $("#textBirthPlace").addClass('is-invalid');
                    $("#textBirthPlace").attr('title', response['error']['birth_place']);
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
                
                if(response['error']['phase'] === undefined){
                    $("#textPhase").removeClass('is-invalid');
                    $("#textPhase").attr('title', '');
                }
                else{
                    $("#textPhase").addClass('is-invalid');
                    $("#textPhase").attr('title', response['error']['phase']);
                }

                if(response['error']['nationality'] === undefined){
                    $("#textNationality").removeClass('is-invalid');
                    $("#textNationality").attr('title', '');
                }
                else{
                    $("#textNationality").addClass('is-invalid');
                    $("#textNationality").attr('title', response['error']['nationality']);
                }

                if(response['error']['religion'] === undefined){
                    $("#textReligion").removeClass('is-invalid');
                    $("#textReligion").attr('title', '');
                }
                else{
                    $("#textReligion").addClass('is-invalid');
                    $("#textReligion").attr('title', response['error']['religion']);
                }

                if(response['error']['occupation'] === undefined){
                    $("#textOccupation").removeClass('is-invalid');
                    $("#textOccupation").attr('title', '');
                }
                else{
                    $("#textOccupation").addClass('is-invalid');
                    $("#textOccupation").attr('title', response['error']['occupation']);
                }

                if(response['error']['monthly_income'] === undefined){
                    $("#textMonthlyIncome").removeClass('is-invalid');
                    $("#textMonthlyIncome").attr('title', '');
                }
                else{
                    $("#textMonthlyIncome").addClass('is-invalid');
                    $("#textMonthlyIncome").attr('title', response['error']['monthly_income']);
                }

                if(response['error']['phil_health_number'] === undefined){
                    $("#textPhilHealthNumber").removeClass('is-invalid');
                    $("#textPhilHealthNumber").attr('title', '');
                }
                else{
                    $("#textPhilHealthNumber").addClass('is-invalid');
                    $("#textPhilHealthNumber").attr('title', response['error']['phil_health_number']);
                }

                if(response['error']['educational_attainment'] === undefined){
                    $("#selectEducationalAttainment").removeClass('is-invalid');
                    $("#selectEducationalAttainment").attr('title', '');
                }
                else{
                    $("#selectEducationalAttainment").addClass('is-invalid');
                    $("#selectEducationalAttainment").attr('title', response['error']['educational_attainment']);
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
                dataTablesBarangayResident.draw();
                // getUsersWithResidentInfo($('#selectUser'));
                $("#formAddBarangayResident")[0].reset();
                $('#modalAddBarangayResident').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayResident").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayResident").removeClass('disabled');
            $("#iconAddBarangayResident").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getBarangayResidentById(id){
    $.ajax({
        url: "get_barangay_resident_by_id",
        method: "get",
        data: {
            barangayResidentId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let barangayResidentDetails = response['barangayResidentDetails'];
            if(barangayResidentDetails.length > 0){

                $("#selectUser").val(barangayResidentDetails[0].user_id).trigger('change');
                $("#selectGender").val(barangayResidentDetails[0].gender).trigger('change');
                $("#selectCivilStatus").val(barangayResidentDetails[0].civil_status).trigger('change');
                $("#textLengthOfStay").val(barangayResidentDetails[0].length_of_stay);
                $("#textBirthdate").val(barangayResidentDetails[0].birthdate);
                $("#textAge").val(barangayResidentDetails[0].age);
                $("#textBirthPlace").val(barangayResidentDetails[0].birth_place);
                $("#textPurok").val(barangayResidentDetails[0].purok);
                $("#textBlock").val(barangayResidentDetails[0].block);
                $("#textLot").val(barangayResidentDetails[0].lot);
                $("#textStreet").val(barangayResidentDetails[0].street);
                $("#textPhase").val(barangayResidentDetails[0].phase);
                $("#textNationality").val(barangayResidentDetails[0].nationality);
                $("#textReligion").val(barangayResidentDetails[0].religion);
                $("#textOccupation").val(barangayResidentDetails[0].occupation);
                $("#textMonthlyIncome").val(barangayResidentDetails[0].monthly_income);
                $("#textPhilHealthNumber").val(barangayResidentDetails[0].phil_health_number);
                $("#selectEducationalAttainment").val(barangayResidentDetails[0].educational_attainment).trigger('change');
                $("#textRemarks").val(barangayResidentDetails[0].remarks);
                
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

function viewBarangayResidentById(id){
    $.ajax({
        url: "view_barangay_resident_by_id",
        method: "get",
        data: {
            barangayResidentId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let viewBarangayResidentDetails = response['viewBarangayResidentDetails'];
            if(viewBarangayResidentDetails.length > 0){
                /* Personal Information */
                $("#textFirstname", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['user_info'].firstname);
                $("#textLastname", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['user_info'].lastname);
                $("#textMiddleInitial", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['user_info'].middle_initial);
                $("#textEmail", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['user_info'].email);
                $("#textContactNumber", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['user_info'].contact_number);
                $('select[name="user_level"]', $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['user_info']['user_levels'].id).trigger('change');
                $("#textUsername", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['user_info'].username);
                $("#selectUser", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].user_id).trigger('change');
                $("#selectGender", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].gender).trigger('change');
                $("#selectCivilStatus", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].civil_status).trigger('change');
                $("#textBirthdate", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].birthdate);
                $("#textAge", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].age);
                $("#textBirthPlace", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].birth_place);
                $("#textNationality", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].nationality);
                $("#textReligion", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].religion);
                $("#selectEducationalAttainment", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].educational_attainment).trigger('change');

                /* Address Information */
                $("#textPurok", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].purok);
                $("#textBlock", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].block);
                $("#textLot", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].lot);
                $("#textStreet", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].street);
                $("#textPhase", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].phase);

                /* Employment Information */
                $("#textOccupation", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].occupation);
                $("#textMonthlyIncome", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].monthly_income);
                $("#textPhilHealthNumber", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].phil_health_number);
                $("#textRemarks", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0].remarks);

                /* Blotter Record Information */
                // console.table(viewBarangayResidentDetails[0]['barangay_resident_blotter_details']);
                // if(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'].length > 0){
                //     $("#textCaseNumber", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].case_number);
                //     $("#textComplainantStatement", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].complainant_statement);
                //     $("#textRespondent", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].respondent);
                //     $("#textRespondentAge", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].respondent_age);
                //     $("#textRespondentAddress", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].respondent_address);
                //     $("#textRespondentContactNumber", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].respondent_contact_number);
                //     $("#textPersonInvolved", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].person_involved);
                //     $("#textIncidentLocation", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].incident_location);
                //     $("#textIncidentDate", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].incident_date);
                //     $("#selectActionTaken", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].action_taken).trigger('change');
                //     $("#selectStatus", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].status).trigger('change');
                //     $("#textRemarks", $("#formViewBarangayResident")).val(viewBarangayResidentDetails[0]['barangay_resident_blotter_details'][0].remarks);
                // }
                
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

function editBarangayResidentStatus(){
    $.ajax({
        url: "edit_barangay_resident_status",
        method: "post",
        data: $('#formEditBarangayResidentStatus').serialize(),
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
                        toastr.success('Successfully disabled!');
                        dataTablesBarangayResident.draw();
                    }
                    else{
                        toastr.success('Successfully enabled!');
                        dataTablesBarangayResident.draw();
                    }
                }
                $("#modalEditBarangayResidentStatus").modal('hide');
                $("#formEditBarangayResidentStatus")[0].reset();
            }
            
            $("#iconEditBarangayResident").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayResidentStatus").removeAttr('disabled');
            $("#iconEditBarangayResident").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayResident").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayResidentStatus").removeAttr('disabled');
            $("#iconEditBarangayResident").addClass('fa fa-check');
        }
    });
}

function getUsers(cboElement){
	let result = '<option value="0" disabled selected>Select One</option>';
	$.ajax({
		url: 'get_users',
		method: 'get',
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>Loading</option>';
			cboElement.html(result);
		},
		success: function(response){
			let disabled = '';
			if(response['users'].length > 0){
				result = '<option value="0" disabled selected>Select One</option>';
				for(let index = 0; index < response['users'].length; index++){
                    const firstname = response['users'][index].firstname;
                    const firstnameCapitalized = capitalizeFirstLetter(firstname);
                    const lastname = response['users'][index].lastname;
                    const lastnameCapitalized = capitalizeFirstLetter(lastname);
                    result += '<option value="' + response['users'][index].id + '">' + lastnameCapitalized + ', ' + firstnameCapitalized + '</option>';
				}
                $('#selectUser').attr("style", "pointer-events: none;");
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

function getUsersWithResidentInfo(cboElement){
	let result = '<option value="0" disabled selected>Select One</option>';
	$.ajax({
		url: 'get_users_with_resident_info',
		method: 'get',
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>Loading</option>';
			cboElement.html(result);
		},
		success: function(response){
			let disabled = '';
			if(response['users'].length > 0){
				result = '<option value="0" disabled selected>Select One</option>';
				for(let index = 0; index < response['users'].length; index++){
                    const firstname = response['users'][index].firstname;
                    const firstnameCapitalized = capitalizeFirstLetter(firstname);
                    const lastname = response['users'][index].lastname;
                    const lastnameCapitalized = capitalizeFirstLetter(lastname);

                    result += '<option value="' + response['users'][index].id + '">' + lastnameCapitalized + ', ' + firstnameCapitalized + '</option>';
				}
                
			}
			else{
				result = '<option value="0" disabled>No user found!</option>';
			}
            $('#selectUser').attr("style", "pointer-events: auto;");
			cboElement.html(result);
		},
		error: function(data, xhr, status){
			result = '<option value="0" disabled>Reload again!</option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function getResidents(cboElement){
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
				for(let index = 0; index < response['residentsDetails'].length; index++){
                    const firstname = response['residentsDetails'][index]['user_info'].firstname;
                    const firstnameCapitalized = capitalizeFirstLetter(firstname);
                    const lastname = response['residentsDetails'][index]['user_info'].lastname;
                    const lastnameCapitalized = capitalizeFirstLetter(lastname);
                    result += '<option value="' + response['residentsDetails'][index].id + '">' + lastnameCapitalized + ', ' + firstnameCapitalized + '</option>';
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