<?php

use Illuminate\Support\Facades\Route;

/**
 * Import Controllers
 */
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BarangayProfileController;
use App\Http\Controllers\BarangayGeographyController;
use App\Http\Controllers\BarangayDemographyController;
use App\Http\Controllers\BarangaySchoolController;
use App\Http\Controllers\BarangayOthersController;
use App\Http\Controllers\BarangayActivitiesController;
use App\Http\Controllers\BarangayHistoryController;
use App\Http\Controllers\BarangayMissionVisionController;
use App\Http\Controllers\BarangayResidentDatabaseController;
use App\Http\Controllers\BarangayResidentController;
use App\Http\Controllers\BarangayResidentBlotterController;
use App\Http\Controllers\BarangayOfficialController;
use App\Http\Controllers\CedulaBasisController;
use App\Http\Controllers\CedulaController;

/* Certificates */
use App\Http\Controllers\BarangayClearanceCertificateController;
use App\Http\Controllers\IndigencyCertificateController;
use App\Http\Controllers\ResidencyCertificateController;
use App\Http\Controllers\RegistrationCertificateController;
use App\Http\Controllers\LicensePermitCertificateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Common Routes
 */
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/signin_page', function () {
    return view('signin');
})->name('signin_page');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/vision_mission', function () {
    return view('vision_mission');
})->name('vision_mission');

Route::get('/officials', function () {
    return view('officials');
})->name('officials');

Route::get('/officials_sk', function () {
    return view('officials_sk');
})->name('officials_sk');

Route::get('/officials_bpso', function () {
    return view('officials_bpso');
})->name('officials_bpso');

Route::get('/activities', function () {
    return view('activities');
})->name('activities');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/change_password_page', function () {
    return view('change_password');
})->name('change_password_page');

Route::get('/user_management', function () {
    return view('admin.user_management');
})->name('user_management');

Route::get('/about_management', function () {
    return view('admin.about_management');
})->name('about_management');

Route::get('/activities_management', function () {
    return view('admin.activities_management');
})->name('activities_management');

Route::get('/history_management', function () {
    return view('admin.history_management');
})->name('history_management');

Route::get('/mission_vision_management', function () {
    return view('admin.mission_vision_management');
})->name('mission_vision_management');

Route::get('/announcement_management', function () {
    return view('admin.announcement_management');
})->name('announcement_management');

Route::get('/resident_database_management', function () {
    return view('admin.resident_database_management');
})->name('resident_database_management');

Route::get('/resident_management', function () {
    return view('admin.resident_management');
})->name('resident_management');

Route::get('/blotter_management', function () {
    return view('admin.blotter_management');
})->name('blotter_management');

Route::get('/officials_management', function () {
    return view('admin.officials_management');
})->name('officials_management');


/* Certificate */
Route::get('/barangay_clearance_certificate', function () {
    return view('admin.barangay_clearance_certificate');
})->name('barangay_clearance_certificate');

Route::get('/indigency_certificate', function () {
    return view('admin.indigency_certificate');
})->name('indigency_certificate');

Route::get('/registration_certificate', function () {
    return view('admin.registration_certificate');
})->name('registration_certificate');

Route::get('/license_permit_certificate', function () {
    return view('admin.license_permit_certificate');
})->name('license_permit_certificate');

Route::get('/residency_certificate', function () {
    return view('admin.residency_certificate');
})->name('residency_certificate');

Route::get('/reports_management', function () {
    return view('admin.reports_management');
})->name('reports_management');

Route::get('/issuance_configuration_management', function () {
    return view('admin.cedula_basis_management');
})->name('issuance_configuration_management');

Route::get('/cedula_management', function () {
    return view('admin.cedula_management');
})->name('cedula_management');

Route::get('/audit_trail_management', function () {
    return view('admin.audit_trail_management');
})->name('audit_trail_management');

Route::get('/transaction_process', function () {
    return view('transaction_process');
})->name('transaction_process');

