function addUser(){
    let formData = new FormData($('#formAddUser')[0]);
	$.ajax({
        url: "add_user",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            // $("#btnAddUserIcon").addClass('spinner-border spinner-border-sm');
            // $("#btnAddUser").addClass('disabled');
            // $("#btnAddUserIcon").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving user failed!');
                if(response['error']['firstname'] === undefined){
                    $("#textFirstname").removeClass('is-invalid');
                    $("#textFirstname").attr('title', '');
                }
                else{
                    $("#textFirstname").addClass('is-invalid');
                    $("#textFirstname").attr('title', response['error']['firstname']);
                }
                if(response['error']['lastname'] === undefined){
                    $("#textLastname").removeClass('is-invalid');
                    $("#textLastname").attr('title', '');
                }
                else{
                    $("#textLastname").addClass('is-invalid');
                    $("#textLastname").attr('title', response['error']['lastname']);
                }
                if(response['error']['middle_initial'] === undefined){
                    $("#middle_initial").removeClass('is-invalid');
                    $("#middle_initial").attr('title', '');
                }
                else{
                    $("#middle_initial").addClass('is-invalid');
                    $("#middle_initial").attr('title', response['error']['middle_initial']);
                }
                if(response['error']['email'] === undefined){
                    $("#textEmail").removeClass('is-invalid');
                    $("#textEmail").attr('title', '');
                }
                else{
                    $("#textEmail").addClass('is-invalid');
                    $("#textEmail").attr('title', response['error']['email']);
                }
                if(response['error']['contact_number'] === undefined){
                    $("#textContactNumber").removeClass('is-invalid');
                    $("#textContactNumber").attr('title', '');
                }
                else{
                    $("#textContactNumber").addClass('is-invalid');
                    $("#textContactNumber").attr('title', response['error']['contact_number']);
                }
                if(response['error']['username'] === undefined){
                    $("#textUsername").removeClass('is-invalid');
                    $("#textUsername").attr('title', '');
                }
                else{
                    $("#textUsername").addClass('is-invalid');
                    $("#textUsername").attr('title', response['error']['username']);
                }
                if(response['error']['password'] === undefined){
                    $("#textPassword").removeClass('is-invalid');
                    $("#textPassword").attr('title', '');
                }
                else{
                    $("#textPassword").addClass('is-invalid');
                    $("#textPassword").attr('title', response['error']['password']);
                }
                if(response['error']['confirm_password'] === undefined){
                    $("#textConfirmPassword").removeClass('is-invalid');
                    $("#textConfirmPassword").attr('title', '');
                }
                else{
                    $("#textConfirmPassword").addClass('is-invalid');
                    $("#textConfirmPassword").attr('title', response['error']['confirm_password']);
                }
                if(response['error']['voters_id'] === undefined){
                    $("#fileAddVotersId").removeClass('is-invalid');
                    $("#fileAddVotersId").attr('title', '');
                }
                else{
                    $("#fileAddVotersId").addClass('is-invalid');
                    $("#fileAddVotersId").attr('title', response['error']['voters_id']);
                }
            }else if(response['hasError'] == 0){
                $("#formAddUser")[0].reset();
                toastr.success('Succesfully saved!');
                window.location = 'signin_page';
            }

            $("#btnAddUserIcon").removeClass('spinner-border spinner-border-sm');
            $("#btnAddUser").removeClass('disabled');
            $("#btnAddUserIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function signIn(){
    $.ajax({
        url: 'sign_in',
        method: 'get',
        dataType: 'json',
        data: $("#formSignIn").serialize(),
        beforeSend: function(){
            $("#btnSignInIcon").addClass('spinner-border spinner-border-sm');
            $("#btnSignIn").addClass('disabled');
            $("#btnSignInIcon").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                if(response['error']['username'] === undefined){
                    $("#textUsername").removeClass('is-invalid');
                    $("#textUsername").attr('title', '');
                }
                else{
                    $("#textUsername").addClass('is-invalid');
                    $("#textUsername").attr('title', response['error']['username']);
                }

                if(response['error']['password'] === undefined){
                    $("#textPassword").removeClass('is-invalid');
                    $("#textPassword").attr('title', '');
                }
                else{
                    $("#textPassword").addClass('is-invalid');
                    $("#textPassword").attr('title', response['error']['password']);
                }
            }
            else {
                if(response['hasError'] == 1){
                    toastr.error(response['error_message']);
                }
                else if(response['isDeleted'] == 1){
                    toastr.error(response['error_message']);
                }
                else if(response['isAuthenticated'] == 0){
                    toastr.error(response['error_message']);
                }
                else if(response['inactive'] == 0){
                    toastr.error(response['error_message']);
                }
                // else if(response['isPasswordChanged'] == 0){
                //     window.location = "change_password_page";
                // }
                else{
                    toastr.success('Success!');
                    setTimeout(() => {
                        window.location = "dashboard";
                    }, 600);
                }
            }
            $("#btnSignInIcon").removeClass('spinner-border spinner-border-sm');
            $("#btnSignIn").removeClass('disabled');
            $("#btnSignInIcon").addClass('fa fa-check');
        }
    });
}

function addUserAsAdmin(){
	$.ajax({
        url: "add_user_as_admin",
        method: "post",
        data: $('#formAddUser').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#btnAddUserIcon").addClass('spinner-border spinner-border-sm');
            $("#btnAddUser").addClass('disabled');
            $("#btnAddUserIcon").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving user failed!');
                if(response['error']['firstname'] === undefined){
                    $("#textFirstname").removeClass('is-invalid');
                    $("#textFirstname").attr('title', '');
                }
                else{
                    $("#textFirstname").addClass('is-invalid');
                    $("#textFirstname").attr('title', response['error']['firstname']);
                }
                if(response['error']['lastname'] === undefined){
                    $("#textLastname").removeClass('is-invalid');
                    $("#textLastname").attr('title', '');
                }
                else{
                    $("#textLastname").addClass('is-invalid');
                    $("#textLastname").attr('title', response['error']['lastname']);
                }
                if(response['error']['middle_initial'] === undefined){
                    $("#middle_initial").removeClass('is-invalid');
                    $("#middle_initial").attr('title', '');
                }
                else{
                    $("#middle_initial").addClass('is-invalid');
                    $("#middle_initial").attr('title', response['error']['middle_initial']);
                }
                if(response['error']['email'] === undefined){
                    $("#textEmail").removeClass('is-invalid');
                    $("#textEmail").attr('title', '');
                }
                else{
                    $("#textEmail").addClass('is-invalid');
                    $("#textEmail").attr('title', response['error']['email']);
                }
                if(response['error']['contact_number'] === undefined){
                    $("#textContactNumber").removeClass('is-invalid');
                    $("#textContactNumber").attr('title', '');
                }
                else{
                    $("#textContactNumber").addClass('is-invalid');
                    $("#textContactNumber").attr('title', response['error']['contact_number']);
                }
                if(response['error']['user_level'] === undefined){
                    $("#userLevel").removeClass('is-invalid');
                    $("#userLevel").attr('title', '');
                }
                else{
                    $("#userLevel").addClass('is-invalid');
                    $("#userLevel").attr('title', response['error']['user_level']);
                }
                if(response['error']['username'] === undefined){
                    $("#textUsername").removeClass('is-invalid');
                    $("#textUsername").attr('title', '');
                }
                else{
                    $("#textUsername").addClass('is-invalid');
                    $("#textUsername").attr('title', response['error']['username']);
                }
                if(response['error']['password'] === undefined){
                    $("#textPassword").removeClass('is-invalid');
                    $("#textPassword").attr('title', '');
                }
                else{
                    $("#textPassword").addClass('is-invalid');
                    $("#textPassword").attr('title', response['error']['password']);
                }
                if(response['error']['confirm_password'] === undefined){
                    $("#textConfirmPassword").removeClass('is-invalid');
                    $("#textConfirmPassword").attr('title', '');
                }
                else{
                    $("#textConfirmPassword").addClass('is-invalid');
                    $("#textConfirmPassword").attr('title', response['error']['confirm_password']);
                }

            }else if(response['hasError'] == 0){
                $("#formAddUser")[0].reset();
                $("#modalAddUser").modal('hide');
                toastr.success('Succesfully saved!');
                dataTablesUsers.draw();
                dataTablesPendingUsers.draw();
            }else{
                toastr.error('Saving user failed!');
            }

            $("#btnAddUserIcon").removeClass('spinner-border spinner-border-sm');
            $("#btnAddUser").removeClass('disabled');
            $("#btnAddUserIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            // toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            toastr.error('An error occured!');
        }
    });
}

