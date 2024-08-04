function addBarangayResidentBlotter(){
    let formData = new FormData($('#formAddBarangayResidentBlotter')[0]);

	$.ajax({
        url: "add_barangay_resident_blotter",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iconAddBarangayResidentBlotter").addClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayResidentBlotter").addClass('disabled');
            $("#iconAddBarangayResidentBlotter").removeClass('fa fa-check');
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
                
                if(response['error']['case_number'] === undefined){
                    $("#textCaseNumber").removeClass('is-invalid');
                    $("#textCaseNumber").attr('title', '');
                }
                else{
                    $("#textCaseNumber").addClass('is-invalid');
                    $("#textCaseNumber").attr('title', response['error']['case_number']);
                }

                if(response['error']['complainant_statement'] === undefined){
                    $("#textComplainantStatement").removeClass('is-invalid');
                    $("#textComplainantStatement").attr('title', '');
                }
                else{
                    $("#textComplainantStatement").addClass('is-invalid');
                    $("#textComplainantStatement").attr('title', response['error']['complainant_statement']);
                }
                
                if(response['error']['respondent'] === undefined){
                    $("#textRespondent").removeClass('is-invalid');
                    $("#textRespondent").attr('title', '');
                }
                else{
                    $("#textRespondent").addClass('is-invalid');
                    $("#textRespondent").attr('title', response['error']['respondent']);
                }

                if(response['error']['respondent_age'] === undefined){
                    $("#textRespondentAge").removeClass('is-invalid');
                    $("#textRespondentAge").attr('title', '');
                }
                else{
                    $("#textRespondentAge").addClass('is-invalid');
                    $("#textRespondentAge").attr('title', response['error']['respondent_age']);
                }


                if(response['error']['respondent_address_'] === undefined){
                    $("#textRespondentAddress").removeClass('is-invalid');
                    $("#textRespondentAddress").attr('title', '');
                }
                else{
                    $("#textRespondentAddress").addClass('is-invalid');
                    $("#textRespondentAddress").attr('title', response['error']['respondent_address_']);
                }
                
                if(response['error']['respondent_contact_number'] === undefined){
                    $("#textRespondentContactNumber").removeClass('is-invalid');
                    $("#textRespondentContactNumber").attr('title', '');
                }
                else{
                    $("#textRespondentContactNumber").addClass('is-invalid');
                    $("#textRespondentContactNumber").attr('title', response['error']['respondent_contact_number']);
                }
                
                if(response['error']['person_involved'] === undefined){
                    $("#textPersonInvolved").removeClass('is-invalid');
                    $("#textPersonInvolved").attr('title', '');
                }
                else{
                    $("#textPersonInvolved").addClass('is-invalid');
                    $("#textPersonInvolved").attr('title', response['error']['person_involved']);
                }

                if(response['error']['incident_location'] === undefined){
                    $("#textIncidentLocation").removeClass('is-invalid');
                    $("#textIncidentLocation").attr('title', '');
                }
                else{
                    $("#textIncidentLocation").addClass('is-invalid');
                    $("#textIncidentLocation").attr('title', response['error']['incident_location']);
                }
                
                if(response['error']['incident_date'] === undefined){
                    $("#textIncidentDate").removeClass('is-invalid');
                    $("#textIncidentDate").attr('title', '');
                }
                else{
                    $("#textIncidentDate").addClass('is-invalid');
                    $("#textIncidentDate").attr('title', response['error']['incident_date']);
                }

                if(response['error']['action_taken'] === undefined){
                    $("#selectActionTaken").removeClass('is-invalid');
                    $("#selectActionTaken").attr('title', '');
                }
                else{
                    $("#selectActionTaken").addClass('is-invalid');
                    $("#selectActionTaken").attr('title', response['error']['action_taken']);
                }
                
                if(response['error']['status'] === undefined){
                    $("#selectStatus").removeClass('is-invalid');
                    $("#selectStatus").attr('title', '');
                }
                else{
                    $("#selectStatus").addClass('is-invalid');
                    $("#selectStatus").attr('title', response['error']['status']);
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
                dataTablesBarangayResidentBlotter.draw();
                // getUsersWithResidentBlotterInfo($('#selectUser'));
                $("#formAddBarangayResidentBlotter")[0].reset();
                $('#modalAddBarangayResidentBlotter').modal('hide');
                toastr.success('Succesfully saved!');
            }

            $("#iconAddBarangayResidentBlotter").removeClass('spinner-border spinner-border-sm');
            $("#buttonAddBarangayResidentBlotter").removeClass('disabled');
            $("#iconAddBarangayResidentBlotter").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function getBarangayResidentBlotterById(id){
    $.ajax({
        url: "get_barangay_resident_blotter_by_id",
        method: "get",
        data: {
            barangayResidentBlotterId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let barangayResidentBlotterDetails = response['barangayResidentBlotterDetails'];
            if(barangayResidentBlotterDetails.length > 0){

                console.log('moment ',moment(barangayResidentBlotterDetails[0].incident_date).format("dddd, MMM D YYYY"));
                console.log('moment ', barangayResidentBlotterDetails[0].incident_date);
                $("#textCaseNumber").val(barangayResidentBlotterDetails[0].case_number);
                $("#selectResident").val(barangayResidentBlotterDetails[0].barangay_resident_id).trigger('change');
                $("#textComplainantStatement").val(barangayResidentBlotterDetails[0].complainant_statement);
                $("#textRespondent").val(barangayResidentBlotterDetails[0].respondent);
                $("#textRespondentAge").val(barangayResidentBlotterDetails[0].respondent_age);
                $("#textRespondentAddress").val(barangayResidentBlotterDetails[0].respondent_address);
                $("#textRemarks").val(barangayResidentBlotterDetails[0].remarks);
                $("#textRespondentContactNumber").val(barangayResidentBlotterDetails[0].respondent_contact_number);
                $("#textPersonInvolved").val(barangayResidentBlotterDetails[0].person_involved);
                $("#textIncidentLocation").val(barangayResidentBlotterDetails[0].incident_location);
                $("#textIncidentDate").val(barangayResidentBlotterDetails[0].incident_date);
                $("#selectActionTaken").val(barangayResidentBlotterDetails[0].action_taken).trigger('change');
                $("#selectStatus").val(barangayResidentBlotterDetails[0].status).trigger('change');
                $("#textRemarks").val(barangayResidentBlotterDetails[0].remarks);
            
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

function viewBarangayResidentBlotterById(id){
    $.ajax({
        url: "view_barangay_resident_blotter_by_id",
        method: "get",
        data: {
            barangayResidentBlotterId : id,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let viewBarangayResidentBlotterDetails = response['viewBarangayResidentBlotterDetails'];
            if(viewBarangayResidentBlotterDetails.length > 0){
                /* Personal Information */
                $("#textFirstname", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0]['user_info'].firstname);
                $("#textLastname", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0]['user_info'].lastname);
                $("#textMiddleInitial", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0]['user_info'].middle_initial);
                $("#textEmail", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0]['user_info'].email);
                $("#textContactNumber", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0]['user_info'].contact_number);
                $('select[name="user_level"]', $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0]['user_info']['user_levels'].id).trigger('change');
                $("#textUsername", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0]['user_info'].username);
                $("#selectUser", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].user_id).trigger('change');
                $("#selectGender", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].gender).trigger('change');
                $("#selectCivilStatus", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].civil_status).trigger('change');
                $("#textBirthdate", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].birthdate);
                $("#textAge", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].age);
                $("#textBirthPlace", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].birth_place);
                $("#textNationality", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].nationality);
                $("#textReligion", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].religion);
                $("#selectEducationalAttainment", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].educational_attainment).trigger('change');

                /* Address Information */
                $("#textPurok", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].purok);
                $("#textBlock", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].block);
                $("#textLot", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].lot);
                $("#textStreet", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].street);
                $("#textPhase", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].phase);

                /* Employment Information */
                $("#textOccupation", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].occupation);
                $("#textMonthlyIncome", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].monthly_income);
                $("#textPhilHealthNumber", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].phil_health_number);
                $("#textRemarks", $("#formViewBarangayResidentBlotter")).val(viewBarangayResidentBlotterDetails[0].remarks);
                
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

