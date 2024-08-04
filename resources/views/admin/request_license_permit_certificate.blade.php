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
                        <h1>Request License & Permit Certificate Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Request License & Permit Certificate Management</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">Request License & Permit Certificate Management</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">                   
                                    <button type="button" id="buttonAddModalRequestLicensePermitCertificate" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddRequestLicensePermitCertificate"><i class="fa fa-plus fa-md"></i> New Request License & Permit Certificate</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="tableRequestLicensePermitCertificate" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Civil Status</th>
                                                <th>Ticket Number</th>
                                                <th>Ticket Date</th>
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
    

    <!-- Add Request License & Permit Certificate Modal Start -->
    <div class="modal fade" id="modalAddRequestLicensePermitCertificate" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Request License & Permit Certificate Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddRequestLicensePermitCertificate" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="request_license_permit_certificate_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    <!-- Id of Request Cedula Basis -->
                                    <input type="text" class="form-control" style="display: none" name="issuance_configuration_id" id="issuanceConfigurationId" placeholder="Issuance Certificate Id">

                                    <div class="mb-3">
                                        <input type="text" style="display: none;" class="form-control" name="user_id" value="{{ $user_id }}" id="textUserId" placeholder="User Id | Resident Id">
                                    </div>

                                    <div class="mb-3">
                                        <label for="textTicketNumber" class="form-label">Ticket Number</label>
                                        <input type="text" class="form-control" name="ticket_number" id="textTicketNumber" readonly placeholder="Auto Generated after save">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textTicketDate" class="form-label">Ticket Date</label>
                                        <input type="text" class="form-control" name="ticket_datetime" id="textTicketDate" readonly placeholder="Auto Generated after save">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textTotalAmount" class="form-label">Total amount to be paid <span class="text-primary" title="Amount may vary based on admin"><i class="fas fa-info-circle"></i></span></label>
                                        <input type="text" class="form-control" name="total_amount_paid" id="textTotalAmount" readonly placeholder="Total Amount">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textProcessingTime" class="form-label">Processing Time <span class="text-primary" title="Processing time may vary on admin"><i class="fas fa-info-circle"></i></span></label>
                                        <input type="text" class="form-control" name="cedula_processing_time" id="textProcessingTime" readonly placeholder="Processing Time">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="textPurpose" class="form-label">Purpose<span class="text-danger" title="Required">*</span></label>
                                        <textarea type="text" class="form-control" rows="3" name="purpose" id="textPurpose" placeholder="Purpose"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="textBusinessName" class="form-label">Business Name<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" rows="4" name="business_name" id="textBusinessName" placeholder="Business Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textLocation" class="form-label">Location<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" rows="4" name="location" id="textLocation" placeholder="Location">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textRemarks" class="form-label">Remarks</label>
                                        <textarea type="text" class="form-control" rows="3" name="remarks" id="textRemarks" placeholder="Remarks"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddRequestLicensePermitCertificate" class="btn btn-primary"><i id="iconAddRequestLicensePermitCertificate" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Request License & Permit Certificate Modal End -->
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

            getResidents($('#selectResident'));
            
            $("#formAddRequestLicensePermitCertificate").submit(function(event){
                event.preventDefault();
                addRequestLicensePermitCertificate();
            });

            let user_id = {{ $user_id }};
            console.log('user_id ',user_id);
            dataTablesRequestLicensePermitCertificate = $("#tableRequestLicensePermitCertificate").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_request_license_permit_certificate",
                    data: function (param){
                        param.userId = user_id;
                    },
                },
                "columns":[
                    { "data" : function(data){
                        return capitalizeFirstLetter(data.resident_info.user_info.firstname) + ' ' +capitalizeFirstLetter(data.resident_info.user_info.lastname);
                    }},
                    { "data" : "gender"},
                    { "data" : "civil_status"},
                    { "data" : "ticket_number"},
                    { "data" : "ticket_datetime"},
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

            $(document).on('click', '.actionEditRequestLicensePermitCertificate', function(){
                let id = $(this).attr('license-permit-certificate-id');
                console.log('id ', id);
                $("input[name='request_license_permit_certificate_id'", $("#formAddRequestLicensePermitCertificate")).val(id);
                getRequestLicensePermitCertificateById(id);
            });
            
            function getCedulaBasis(){
                $.ajax({
                    url: "get_issuance_certification",
                    method: "get",
                    data: {
                        id: 5, // 6-Cedula, 5-License & Permit, 4-Registration, 3-Residency, 2-Indigency, 1-Brgy. Clearance
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
            

            $("#buttonAddModalRequestLicensePermitCertificate").on('click',function(event){
                event.preventDefault();
                getCedulaBasis();
                // console.log('userId ', $('#textUserId').val());
                // getResidentForCedulaByUserId($('#textUserId').val());
            });
        });
    </script>
@endsection
