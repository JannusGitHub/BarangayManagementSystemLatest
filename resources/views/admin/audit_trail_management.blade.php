@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Audit Trail Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Audit Trail Management</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">Audit Trail Management</h3>
                            </div>
                            <div class="card-body">
                                {{-- <div class="text-right mt-4">                   
                                    <button type="button" id="buttonAddAuditTrail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddAuditTrail"><i class="fa fa-plus fa-md"></i> New Audit Trail</button>
                                </div><br> --}}
                                <div class="table-responsive">
                                    <table id="tableAuditTrail" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Brgy. Id #</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Issuance Name</th>
                                                <th>Amount</th>
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
    

    <!-- Add MissionVision Modal Start -->
    <div class="modal fade" id="modalAddAuditTrail" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Audit Trail Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddAuditTrail" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="audit_trail_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 25% !important;">
                                            <span class="input-group-text w-100 text-left" id="inputGroup-sizing-default">Mission<br>(Just enter to create stanzas)</span>
                                        </div>
                                        <textarea type="text" class="form-control" rows="5" name="mission" id="textAddMission" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 25% !important;">
                                            <span class="input-group-text w-100 text-left" id="inputGroup-sizing-default">Vision<br>(Just enter to create stanzas)</span>
                                        </div>
                                        <textarea type="text" class="form-control" rows="5" name="vision" id="textAddVision" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddAuditTrail" class="btn btn-primary" title="On going module"><i id="iconAddAuditTrail" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add MissionVision Modal End -->

    <!-- Edit MissionVision Status Modal Start -->
    <div class="modal fade" id="modalEditAuditTrailStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editMissionVisionStatusTitle"><i class="fas fa-info-circle"></i> Edit Audit Trail Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditAuditTrailStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditMissionVisionStatus"></p>
                        <input type="hidden" name="audit_trail_id" placeholder="MissionVision Id" id="textEditMissionVisionStatusMissionVisionId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditMissionVisionStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditMissionVisionStatus" class="btn btn-primary"><i id="iconEditMissionVision" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit MissionVision Status Modal End -->
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
            
            $("#formAddAuditTrail").submit(function(event){
                event.preventDefault();
                addAuditTrail();
            });

            dataTablesAuditTrail = $("#tableAuditTrail").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_audit_trail",
                },
                "columns":[
                    // <th>Brgy. Id #</th>
                    // <th>Name</th>
                    // <th>Age</th>
                    // <th>Issuance Name</th>
                    // <th>Amount</th>
                    // <th>Status</th>
                    { "data" : "barangay_id_number"},
                    { "data" : function(data){
                        return capitalizeFirstLetter(data.resident_info.user_info.firstname) + ' ' +capitalizeFirstLetter(data.resident_info.user_info.lastname);
                    }},
                    { "data" : "age"},
                    { "data" : "vision"},
                    { "data" : "status"},
                ],
                "columnDefs": [
                    { className: 'align-middle', targets: [0, 1, 2, 3] },
                ],
                "createdRow": function(row, data, index) {
                    $('td', row).eq(1).css('white-space', 'normal');
                    $('td', row).eq(2).css('white-space', 'normal');
                    // console.log('row ', row);
                    // console.log('data ', data);
                    // console.log('index ', index);
                },
            });

            $(document).on('click', '.actionEditAuditTrail', function(){
                let id = $(this).attr('barangay-mission-vision-id');
                console.log('id ', id);
                $("input[name='audit_trail_id'", $("#formAddAuditTrail")).val(id);
                getAuditTrailById(id);
            });
            
            $(document).on('click', '.actionEditAuditTrailStatus', function(){
                let barangayMissionVisionStatus = $(this).attr('barangay-mission-vision-status');
                let barangayMissionVisionId = $(this).attr('barangay-mission-vision-id');
                
                $("#textEditMissionVisionStatus").val(barangayMissionVisionStatus);
                $("#textEditMissionVisionStatusMissionVisionId").val(barangayMissionVisionId);

                if(barangayMissionVisionStatus == 1){
                    $("#paragraphEditMissionVisionStatus").text('Are you sure to deactivate?');
                }
                else{
                    $("#paragraphEditMissionVisionStatus").text('Are you sure to activate?');
                }
            });

            $("#formEditAuditTrailStatus").submit(function(event){
                event.preventDefault();
                editAuditTrailStatus();
            });
        });
    </script>
@endsection
