@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Resident Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Resident Management</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">Resident Management</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-7 col-xl-6 pt-4">
                                        <form method="get" id="formDateRange">
                                            <div class="input-group input-group-sm mb-3">
                                                <!-- From -->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Date Range From:</span>
                                                </div>
                                                <input type="datetime-local" class="form-control" name="from" id="dateRangeFrom" style="min-width: 70px;">
                                                
                                                <!-- To -->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">To:</span>
                                                </div>
                                                <input type="datetime-local" class="form-control" name="to" id="dateRangeTo" style="min-width: 70px;">
                                                
                                                <!-- Search -->
                                                <div class="input-group-prepend">
                                                    <button type="submit" class="btn btn-info" id=""><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-xs-12 col-md-12 col-lg-5 col-xl-6 text-right mt-4">
                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalFilter" id=""><i class="fas fa-filter fa-md"></i> Filter</button>             
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="buttonAddBarangayResident" data-bs-target="#modalAddBarangayResident"><i class="fa fa-plus fa-md"></i> New Resident</button>
                                    </div>
                                </div>
                                <br>
                                {{-- <div class="text-right mt-4">                   
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="buttonAddBarangayResident" data-bs-target="#modalAddBarangayResident"><i class="fa fa-plus fa-md"></i> New Resident</button>
                                </div><br> --}}
                                <div class="table-responsive">
                                    <table id="tableBarangayResident" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>ID Number</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Purok</th>
                                                <th>Civil Status</th>
                                                <th>Contact</th>
                                                <th>Created At</th>
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
    

    <!-- Add Resident Modal Start -->
    <div class="modal fade" id="modalAddBarangayResident" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Resident Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddBarangayResident" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- For Resident Id -->
                                    <input type="text" class="form-control" style="display: none" name="barangay_resident_id" id="barangayResidentId" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                                        
                                    <div class="mb-3">
                                        <label for="selectUser" class="form-label">Select User<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="selectUser" name="user_id">
                                            <!-- Auto Generated -->
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="selectGender" class="form-label">Gender<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="selectGender" name="gender">
                                            <option value="0" disabled selected>Select One</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="selectCivilStatus" class="form-label">Civil Status<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="selectCivilStatus" name="civil_status">
                                            <option value="0" disabled selected>Select One</option>
                                            <option value="1">Single</option>
                                            <option value="2">Married</option>
                                            <option value="3">Widow/er</option>
                                            <option value="4">Annulled</option>
                                            <option value="5">Legally Separated</option>
                                            <option value="6">Others</option>
                                        </select>
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textLengthOfStay" class="form-label">Length of stay(In years/month)<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" name="length_of_stay" id="textLengthOfStay" placeholder="Length of stay">
                                    </div>

                                    <div class="mb-3">
                                        <label for="birthdate" class="form-label">Birthdate<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control datetimepicker" width="276" name="birthdate" id="textBirthdate" placeholder="Birthdate">
                                    </div>

                                    <div class="mb-3">
                                        <label for="age" class="form-label">Age<span class="text-danger" title="Required">*</span></label>
                                        <input type="number" class="form-control" min="1" max="200" name="age" id="textAge" readonly placeholder="Age" title="Auto generated based on Birthdate">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textBirthPlace" class="form-label">Birth Place</label>
                                        <input type="text" class="form-control" name="birth_place" id="textBirthPlace" placeholder="Birth Place">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textPurok" class="form-label">Purok</label>
                                        <input type="text" class="form-control" name="purok" id="textPurok" placeholder="Purok">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textBlock" class="form-label">Block</label>
                                        <input type="text" class="form-control" name="block" id="textBlock" placeholder="Block">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textLot" class="form-label">Lot</label>
                                        <input type="text" class="form-control" name="lot" id="textLot" placeholder="Lot">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textStreet" class="form-label">Street</label>
                                        <input type="text" class="form-control" name="street" id="textStreet" placeholder="Street">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textPhase" class="form-label">Phase</label>
                                        <input type="text" class="form-control" name="phase" id="textPhase" placeholder="Phase">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="textNationality" class="form-label">Nationality<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" name="nationality" id="textNationality" placeholder="Nationality">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textReligion" class="form-label">Religion<span class="text-danger" title="Required">*</span></label>
                                        <input type="text" class="form-control" name="religion" id="textReligion" placeholder="Religion">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textOccupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" name="occupation" id="textOccupation" placeholder="Occupation">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textMonthlyIncome" class="form-label">Monthly Income</label>
                                        <input type="text" class="form-control" name="monthly_income" id="textMonthlyIncome" placeholder="Monthly Income">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="textPhilHealthNumber" class="form-label">Phil Health Number</label>
                                        <input type="text" class="form-control" name="phil_health_number" id="textPhilHealthNumber" placeholder="Phil Health Number">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="selectEducationalAttainment" class="form-label">Educational Attainment<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="selectEducationalAttainment" name="educational_attainment">
                                            <option value="0" disabled selected>Select One</option>
                                            <option value="1">Elementary Graduate</option>
                                            <option value="2">Elementary Undergraduate</option>
                                            <option value="3">High School Graduate</option>
                                            <option value="4">High School Undergraduate</option>
                                            <option value="5">College Graduate</option>
                                            <option value="6">College Undergraduate</option>
                                            <option value="7">Masters Graduate</option>
                                            <option value="8">Some/Completed Masters Degree</option>
                                            <option value="9">Vocational</option>
                                            <option value="10">Others</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="textRemarks" class="form-label">Remarks</label>
                                        <input type="text" class="form-control" name="remarks" id="textRemarks" placeholder="Remarks">
                                    </div>

                                    <div class="mb-3" id="divUploadphoto">
                                        <label for="textRemarks" class="form-label">Upload</label>
                                        <input type="text" class="form-control d-none" disabled id="textAddphoto"> <!-- Only for showing fetched file -->
                                        <input type="file" class="form-control" name="photo" id="fileAddPhoto">
                                    </div>
                                    <div class="d-none" id="divReuploadphoto">
                                        <input type="checkbox" id="checkboxphoto" name="checkbox_image">
                                        <label class="font-weight-normal" for="checkboxphoto">Re-upload photo</label>
                                    </div>
    
                                    {{-- <div class="mb-3">
                                        <label for="textPhoto" class="form-label">Photo</label>
                                        <input type="file" class="form-control" name="photo" id="textPhoto" placeholder="Photo">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonAddBarangayResident" class="btn btn-primary" title="On going module"><i id="iconAddBarangayResident" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add Resident Modal End -->

    <!-- Edit Resident Status Modal Start -->
    <div class="modal fade" id="modalEditBarangayResidentStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editResidentStatusTitle"><i class="fas fa-info-circle"></i> Edit Resident Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formEditBarangayResidentStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <p id="paragraphEditResidentStatus"></p>
                        <input type="hidden" name="barangay_resident_id" placeholder="Resident Id" id="textEditResidentStatusResidentId">
                        <input type="hidden" name="status" placeholder="Status" id="textEditResidentStatus">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="buttonEditResidentStatus" class="btn btn-primary"><i id="iconEditResident" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Edit Resident Status Modal End -->

    <!-- View Resident Modal Start -->
    <div class="modal fade" id="modalViewBarangayResident" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Resident Full Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formViewBarangayResident" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#personalInformation" type="button" role="tab">Personal Information Tab</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#addressInformation" type="button" role="tab">Address Information Tab</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#employmentInformation" type="button" role="tab">Employment Information Tab</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#blotterRecordInformation" type="button" role="tab">Blotter Record Information Tab</button>
                                    </li>
                                </ul>
                                
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="personalInformation">
                                        <!-- For Resident Id -->
                                        <input type="text" class="form-control" style="display: none" name="barangay_resident_id" id="barangayResidentId" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            

                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="firstname" id="textFirstname" readonly placeholder="Firstname">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" id="textLastname" readonly placeholder="Lastname">
                                        </div>
                                        <div class="mb-3">
                                            <label for="middleInitial" class="form-label">Middle Initial</label>
                                            <input type="text" class="form-control" name="middle_initial" id="textMiddleInitial" readonly placeholder="Middle Initial">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="text" class="form-control" name="email" id="textEmail" readonly placeholder="Email Address">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" name="contact_number" id="textContactNumber" readonly placeholder="Contact Number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userLevel" class="form-label">User Level</label>
                                            <select class="form-select" id="userLevel" name="user_level" readonly placeholder="User Level">
                                                <!-- Auto Generated -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username" id="textUsername" readonly placeholder="Username">
                                        </div>

                                        <div class="mb-3">
                                            <label for="selectGender" class="form-label">Gender</label>
                                            <select class="form-select" id="selectGender" name="gender" readonly>
                                                <option value="0" disabled selected>Select One</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="selectCivilStatus" class="form-label">Civil Status</label>
                                            <select class="form-select" id="selectCivilStatus" name="civil_status" readonly>
                                                <option value="0" disabled selected>Select One</option>
                                                <option value="1">Single</option>
                                                <option value="2">Married</option>
                                                <option value="3">Widow/er</option>
                                                <option value="4">Annulled</option>
                                                <option value="5">Legally Separated</option>
                                                <option value="6">Others</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="birthdate" class="form-label">Birthdate</label>
                                            <input type="text" class="form-control datetimepicker" width="276" name="birthdate" id="textBirthdate" readonly placeholder="Birthdate">
                                        </div>

                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" class="form-control" min="1" max="200" name="age" id="textAge" readonly placeholder="Age" title="Auto generated based on Birthdate">
                                        </div>
                                        <div class="mb-3">
                                            <label for="textBirthPlace" class="form-label">Birth Place</label>
                                            <input type="text" class="form-control" name="birth_place" id="textBirthPlace" readonly placeholder="Birth Place">
                                        </div>

                                        <div class="mb-3">
                                            <label for="textNationality" class="form-label">Nationality</label>
                                            <input type="text" class="form-control" name="nationality" id="textNationality" readonly placeholder="Nationality">
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="textReligion" class="form-label">Religion</label>
                                            <input type="text" class="form-control" name="religion" id="textReligion" readonly placeholder="Religion">
                                        </div>

                                        <div class="mb-3">
                                            <label for="selectEducationalAttainment" class="form-label">Educational Attainment</label>
                                            <select class="form-select" id="selectEducationalAttainment" name="educational_attainment" readonly>
                                                <option value="0" disabled selected>Select One</option>
                                                <option value="1">Elementary Graduate</option>
                                                <option value="2">Elementary Undergraduate</option>
                                                <option value="3">High School Graduate</option>
                                                <option value="4">High School Undergraduate</option>
                                                <option value="5">College Graduate</option>
                                                <option value="6">College Undergraduate</option>
                                                <option value="7">Masters Graduate</option>
                                                <option value="8">Some/Completed Masters Degree</option>
                                                <option value="9">Vocational</option>
                                                <option value="10">Others</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="addressInformation">
                                        <div class="mb-3">
                                            <label for="textPurok" class="form-label">Purok</label>
                                            <input type="text" class="form-control" name="purok" id="textPurok" readonly placeholder="Purok">
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="textBlock" class="form-label">Block</label>
                                            <input type="text" class="form-control" name="block" id="textBlock" readonly placeholder="Block">
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="textLot" class="form-label">Lot</label>
                                            <input type="text" class="form-control" name="lot" id="textLot" readonly placeholder="Lot">
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="textStreet" class="form-label">Street</label>
                                            <input type="text" class="form-control" name="street" id="textStreet" readonly placeholder="Street">
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="textPhase" class="form-label">Phase</label>
                                            <input type="text" class="form-control" name="phase" id="textPhase" readonly placeholder="Phase">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="employmentInformation">
                                        <div class="mb-3">
                                            <label for="textOccupation" class="form-label">Occupation</label>
                                            <input type="text" class="form-control" name="occupation" id="textOccupation" readonly placeholder="Occupation">
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="textMonthlyIncome" class="form-label">Monthly Income</label>
                                            <input type="text" class="form-control" name="monthly_income" id="textMonthlyIncome" readonly placeholder="Monthly Income">
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="textPhilHealthNumber" class="form-label">Phil Health Number</label>
                                            <input type="text" class="form-control" name="phil_health_number" id="textPhilHealthNumber" readonly placeholder="Phil Health Number">
                                        </div>
    
                                        <div class="mb-3">
                                            <label for="textRemarks" class="form-label">Remarks</label>
                                            <input type="text" class="form-control" name="remarks" id="textRemarks" readonly placeholder="Remarks">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="blotterRecordInformation">
                                        <div class="table-responsive">
                                            <table id="tableBarangayResidentBlotter" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Case Number</th>
                                                        <th>Respondent</th>   
                                                        <th>Complainant</th>
                                                        <th style="min-width: 350px; width: 350px !important;">Complainant Statement</th>
                                                        <th>Date Filed</th>
                                                        <th>Action Taken</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="textCaseNumber" class="form-label">Case Number<span class="text-danger" title="Required">*</span></label>
                                            <input type="text" class="form-control" name="case_number" id="textCaseNumber" readonly placeholder="Case Number">
                                        </div>
    
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Complainant Statement<span class="text-danger" title="Required">*</span></label>
                                            <input type="text" class="form-control" name="complainant_statement" id="textComplainantStatement" readonly placeholder="Complainant Statement">
                                        </div>
                                        <div class="mb-3">
                                            <label for="textRespondent" class="form-label">Respondent</label>
                                            <input type="text" class="form-control" name="respondent" id="textRespondent" readonly placeholder="Respondent">
                                        </div>
                                        <div class="mb-3">
                                            <label for="textRespondentAge" class="form-label">Respondent Age</label>
                                            <input type="text" class="form-control" min="1" max="200" name="respondent_age" id="textRespondentAge" readonly placeholder="Respondent Age">
                                        </div>
                                        <div class="mb-3">
                                            <label for="textRespondentAddress" class="form-label">Respondent Address</label>
                                            <input type="text" class="form-control" name="respondent_address" id="textRespondentAddress" readonly placeholder="Respondent Address">
                                        </div>
                                        <div class="mb-3">
                                            <label for="textRespondentContactNumber" class="form-label">Respondent Contact Number</label>
                                            <input type="number" class="form-control" name="respondent_contact_number" id="textRespondentContactNumber" readonly placeholder="Respondent Contact Number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="textPersonInvolved" class="form-label">Person Involved</label>
                                            <input type="text" class="form-control" name="person_involved" id="textPersonInvolved" readonly placeholder="Person Involved">
                                        </div>
                                        <div class="mb-3">
                                            <label for="textIncidentLocation" class="form-label">Incident Location</label>
                                            <input type="text" class="form-control" name="incident_location" id="textIncidentLocation" readonly placeholder="Incident Location">
                                        </div>
                                        <div class="mb-3">
                                            <label for="textIncidentDate" class="form-label">Incident Date</label>
                                            <input type="datetime-local" class="form-control" name="incident_date" id="textIncidentDate" readonly placeholder="Incident Date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="selectActionTaken" class="form-label">Action Taken</label>
                                            <select class="form-select" id="selectActionTaken" readonly name="action_taken">
                                                <option value="0" disabled selected>Select One</option>
                                                <option value="1">Negotiating</option>
                                                <option value="2">Both Signed</option>
                                                <option value="3">Others</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="selectStatus" class="form-label">Status</label>
                                            <select class="form-select" id="selectStatus" readonly name="status">
                                                <option value="0" disabled selected>Select One</option>
                                                <option value="1">New</option>
                                                <option value="2">On-Going</option>
                                                <option value="3">Pending</option>
                                                <option value="4">Report</option>
                                                <option value="5">Solved</option>
                                                <option value="6">Not Solved</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="textRemarks" class="form-label">Remarks</label>
                                            <input type="text" class="form-control" name="remarks" readonly id="textRemarks" placeholder="Remarks">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="submit" id="buttonAddBarangayResident" class="btn btn-primary" title="On going module"><i id="iconAddBarangayResident" class="fa fa-check"></i> Save</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div><!-- View Resident Modal End -->

    <!-- Filtering Modal Start -->
    <div class="modal fade" id="modalFilter" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md" style="min-width: 550px;">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="h4Title"><i class="fas fa-filter"></i>&nbsp;Filter</h4>
                    <button type="button" style="color: #fff;" class="close" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formFilter" autocomplete = 'off'>
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend w-50">
                                <span class="input-group-text w-100" id="inputGroup-sizing-default"><input type="checkbox" id="checkboxFilterGender" name="checkbox_filter_gender">&nbsp;Gender</span>
                            </div>
                            <select class="form-select" id="selectFilterGender" name="filter_gender" disabled>
                                <option value="0" disabled selected>Select One</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend w-50">
                                <span class="input-group-text w-100" id="inputGroup-sizing-default"><input type="checkbox" id="checkboxFilterCivilStatus" name="checkbox_filter_civil_status">&nbsp;Civil Status</span>
                            </div>
                            <select class="form-select" id="selectFilterCivilStatus" name="filter_civil_status" disabled>
                                <option value="0" disabled selected>Select One</option>
                                <option value="1">Single</option>
                                <option value="2">Married</option>
                                <option value="3">Widow/er</option>
                                <option value="4">Annulled</option>
                                <option value="5">Legally Separated</option>
                                <option value="6">Others</option>
                            </select>
                        </div>
    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend w-50">
                                <span class="input-group-text w-100" id="inputGroup-sizing-default"><input type="checkbox"id="checkboxFilterPurok" name="checkbox_filter_purok">&nbsp;Purok</span>
                            </div>
                            <input type="text" id="textFilterPurok" name="filter_purok" class="form-control" disabled>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend w-50">
                                <span class="input-group-text w-100" id="inputGroup-sizing-default"><input type="checkbox"id="checkboxFilterIdNumber" name="checkbox_filter_id_number">&nbsp;Brgy. ID Number</span>
                            </div>
                            <input type="text" id="textFilterIdNumber" name="filter_id_number" class="form-control" disabled>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend w-50">
                                <span class="input-group-text w-100" id="inputGroup-sizing-default"><input type="checkbox" id="checkboxFilterAge" name="checkbox_filter_agek">&nbsp;Age</span>
                            </div>
                            <input type="text" id="textFilterAge" name="filter_age" class="form-control" disabled>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="btnFilter" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                </div>
            </div>
        </div>
    </div><!-- Filtering Modal End -->
@endsection

<!--     {{-- JS CONTENT --}} -->
@section('js_content')
    <script type="text/javascript">
        $(document).ready(function () {
            // Initialize Select2 Elements
            $('.bootstrap-5').select2({ // $('.bootstrap-5').select2();
                theme: 'bootstrap-5'
            });
            
            // Disabled type on datepicker
            $(".datetimepicker").keydown(function(event) { 
                return false;
            });

            $("#textBirthPlace").on('click',function (e) { 
                e.preventDefault();
                // get current datetimepicker's value
                $('.datetimepicker').datepicker('getValue');
            });

            $('.datetimepicker').datepicker({
                format: 'yyyy/mm/dd', // format: 'dd/mm/yyyy',
                forceParse: false, // prevent from clearing existing values from input when no date selected
                autoclose: true, // autoclose date after selecting date
                clearBtn: true, // include clear button
                todayHighlight: true,
            }).on('changeDate', function(e) {
                var today = new Date();
                age = new Date(today - e.date).getFullYear() - 1970;
                $('#textAge').val(age);
                // console.log('date ', e.date);
                // console.log('age ', age);
                // console.log('formatted ', e.format(0,"dd/mm/yyyy"));
            });

            getUserLevel($('#userLevel'));
            
            $("#formAddBarangayResident").submit(function(event){
                event.preventDefault();
                addBarangayResident();
            });

            dataTablesBarangayResident = $("#tableBarangayResident").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_barangay_resident",
                    data: function (param){
                        param.selectFilterGender            = $('#selectFilterGender').val();
                        param.selectFilterCivilStatus       = $('#selectFilterCivilStatus').val();
                        param.textFilterPurok               = $('#textFilterPurok').val();
                        param.textFilterIdNumber            = $('#textFilterIdNumber').val();
                        param.textFilterAge                 = $('#textFilterAge').val();
                        param.dateRangeFrom                 = $('#dateRangeFrom', $('#formDateRange')).val();
                        param.dateRangeTo                   = $('#dateRangeTo', $('#formDateRange')).val();
                    },
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "barangay_id_number"},
                    { "data" : function(data){
                        return capitalizeFirstLetter(data.user_info.lastname) +', '+ capitalizeFirstLetter(data.user_info.firstname);
                    }},
                    { "data" : "age"},
                    { "data" : "gender"},
                    { "data" : "purok"},
                    { "data" : "civil_status"},
                    { "data" : "user_info.contact_number"},
                    { "data" : "created_at"},
                    { "data" : "status"},
                ],
                "columnDefs": [
                    // { className: 'align-middle', targets: [0, 1, 2, 3, 4, 5, 6 ,7] },
                    { className: 'text-center', targets: [0, 1, 2, 3, 4] },
                ],
                "createdRow": function(row, data, index) {
                    $('td', row).eq(1).css('white-space', 'normal');
                    $('td', row).eq(2).css('white-space', 'normal');
                    // console.log('row ', row);
                    // console.log('data ', data);
                    // console.log('index ', index);
                },
            });
            
            // let dataTablesBarangayResidentBlotter = $("#tableBarangayResidentBlotter").DataTable({
            //     "processing" : false,
            //     "serverSide" : true,
            //     "responsive": true,
            //     "orderClasses": false, // disable sorting_1 for unknown background
            //     // "order": [[ 0, "desc" ],[ 4, "desc" ]],
            //     "ajax" : {
            //         url: "view_barangay_resident_blotter_by_resident",
            //         data: function (param){
            //             param.barangayResidentId = $('#barangayResidentId', $('#formViewBarangayResident')).val();
            //         },
            //     },
            //     "columns":[ 
            //         { "data" : function(data){
            //             return data.barangay_resident_blotter_details.case_number;
            //         }},
            //         { "data" : function(data){
            //             return data.barangay_resident_blotter_details.respondent;
            //         }},
            //         { "data" : function(data){
            //             return capitalizeFirstLetter(data.user_info.firstname) + ' ' + capitalizeFirstLetter(data.user_info.lastname);
            //         }},
            //         { "data" : function(data){
            //             return data.barangay_resident_blotter_details.complainant_statement;
            //         }},
            //         { "data" : function(data){
            //             return moment(data.created_at).format("dddd, MMM D YYYY");
            //         }},
            //         { "data" : function(data){
            //             return data.barangay_resident_blotter_details.action_taken;
            //         }},
            //         { "data" : function(data){
            //             return data.barangay_resident_blotter_details.status;
            //         }},
            //     ],
            //     "columnDefs": [
            //         // { className: 'align-middle', targets: [0, 1, 2, 3, 4, 5, 6 ,7] },
            //         // { className: 'text-center', targets: [0, 1, 2, 3, 4] },
            //     ],
            //     "createdRow": function(row, data, index) {
            //         $('td', row).eq(1).css('white-space', 'normal');
            //         $('td', row).eq(2).css('white-space', 'normal');
            //         // console.log('row ', row);
            //         // console.log('data ', data);
            //         // console.log('index ', index);
            //     },
            // });

            let dataTablesBarangayResidentBlotter = $("#tableBarangayResidentBlotter").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                "orderClasses": false, // disable sorting_1 for unknown background
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "ajax" : {
                    url: "view_barangay_resident_blotter_by_resident",
                    data: function (param){
                        param.barangayResidentId = $('#barangayResidentId', $('#formViewBarangayResident')).val();
                    },
                },
                "columns":[ 
                    { "data" : "case_number"},
                    { "data" : "respondent"},
                    { "data" : "complainant"},
                    { "data" : "complainant_statement"},
                    { "data" : function(data){
                            return moment(data.created_at).format("dddd, MMM D YYYY");
                        }
                    },
                    { "data" : "action_taken"},
                    { "data" : "status"},
                ],
                "columnDefs": [
                    // { className: 'align-middle', targets: [0, 1, 2, 3, 4, 5, 6 ,7] },
                    { className: 'text-start', targets: [ 3] },
                ],
                "createdRow": function(row, data, index) {
                    $('td', row).eq(1).css('white-space', 'normal');
                    $('td', row).eq(2).css('white-space', 'normal');
                    $('td', row).eq(3).css('white-space', 'normal');
                    // $('td', row).eq(4).css('white-space', 'normal');
                    // console.log('row ', row);
                    // console.log('data ', data);
                    // console.log('index ', index);
                },
            });
            

            $('#buttonAddBarangayResident').on('click', function(){
                getUsersWithResidentInfo($('#selectUser'));
            });

            $(document).on('click', '.actionEditBarangayResident', function(){
                getUsers($('#selectUser'));
                let id = $(this).attr('barangay-resident-id');
                console.log('id ', id);
                $("input[name='barangay_resident_id'", $("#formAddBarangayResident")).val(id);
                getBarangayResidentById(id);
            });
            
            $(document).on('click', '.actionEditBarangayResidentStatus', function(){
                let barangayResidentStatus = $(this).attr('barangay-resident-status');
                let barangayResidentId = $(this).attr('barangay-resident-id');
                
                $("#textEditResidentStatus").val(barangayResidentStatus);
                $("#textEditResidentStatusResidentId").val(barangayResidentId);

                if(barangayResidentStatus == 1){
                    $("#paragraphEditResidentStatus").text('Are you sure to disable?');
                }
                else{
                    $("#paragraphEditResidentStatus").text('Are you sure to enable?');
                }
            });

            $(document).on('click', '.actionViewBarangayResident', function(){
                let id = $(this).attr('barangay-resident-id');
                console.log('resident id ', id);
                $("input[name='barangay_resident_id'", $("#formViewBarangayResident")).val(id);
                viewBarangayResidentById(id);

                /* Resident Blotter */
                dataTablesBarangayResidentBlotter.draw();
            });

            $("#formEditBarangayResidentStatus").submit(function(event){
                event.preventDefault();
                editBarangayResidentStatus();
            });

            $("#formDateRange").submit(function(event) {
                event.preventDefault();
                dataTablesBarangayResident.ajax.reload(null, false);
            });

            $('#checkboxFilterGender').on('click', function(){
                $('#checkboxFilterGender').attr('checked', 'checked');
                
                if($('#checkboxFilterGender').is(':checked')){
                    $('#selectFilterGender').attr('disabled', false);
                }else{
                    $('#checkboxFilterGender').removeAttr('checked');
                    $('#selectFilterGender').attr('disabled', true);
                    $('#selectFilterGender').val('0').trigger('change');
                }
            });

            $('#checkboxFilterCivilStatus').on('click', function(){
                $('#checkboxFilterCivilStatus').attr('checked', 'checked');
                
                if($('#checkboxFilterCivilStatus').is(':checked')){
                    $('#selectFilterCivilStatus').attr('disabled', false);
                }else{
                    $('#checkboxFilterCivilStatus').removeAttr('checked');
                    $('#selectFilterCivilStatus').attr('disabled', true);
                    $('#selectFilterCivilStatus').val('0').trigger('change');
                }
            });

            $('#checkboxFilterPurok').on('click', function(){
                $('#checkboxFilterPurok').attr('checked', 'checked');
                
                if($('#checkboxFilterPurok').is(':checked')){
                    $('#textFilterPurok').attr('disabled', false);
                }else{
                    $('#checkboxFilterPurok').removeAttr('checked');
                    $('#textFilterPurok').attr('disabled', true);
                    $('#textFilterPurok').val('');
                }
            });

            $('#checkboxFilterIdNumber').on('click', function(){
                $('#checkboxFilterIdNumber').attr('checked', 'checked');
                
                if($('#checkboxFilterIdNumber').is(':checked')){
                    $('#textFilterIdNumber').attr('disabled', false);
                }else{
                    $('#checkboxFilterIdNumber').removeAttr('checked');
                    $('#textFilterIdNumber').attr('disabled', true);
                    $('#textFilterIdNumber').val('');
                }
            });

            $('#checkboxFilterAge').on('click', function(){
                $('#checkboxFilterAge').attr('checked', 'checked');
                
                if($('#checkboxFilterAge').is(':checked')){
                    $('#textFilterAge').attr('disabled', false);
                }else{
                    $('#checkboxFilterAge').removeAttr('checked');
                    $('#textFilterAge').attr('disabled', true);
                    $('#textFilterAge').val('');
                }
            });

            $('#btnFilter').on('click', function(){
                dataTablesBarangayResident.draw();
                $('#modalFilter').modal('hide');
            });
        });
    </script>
@endsection
