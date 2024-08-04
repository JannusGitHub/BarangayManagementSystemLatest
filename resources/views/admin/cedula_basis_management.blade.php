@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Issuance Configuration Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Issuance Configuration Management</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">Issuance Configuration Management</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">                   
                                    <button type="button" class="btn btn-primary" id="buttonAddCedulaBasisModal" data-bs-toggle="modal" data-bs-target="#modalAddCedulaBasis"><i class="fa fa-plus fa-md"></i> New Issuance Configuration</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="tableCedulaBasis" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Processing Time</th>
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
    

    <!-- Add Cedula Configuration Modal Start -->
    <div class="modal fade" id="modalAddCedulaBasis" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Cedula Configuration Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddCedulaBasis" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="cedula_basis_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 50%">
                                            <span class="input-group-text w-100 text-left" id="inputGroup-sizing-default">Name</span>
                                        </div>
                                        <select class="form-select" id="selectAddName" name="name">
                                            <option value="0" disabled selected>Select One</option>
                                            <option value="1">Brgy. Clearance</option>
                                            <option value="2">Indigency</option>
                                            <option value="3">Residency</option>
                                            <option value="4">Registration</option>
                                            <option value="5">License & Permit</option>
                                            <option value="6">Cedula</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 50%">
                                            <span class="input-group-text w-100 text-left" id="inputGroup-sizing-default">Amount</span>
                                        </div>
                                        <input type="text" class="form-control" name="amount" id="textAddAmount" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" style="width: 50%">
                                            <span class="input-group-text w-100 text-left" id="inputGroup-sizing-default">Cedula Processing Time</span>
                                        </div>
                                        <select class="form-select" id="selectAddProcessingTime" name="processing_time">
                                            <option value="0" disabled selected>Select One</option>
                                            <option value="1">1 Day</option>
                                            <option value="2">2 Days</option>
                                            <option value="3">3 Days</option>
                                            <option value="4">4 Days</option>
                                            <option value="5">5 Days</option>
                                            <option value="6">1 Week</option>
                                            <option value="7">2 Weeks</option>
                                            <option value="8">3 Weeks</option>
                                            <option value="9">1 Month</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddCedulaBasis" class="btn btn-primary" title="On going module"><i id="iconAddCedulaBasis" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Cedula Configuration Modal End -->

    <!-- Edit Cedula Configuration Status Modal Start -->
    <div class="modal fade" id="modalEditCedulaBasisStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editCedulaBasisStatusTitle"><i class="fas fa-info-circle"></i> Edit Cedula Configuration Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditCedulaBasisStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditCedulaBasisStatus"></p>
                        <input type="hidden" name="cedula_basis_id" placeholder="CedulaBasis Id" id="textEditCedulaBasisStatusCedulaBasisId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditCedulaBasisStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditCedulaBasisStatus" class="btn btn-primary"><i id="iconEditCedulaBasis" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Cedula Configuration Status Modal End -->
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

            // function checkCedulaBasisExistence(){
            //     $.ajax({
            //         url: "check_cedula_basis_existence",
            //         method: "get",
            //         dataType: "json",
            //         beforeSend: function(){

            //         },
            //         success: function(response){
            //             let cedulaBasisDetails = response['cedulaBasisDetails'];
            //             if(cedulaBasisDetails.length > 0){
            //                 $("#buttonAddCedulaBasisModal").addClass('d-none');
            //             }else{
            //                 $("#buttonAddCedulaBasisModal").removeClass('d-none');
            //             }
            //         },
            //         error: function(data, xhr, status){
            //             toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            //         },
            //     });
            // }
            // checkCedulaBasisExistence();
            
            $("#formAddCedulaBasis").submit(function(event){
                event.preventDefault();
                addCedulaBasis();
                // checkCedulaBasisExistence(); 
            });

            dataTablesCedulaBasis = $("#tableCedulaBasis").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_cedula_basis",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "name"},
                    { "data" : "amount"},
                    { "data" : "processing_time"},
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

            $(document).on('click', '.actionEditCedulaBasis', function(){
                let id = $(this).attr('cedula-basis-id');
                console.log('id ', id);
                $("input[name='cedula_basis_id'", $("#formAddCedulaBasis")).val(id);
                getCedulaBasisById(id);
            });
            
            $(document).on('click', '.actionEditCedulaBasisStatus', function(){
                let barangayCedulaBasisStatus = $(this).attr('cedula-basis-status');
                let barangayCedulaBasisId = $(this).attr('cedula-basis-id');
                
                $("#textEditCedulaBasisStatus").val(barangayCedulaBasisStatus);
                $("#textEditCedulaBasisStatusCedulaBasisId").val(barangayCedulaBasisId);

                if(barangayCedulaBasisStatus == 1){
                    $("#paragraphEditCedulaBasisStatus").text('Are you sure to deactivate?');
                }
                else{
                    $("#paragraphEditCedulaBasisStatus").text('Are you sure to activate?');
                }
            });

            $("#formEditCedulaBasisStatus").submit(function(event){
                event.preventDefault();
                editCedulaBasisStatus();
                checkCedulaBasisExistence();
            });
        });
    </script>
@endsection
