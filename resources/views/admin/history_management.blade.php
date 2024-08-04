@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>History Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">History Management</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">History Management</h3>
                            </div>
                            <div class="card-body">
                                {{-- <div class="text-right mt-4">                   
                                    <button type="button" id="buttonAddBarangayHistory" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarangayHistory"><i class="fa fa-plus fa-md"></i> New History</button>
                                </div><br> --}}
                                <div class="table-responsive">
                                    <table id="tableBarangayHistory" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Title</th>
                                                <th>Details</th>
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
    

    <!-- Add History Modal Start -->
    <div class="modal fade" id="modalAddBarangayHistory" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;History Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddBarangayHistory" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="barangay_history_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 20% !important;">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Title</span>
                                        </div>
                                        <input type="text" class="form-control" name="title" id="textAddTitle" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 20% !important;">
                                            <span class="input-group-text w-100 text-left" id="inputGroup-sizing-default">Details<br>(Just enter to create stanzas)</span>
                                        </div>
                                        <textarea type="text" class="form-control" rows="10" name="details" id="textAddDetails" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddBarangayHistory" class="btn btn-primary" title="On going module"><i id="iconAddBarangayHistory" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add History Modal End -->

    <!-- Edit History Status Modal Start -->
    <div class="modal fade" id="modalEditBarangayHistoryStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editHistoryStatusTitle"><i class="fas fa-info-circle"></i> Edit History Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditBarangayHistoryStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditHistoryStatus"></p>
                        <input type="hidden" name="barangay_history_id" placeholder="History Id" id="textEditHistoryStatusHistoryId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditHistoryStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditHistoryStatus" class="btn btn-primary"><i id="iconEditHistory" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit History Status Modal End -->
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
            
            $("#formAddBarangayHistory").submit(function(event){
                event.preventDefault();
                addBarangayHistory();
            });

            dataTablesBarangayHistory = $("#tableBarangayHistory").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_barangay_history",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "title"},
                    { "data" : "details"},
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

            $(document).on('click', '.actionEditBarangayHistory', function(){
                let id = $(this).attr('barangay-history-id');
                console.log('id ', id);
                $("input[name='barangay_history_id'", $("#formAddBarangayHistory")).val(id);
                getBarangayHistoryById(id);
            });
            
            $(document).on('click', '.actionEditBarangayHistoryStatus', function(){
                let barangayHistoryStatus = $(this).attr('barangay-history-status');
                let barangayHistoryId = $(this).attr('barangay-history-id');
                
                $("#textEditHistoryStatus").val(barangayHistoryStatus);
                $("#textEditHistoryStatusHistoryId").val(barangayHistoryId);

                if(barangayHistoryStatus == 1){
                    $("#paragraphEditHistoryStatus").text('Are you sure to deactivate?');
                }
                else{
                    $("#paragraphEditHistoryStatus").text('Are you sure to activate?');
                }
            });

            $("#formEditBarangayHistoryStatus").submit(function(event){
                event.preventDefault();
                editBarangayHistoryStatus();
            });
        });
    </script>
@endsection
