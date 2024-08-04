@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>About Page Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Barangay Profile</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">Barangay Profile</h3>
                                {{-- <button class="btn float-right reload"><i class="fas fa-sync-alt"></i></button> --}}
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">                   
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarangayProfile"><i class="fa fa-plus fa-md"></i> New Profile</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="tableBarangayProfile" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-top: 8px;">Geography</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">                   
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarangayGeography"><i class="fa fa-plus fa-md"></i> New Geography</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="tableBarangayGeography" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Land Area</th>
                                                <th>Boundaries (West, East, South, North)</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-top: 8px;">Demography</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">                   
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarangayDemography"><i class="fa fa-plus fa-md"></i> New Demography</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="tableBarangayDemography" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Year</th>
                                                <th>Total Population</th>
                                                <th>Number of Household</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-top: 8px;">School</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">                   
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarangaySchool"><i class="fa fa-plus fa-md"></i> New School</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="tableBarangaySchool" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Pre-Elementary</th>
                                                <th>Pre-Elementary & Elementary</th>
                                                <th>Secondary</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-top: 8px;">Others</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">                   
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarangayOthers"><i class="fa fa-plus fa-md"></i> New</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="tableBarangayOthers" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Classification</th>
                                                <th>Zoning Classification</th>
                                                <th>Fiesta</th>
                                                <th>Distance to Poblacion</th>
                                                <th>Travel time to Poblacion</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 4%"></div>
            </div>
        </section>
    </div>
    

    <!-- Add Barangay Profile Modal Start -->
    <div class="modal fade" id="modalAddBarangayProfile" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Barangay Profile Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddBarangayProfile" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="barangay_profile_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Barangay Profile Title</span>
                                        </div>
                                        <input type="text" class="form-control" name="title" id="textAddTitle" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Barangay Profile Details</span>
                                        </div>
                                        <textarea type="text" class="form-control" name="details" rows="3" id="textAddDetails" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddBarangayProfile" class="btn btn-primary"><i id="iconAddBarangayProfile" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Barangay Profile Modal End -->

    <!-- Edit Barangay Profile Status Modal Start -->
    <div class="modal fade" id="modalEditBarangayProfileStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="headingEditBarangayProfileStatusTitle"><i class="fas fa-info-circle"></i> Edit Barangay Profile Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditBarangayProfileStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditBarangayProfileStatus"></p>
                        <input type="hidden" name="barangay_profile_id" placeholder="Barangay Profile Id" id="textEditStatusBarangayProfileId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditBarangayProfileStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditBarangayProfileStatus" class="btn btn-primary"><i id="iconEditBarangayProfileStatus" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Barangay Profile Status Modal End -->

    <!-- Add Barangay Geography Modal Start -->
    <div class="modal fade" id="modalAddBarangayGeography" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Barangay Geography Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddBarangayGeography" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="barangay_geography_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Land Area</span>
                                        </div>
                                        <input type="text" class="form-control" name="land_area" id="textAddLandArea" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Boundaries (West, East, South, North)</span>
                                        </div>
                                        <input type="text" class="form-control" name="boundaries" id="textAddboundaries" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddBarangayGeography" class="btn btn-primary"><i id="iconAddBarangayGeography" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Barangay Geography Modal End -->

    <!-- Edit Barangay Geography Status Modal Start -->
    <div class="modal fade" id="modalEditBarangayGeographyStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="headingEditBarangayGeographyStatusTitle"><i class="fas fa-info-circle"></i> Edit Barangay Geography Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditBarangayGeographyStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditBarangayGeographyStatus"></p>
                        <input type="hidden" name="barangay_geography_id" placeholder="Barangay Geography Id" id="textEditBarangayGeographyStatusId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditBarangayGeographyStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditBarangayGeographyStatus" class="btn btn-primary"><i id="iconEditBarangayGeographyStatus" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Barangay Geography Status Modal End -->

    <!-- Add Barangay Demography Modal Start -->
    <div class="modal fade" id="modalAddBarangayDemography" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Barangay Demography Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddBarangayDemography" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="barangay_demography_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Year</span>
                                        </div>
                                        <input type="text" class="form-control" name="year" id="textAddYear" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Total Population</span>
                                        </div>
                                        <input type="text" class="form-control" name="total_population" id="textAddTotalPopulation" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Number of Household</span>
                                        </div>
                                        <input type="text" class="form-control" name="number_of_household" id="textAddNumberOfHousehold" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddBarangayDemography" class="btn btn-primary"><i id="iconAddBarangayDemography" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Barangay Demography Modal End -->

    <!-- Edit Barangay Demography Status Modal Start -->
    <div class="modal fade" id="modalEditBarangayDemographyStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="headingEditBarangayDemographyStatusTitle"><i class="fas fa-info-circle"></i> Edit Barangay Demography Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditBarangayDemographyStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditBarangayDemographyStatus"></p>
                        <input type="hidden" name="barangay_demography_id" placeholder="Barangay Demography Id" id="textEditBarangayDemographyStatusId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditBarangayDemographyStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditBarangayDemographyStatus" class="btn btn-primary"><i id="iconEditBarangayDemographyStatus" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Barangay Demography Status Modal End -->

    <!-- Add Barangay School Modal Start -->
    <div class="modal fade" id="modalAddBarangaySchool" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Barangay School Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddBarangaySchool" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="barangay_school_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Pre-Elementary</span>
                                        </div>
                                        <input type="text" class="form-control" name="pre_elementary" id="textAddPreElementary" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Pre-Elementary & Elementary</span>
                                        </div>
                                        <input type="text" class="form-control" name="pre_elementary_and_elementary" id="textAddPreElementaryAndElementary" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Secondary</span>
                                        </div>
                                        <input type="text" class="form-control" name="secondary" id="textAddSecondary" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddBarangaySchool" class="btn btn-primary"><i id="iconAddBarangaySchool" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Barangay School Modal End -->

    <!-- Edit Barangay School Status Modal Start -->
    <div class="modal fade" id="modalEditBarangaySchoolStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="headingEditBarangaySchoolStatusTitle"><i class="fas fa-info-circle"></i> Edit Barangay School Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditBarangaySchoolStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditBarangaySchoolStatus"></p>
                        <input type="hidden" name="barangay_school_id" placeholder="Barangay School Id" id="textEditBarangaySchoolStatusId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditBarangaySchoolStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditBarangaySchoolStatus" class="btn btn-primary"><i id="iconEditBarangaySchoolStatus" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Barangay School Status Modal End -->

    <!-- Add Barangay Others Modal Start -->
    <div class="modal fade" id="modalAddBarangayOthers" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Barangay Others Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddBarangayOthers" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Edit -->
                                    <input type="text" class="form-control" style="display: none" name="barangay_others_id" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Classification</span>
                                        </div>
                                        <input type="text" class="form-control" name="classification" id="textAddClassification" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Zoning Classification</span>
                                        </div>
                                        <input type="text" class="form-control" name="zoning_classification" id="textAddZoningClassification" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Fiesta</span>
                                        </div>
                                        <input type="text" class="form-control" name="fiesta" id="textAddFiesta" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Distance to Poblacion</span>
                                        </div>
                                        <input type="text" class="form-control" name="distance_to_poblacion" id="textAddDistanceToPoblacion" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend w-50">
                                            <span class="input-group-text w-100" id="inputGroup-sizing-default">Travel time to Poblacion</span>
                                        </div>
                                        <input type="text" class="form-control" name="travel_time_to_poblacion" id="textAddTravelTimeToPoblacion" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddBarangayOthers" class="btn btn-primary"><i id="iconAddBarangayOthers" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Barangay Others Modal End -->

    <!-- Edit Barangay Others Status Modal Start -->
    <div class="modal fade" id="modalEditBarangayOthersStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="headingEditBarangayOthersStatusTitle"><i class="fas fa-info-circle"></i> Edit Barangay Others Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditBarangayOthersStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditBarangayOthersStatus"></p>
                        <input type="hidden" name="barangay_others_id" placeholder="Barangay Others Id" id="textEditBarangayOthersStatusId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditBarangayOthersStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditBarangayOthersStatus" class="btn btn-primary"><i id="iconEditBarangayOthersStatus" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Barangay Others Status Modal End -->
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

            /**
             * Barangay Profile
            */
            $("#formAddBarangayProfile").submit(function(event){
                event.preventDefault();
                addBarangayProfile();
            });

            dataTablesBarangayProfile = $("#tableBarangayProfile").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_barangay_profile",
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
                    $('td', row).eq(0).css('white-space', 'normal');
                    $('td', row).eq(1).css('white-space', 'normal');
                    $('td', row).eq(2).css('white-space', 'normal');
                    // console.log('row ', row);
                    // console.log('data ', data);
                    // console.log('index ', index);
                },
            });

            $(document).on('click', '.actionEditBarangayProfile', function(){
                let id = $(this).attr('barangay-profile-id');
                $("input[name='barangay_profile_id'", $("#formAddBarangayProfile")).val(id);
                getBarangayProfileById(id);
            });
            
            $(document).on('click', '.actionEditBarangayProfileStatus', function(){
                let barangayProfileStatus = $(this).attr('barangay-profile-status');
                let barangayProfileId = $(this).attr('barangay-profile-id');
                
                $("#textEditBarangayProfileStatus").val(barangayProfileStatus);
                $("#textEditStatusBarangayProfileId").val(barangayProfileId);

                if(barangayProfileStatus == 1){
                    $("#paragraphEditBarangayProfileStatus").text('Are you sure to deactivate?');
                }
                else{
                    $("#paragraphEditBarangayProfileStatus").text('Are you sure to activate?');
                }
            });

            $("#formEditBarangayProfileStatus").submit(function(event){
                event.preventDefault();
                editBarangayProfileStatus();
            });


            /**
             * Geography
            */
            $("#formAddBarangayGeography").submit(function(event){
                event.preventDefault();
                addBarangayGeography();
            });

            dataTablesBarangayGeography = $("#tableBarangayGeography").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_barangay_geography",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "land_area"},
                    { "data" : "boundaries"},
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

            $(document).on('click', '.actionEditBarangayGeography', function(){
                let id = $(this).attr('barangay-geography-id');
                $("input[name='barangay_geography_id'", $("#formAddBarangayGeography")).val(id);
                getBarangayGeographyById(id);
            });
            
            $(document).on('click', '.actionEditBarangayGeographyStatus', function(){
                let barangayGeographyStatus = $(this).attr('barangay-geography-status');
                let barangayGeographyId = $(this).attr('barangay-geography-id');

                $("#textEditBarangayGeographyStatus").val(barangayGeographyStatus);
                $("#textEditBarangayGeographyStatusId").val(barangayGeographyId);

                if(barangayGeographyStatus == 1){
                    $("#paragraphEditBarangayGeographyStatus").text('Are you sure to deactivate?');
                }
                else{
                    $("#paragraphEditBarangayGeographyStatus").text('Are you sure to activate?');
                }
            });

            $("#formEditBarangayGeographyStatus").submit(function(event){
                event.preventDefault();
                editBarangayGeographyStatus();
            });


            /**
             * Demography
            */
            $("#formAddBarangayDemography").submit(function(event){
                event.preventDefault();
                addBarangayDemography();
            });

            dataTablesBarangayDemography = $("#tableBarangayDemography").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_barangay_demography",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "year"},
                    { "data" : "total_population"},
                    { "data" : "number_of_household"},
                    { "data" : "status"},
                ],
                "columnDefs": [
                    { className: 'align-middle', targets: [0, 1, 2, 3, 4] },
                ],
                "createdRow": function(row, data, index) {
                    $('td', row).eq(1).css('white-space', 'normal');
                    $('td', row).eq(2).css('white-space', 'normal');
                    $('td', row).eq(3).css('white-space', 'normal');
                    // console.log('row ', row);
                    // console.log('data ', data);
                    // console.log('index ', index);
                },
            });

            $(document).on('click', '.actionEditBarangayDemography', function(){
                let id = $(this).attr('barangay-demography-id');
                console.log('id ', id);
                $("input[name='barangay_demography_id'", $("#formAddBarangayDemography")).val(id);
                getBarangayDemographyById(id);
            });
            
            $(document).on('click', '.actionEditBarangayDemographyStatus', function(){
                let barangayDemographyStatus = $(this).attr('barangay-demography-status');
                let barangayDemographyId = $(this).attr('barangay-demography-id');

                $("#textEditBarangayDemographyStatus").val(barangayDemographyStatus);
                $("#textEditBarangayDemographyStatusId").val(barangayDemographyId);

                if(barangayDemographyStatus == 1){
                    $("#paragraphEditBarangayDemographyStatus").text('Are you sure to deactivate?');
                }
                else{
                    $("#paragraphEditBarangayDemographyStatus").text('Are you sure to activate?');
                }
            });

            $("#formEditBarangayDemographyStatus").submit(function(event){
                event.preventDefault();
                editBarangayDemographyStatus();
            });


            /**
             * School
            */
            $("#formAddBarangaySchool").submit(function(event){
                event.preventDefault();
                addBarangaySchool();
            });

            dataTablesBarangaySchool = $("#tableBarangaySchool").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_barangay_school",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "pre_elementary"},
                    { "data" : "pre_elementary_and_elementary"},
                    { "data" : "secondary"},
                    { "data" : "status"},
                ],
                "columnDefs": [
                    { className: 'align-middle', targets: [0, 1, 2, 3, 4] },
                ],
                "createdRow": function(row, data, index) {
                    $('td', row).eq(0).css('white-space', 'normal');
                    $('td', row).eq(1).css('white-space', 'normal');
                    $('td', row).eq(2).css('white-space', 'normal');
                    $('td', row).eq(3).css('white-space', 'normal');
                    // console.log('row ', row);
                    // console.log('data ', data);
                    // console.log('index ', index);
                },
            });

            $(document).on('click', '.actionEditBarangaySchool', function(){
                let id = $(this).attr('barangay-school-id');
                console.log('id ', id);
                $("input[name='barangay_school_id'", $("#formAddBarangaySchool")).val(id);
                getBarangaySchoolById(id);
            });
            
            $(document).on('click', '.actionEditBarangaySchoolStatus', function(){
                let barangaySchoolStatus = $(this).attr('barangay-school-status');
                let barangaySchoolId = $(this).attr('barangay-school-id');

                $("#textEditBarangaySchoolStatus").val(barangaySchoolStatus);
                $("#textEditBarangaySchoolStatusId").val(barangaySchoolId);

                if(barangaySchoolStatus == 1){
                    $("#paragraphEditBarangaySchoolStatus").text('Are you sure to deactivate?');
                }
                else{
                    $("#paragraphEditBarangaySchoolStatus").text('Are you sure to activate?');
                }
            });

            $("#formEditBarangaySchoolStatus").submit(function(event){
                event.preventDefault();
                editBarangaySchoolStatus();
            });


            /**
             * Others
            */
            $("#formAddBarangayOthers").submit(function(event){
                event.preventDefault();
                addBarangayOthers();
            });

            dataTablesBarangayOthers = $("#tableBarangayOthers").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_barangay_others",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "classification"},
                    { "data" : "zoning_classification"},
                    { "data" : "fiesta"},
                    { "data" : "distance_to_poblacion"},
                    { "data" : "travel_time_to_poblacion"},
                    { "data" : "status"},
                ],
                "columnDefs": [
                    { className: 'align-middle', targets: [0, 1, 2, 3, 4] },
                ],
                "createdRow": function(row, data, index) {
                    $('td', row).eq(0).css('white-space', 'normal');
                    $('td', row).eq(1).css('white-space', 'normal');
                    $('td', row).eq(2).css('white-space', 'normal');
                    $('td', row).eq(3).css('white-space', 'normal');
                    $('td', row).eq(4).css('white-space', 'normal');
                    // console.log('row ', row);
                    // console.log('data ', data);
                    // console.log('index ', index);
                },
            });

            $(document).on('click', '.actionEditBarangayOthers', function(){
                let id = $(this).attr('barangay-others-id');
                console.log('id ', id);
                $("input[name='barangay_others_id'", $("#formAddBarangayOthers")).val(id);
                getBarangayOthersById(id);
            });
            
            $(document).on('click', '.actionEditBarangayOthersStatus', function(){
                let barangayOthersStatus = $(this).attr('barangay-others-status');
                let barangayOthersId = $(this).attr('barangay-others-id');
                
                $("#textEditBarangayOthersStatus").val(barangayOthersStatus);
                $("#textEditBarangayOthersStatusId").val(barangayOthersId);

                if(barangayOthersStatus == 1){
                    $("#paragraphEditBarangayOthersStatus").text('Are you sure to deactivate?');
                }
                else{
                    $("#paragraphEditBarangayOthersStatus").text('Are you sure to activate?');
                }
            });

            $("#formEditBarangayOthersStatus").submit(function(event){
                event.preventDefault();
                editBarangayOthersStatus();
            });
        });
    </script>
@endsection
