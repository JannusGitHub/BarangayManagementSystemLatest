@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Barangay Official Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>   
                            <li class="breadcrumb-item active">Barangay Official Management</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">Barangay Official Management</h3>
                                {{-- <button class="btn float-right reload"><i class="fas fa-sync-alt"></i></button> --}}
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">                   
                                    <button type="button" id="buttonAddBarangayOfficial" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarangayOfficial"><i class="fa fa-plus fa-md"></i> New Barangay Official</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="tableBarangayOfficial" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Start Term</th>
                                                <th>End Term</th>
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
    

    <!-- Add Official Modal Start -->
    <div class="modal fade" id="modalAddBarangayOfficial" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Barangay Official Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddBarangayOfficial" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="barangay_official_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Name</span>
                                        </div>
                                        <input type="text" class="form-control" name="name" id="textAddName" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Position</span>
                                        </div>
                                        <select class="form-select" id="selectAddPosition" name="position">
                                            <option value="0" disabled selected>Select One</option>
                                            <option value="1">Chairman</option>
                                            <option value="2">Councilor</option>
                                            <option value="3">SK Chairman</option>
                                            <option value="4">SK Councilor</option>
                                            <option value="5">Treasurer</option>
                                            <option value="6">Secretary</option>
                                            <option value="7">BPSO Chief</option>
                                            <option value="8">Deputy Chief</option>
                                            <option value="9">Deputy On Operation</option>
                                            <option value="10">Investigator</option>
                                            <option value="11">Other</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Start Term</span>
                                        </div>
                                        <input type="datetime-local" class="form-control" name="start_term" id="textAddStartTerm" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">End Term</span>
                                        </div>
                                        <input type="datetime-local" class="form-control" name="end_term" id="textAddEndTerm" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3" id="divUploadImage">
                                        <div class="input-group-prepend w-50">
                                            <label class="input-group-text w-100 fw-normal" for="inputGroupFile01">Upload Image</label>
                                        </div>
                                        <input type="text" class="form-control d-none" disabled id="textAddImage"> <!-- Only for showing fetched file -->
                                        <input type="file" class="form-control" name="image" id="fileAddImage">
                                    </div>
                                    <div class="d-none" id="divReuploadImage">
                                        <input type="checkbox" id="checkboxImage" name="checkbox_image">
                                        <label class="font-weight-normal" for="checkboxImage">Re-upload Image</label>
                                    </div>

                                    <div class="input-group mb-3 d-none" id="divUploadSignature">
                                        <div class="input-group-prepend w-50">
                                            <label class="input-group-text w-100 fw-normal" for="inputGroupFile01">Upload E-Signature</label>
                                        </div>
                                        <input type="text" class="form-control d-none" disabled id="textAddSignature"> <!-- Only for showing fetched file -->
                                        <input type="file" class="form-control" name="signature" id="fileAddSignature">
                                    </div>
                                    <div class="d-none" id="divReuploadSignature">
                                        <input type="checkbox" id="checkboxSignature" name="checkbox_signature">
                                        <label class="font-weight-normal" for="checkboxSignature">Re-upload E-Signature</label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddBarangayOfficial" class="btn btn-primary" title="On going module"><i id="iconAddBarangayOfficial" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Official Modal End -->

    <!-- Edit Official Status Modal Start -->
    <div class="modal fade" id="modalEditBarangayOfficialStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editOfficialStatusTitle"><i class="fas fa-info-circle"></i> Edit Official Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditBarangayOfficialStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditOfficialStatus"></p>
                        <input type="hidden" name="barangay_official_id" placeholder="Official Id" id="textEditOfficialStatusOfficialId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditOfficialStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditOfficialStatus" class="btn btn-primary"><i id="iconEditOfficial" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Official Status Modal End -->
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

            $("#buttonAddBarangayOfficial").on('click',function(){
                $('#textAddImage').addClass('d-none');
                $('#divReuploadImage').addClass('d-none');
                $('#fileAddImage').removeClass('d-none');

                
                $('#textAddSignature').addClass('d-none');
                $('#divUploadSignature').addClass('d-none');
                $('#divReuploadSignature').addClass('d-none');
                $('#fileAddSignature').removeClass('d-none');
            });
            
            $("#formAddBarangayOfficial").submit(function(event){
                event.preventDefault();
                addBarangayOfficial();
            });

            dataTablesBarangayOfficial = $("#tableBarangayOfficial").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_barangay_official",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "name"},
                    { "data" : "position"},
                    { "data" : "start_term"},
                    { "data" : "end_term"},
                    { "data" : "status"},
                ],
                "columnDefs": [
                    { className: 'align-middle', targets: [0, 1, 2, 3, 4, 5] },
                ],
                "createdRow": function(row, data, index) {
                    $('td', row).eq(3).css('white-space', 'normal');
                    // console.log('row ', row);
                    // console.log('data ', data);
                    // console.log('index ', index);
                },
            });

            $(document).on('click', '.actionEditBarangayOfficial', function(){
                let id = $(this).attr('barangay-official-id');
                console.log('id ', id);
                $("input[name='barangay_official_id'", $("#formAddBarangayOfficial")).val(id);
                getBarangayOfficialById(id);
            });

            $('#selectAddPosition').on('change', function(e) {
                let selectedPosition = $(this).find(':selected').val();
                console.log('selectedPosition ', selectedPosition);
                let barangayOfficialId = $("input[name='barangay_official_id'", $("#formAddBarangayOfficial")).val();

                if(selectedPosition == 1){
                    $('#divUploadSignature').removeClass('d-none');

                    if(barangayOfficialId != ''){ // In edit
                        $('#divReuploadSignature').removeClass('d-none');
                    }else{
                        $('#divReuploadSignature').addClass('d-none');
                    }
                }
                else{
                    $('#divUploadSignature').addClass('d-none');
                    $('#divReuploadSignature').addClass('d-none');
                }
            });
            
            $(document).on('click', '.actionEditBarangayOfficialStatus', function(){
                let barangayOfficialStatus = $(this).attr('barangay-official-status');
                let barangayOfficialId = $(this).attr('barangay-official-id');
                
                $("#textEditOfficialStatus").val(barangayOfficialStatus);
                $("#textEditOfficialStatusOfficialId").val(barangayOfficialId);

                if(barangayOfficialStatus == 1){
                    $("#paragraphEditOfficialStatus").text('Are you sure to disabled?');
                }
                else{
                    $("#paragraphEditOfficialStatus").text('Are you sure to enabled?');
                }
            });

            $("#formEditBarangayOfficialStatus").submit(function(event){
                event.preventDefault();
                editBarangayOfficialStatus();
            });
        });
    </script>
@endsection
