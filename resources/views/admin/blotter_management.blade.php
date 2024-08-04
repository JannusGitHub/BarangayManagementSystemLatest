@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Barangay Resident Blotter Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Barangay Resident Blotter Management</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">Barangay Resident Blotter Management</h3>
                            </div>
                            <div class="card-body">
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
                                        <button class="btn btn-info" data-toggle="modal" data-target="#modalFilterCustomerClaim" id=""><i class="fas fa-filter fa-md"></i> Filter</button>             
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarangayResidentBlotter"><i class="fa fa-plus fa-md"></i> New Resident Blotter</button>
                                    </div>
                                </div>
                                <br>
                                {{-- <div class="text-right mt-4">                   
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarangayResidentBlotter"><i class="fa fa-plus fa-md"></i> New ResidentBlotter</button>
                                </div><br> --}}
                                <div class="table-responsive">
                                    <table id="tableBarangayResidentBlotter" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Case Number</th>
                                                <th>Complainant</th>
                                                <th>Respondent</th>
                                                <th>Respondent Address</th>
                                                <th>Incident Location</th>
                                                <th>Reported Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    

    <!-- Add Barangay ResidentBlotter Modal Start -->
    <div class="modal fade" id="modalAddBarangayResidentBlotter" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Barangay Resident Blotter Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddBarangayResidentBlotter" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Barangay ResidentBlotter Id -->
                                    <input type="text" class="form-control" style="display: none" name="barangay_resident_blotter_id" id="BarangayResidentBlotterId" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    
                                    <div class="mb-3">
                                        <label for="textCaseNumber" class="form-label">Case Number<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" name="case_number" id="textCaseNumber" placeholder="Case Number">
                                    </div>

                                    {{-- <div class="mb-3">
                                        <label for="selectUser" class="form-label">Select Complainant<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="selectUser" name="user_id">
                                            <!-- Auto Generated -->
                                        </select>
                                    </div> --}}

                                    <div class="mb-3">
                                        <label for="selectResident" class="form-label">Select Complainant<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="selectResident" name="barangay_resident_id">
                                            <!-- Auto Generated -->
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Complainant Statement<span class="text-danger" title="Required">*</span></label>
                                        <textarea type="text" class="form-control" rows="4" name="complainant_statement" id="textComplainantStatement" placeholder="Complainant Statement"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="textRespondent" class="form-label">Respondent</label>
                                        <input type="text" class="form-control" name="respondent" id="textRespondent" placeholder="Respondent">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textRespondentAge" class="form-label">Respondent Age</label>
                                        <input type="text" class="form-control" min="1" max="200" name="respondent_age" id="textRespondentAge" placeholder="Respondent Age">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textRespondentAddress" class="form-label">Respondent Address</label>
                                        <input type="text" class="form-control" name="respondent_address" id="textRespondentAddress" placeholder="Respondent Address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textRespondentContactNumber" class="form-label">Respondent Contact Number</label>
                                        <input type="number" class="form-control" name="respondent_contact_number" id="textRespondentContactNumber" placeholder="Respondent Contact Number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textPersonInvolved" class="form-label">Person Involved</label>
                                        <input type="text" class="form-control" name="person_involved" id="textPersonInvolved" placeholder="Person Involved">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textIncidentLocation" class="form-label">Incident Location</label>
                                        <input type="text" class="form-control" name="incident_location" id="textIncidentLocation" placeholder="Incident Location">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textIncidentDate" class="form-label">Incident Date</label>
                                        <input type="datetime-local" class="form-control" name="incident_date" id="textIncidentDate" placeholder="Incident Date">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="textReportedDate" class="form-label">Reported Date</label>
                                        <input type="text" class="form-control" name="reported_date" id="textReportedDate" placeholder="Reported Date">
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="selectActionTaken" class="form-label">Action Taken</label>
                                        <select class="form-select" id="selectActionTaken" name="action_taken">
                                            <option value="0" disabled selected>Select One</option>
                                            <option value="1">Negotiating</option>
                                            <option value="2">Both Signed</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="selectStatus" class="form-label">Status</label>
                                        <select class="form-select" id="selectStatus" name="status">
                                            <option value="0" disabled selected>Select One</option>
                                            <option value="1">New</option>
                                            <option value="2">On-Going</option>
                                            <option value="3">Pending</option>
                                            <option value="4">Report</option>
                                            <option value="5">Solved</option>
                                            <option value="6">Not Solved</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="textRemarks" class="form-label">Remarks</label>
                                        <input type="text" class="form-control" min="1" max="200" name="remarks" id="textRemarks" placeholder="Remarks">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddBarangayResidentBlotter" class="btn btn-primary" title="On going module"><i id="iconAddBarangayResidentBlotter" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Barangay ResidentBlotter Modal End -->

    <!-- Edit Barangay ResidentBlotter Status Modal Start -->
    <div class="modal fade" id="modalEditBarangayResidentBlotterStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editBarangayResidentBlotterStatusTitle"><i class="fas fa-info-circle"></i> Edit Barangay Resident Blotter Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditBarangayResidentBlotterStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditBarangayResidentBlotterStatus"></p>
                        <input type="hidden" name="barangay_resident_blotter_id" placeholder="Barangay ResidentBlotter Id" id="textEditBarangayResidentBlotterStatusBarangayResidentBlotterId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditBarangayResidentBlotterStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditBarangayResidentBlotterStatus" class="btn btn-primary"><i id="iconEditBarangayResidentBlotter" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Barangay ResidentBlotter Status Modal End -->
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
            
            // getUsers($('#selectUser'));
            getResidents($('#selectResident'));

            $("#formAddBarangayResidentBlotter").submit(function(event){
                event.preventDefault();
                addBarangayResidentBlotter();
            });

            dataTablesBarangayResidentBlotter = $("#tableBarangayResidentBlotter").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_barangay_resident_blotter",
                    data: function (param){
                        param.dateRangeFrom                 = $('#dateRangeFrom', $('#formDateRange')).val();
                        param.dateRangeTo                   = $('#dateRangeTo', $('#formDateRange')).val();
                    },
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "case_number"},
                    { "data" : function(data){
                        return capitalizeFirstLetter(data.resident_info.user_info.firstname) + ' ' +capitalizeFirstLetter(data.resident_info.user_info.lastname);
                    }},
                    
                    { "data" : "respondent"},
                    { "data" : "respondent_address"},
                    { "data" : "incident_location"},
                    { "data" : "created_at"},
                    // { "data" : function(data){
                    //         console.log('data ', moment(data.created_at).format('MMMM Do YYYY, h:mm:ss a'));
                    //         console.log('data created_at', data.created_at);
                    //         return moment(data.created_at).format("dddd, MMM D YYYY");
                    //     }
                    // },
                    { "data" : "status"},
                ],
                "columnDefs": [
                    // { className: 'align-middle', targets: [0, 1, 2, 3, 4, 5, 6 ,7] },
                    { className: 'text-center', targets: [0, 1, 2, 3, 4, 5, 6 ,7] },
                ],
                "createdRow": function(row, data, index) {
                    $('td', row).eq(1).css('white-space', 'normal');
                    $('td', row).eq(2).css('white-space', 'normal');
                    // console.log('row ', row);
                    // console.log('data ', data);
                    // console.log('index ', index);
                },
            });

            $(document).on('click', '.actionEditBarangayResidentBlotter', function(){
                let id = $(this).attr('barangay-resident-blotter-id');
                console.log('id ', id);
                $("input[name='barangay_resident_blotter_id'", $("#formAddBarangayResidentBlotter")).val(id);
                getBarangayResidentBlotterById(id);
            });

            $("#formEditBarangayResidentBlotterStatus").submit(function(event){
                event.preventDefault();
                editBarangayResidentBlotterStatus();
            });

            $("#formDateRange").submit(function(event) {
                event.preventDefault();
                dataTablesBarangayResidentBlotter.ajax.reload(null, false);
            });
        });
    </script>
@endsection