function getUserLevel(cboElement){
	let result = '<option value="0" disabled selected>Select One</option>';
	$.ajax({
		url: 'get_user_levels',
		method: 'get',
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>Loading</option>';
			cboElement.html(result);
		},
		success: function(response){
			let disabled = '';
			if(response['userLevels'].length > 0){
				result = '<option value="0" disabled selected>Select One</option>';
				for(let index = 0; index < response['userLevels'].length; index++){
                    result += '<option value="' + response['userLevels'][index].id + '">' + response['userLevels'][index].name + '</option>';
				}
			}
			else{
				result = '<option value="0" disabled>No User Level found</option>';
			}
			cboElement.html(result);
		},
		error: function(data, xhr, status){
			result = '<option value="0" disabled>Reload Again</option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function getCustomerById(userId){
    $.ajax({
        url: "get_user_by_id",
        method: "get",
        data: {
            userId : userId,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let formAddUser = $('#formAddUser');
            let userDetails = response['userDetails'];
            if(userDetails.length > 0){
                $("#textFirstname", formAddUser).val(userDetails[0].firstname);
                $("#textLastname", formAddUser).val(userDetails[0].lastname);
                $("#textMiddleInitial", formAddUser).val(userDetails[0].middle_initial);
                $("#textSuffix", formAddUser).val(userDetails[0].suffix);
                $("#textEmail", formAddUser).val(userDetails[0].email);
                $("#textContactNumber", formAddUser).val(userDetails[0].contact_number);
                $('select[name="user_level"]', formAddUser).val(userDetails[0]['user_levels'].id).trigger('change');
                $("#textUsername", formAddUser).val(userDetails[0].username);
                console.log('id ',userDetails[0].id);
                console.log('id ',userDetails[0].password);
            }
            else{
                toastr.warning('No Customer Classification records found!');
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        },
    });
}

function editUserStatus(){
    $.ajax({
        url: "edit_user_status",
        method: "post",
        data: $('#formEditUserStatus').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnAddUserIcon").addClass('fa fa-spinner fa-pulse');
            $("#buttonEditUserStatus").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validationHasError'] == 1){
                toastr.error('Edit user status failed!');
            }else{
                if(response['hasError'] == 0){
                    if(response['status'] == 0){
                        toastr.success('User deactivation success!');
                        dataTablesUsers.draw();
                        dataTablesPendingUsers.draw();
                    }
                    else{
                        toastr.success('User activation success!');
                        dataTablesUsers.draw();
                        dataTablesPendingUsers.draw();
                    }
                }
                $("#modalEditUserStatus").modal('hide');
                $("#formEditUserStatus")[0].reset();
            }

            $("#iBtnAddUserIcon").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditUserStatus").removeAttr('disabled');
            $("#iBtnAddUserIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnChangeUserStatIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnChangeUserStat").removeAttr('disabled');
            $("#iBtnChangeUserStatIcon").addClass('fa fa-check');
        }
    });
}

function editUserAuthentication(){
    $.ajax({
        url: "edit_user_authentication",
        method: "post",
        data: $('#formEditUserAuthentication').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnEditUserAuthenticationIcon").addClass('fa fa-spinner fa-pulse');
            $("#buttonEditUserAuthentication").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validationHasError'] == 1){
                toastr.error('Setting failed!');
            }else{
                if(response['hasError'] == 0){
                    if(response['authentication'] == 0){
                        toastr.success('User was successfully disapproved!');
                        dataTablesUsers.draw();
                        dataTablesPendingUsers.draw();
                    }
                    else{
                        toastr.success('User was successfully approved!');
                        dataTablesUsers.draw();
                        dataTablesPendingUsers.draw();
                    }
                }
                $("#modalEditUserAuthentication").modal('hide');
                $("#formEditUserAuthentication")[0].reset();
            }

            $("#iBtnEditUserAuthenticationIcon").removeClass('fa fa-spinner fa-pulse');
            $("#buttonEditUserAuthentication").removeAttr('disabled');
            $("#iBtnEditUserAuthenticationIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}


/**
 * For Profile update
 */
function getUserBySessionId(userId){
    $.ajax({
        url: "get_user_by_session_id",
        method: "get",
        data: {
            userId : userId,
        },
        dataType: "json",
        beforeSend: function(){

        },
        success: function(response){
            let formEditUser = $('#formEditUser');
            let userDetails = response['userDetails'];
            if(userDetails.length > 0){
                $("#textFirstname", formEditUser).val(userDetails[0].firstname);
                $("#textLastname", formEditUser).val(userDetails[0].lastname);
                $("#textMiddleInitial", formEditUser).val(userDetails[0].middle_initial);
                $("#textEmail", formEditUser).val(userDetails[0].email);
                $("#textContactNumber", formEditUser).val(userDetails[0].contact_number);
                $('select[name="user_level"]', formEditUser).val(userDetails[0]['user_levels'].id).trigger('change');
                $("#textUsername", formEditUser).val(userDetails[0].username);
                console.log('id ',userDetails[0].id);
                console.log('id ',userDetails[0].password);
            }
            else{
                toastr.warning('No Customer Classification records found!');
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        },
    });
}

function editUser(){
	$.ajax({
        url: "edit_user",
        method: "post",
        data: $('#formEditUser').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#btnAddUserIcon").addClass('spinner-border spinner-border-sm');
            $("#btnAddUser").addClass('disabled');
            $("#btnAddUserIcon").removeClass('fa fa-check');
        },
        success: function(response){
            if(response['validationHasError'] == 1){
                toastr.error('Saving user failed!');
                if(response['error']['firstname'] === undefined){
                    $("#textFirstname").removeClass('is-invalid');
                    $("#textFirstname").attr('title', '');
                }
                else{
                    $("#textFirstname").addClass('is-invalid');
                    $("#textFirstname").attr('title', response['error']['firstname']);
                }
                if(response['error']['lastname'] === undefined){
                    $("#textLastname").removeClass('is-invalid');
                    $("#textLastname").attr('title', '');
                }
                else{
                    $("#textLastname").addClass('is-invalid');
                    $("#textLastname").attr('title', response['error']['lastname']);
                }
                if(response['error']['middle_initial'] === undefined){
                    $("#middle_initial").removeClass('is-invalid');
                    $("#middle_initial").attr('title', '');
                }
                else{
                    $("#middle_initial").addClass('is-invalid');
                    $("#middle_initial").attr('title', response['error']['middle_initial']);
                }
                if(response['error']['email'] === undefined){
                    $("#textEmail").removeClass('is-invalid');
                    $("#textEmail").attr('title', '');
                }
                else{
                    $("#textEmail").addClass('is-invalid');
                    $("#textEmail").attr('title', response['error']['email']);
                }
                if(response['error']['contact_number'] === undefined){
                    $("#textContactNumber").removeClass('is-invalid');
                    $("#textContactNumber").attr('title', '');
                }
                else{
                    $("#textContactNumber").addClass('is-invalid');
                    $("#textContactNumber").attr('title', response['error']['contact_number']);
                }
                if(response['error']['user_level'] === undefined){
                    $("#userLevel").removeClass('is-invalid');
                    $("#userLevel").attr('title', '');
                }
                else{
                    $("#userLevel").addClass('is-invalid');
                    $("#userLevel").attr('title', response['error']['user_level']);
                }
                if(response['error']['username'] === undefined){
                    $("#textUsername").removeClass('is-invalid');
                    $("#textUsername").attr('title', '');
                }
                else{
                    $("#textUsername").addClass('is-invalid');
                    $("#textUsername").attr('title', response['error']['username']);
                }
                if(response['error']['password'] === undefined){
                    $("#textPassword").removeClass('is-invalid');
                    $("#textPassword").attr('title', '');
                }
                else{
                    $("#textPassword").addClass('is-invalid');
                    $("#textPassword").attr('title', response['error']['password']);
                }
                if(response['error']['confirm_password'] === undefined){
                    $("#textConfirmPassword").removeClass('is-invalid');
                    $("#textConfirmPassword").attr('title', '');
                }
                else{
                    $("#textConfirmPassword").addClass('is-invalid');
                    $("#textConfirmPassword").attr('title', response['error']['confirm_password']);
                }

            }else if(response['hasError'] == 0){
                $("#formEditUser")[0].reset();
                $("#modalEditUser").modal('hide');
                toastr.success('Succesfully saved!');

                /**
                 * Force to logout the current session after the user updated Profile
                 */
                $('#modalLogout').modal('hide');
                $('#modalSpinner').modal('show');
                setTimeout(() => {
                    UserLogout();
                    console.log("Logging out...")
                }, 600);
            }else{
                toastr.error('Saving user failed!');
            }

            $("#btnAddUserIcon").removeClass('spinner-border spinner-border-sm');
            $("#btnAddUser").removeClass('disabled');
            $("#btnAddUserIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            // toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            toastr.error('An error occured!');
        }
    });
}

function UserLogout(){
    $.ajax({
        url: "logout",
        method: "get",
        dataType: "json",
        beforeSend: function(){

        },
        success: function(reponse){
            if(reponse['result'] == 1){
                window.location = 'signin_page';
            }
            else{
                alert('Logout error!');
            }
        }
    });
}