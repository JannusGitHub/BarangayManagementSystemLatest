function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function resetFormValues() {
    // Reset input values
    $("#formAddUser")[0].reset();

    // Reset hidden input fields
    // $("select[name='user_level']", $('#formAddUser')).val(0).trigger('change');

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddUser").on('hidden.bs.modal', function () {
    console.log('hidden.bs.modal');
    resetFormValues();
});


function resetAnnouncementFormValues() {
    // Reset input values
    $("#formAddAnnouncement")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddAnnouncement").on('hidden.bs.modal', function () {
    console.log('resetAnnouncementFormValues is closed');
    resetAnnouncementFormValues();
});


function resetBarangayProfileFormValues() {
    // Reset input values
    $("#formAddBarangayProfile")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayProfile").on('hidden.bs.modal', function () {
    console.log('resetBarangayProfileFormValues is closed');
    resetBarangayProfileFormValues();
});


function resetBarangayGeographyFormValues() {
    // Reset input values
    $("#formAddBarangayGeography")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayGeography").on('hidden.bs.modal', function () {
    console.log('resetBarangayGeographyFormValues is closed');
    resetBarangayGeographyFormValues();
});


function resetBarangayDemographyFormValues() {
    // Reset input values
    $("#formAddBarangayDemography")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayDemography").on('hidden.bs.modal', function () {
    console.log('resetBarangayDemographyFormValues is closed');
    resetBarangayDemographyFormValues();
});


function resetBarangaySchoolFormValues() {
    // Reset input values
    $("#formAddBarangaySchool")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangaySchool").on('hidden.bs.modal', function () {
    console.log('resetBarangaySchoolFormValues is closed');
    resetBarangaySchoolFormValues();
});


function resetBarangayOthersFormValues() {
    // Reset input values
    $("#formAddBarangayOthers")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayOthers").on('hidden.bs.modal', function () {
    console.log('resetBarangayOthersFormValues is closed');
    resetBarangayOthersFormValues();
});

function resetBarangayActivitiesFormValues() {
    // Reset input values
    $("#formAddBarangayActivities")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayActivities").on('hidden.bs.modal', function () {
    console.log('resetBarangayActivitiesFormValues is closed');
    resetBarangayActivitiesFormValues();
});


function resetBarangayHistoryFormValues() {
    // Reset input values
    $("#formAddBarangayHistory")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayHistory").on('hidden.bs.modal', function () {
    console.log('resetBarangayHistoryFormValues is closed');
    resetBarangayHistoryFormValues();
});


function resetBarangayResidentDatabaseFormValues() {
    // Reset input values
    $("#formAddBarangayResidentDatabase")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayResidentDatabase").on('hidden.bs.modal', function () {
    console.log('resetBarangayResidentDatabaseFormValues is closed');
    resetBarangayResidentDatabaseFormValues();
});


function resetBarangayResidentFormValues() {
    // Reset input values
    $("#formAddBarangayResident")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayResident").on('hidden.bs.modal', function () {
    console.log('resetBarangayResidentFormValues is closed');
    resetBarangayResidentFormValues();
});


function resetViewBarangayResidentFormValues() {
    // Reset input values
    $("#formViewBarangayResident")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalViewBarangayResident").on('hidden.bs.modal', function () {
    console.log('resetViewBarangayResidentFormValues is closed');
    resetViewBarangayResidentFormValues();
});


function resetBarangayResidentBlotterFormValues() {
    // Reset input values
    $("#formAddBarangayResidentBlotter")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayResidentBlotter").on('hidden.bs.modal', function () {
    console.log('modalAddBarangayResidentBlotter is closed');
    resetBarangayResidentBlotterFormValues();
});


function resetBarangayClearanceCertificateFormValues() {
    // Reset input values
    $("#formAddBarangayClearanceCertificate")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayClearanceCertificate").on('hidden.bs.modal', function () {
    console.log('modalAddBarangayClearanceCertificate is closed');
    resetBarangayClearanceCertificateFormValues();
});


