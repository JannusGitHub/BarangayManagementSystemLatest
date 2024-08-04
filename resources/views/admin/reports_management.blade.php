@php
    $isLogin = false;
    if(!isset($_SESSION)){ 
        session_start(); 
    }
    $layouts = 'layouts.admin_layout';
    $sessionId = $_SESSION['session_user_level_id'];
@endphp
@if ($sessionId  == 1)
    @php $layouts = 'layouts.admin_layout' @endphp
    {{-- {{ $sessionId }} --}}
@else
    @php $layouts = 'layouts.user_layout' @endphp
    {{-- {{ $sessionId }} --}}
@endif

@extends($layouts)
@section('title', 'Reports Management')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="my-3">Reports Management</h2>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title-dashboard">USER REPORT</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <span><i class="fa-solid fa-users"></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3" id="totalUsers">0</h1>
                                <div class="row">
                                    <div class="col mt-0">
                                        <span class="text-muted-dashboard">Total Users</span>
                                    </div>

                                    <div class="col-auto">
                                        <div class="text-primary">
                                            <a href="user_report_pdf" class="link-primary" target='_blank' id="">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title-dashboard">RESIDENT REPORT</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <span><i class="fa-solid fa-users"></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3" id="totalResidents">0</h1>
                                <div class="row">
                                    <div class="col mt-0">
                                        <span class="text-muted-dashboard">Total Residents</span>
                                    </div>

                                    <div class="col-auto">
                                        <div class="text-primary">
                                            <a href="resident_report_pdf" class="link-primary" target='_blank' id="">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title-dashboard">BLOTTER REPORT</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <span><i class="fa-solid fa-clipboard"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3" id="totalBlotters">0</h1>
                                <div class="row">
                                    <div class="col mt-0">
                                        <span class="text-muted-dashboard">Total Blotters</span>
                                    </div>

                                    <div class="col-auto">
                                        <div class="text-primary">
                                            <a href="blotter_report_pdf" class="link-primary" target='_blank' id="">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title-dashboard">BRGY. CLEARANCE CERTIFICATE REPORT</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <span><i class="fa-solid fa-clipboard"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3" id="totalBarangayClearanceCertificates">0</h1>
                                <div class="row">
                                    <div class="col mt-0">
                                        <span class="text-muted-dashboard">Total Brgy. Clearance Certificates</span>
                                    </div>

                                    <div class="col-auto">
                                        <div class="text-primary">
                                            <a href="barangay_clearance_certificates_report_pdf" class="link-primary" target='_blank' id="">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title-dashboard">INDIGENCY CERTIFICATE REPORT</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <span><i class="fa-solid fa-clipboard"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3" id="totalIndigencyCertificates">0</h1>
                                <div class="row">
                                    <div class="col mt-0">
                                        <span class="text-muted-dashboard">Indigency Certificates</span>
                                    </div>

                                    <div class="col-auto">
                                        <div class="text-primary">
                                            <a href="indigency_certificates_report_pdf" class="link-primary" target='_blank' id="">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title-dashboard">RESIDENCY CERTIFICATE REPORT</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <span><i class="fa-solid fa-clipboard"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3" id="totalResidencyCertificates">0</h1>
                                <div class="row">
                                    <div class="col mt-0">
                                        <span class="text-muted-dashboard">Residency Certificates</span>
                                    </div>

                                    <div class="col-auto">
                                        <div class="text-primary">
                                            <a href="residency_certificates_report_pdf" class="link-primary" target='_blank' id="">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title-dashboard">REGISTRATION CERTIFICATE REPORT</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <span><i class="fa-solid fa-clipboard"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3" id="totalRegistrationCertificates">0</h1>
                                <div class="row">
                                    <div class="col mt-0">
                                        <span class="text-muted-dashboard">Registration Certificates</span>
                                    </div>

                                    <div class="col-auto">
                                        <div class="text-primary">
                                            <a href="registration_certificates_report_pdf" class="link-primary" target='_blank' id="">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title-dashboard">LICENSE & PERMIT CERTIFICATE REPORT</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <span><i class="fa-solid fa-clipboard"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3" id="totalLicensePermitCertificates">0</h1>
                                <div class="row">
                                    <div class="col mt-0">
                                        <span class="text-muted-dashboard">License & Permit Certificates</span>
                                    </div>

                                    <div class="col-auto">
                                        <div class="text-primary">
                                            <a href="license_permit_certificates_report_pdf" class="link-primary" target="_blank" id="">View More</a>
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
@endsection

<!--     {{-- JS CONTENT --}} -->
@section('js_content')
    <script type="text/javascript">
        $(document).ready(function () {
            function getDataForDashboard(){
                $.ajax({
                    url: "get_data_for_dashboard",
                    method: "get",
                    dataType: "json",
                    success: function(response){
                        console.log('response ', response['totalUsers']);
                        $('#totalUsers').text(response['totalUsers']);
                        $('#totalPendingUsers').text(response['totalPendingUsers']);
                        $('#totalResidents').text(response['totalResidents']);
                        $('#totalBlotters').text(response['totalBlotters']);
                        $('#totalBarangayClearanceRequests').text(response['totalBarangayClearanceRequests']);
                        
                        



                        $('#totalBarangayClearanceCertificates').text(response['totalBarangayClearanceCertificates']);
                        $('#totalIndigencyCertificates').text(response['totalIndigencyCertificates']);
                        $('#totalResidencyCertificates').text(response['totalResidencyCertificates']);
                        $('#totalRegistrationCertificates').text(response['totalRegistrationCertificates']);
                        $('#totalLicensePermitCertificates').text(response['totalLicensePermitCertificates']);
                    },
                });
            }
            getDataForDashboard();

            

            // dataTablesPendingUsers = $("#tablePendingUsers").DataTable({
            //     "processing" : false,
            //     "serverSide" : true,
            //     "responsive": true,
            //     // "order": [[ 0, "desc" ],[ 4, "desc" ]],
            //     "language": {
            //         "info": "Showing _START_ to _END_ of _TOTAL_ pending user records",
            //         "lengthMenu": "Show _MENU_ pending user records",
            //     },
            //     "ajax" : {
            //         url: "view_pending_users_for_dashboard",
            //     },
            //     "columns":[
            //         { "data" : "status"},
            //         { "data" : "fullname"},
            //         { "data" : "email"},
            //         { "data" : "username"},
            //     ],
            // });
        });
    </script>
@endsection