/* Certificate Request */
Route::get('/request_barangay_clearance_certificate', function () {
    return view('admin.request_barangay_clearance_certificate');
})->name('request_barangay_clearance_certificate');

Route::get('/request_indigency_certificate', function () {
    return view('admin.request_indigency_certificate');
})->name('request_indigency_certificate');

Route::get('/request_residency_certificate', function () {
    return view('admin.request_residency_certificate');
})->name('request_residency_certificate');

Route::get('/request_registration_certificate', function () {
    return view('admin.request_registration_certificate');
})->name('request_registration_certificate');

Route::get('/request_license_permit_certificate', function () {
    return view('admin.request_license_permit_certificate');
})->name('request_license_permit_certificate');

Route::get('/request_cedula_management', function () {
    return view('admin.request_cedula_management');
})->name('request_cedula_management');



/**
 * USER CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/sign_in', [UserController::class, 'signIn'])->name('sign_in');
Route::post('/add_user', [UserController::class, 'addUser'])->name('add_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/check_session', [UserController::class, 'checkSession'])->name('check_session');
Route::post('/add_user_as_admin', [UserController::class, 'addUserAsAdmin'])->name('add_user_as_admin');
Route::get('/get_user_levels', [UserController::class, 'getUserLevels'])->name('get_user_levels');
Route::get('/view_users', [UserController::class, 'viewUsers'])->name('view_users');
Route::get('/view_pending_users', [UserController::class, 'viewPendingUsers'])->name('view_pending_users');
Route::get('/get_user_by_id', [UserController::class, 'getUserById'])->name('get_user_by_id');
Route::post('/edit_user_status', [UserController::class, 'editUserStatus'])->name('edit_user_status');
Route::post('/edit_user_authentication', [UserController::class, 'editUserAuthentication'])->name('edit_user_authentication');
Route::get('/get_data_for_dashboard', [UserController::class, 'getDataForDashboard'])->name('get_data_for_dashboard');
Route::get('/view_pending_users_for_dashboard', [UserController::class, 'viewPendingUsersForDashboard'])->name('view_pending_users_for_dashboard');
Route::get('/resident_address_checker', [UserController::class, 'residentAddressChecker'])->name('resident_address_checker');
Route::get('/get_users', [UserController::class, 'getUsers'])->name('get_users');
/* For Profile update */
Route::post('/edit_user', [UserController::class, 'editUser'])->name('edit_user');
Route::get('/get_user_by_session_id', [UserController::class, 'getUserBySessionId'])->name('get_user_by_session_id');

