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
@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="my-3 fw-bold">Dashboard</h2>
                    <h5 class="my-3">Overview</h5>
                    @if ($sessionId == 1)
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title-dashboard">USER</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <span><i class="fa-solid fa-users"></i></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="totalUsers">0</h1>
                                    <div class="mb-0">
                                        <span class="text-muted-dashboard">Total Users</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title-dashboard">PENDING USER</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <span><i class="fa-solid fa-users-slash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="totalPendingUsers">0</h1>
                                    <div class="mb-0">
                                        <span class="text-muted-dashboard">Total Pending Users</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title-dashboard">RESIDENT</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <span><i class="fa-solid fa-users"></i></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="totalResidents">0</h1>
                                    <div class="mb-0">
                                        <span class="text-muted-dashboard">Total Residents</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title-dashboard">BLOTTER</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <span><i class="fa-solid fa-clipboard"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="totalBlotters">0</h1>
                                    <div class="mb-0">
                                        <span class="text-muted-dashboard">Total Blotters</span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        {{-- 
                        <div class="col-xl-4 col-lg-4">
                            <div class="info-box shadow bg-white rounded">
                                <span class="info-box-icon bg-info"><i class="fa-brands fa-bitcoin"></i></span>
                                
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Users</span>
                                    <span class="info-box-number" id="totalUsers">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="info-box shadow bg-white rounded">
                                <span class="info-box-icon bg-warning"><i class="fa-brands fa-bitcoin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pending Request</span>
                                    <span class="info-box-number" id="totalPendingUsers">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="info-box shadow bg-white rounded">
                                <span class="info-box-icon bg-success"><i class="fa-brands fa-bitcoin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Residents</span>
                                    <span class="info-box-number">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="info-box shadow bg-white rounded">
                                <span class="info-box-icon bg-info"><i class="fa-brands fa-bitcoin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Blotter</span>
                                    <span class="info-box-number">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="info-box shadow bg-white rounded">
                                <span class="info-box-icon bg-black"><i class="fa-brands fa-bitcoin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Households</span>
                                    <span class="info-box-number">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="info-box shadow bg-white rounded">
                                <span class="info-box-icon bg-danger"><i class="fa-brands fa-bitcoin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Business Permit</span>
                                    <span class="info-box-number">0</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--
                        For User Dashboard
                    -->
                    @else
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title-dashboard">REQUEST</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <span><i class="fa-solid fa-users"></i></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="totalBarangayClearanceRequests">0</h1>
                                    <div class="mb-0">
                                        <span class="text-muted-dashboard">Total Brgy. Clearance Requests</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title-dashboard">REQUEST</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <span><i class="fa-solid fa-users"></i></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="totalBarangayClearanceRequests">0</h1>
                                    <div class="mb-0">
                                        <span class="text-muted-dashboard">Total Indigency Requests</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title-dashboard">REQUEST</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <span><i class="fa-solid fa-users"></i></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="totalBarangayClearanceRequests">0</h1>
                                    <div class="mb-0">
                                        <span class="text-muted-dashboard">Total Residency Requests</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title-dashboard">REQUEST</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <span><i class="fa-solid fa-users"></i></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="totalBarangayClearanceRequests">0</h1>
                                    <div class="mb-0">
                                        <span class="text-muted-dashboard">Total Registration Requests</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title-dashboard">REQUEST</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <span><i class="fa-solid fa-users"></i></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="totalBarangayClearanceRequests">0</h1>
                                    <div class="mb-0">
                                        <span class="text-muted-dashboard">Total License & Permit Requests</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="dropdown-divider"></div>
                <div class="row mb-5">
                    <h5 class="my-3">Chart Statistics</h5>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <div class="d-flex align-items-center flex-column">
                                    <h5 class="card-title-dashboard">GAUGE CHART</h5>
                                    <h1 class="mt-1 mb-3 mx-auto"><div id="divGaugeChart"></div></h1>
                                    <div class="mb-0">
                                        <span class="text-muted-dashboard">Performance</span>
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

                    },
                });
            }
            getDataForDashboard();

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages':['gauge']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Label', 'Value'],
                    ['Performance', 50] // Change this value to set the gauge
                ]);

                // options for the gauge chart
                var options = {
                    width: 800, height: 200,
                    redFrom: 90, redTo: 100,
                    yellowFrom:75, yellowTo: 90,
                    greenFrom: 0, greenTo: 75,
                    minorTicks: 5
                };

                // Instantiate and draw the gauge chart.
                var chart = new google.visualization.Gauge(document.getElementById('divGaugeChart'));
                chart.draw(data, options);

                setInterval(function() {
                    data.setValue(0, 1, Math.round(60 * Math.random()));
                    chart.draw(data, options);
                }, 1000);
            }
        });
    </script>
@endsection