function editBarangayResidentBlotterStatus(){
    $.ajax({
        url: "edit_barangay_resident_blotter_status",
        method: "post",
        data: $('#formEditBarangayResidentBlotterStatus').serialize(),
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
                        dataTablesBarangayResidentBlotter.draw();
                    }
                    else{
                        toastr.success('Successfully enabled!');
                        dataTablesBarangayResidentBlotter.draw();
                    }
                }
                $("#modalEditBarangayResidentBlotterStatus").modal('hide');
                $("#formEditBarangayResidentBlotterStatus")[0].reset();
            }
            
            $("#iconEditBarangayResidentBlotter").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayResidentBlotterStatus").removeAttr('disabled');
            $("#iconEditBarangayResidentBlotter").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iconEditBarangayResidentBlotter").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditBarangayResidentBlotterStatus").removeAttr('disabled');
            $("#iconEditBarangayResidentBlotter").addClass('fa fa-check');
        }
    });
}

// function getUsers(cboElement){
// 	let result = '<option value="0" disabled selected>Select One</option>';
// 	$.ajax({
// 		url: 'get_users',
// 		method: 'get',
// 		dataType: 'json',
// 		beforeSend: function(){
// 			result = '<option value="0" disabled>Loading</option>';
// 			cboElement.html(result);
// 		},
// 		success: function(response){
// 			let disabled = '';
// 			if(response['users'].length > 0){
// 				result = '<option value="0" disabled selected>Select One</option>';
// 				for(let index = 0; index < response['users'].length; index++){
//                     const firstname = response['users'][index].firstname;
//                     const firstnameCapitalized = capitalizeFirstLetter(firstname);
//                     const lastname = response['users'][index].lastname;
//                     const lastnameCapitalized = capitalizeFirstLetter(lastname);
//                     result += '<option value="' + response['users'][index].id + '">' + lastnameCapitalized + ', ' + firstnameCapitalized + '</option>';
// 				}
// 			}
// 			else{
// 				result = '<option value="0" disabled>No user found!</option>';
//                 $('#selectUser').attr("style", "pointer-events: auto;");
// 			}
// 			cboElement.html(result);
// 		},
// 		error: function(data, xhr, status){
// 			result = '<option value="0" disabled>Reload again!</option>';
// 			cboElement.html(result);
//             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }
// 	});
// }