/**
 * BARANGAY PROFILE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_profile', [BarangayProfileController::class, 'viewBarangayProfile'])->name('view_barangay_profile');
Route::post('/add_barangay_profile', [BarangayProfileController::class, 'addBarangayProfile'])->name('add_barangay_profile');
Route::get('/get_barangay_profile_by_id', [BarangayProfileController::class, 'getBarangayProfileById'])->name('get_barangay_profile_by_id');
Route::post('/edit_barangay_profile_status', [BarangayProfileController::class, 'editBarangayProfileStatus'])->name('edit_barangay_profile_status');
Route::get('/get_total_barangay_profile', [BarangayProfileController::class, 'getTotalBarangayProfile'])->name('get_total_barangay_profile');


/**
 * GEOGRAPHY CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_geography', [BarangayGeographyController::class, 'viewBarangayGeography'])->name('view_barangay_geography');
Route::post('/add_barangay_geography', [BarangayGeographyController::class, 'addBarangayGeography'])->name('add_barangay_geography');
Route::get('/get_barangay_geography_by_id', [BarangayGeographyController::class, 'getBarangayGeographyById'])->name('get_barangay_geography_by_id');
Route::post('/edit_barangay_geography_status', [BarangayGeographyController::class, 'editBarangayGeographyStatus'])->name('edit_barangay_geography_status');
Route::get('/get_total_barangay_geography', [BarangayGeographyController::class, 'getTotalBarangayGeography'])->name('get_total_barangay_geography');

/**
 * DEMOGRAPHY CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_demography', [BarangayDemographyController::class, 'viewBarangayDemography'])->name('view_barangay_demography');
Route::post('/add_barangay_demography', [BarangayDemographyController::class, 'addBarangayDemography'])->name('add_barangay_demography');
Route::get('/get_barangay_demography_by_id', [BarangayDemographyController::class, 'getBarangayDemographyById'])->name('get_barangay_demography_by_id');
Route::post('/edit_barangay_demography_status', [BarangayDemographyController::class, 'editBarangayDemographyStatus'])->name('edit_barangay_demography_status');
Route::get('/get_total_barangay_demography', [BarangayDemographyController::class, 'getTotalBarangayDemography'])->name('get_total_barangay_demography');

/**
 * SCHOOL CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_school', [BarangaySchoolController::class, 'viewBarangaySchool'])->name('view_barangay_school');
Route::post('/add_barangay_school', [BarangaySchoolController::class, 'addBarangaySchool'])->name('add_barangay_school');
Route::get('/get_barangay_school_by_id', [BarangaySchoolController::class, 'getBarangaySchoolById'])->name('get_barangay_school_by_id');
Route::post('/edit_barangay_school_status', [BarangaySchoolController::class, 'editBarangaySchoolStatus'])->name('edit_barangay_school_status');
Route::get('/get_total_barangay_school', [BarangaySchoolController::class, 'getTotalBarangaySchool'])->name('get_total_barangay_school');

/**
 * OTHERS CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_others', [BarangayOthersController::class, 'viewBarangayOthers'])->name('view_barangay_others');
Route::post('/add_barangay_others', [BarangayOthersController::class, 'addBarangayOthers'])->name('add_barangay_others');
Route::get('/get_barangay_others_by_id', [BarangayOthersController::class, 'getBarangayOthersById'])->name('get_barangay_others_by_id');
Route::post('/edit_barangay_others_status', [BarangayOthersController::class, 'editBarangayOthersStatus'])->name('edit_barangay_others_status');
Route::get('/get_total_barangay_others', [BarangayOthersController::class, 'getTotalBarangayOthers'])->name('get_total_barangay_others');

/**
 * ACTIVITIES MANAGEMENT CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_activities', [BarangayActivitiesController::class, 'viewBarangayActivities'])->name('view_barangay_activities');
Route::post('/add_barangay_activities', [BarangayActivitiesController::class, 'addBarangayActivities'])->name('add_barangay_activities');
Route::get('/get_barangay_activities_by_id', [BarangayActivitiesController::class, 'getBarangayActivitiesById'])->name('get_barangay_activities_by_id');
Route::post('/edit_barangay_activities_status', [BarangayActivitiesController::class, 'editBarangayActivitiesStatus'])->name('edit_barangay_activities_status');
Route::get('/get_total_barangay_activities', [BarangayActivitiesController::class, 'getTotalBarangayActivities'])->name('get_total_barangay_activities');

/**
 * HISTORY CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_history', [BarangayHistoryController::class, 'viewBarangayHistory'])->name('view_barangay_history');
Route::post('/add_barangay_history', [BarangayHistoryController::class, 'addBarangayHistory'])->name('add_barangay_history');
Route::get('/get_barangay_history_by_id', [BarangayHistoryController::class, 'getBarangayHistoryById'])->name('get_barangay_history_by_id');
Route::post('/edit_barangay_history_status', [BarangayHistoryController::class, 'editBarangayHistoryStatus'])->name('edit_barangay_history_status');
Route::get('/get_total_barangay_history', [BarangayHistoryController::class, 'getTotalBarangayHistory'])->name('get_total_barangay_history');

/**
 * MISSION & VISION CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_mission_vision', [BarangayMissionVisionController::class, 'viewBarangayMissionVision'])->name('view_barangay_mission_vision');
Route::post('/add_barangay_mission_vision', [BarangayMissionVisionController::class, 'addBarangayMissionVision'])->name('add_barangay_mission_vision');
Route::get('/get_barangay_mission_vision_by_id', [BarangayMissionVisionController::class, 'getBarangayMissionVisionById'])->name('get_barangay_mission_vision_by_id');
Route::post('/edit_barangay_mission_vision_status', [BarangayMissionVisionController::class, 'editBarangayMissionVisionStatus'])->name('edit_barangay_mission_vision_status');
Route::get('/get_total_barangay_mission_vision', [BarangayMissionVisionController::class, 'getTotalBarangayMissionVision'])->name('get_total_barangay_mission_vision');

/**
 * ANNOUNCEMENT MANAGEMENT CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_announcements', [AnnouncementController::class, 'viewAnnouncements'])->name('view_announcements');
Route::post('/add_announcement', [AnnouncementController::class, 'addAnnouncement'])->name('add_announcement');
Route::get('/get_announcement_by_id', [AnnouncementController::class, 'getAnnouncementById'])->name('get_announcement_by_id');
Route::post('/edit_announcement_status', [AnnouncementController::class, 'editAnnouncementStatus'])->name('edit_announcement_status');
Route::get('/get_total_announcements', [AnnouncementController::class, 'getTotalAnnouncements'])->name('get_total_announcements');

/**
 * OFFICIALS MANAGEMENT CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_official', [BarangayOfficialController::class, 'viewBarangayOfficial'])->name('view_barangay_official');
Route::post('/add_barangay_official', [BarangayOfficialController::class, 'addBarangayOfficial'])->name('add_barangay_official');
Route::get('/get_barangay_official_by_id', [BarangayOfficialController::class, 'getBarangayOfficialById'])->name('get_barangay_official_by_id');
Route::post('/edit_barangay_official_status', [BarangayOfficialController::class, 'editBarangayOfficialStatus'])->name('edit_barangay_official_status');
Route::get('/get_total_barangay_official', [BarangayOfficialController::class, 'getTotalBarangayOfficial'])->name('get_total_barangay_official');

/**
 * RESIDENT DATABASE MANAGEMEMENT CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_resident_database', [BarangayResidentDatabaseController::class, 'viewBarangayResidentDatabase'])->name('view_barangay_resident_database');
Route::post('/add_barangay_resident_database', [BarangayResidentDatabaseController::class, 'addBarangayResidentDatabase'])->name('add_barangay_resident_database');
Route::get('/get_barangay_resident_database_by_id', [BarangayResidentDatabaseController::class, 'getBarangayResidentDatabaseById'])->name('get_barangay_resident_database_by_id');
Route::post('/edit_barangay_resident_database_status', [BarangayResidentDatabaseController::class, 'editBarangayResidentDatabaseStatus'])->name('edit_barangay_resident_database_status');
Route::get('/get_total_barangay_resident_database', [BarangayResidentDatabaseController::class, 'getTotalBarangayResidentDatabase'])->name('get_total_barangay_resident_database');

/**
 * RESIDENT MANAGEMEMENT CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_resident', [BarangayResidentController::class, 'viewBarangayResident'])->name('view_barangay_resident');
Route::post('/add_barangay_resident', [BarangayResidentController::class, 'addBarangayResident'])->name('add_barangay_resident');
Route::get('/get_barangay_resident_by_id', [BarangayResidentController::class, 'getBarangayResidentById'])->name('get_barangay_resident_by_id');
Route::post('/edit_barangay_resident_status', [BarangayResidentController::class, 'editBarangayResidentStatus'])->name('edit_barangay_resident_status');
Route::get('/get_total_barangay_resident', [BarangayResidentController::class, 'getTotalBarangayResident'])->name('get_total_barangay_resident');
Route::get('/get_users_with_resident_info', [BarangayResidentController::class, 'getUsersWithResidentInfo'])->name('get_users_with_resident_info');
Route::get('/view_barangay_resident_by_id', [BarangayResidentController::class, 'viewBarangayResidentById'])->name('view_barangay_resident_by_id');
Route::get('/get_residents', [BarangayResidentController::class, 'getResidents'])->name('get_residents');
Route::get('/view_barangay_resident_blotter_by_resident', [BarangayResidentController::class, 'viewBarangayResidentBlotterByResident'])->name('view_barangay_resident_blotter_by_resident');

/**
 * BLOTTER MANAGEMEMENT CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_resident_blotter', [BarangayResidentBlotterController::class, 'viewBarangayResidentBlotter'])->name('view_barangay_resident_blotter');
Route::post('/add_barangay_resident_blotter', [BarangayResidentBlotterController::class, 'addBarangayResidentBlotter'])->name('add_barangay_resident_blotter');
Route::get('/get_barangay_resident_blotter_by_id', [BarangayResidentBlotterController::class, 'getBarangayResidentBlotterById'])->name('get_barangay_resident_blotter_by_id');
Route::post('/edit_barangay_resident_blotter_status', [BarangayResidentBlotterController::class, 'editBarangayResidentBlotterStatus'])->name('edit_barangay_resident_blotter_status');
Route::get('/get_total_barangay_resident_blotter', [BarangayResidentBlotterController::class, 'getTotalBarangayResidentBlotter'])->name('get_total_barangay_resident_blotter');
Route::get('/get_users_with_resident_blotter_info', [BarangayResidentBlotterController::class, 'getUsersWithBlotterInfo'])->name('get_users_with_resident_blotter_info');
Route::get('/view_barangay_resident_blotter_by_id', [BarangayResidentBlotterController::class, 'viewBarangayResidentBlotterById'])->name('view_barangay_resident_blotter_by_id');
Route::get('/barangay_blotter_pdf/{id}', [BarangayResidentBlotterController::class, 'barangay_blotter_pdf'])->name('barangay_blotter_pdf');

/**
 * BARANGAY CLEARANCE CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_barangay_clearance_certificate', [BarangayClearanceCertificateController::class, 'viewBarangayClearanceCertificate'])->name('view_barangay_clearance_certificate');
Route::post('/add_barangay_clearance_certificate', [BarangayClearanceCertificateController::class, 'addBarangayClearanceCertificate'])->name('add_barangay_clearance_certificate');
Route::get('/get_barangay_clearance_certificate_by_id', [BarangayClearanceCertificateController::class, 'getBarangayClearanceCertificateById'])->name('get_barangay_clearance_certificate_by_id');
Route::get('/get_total_barangay_clearance_certificate', [BarangayClearanceCertificateController::class, 'getTotalBarangayClearanceCertificate'])->name('get_total_barangay_clearance_certificate');
Route::get('/barangay_clerance_pdf/{id}', [BarangayClearanceCertificateController::class, 'barangay_clerance_pdf'])->name('barangay_clerance_pdf');

/**
 * INDIGENCY CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_indigency_certificate', [IndigencyCertificateController::class, 'viewIndigencyCertificate'])->name('view_indigency_certificate');
Route::post('/add_indigency_certificate', [IndigencyCertificateController::class, 'addIndigencyCertificate'])->name('add_indigency_certificate');
Route::get('/get_indigency_certificate_by_id', [IndigencyCertificateController::class, 'getIndigencyCertificateById'])->name('get_indigency_certificate_by_id');
Route::get('/get_total_indigency_certificate', [IndigencyCertificateController::class, 'getTotalIndigencyCertificate'])->name('get_total_indigency_certificate');
Route::get('/indigency_certificate_pdf/{id}', [IndigencyCertificateController::class, 'indigency_certificate_pdf'])->name('indigency_certificate_pdf');

/**
 * RESIDENCY CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_residency_certificate', [ResidencyCertificateController::class, 'viewResidencyCertificate'])->name('view_residency_certificate');
Route::post('/add_residency_certificate', [ResidencyCertificateController::class, 'addResidencyCertificate'])->name('add_residency_certificate');
Route::get('/get_residency_certificate_by_id', [ResidencyCertificateController::class, 'getResidencyCertificateById'])->name('get_residency_certificate_by_id');
Route::get('/get_total_residency_certificate', [ResidencyCertificateController::class, 'getTotalResidencyCertificate'])->name('get_total_residency_certificate');
Route::get('/residency_certificate_pdf/{id}', [ResidencyCertificateController::class, 'residency_certificate_pdf'])->name('residency_certificate_pdf');

/**
 * REGISTRATION CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_registration_certificate', [RegistrationCertificateController::class, 'viewRegistrationCertificate'])->name('view_registration_certificate');
Route::post('/add_registration_certificate', [RegistrationCertificateController::class, 'addRegistrationCertificate'])->name('add_registration_certificate');
Route::get('/get_registration_certificate_by_id', [RegistrationCertificateController::class, 'getRegistrationCertificateById'])->name('get_registration_certificate_by_id');
Route::get('/get_total_registration_certificate', [RegistrationCertificateController::class, 'getTotalRegistrationCertificate'])->name('get_total_registration_certificate');
Route::get('/registration_certificate_pdf/{id}', [RegistrationCertificateController::class, 'registration_certificate_pdf'])->name('registration_certificate_pdf');

/**
 * LICENSE AND PERMIT CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_license_permit_certificate', [LicensePermitCertificateController::class, 'viewLicensePermitCertificate'])->name('view_license_permit_certificate');
Route::post('/add_license_permit_certificate', [LicensePermitCertificateController::class, 'addLicensePermitCertificate'])->name('add_license_permit_certificate');
Route::get('/get_license_permit_certificate_by_id', [LicensePermitCertificateController::class, 'getLicensePermitCertificateById'])->name('get_license_permit_certificate_by_id');
Route::get('/get_total_license_permit_certificate', [LicensePermitCertificateController::class, 'getTotalLicensePermitCertificate'])->name('get_total_license_permit_certificate');
Route::get('/barangay_license_and_permit_certificate_pdf/{id}', [LicensePermitCertificateController::class, 'barangay_license_and_permit_certificate_pdf'])->name('barangay_license_and_permit_certificate_pdf');

/**
 * REQUEST BARANGAY CLEARANCE CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_request_barangay_clearance_certificate', [BarangayClearanceCertificateController::class, 'viewRequestBarangayClearanceCertificate'])->name('view_request_barangay_clearance_certificate');
Route::post('/add_request_barangay_clearance_certificate', [BarangayClearanceCertificateController::class, 'addRequestBarangayClearanceCertificate'])->name('add_request_barangay_clearance_certificate');
Route::get('/get_request_barangay_clearance_certificate_by_id', [BarangayClearanceCertificateController::class, 'getRequestBarangayClearanceCertificateById'])->name('get_request_barangay_clearance_certificate_by_id');

/**
 * REQUEST INDIGENCY CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_request_indigency_certificate', [IndigencyCertificateController::class, 'viewRequestIndigencyCertificate'])->name('view_request_indigency_certificate');
Route::post('/add_request_indigency_certificate', [IndigencyCertificateController::class, 'addRequestIndigencyCertificate'])->name('add_request_indigency_certificate');

/**
 * REQUEST RESIDENCY CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_request_residency_certificate', [ResidencyCertificateController::class, 'viewRequestResidencyCertificate'])->name('view_request_residency_certificate');
Route::post('/add_request_residency_certificate', [ResidencyCertificateController::class, 'addRequestResidencyCertificate'])->name('add_request_residency_certificate');

/**
 * REQUEST REGISTRATION CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_request_registration_certificate', [RegistrationCertificateController::class, 'viewRequestRegistrationCertificate'])->name('view_request_registration_certificate');
Route::post('/add_request_registration_certificate', [RegistrationCertificateController::class, 'addRequestRegistrationCertificate'])->name('add_request_registration_certificate');

/**
 * REQUEST LICENSE & PERMIT CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_request_license_permit_certificate', [LicensePermitCertificateController::class, 'viewRequestLicensePermitCertificate'])->name('view_request_license_permit_certificate');
Route::post('/add_request_license_permit_certificate', [LicensePermitCertificateController::class, 'addRequestLicensePermitCertificate'])->name('add_request_license_permit_certificate');

/**
 * REPORTS CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/user_report_pdf', [UserController::class, 'user_report_pdf'])->name('user_report_pdf');
Route::get('/resident_report_pdf', [BarangayResidentController::class, 'resident_report_pdf'])->name('resident_report_pdf');
Route::get('/blotter_report_pdf', [BarangayResidentBlotterController::class, 'blotter_report_pdf'])->name('blotter_report_pdf');
Route::get('/barangay_clearance_certificates_report_pdf', [BarangayClearanceCertificateController::class, 'barangay_clearance_certificates_report_pdf'])->name('barangay_clearance_certificates_report_pdf');
Route::get('/license_permit_certificates_report_pdf', [LicensePermitCertificateController::class, 'license_permit_certificates_report_pdf'])->name('license_permit_certificates_report_pdf');
Route::get('/indigency_certificates_report_pdf', [IndigencyCertificateController::class, 'indigency_certificates_report_pdf'])->name('indigency_certificates_report_pdf');
Route::get('/residency_certificates_report_pdf', [ResidencyCertificateController::class, 'residency_certificates_report_pdf'])->name('residency_certificates_report_pdf');
Route::get('/registration_certificates_report_pdf', [RegistrationCertificateController::class, 'registration_certificates_report_pdf'])->name('registration_certificates_report_pdf');

/**
 * CEDULA BASIS CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_cedula_basis', [CedulaBasisController::class, 'viewCedulaBasis'])->name('view_cedula_basis');
Route::post('/add_cedula_basis', [CedulaBasisController::class, 'addCedulaBasis'])->name('add_cedula_basis');
Route::get('/get_cedula_basis_by_id', [CedulaBasisController::class, 'getCedulaBasisById'])->name('get_cedula_basis_by_id');
Route::post('/edit_cedula_basis_status', [CedulaBasisController::class, 'editCedulaBasisStatus'])->name('edit_cedula_basis_status');
Route::get('/check_cedula_basis_existence', [CedulaBasisController::class, 'getCedulaBasisExistence'])->name('check_cedula_basis_existence');

/**
 * CEDULA CERTIFICATE CONTROLLER
 * Note: always use snake case naming convention to route & route name and camel case to the method for best practice
 */
Route::get('/view_cedula', [CedulaController::class, 'viewCedula'])->name('view_cedula');
Route::post('/add_cedula', [CedulaController::class, 'addCedula'])->name('add_cedula');
Route::get('/get_issuance_certification', [CedulaController::class, 'getIssuanceConfiguration'])->name('get_issuance_certification');
Route::get('/get_cedula_by_id', [CedulaController::class, 'getCedulaById'])->name('get_cedula_by_id');
Route::post('/edit_cedula_status', [CedulaController::class, 'editCedulaStatus'])->name('edit_cedula_status');
Route::get('/view_request_cedula', [CedulaController::class, 'viewRequestCedula'])->name('view_request_cedula');
Route::post('/add_request_cedula', [CedulaController::class, 'addRequestCedula'])->name('add_request_cedula');
Route::get('/get_resident_for_cedula_by_user_id', [CedulaController::class, 'getResidentForCedulaByUserId'])->name('get_resident_for_cedula_by_user_id');

Route::get('/view_audit_trail', [IndigencyCertificateController::class, 'viewAuditTrail'])->name('view_audit_trail');