function resetIndigencyCertificateFormValues() {
    // Reset input values
    $("#formAddIndigencyCertificate")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddIndigencyCertificate").on('hidden.bs.modal', function () {
    console.log('modalAddIndigencyCertificate is closed');
    resetIndigencyCertificateFormValues();
});


function resetResidencyCertificateFormValues() {
    // Reset input values
    $("#formAddResidencyCertificate")[0].reset();
    
    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddResidencyCertificate").on('hidden.bs.modal', function () {
    console.log('modalAddResidencyCertificate is closed');
    resetResidencyCertificateFormValues();
});


function resetRegistrationCertificateFormValues() {
    // Reset input values
    $("#formAddRegistrationCertificate")[0].reset();
    
    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddRegistrationCertificate").on('hidden.bs.modal', function () {
    console.log('modalAddRegistrationCertificate is closed');
    resetRegistrationCertificateFormValues();
});


function resetLicensePermitCertificateFormValues() {
    // Reset input values
    $("#formAddLicensePermitCertificate")[0].reset();
    
    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddLicensePermitCertificate").on('hidden.bs.modal', function () {
    console.log('modalAddLicensePermitCertificate is closed');
    resetLicensePermitCertificateFormValues();
});


/**
 * Request Certificates
 */
function resetRequestBarangayClearanceCertificateFormValues() {
    // Reset input values
    $("#formAddRequestBarangayClearanceCertificate")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddRequestBarangayClearanceCertificate").on('hidden.bs.modal', function () {
    console.log('modalAddRequestBarangayClearanceCertificate is closed');
    resetRequestBarangayClearanceCertificateFormValues();
});


function resetRequestIndigencyCertificateFormValues() {
    // Reset input values
    $("#formAddRequestIndigencyCertificate")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddRequestIndigencyCertificate").on('hidden.bs.modal', function () {
    console.log('modalAddRequestIndigencyCertificate is closed');
    resetRequestIndigencyCertificateFormValues();
});


function resetRequestResidencyCertificateFormValues() {
    // Reset input values
    $("#formAddRequestResidencyCertificate")[0].reset();
    
    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddRequestResidencyCertificate").on('hidden.bs.modal', function () {
    console.log('modalAddRequestResidencyCertificate is closed');
    resetRequestResidencyCertificateFormValues();
});


function resetRequestRegistrationCertificateFormValues() {
    // Reset input values
    $("#formAddRequestRegistrationCertificate")[0].reset();
    
    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddRequestRegistrationCertificate").on('hidden.bs.modal', function () {
    console.log('modalAddRequestRegistrationCertificate is closed');
    resetRequestRegistrationCertificateFormValues();
});


function resetRequestLicensePermitCertificateFormValues() {
    // Reset input values
    $("#formAddLicensePermitCertificate")[0].reset();
    
    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddLicensePermitCertificate").on('hidden.bs.modal', function () {
    console.log('modalAddLicensePermitCertificate is closed');
    resetRequestLicensePermitCertificateFormValues();
});


function resetBarangayOfficialFormValues() {
    // Reset input values
    $("#formAddBarangayOfficial")[0].reset();
    
    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddBarangayOfficial").on('hidden.bs.modal', function () {
    console.log('modalAddBarangayOfficial is closed');
    resetBarangayOfficialFormValues();
});

function resetCedulaBasisFormValues() {
    // Reset input values
    $("#formAddCedulaBasis")[0].reset();
    
    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddCedulaBasis").on('hidden.bs.modal', function () {
    console.log('modalAddCedulaBasis is closed');
    resetCedulaBasisFormValues();
});

function resetCedulaFormValues() {
    // Reset input values
    $("#formAddCedula")[0].reset();

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddCedula").on('hidden.bs.modal', function () {
    console.log('modalAddCedula is closed');
    resetCedulaFormValues();
});

function resetRequestCedulaFormValues() {
    // Reset input values
    $("#formAddRequestCedula")[0].reset();
    
    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
    $('div').find('textarea').removeClass('is-invalid');
    $("div").find('textarea').attr('title', '');
}

$("#modalAddRequestCedula").on('hidden.bs.modal', function () {
    console.log('modalAddRequestCedula is closed');
    resetRequestCedulaFormValues();
});