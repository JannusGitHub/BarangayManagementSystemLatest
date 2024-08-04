@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-top: 8px;">User Management</h3>
                                {{-- <button class="btn float-right reload"><i class="fas fa-sync-alt"></i></button> --}}
                            </div>
                            <div class="card-body">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab">Verified User Tab</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pendingUser" type="button" role="tab">Pending User Tab</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="user" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-lg-7 col-xl-6 pt-4">
                                                <form method="get" id="formDateRange">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <!-- From -->
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Date Range From:</span>
                                                        </div>
                                                        <input type="datetime-local" class="form-control" name="from" id="dateRangeFrom" style="min-width: 70px;">
                                                        
                                                        <!-- To -->
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">To:</span>
                                                        </div>
                                                        <input type="datetime-local" class="form-control" name="to" id="dateRangeTo" style="min-width: 70px;">
                                                        
                                                        <!-- Search -->
                                                        <div class="input-group-prepend">
                                                            <button type="submit" class="btn btn-info" id=""><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-5 col-xl-6 text-right mt-4">
                                                {{-- <button class="btn btn-info" data-toggle="modal" data-target="#modalFilterCustomerClaim" id=""><i class="fas fa-filter fa-md"></i> Filter</button>              --}}
                                                <button type="button" class="btn btn-primary" id="buttonAddUser" data-bs-toggle="modal" data-bs-target="#modalAddUser"><i class="fa fa-plus fa-md"></i> New User</button>
                                            </div>
                                        </div>
                                        {{-- <div class="text-right mt-4">                   
                                            <button type="button" class="btn btn-primary mb-3" id="buttonAddUser" data-bs-toggle="modal" data-bs-target="#modalAddUser"><i class="fa fa-plus fa-md"></i> New User</button>
                                        </div> --}}
                                        <br>
                                        <div class="table-responsive">
                                            <table id="tableUsers" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Status</th>
                                                        <th>Authentication</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Middle Initial</th>
                                                        <th>Email</th>
                                                        <th>Contact #</th>
                                                        <th>Username</th>
                                                        <th>User Level</th>
                                                        <th>Created At</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pendingUser" role="tabpanel">
                                        <div class="table-responsive" style="margin-top: 8.5%;">
                                            <table id="tablePendingUsers" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        {{-- <th>Status</th> --}}
                                                        <th>Voters Id</th>
                                                        <th>Authentication</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Middle Initial</th>
                                                        <th>Email</th>
                                                        <th>Username</th>
                                                        <th>User Level</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <!-- Add User Modal Start -->
    <div class="modal fade" id="modalAddUser" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Add User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddUser" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For User Id -->
                                    <input type="text" class="form-control" style="display: none" name="user_id" id="userId" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">First Name<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" name="firstname" id="textFirstname" placeholder="Firstname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Last Name<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" name="lastname" id="textLastname" placeholder="Lastname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="middleInitial" class="form-label">Middle Initial</label>
                                        <input type="text" class="form-control" name="middle_initial" id="textMiddleInitial" placeholder="Middle Initial">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textSuffix" class="form-label">Suffix</label>
                                        <input type="text" class="form-control" name="suffix" id="textSuffix" placeholder="Suffix">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" name="email" id="textEmail" placeholder="Email Address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Contact Number<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" name="contact_number" id="textContactNumber" placeholder="Contact Number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userLevel" class="form-label">User Level<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="userLevel" name="user_level">
                                            <!-- Auto Generated -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" name="username" id="textUsername" placeholder="Username">
                                    </div>
                                    <div class="mb-3" id="divPassword">
                                        <label for="password" class="form-label">Password<span class="text-danger" title="Required">*</span></label>
                                        <input type="password" class="form-control" name="password" id="textPassword" placeholder="Password">
                                    </div>
                                    <div class="mb-3" id="divConfirmPassword">
                                        <label for="confirmPassword" class="form-label">Confirm Password<span class="text-danger" title="Required">*</span></label>
                                        <input type="password" class="form-control" name="confirm_password" id="textConfirmPassword" placeholder="Confirm Password">
                                    </div>

                                    <!-- Other fields -->
                                    {{-- <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">First Name</span>
                                        </div>
                                        <input type="text" class="form-control" name="first_name" id="txtAddFirstName" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Middle Initial</span>
                                        </div>
                                        <input type="text" class="form-control" name="middle_initial" id="txtAddMiddleInitial" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Last Name</span>
                                        </div>
                                        <input type="text" class="form-control" name="last_name" id="txtAddLastName" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Email Address</span>
                                        </div>
                                        <input type="text" class="form-control" name="email_address" id="txtAddEmailAddress" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Username</span>
                                        </div>
                                        <input type="text" class="form-control" name="username" id="txtAddUsername" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Username</span>
                                        </div>
                                        <input type="text" class="form-control" name="username" id="txtAddUsername" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddUser" class="btn btn-primary"><i id="iBtnAddUserIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add User Modal End -->
    
    <!-- Edit User Status Modal Start -->
    <div class="modal fade" id="modalEditUserStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editUserStatusTitle"><i class="fas fa-info-circle"></i> Edit User Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditUserStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditUserStatus"></p>
                        <input type="hidden" name="user_id" placeholder="User Id" id="textEditUserStatusUserId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditUserStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditUserStatus" class="btn btn-primary"><i id="iBtnAddUserIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit User Status Modal End -->

    <!-- Edit User Request Modal Start -->
    <div class="modal fade" id="modalEditUserAuthentication" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editUserAuthenticationTitle"><i class="fas fa-info-circle"></i></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditUserAuthentication" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditUserAuthentication"></p>
                        <input type="hidden" name="user_id" placeholder="User Id" id="textEditUserAuthenticationUserId">
                        <input type="hidden" name="authentication" placeholder="Authentication" id="textEditUserAuthentication">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditUserAuthentication" class="btn btn-primary"><i id="iBtnEditUserAuthenticationIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit User Request Modal End -->
@endsection

<!--     {{-- JS CONTENT --}} -->
@section('js_content')
    <script type="text/javascript">
        $(document).ready(function () {
            // Initialize Select2 Elements
            // $('.bootstrap-5').select2();
            $('.bootstrap-5').select2({
                theme: 'bootstrap-5'
            });

            getUserLevel($('#userLevel'));

            $("#formAddUser").submit(function(event){
                event.preventDefault();
                addUserAsAdmin();
            });

            dataTablesUsers = $("#tableUsers").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "language": {
                    "info": "Showing _START_ to _END_ of _TOTAL_ user records",
                    "lengthMenu": "Show _MENU_ user records",
                },
                "ajax" : {
                    url: "view_users",
                    data: function (param){
                        // param.filterCustomer                = $('#selectFilterCustomerId').val();
                        // param.filterModeOfDefect            = $('#txtFilterModeOfDefectId').val();
                        param.dateRangeFrom                 = $('#dateRangeFrom', $('#formDateRange')).val();
                        param.dateRangeTo                   = $('#dateRangeTo', $('#formDateRange')).val();
                    },
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "status"},
                    { "data" : "is_authenticated"},
                    { "data" : "firstname"},
                    { "data" : "lastname"},
                    { "data" : "middle_initial"},
                    { "data" : "email"},
                    { "data" : "contact_number"},
                    { "data" : "username"},
                    { "data" : "user_levels.name"},
                    { "data" : "created_at"},
                ],
            });

            dataTablesPendingUsers = $("#tablePendingUsers").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "language": {
                    "info": "Showing _START_ to _END_ of _TOTAL_ pending user records",
                    "lengthMenu": "Show _MENU_ pending user records",
                },
                "ajax" : {
                    url: "view_pending_users",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    // { "data" : "status"},
                    { "data" : "voters_id"},
                    { "data" : "is_authenticated"},
                    { "data" : "firstname"},
                    { "data" : "lastname"},
                    { "data" : "middle_initial"},
                    { "data" : "email"},
                    { "data" : "username"},
                    { "data" : "user_levels.name"},
                ],
            });

            $("#buttonAddUser").on('click', function(){
                $("#divPassword").removeClass('d-none');
                $("#divConfirmPassword").removeClass('d-none');
            });

            $(document).on('click', '.actionEditUser', function(){
                let id = $(this).attr('user-id');
                $("input[name='user_id'", $("#formAddUser")).val(id);
                $("#divPassword").addClass('d-none');
                $("#divConfirmPassword").addClass('d-none');
                getCustomerById(id);
            });

            $(document).on('click', '.actionEditUserStatus', function(){
                let userStatus = $(this).attr('user-status');
                let userId = $(this).attr('user-id');

                $("#textEditUserStatus").val(userStatus);
                $("#textEditUserStatusUserId").val(userId);

                if(userStatus == 1){
                    $("#paragraphEditUserStatus").text('Are you sure to deactivate the user?');
                }
                else{
                    $("#paragraphEditUserStatus").text('Are you sure to activate the user?');
                }
            });

            $("#formEditUserStatus").submit(function(event){
                event.preventDefault();
                editUserStatus();
            });

            $("#tablePendingUsers").on('click', '.actionEditUserAuthentication', function(){
                let userAuthentication = $(this).attr('user-authentication');
                let userId = $(this).attr('user-id');

                $("#textEditUserAuthentication").val(userAuthentication);
                $("#textEditUserAuthenticationUserId").val(userId);

                if(userAuthentication == 1){
                    $("#paragraphEditUserAuthentication").text('Are you sure to disapprove the request?');
                    $("#editUserAuthenticationTitle").text('Disapprove User');
                }
                else{
                    $("#paragraphEditUserAuthentication").text('Are you sure to approve the request?');
                    $("#editUserAuthenticationTitle").text('Approve User');
                }
            });

            $("#formEditUserAuthentication").submit(function(event){
                event.preventDefault();
                editUserAuthentication();
            });

            $("#formDateRange").submit(function(event) {
                event.preventDefault();
                dataTablesUsers.ajax.reload(null, false);
            });
        });
    </script>
@endsection

