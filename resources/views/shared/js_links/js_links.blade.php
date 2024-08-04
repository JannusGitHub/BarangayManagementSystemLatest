<!-- jQuery -->
<script src="{{ asset('/template/jquery/js/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('public/template/jquery/js/jquery.min.js') }}"></script> --}} <!-- For deployment -->

<!-- Bootstrap 5 -->
<script src="{{ asset('/template/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/template/bootstrap/js/popper.min.js') }}"></script>
{{-- <script src="{{ asset('public/template/bootstrap/js/bootstrap.min.js') }}"></script> --}} <!-- For deployment -->
{{-- <script src="{{ asset('public/template/bootstrap/js/popper.min.js') }}"></script> --}} <!-- For deployment -->

<!-- AdminLTE -->
<script src="{{ asset('/template/adminlte/js/adminlte.min.js') }}"></script>
{{-- <script src="{{ asset('public/template/adminlte/js/adminlte.min.js') }}"></script>--}} <!-- For deployment -->

<!-- DataTables -->
<script src="{{ asset('/template/datatables/js/datatables.min.js') }}"></script>
{{-- <script src="{{ asset('/template/datatables/js/dataTables.bootstrap5.min.js') }}"></script> --}}
{{-- <script src="{{ asset('public/template/datatables/js/datatables.min.js') }}"></script>--}} <!-- For deployment -->
{{-- <script src="{{ asset('public/template/datatables/js/dataTables.bootstrap5.min.js') }}"></script> --}} <!-- For deployment -->

<!-- Select2 -->
<script src="{{ asset('/template/select2/js/select2.min.js') }}"></script>
{{-- <script src="{{ asset('public/template/select2/js/select2.min.js') }}"></script>--}} <!-- For deployment -->

<!-- Toastr -->
<script src="{{ asset('/template/toastr/js/toastr.min.js') }}"></script>
{{-- <script src="{{ asset('public/template/toastr/js/toastr.min.js') }}"></script>--}} <!-- For deployment -->

<!-- Lightbox -->
<script src="{{ asset('/template/lightbox/bs5-lightbox.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.1/dist/index.bundle.min.js"></script> --}}

<!-- MommentJS -->
<script src="{{ asset('/template/momentjs/moment.min.js') }}"></script>

<!-- Bootstrap Datepicker -->
<script src="{{ asset('/template/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<!-- Custom JS -->
<script>
    // import Lightbox from 'bs5-lightbox';

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "iconClass":  "toast-custom"
    };
</script>

<script src="{{ asset('js/main/User.js') }}"></script>
<script src="{{ asset('js/main/Common.js') }}"></script>
<script src="{{ asset('js/main/Announcement.js') }}"></script>
<script src="{{ asset('js/main/BarangayProfile.js') }}"></script>
<script src="{{ asset('js/main/BarangayGeography.js') }}"></script>
<script src="{{ asset('js/main/BarangayDemography.js') }}"></script>
<script src="{{ asset('js/main/BarangaySchool.js') }}"></script>
<script src="{{ asset('js/main/BarangayOthers.js') }}"></script>
<script src="{{ asset('js/main/BarangayActivities.js') }}"></script>
<script src="{{ asset('js/main/BarangayHistory.js') }}"></script>
<script src="{{ asset('js/main/BarangayMissionVision.js') }}"></script>
<script src="{{ asset('js/main/BarangayResidentDatabase.js') }}"></script>
<script src="{{ asset('js/main/BarangayResident.js') }}"></script>
<script src="{{ asset('js/main/BarangayBlotter.js') }}"></script>
<script src="{{ asset('js/main/BarangayClearanceCertificate.js') }}"></script>
<script src="{{ asset('js/main/IndigencyCertificate.js') }}"></script>
<script src="{{ asset('js/main/ResidencyCertificate.js') }}"></script>
<script src="{{ asset('js/main/RegistrationCertificate.js') }}"></script>
<script src="{{ asset('js/main/LicensePermitCertificate.js') }}"></script>
<script src="{{ asset('js/main/Officials.js') }}"></script>
<script src="{{ asset('js/main/CedulaBasis.js') }}"></script>
<script src="{{ asset('js/main/Cedula.js') }}"></script>