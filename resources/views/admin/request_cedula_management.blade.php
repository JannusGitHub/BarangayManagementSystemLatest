@extends('layouts.user_layout')

@php
    $isLogin = false;
    if(!isset($_SESSION)){ 
        session_start(); 
    } 

    if(isset($_SESSION['session_user_id'])){
        $isLogin = true;
        $user_level_id = $_SESSION['session_user_level_id']; 
        $user_id =  $_SESSION["session_user_id"];
    }else {
        echo '<script type="text/javascript">
                window.location = "/";
            </script>';
    }
@endphp

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Request Cedula Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Request Cedula Management</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">Request Cedula Management</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">                   
                                    <button type="button" id="buttonAddCedula" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddRequestCedula"><i class="fa fa-plus fa-md"></i> New Request Cedula</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="tableRequestCedula" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                {{-- <th>Action</th> --}}
                                                <th>Name</th>
                                                <th>Total Amount</th>
                                                <th>Ticket Number</th>
                                                <th>Ticket Date</th>
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
    

    <!-- Add Request Cedula Modal Start -->
    <div class="modal fade" id="modalAddRequestCedula" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Request Cedula Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddRequestCedula" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="cedula_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    <!-- Id of Request Cedula Basis -->
                                    <input type="text" class="form-control" style="display: none" name="issuance_configuration_id" id="issuanceConfigurationId" placeholder="Issuance Certificate Id">

                                    <!-- Start Auto Generated based on Selected Resident -->
                                    <div class="mb-3">
                                        <input type="text" style="display: none;" class="form-control" name="user_id" value="{{ $user_id }}" id="textUserId" placeholder="User Id | Resident Id">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textTicketNumber" class="form-label">Ticket Number</label>
                                                <input type="text" class="form-control" name="ticket_number" id="textTicketNumber" readonly placeholder="Auto Generated after save">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textTicketDate" class="form-label">Ticket Date</label>
                                                <input type="text" class="form-control" name="ticket_datetime" id="textTicketDate" readonly placeholder="Auto Generated after save">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textTotalAmount" class="form-label">Total amount to be paid <span class="text-primary" title="Amount may vary based on admin"><i class="fas fa-info-circle"></i></span></label>
                                                <input type="text" class="form-control" name="total_amount" id="textTotalAmount" readonly placeholder="Total Amount">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textProcessingTime" class="form-label">Processing Time <span class="text-primary" title="Processing time may vary on admin"><i class="fas fa-info-circle"></i></span></label>
                                                <input type="text" class="form-control" name="cedula_processing_time" id="textProcessingTime" readonly placeholder="Processing Time">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textPurok" class="form-label">Purok<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="purok" id="textPurok" readonly placeholder="Purok">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textBlock" class="form-label">Block<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="block" id="textBlock" readonly placeholder="Block">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textLot" class="form-label">Lot<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="lot" id="textLot" readonly placeholder="Lot">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textStreet" class="form-label">Street<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="street" id="textStreet" readonly placeholder="Street">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textCitizenship" class="form-label">Citizenship<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="nationality" id="textCitizenship" readonly placeholder="Citizenship">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textPlaceOfBirth" class="form-label">Place of Birth<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="birth_place" id="textPlaceOfBirth" readonly placeholder="Place of Birth">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textSex" class="form-label">Sex<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="gender" id="textSex" readonly placeholder="Sex">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textCivilStatus" class="form-label">Civil Status<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="civil_status" id="textCivilStatus" readonly placeholder="Civil Status">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Auto Generated based on Selected Resident -->

                                    <div class="row">
                                            {{-- <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="textCedulaNumber" class="form-label">Request Cedula Number<span class="text-danger" title="Required">*</span></label>
                                                    <input type="text" class="form-control" name="cedula_number" id="textCedulaNumber" placeholder="RequestCedula Number">
                                                </div>
                                            </div> --}}
                                        {{-- <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textORNumber" class="form-label">OR Number<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="or_number" id="textORNumber" placeholder="OR Number">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textHeight" class="form-label">Height<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="height" id="textHeight" placeholder="Height">
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textWeight" class="form-label">Weight<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="weight" id="textWeight" placeholder="Weight">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textTinNumber" class="form-label">Tin Number(If Any)</label>
                                                <input type="text" class="form-control" name="tin_number" id="textTinNumber" placeholder="Tin Number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        {{-- <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textDateIssued" class="form-label">Date Issued<span class="text-danger" title="Required">*</span></label>
                                                <input type="date" class="form-control" name="date_issued" id="textDateIssued" placeholder="Date Issued">
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textIssuedAt" class="form-label">Issued At<span class="text-danger" title="Required">*</span></label>
                                                <input type="text" class="form-control" name="issued_at" id="textIssuedAt" placeholder="Issued At">
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="textStatus" class="form-label">Status<span class="text-danger" title="Required">*</span></label>
                                                <select class="form-select" id="selectStatus" name="status">
                                                    <option value="0" disabled selected>Select One</option>
                                                    <option value="1">To be claimed</option>
                                                    <option value="2">Processing</option>
                                                    <option value="3">Pending</option>
                                                    <option value="4">Disapproved</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddCedula" class="btn btn-primary"><i id="iconAddCedula" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add RequestCedula Modal End -->
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
            
            $("#formAddRequestCedula").submit(function(event){
                event.preventDefault();
                addRequestCedula();
                
            });

            let user_id = {{ $user_id }};
            console.log('user_id ',user_id);
            dataTablesRequestCedula = $("#tableRequestCedula").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_request_cedula",
                    data: function (param){
                        param.userId = user_id;
                    },
                },
                "columns":[
                    // { "data" : "action", orderable:false, searchable:false},
                    { "data" : function(data){
                        return capitalizeFirstLetter(data.resident_info.user_info.firstname) + ' ' +capitalizeFirstLetter(data.resident_info.user_info.lastname);
                    }},
                    { "data" : "total_amount"},
                    { "data" : "ticket_number"},
                    { "data" : "ticket_datetime"},
                    { "data" : "processing_time"},
                    { "data" : "status"},
                ],
                "columnDefs": [
                    { className: 'align-middle', targets: [0, 1, 2, 3, 4, 5]}, // Always check this
                ],
                "createdRow": function(row, data, index) {
                    $('td', row).eq(1).css('white-space', 'normal');
                    $('td', row).eq(2).css('white-space', 'normal');
                    // console.log('row ', row);
                    // console.log('data ', data);
                    // console.log('index ', index);
                },
            });

            $(document).on('click', '.actionEditCedula', function(){
                let id = $(this).attr('cedula-id');
                console.log('id ', id);
                $("input[name='cedula_id'", $("#formAddRequestCedula")).val(id);
                getCedulaById(id);
            })

            function getCedulaBasis(){
                $.ajax({
                    url: "get_issuance_certification",
                    method: "get",
                    data: {
                        id: 2, // 6-Cedula, 5-License & Permit, 4-Registration, 3-Residency, 2-Indigency, 1-Brgy. Clearance
                    },
                    dataType: "json",
                    success: function(response){
                        let issuanceConfigurationDetails = response['issuanceConfigurationDetails'];
                        if(issuanceConfigurationDetails.length > 0){
                            let cedulaProcessingTime = "";
                            if(issuanceConfigurationDetails[0].processing_time == 1){
                                cedulaProcessingTime = '1 Day';
                            }
                            else if(issuanceConfigurationDetails[0].processing_time == 2){
                                cedulaProcessingTime = '2 Days';
                            }
                            else if(issuanceConfigurationDetails[0].processing_time == 3){
                                cedulaProcessingTime = '3 Days';
                            }
                            else if(issuanceConfigurationDetails[0].processing_time == 4){
                                cedulaProcessingTime = '4 Days';
                            }
                            else if(issuanceConfigurationDetails[0].processing_time == 5){
                                cedulaProcessingTime = '5 Days';
                            }
                            else if(issuanceConfigurationDetails[0].processing_time == 6){
                                cedulaProcessingTime = '1 Week';
                            }
                            else if(issuanceConfigurationDetails[0].processing_time == 7){
                                cedulaProcessingTime = '2 Weeks';
                            }
                            else if(issuanceConfigurationDetails[0].processing_time == 8){
                                cedulaProcessingTime = '3 Weeks';
                            }
                            else if(issuanceConfigurationDetails[0].processing_time == 9){
                                cedulaProcessingTime = '1 Month';
                            }
                            else{
                                cedulaProcessingTime = 'Other';
                            }
                            $("#issuanceConfigurationId").val(issuanceConfigurationDetails[0].id);
                            $("#textTotalAmount").val(issuanceConfigurationDetails[0].amount);
                            $("#textProcessingTime").val(cedulaProcessingTime);
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
            
            $("#buttonAddCedula").on('click',function(event){
                event.preventDefault();
                getCedulaBasis();
                console.log('userId ', $('#textUserId').val());
                getResidentForCedulaByUserId($('#textUserId').val());
            });
        });
    </script>
@endsection
