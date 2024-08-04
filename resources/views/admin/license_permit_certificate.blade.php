@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>License & Permit Certificate Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">License & Permit Certificate Management</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">License & Permit Certificate Management</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">                   
                                    <button type="button" id="buttonAddModalLicensePermitCertificate" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddLicensePermitCertificate"><i class="fa fa-plus fa-md"></i> New License & Permit Certificate</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="tableLicensePermitCertificate" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
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
    

    <!-- Add License & Permit Certificate Modal Start -->
    <div class="modal fade" id="modalAddLicensePermitCertificate" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;License & Permit Certificate Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddLicensePermitCertificate" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="license_permit_certificate_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    <!-- Id of Request Cedula Basis -->
                                    <input type="text" class="form-control" style="display: none" name="issuance_configuration_id" id="issuanceConfigurationId" placeholder="Issuance Certificate Id">

                                    <div class="mb-3">
                                        <label for="selectResident" class="form-label">Select Resident<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="selectResident" name="barangay_resident_id">
                                            <!-- Auto Generated -->
                                        </select>
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
                                        <label for="textORNumber" class="form-label">OR Number<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" rows="4" name="or_number" id="textORNumber" placeholder="OR Number">
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
                                        <label for="textNatureOfBusiness" class="form-label">Nature of Business<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" rows="4" name="nature_of_business" id="textNatureOfBusiness" placeholder="Nature of Business">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textCommunityTaxCert" class="form-label">Community Tax Cert<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" rows="4" name="community_tax_cert" id="textCommunityTaxCert" placeholder="Community Tax Cert">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textGrossSalesIncome" class="form-label">Gross Sales Income<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" rows="4" name="gross_sales_income" id="textGrossSalesIncome" placeholder="Gross Sales Income">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textAmountCollected" class="form-label">Amount Collected<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" rows="4" name="amount_collected" id="textAmountCollected" placeholder="Amount Collected">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textRegistrationNumber" class="form-label">Registration Number</label>
                                        <input type="text" class="form-control" rows="3" name="registration_number" id="textRegistrationNumber" placeholder="Registration Number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textIssuedOn" class="form-label">Issued On<span class="text-danger" title="Required">*</span></label>
                                        <input type="date" class="form-control" rows="4" name="issued_on" id="textIssuedOn" placeholder="Issued On">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textIssuedAt" class="form-label">Issued At<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" name="issued_at" id="textIssuedAt" placeholder="Issued Ats">
                                    </div>
                                    <div class="mb-3">
                                        <label for="textRemarks" class="form-label">Remarks</label>
                                        <textarea type="text" class="form-control" rows="3" name="remarks" id="textRemarks" placeholder="Remarks"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="textStatus" class="form-label">Status<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="selectStatus" name="status">
                                            <option value="0" disabled selected>Select One</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Processing</option>
                                            <option value="3">Pending</option>
                                            <option value="4">Disapproved</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddLicensePermitCertificate" class="btn btn-primary"><i id="iconAddLicensePermitCertificate" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add License & Permit Certificate Modal End -->
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
            
            $("#formAddLicensePermitCertificate").submit(function(event){
                event.preventDefault();
                addLicensePermitCertificate();
            });

            dataTablesLicensePermitCertificate = $("#tableLicensePermitCertificate").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_license_permit_certificate",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
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

            $(document).on('click', '.actionEditLicensePermitCertificate', function(){
                let id = $(this).attr('license-permit-certificate-id');
                console.log('id ', id);
                $("input[name='license_permit_certificate_id'", $("#formAddLicensePermitCertificate")).val(id);
                getLicensePermitCertificateById(id);
            })

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
            

            $("#buttonAddModalLicensePermitCertificate").on('click',function(event){
                event.preventDefault();
                getCedulaBasis();
                // console.log('userId ', $('#textUserId').val());
                // getResidentForCedulaByUserId($('#textUserId').val());
            });
        });
    </script>
@endsection
