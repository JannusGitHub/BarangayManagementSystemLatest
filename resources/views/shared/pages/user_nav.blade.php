
<aside class="main-sidebar sidebar-dark-navy elevation-4" style="height: 100vh">

    <!-- System title and logo -->
    {{-- <a href="{{ route('dashboard') }}" class="brand-link"> --}}
    <a href="" class="brand-link text-center">
        {{-- <img src="{{ asset('public/images/pricon_logo2.png') }}" --}}
        <img src=""
            class="brand-image img-circle elevation-3"
            style="opacity: .8">

        <span class="brand-text font-weight-light font-size"><h5>BMS</h5></span>
    </a> <!-- System title and logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                    {{-- <a href="" data-toggle="modal" data-target="" class="nav-link"> --}}
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header font-weight-bold">&nbsp;USER MODULE</li>
                <li class="nav-item has-treeview">
                    {{-- <a href="{{ route('product_classification') }}" class="nav-link"> --}}
                    <a href="#" data-toggle="modal" data-target="#" class="nav-link">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <p>Request Services<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="{{ route('request_barangay_clearance_certificate') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-file-signature"></i>
                                <p>Barangay Clearance</p></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('request_indigency_certificate') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-file-signature"></i>
                                <p>Indigency</p></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('request_residency_certificate') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-file-signature"></i>
                                <p>Residency</p></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('request_registration_certificate') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-file-signature"></i>
                                <p>Registration</p></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('request_license_permit_certificate') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-file-signature"></i>
                                <p>License & Permit</p></p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('request_cedula_management') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-file-signature"></i>
                                <p>Cedula</p></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-header font-weight-bold">TRANSACTION PROCESS</li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('transaction_process') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Transaction process</p></p>
                    </a>
                </li> -->
                <!-- <li class="nav-item has-treeview">
                    <a href="#" data-toggle="modal" data-target="#" class="nav-link" style="cursor: not-allowed" title="On going module">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Residency Certificate</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" data-toggle="modal" data-target="#" class="nav-link" style="cursor: not-allowed" title="On going module">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Barangay Clearance</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" data-toggle="modal" data-target="#" class="nav-link" style="cursor: not-allowed" title="On going module">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Business Certificate</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" data-toggle="modal" data-target="#" class="nav-link" style="cursor: not-allowed" title="On going module">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Registration Certificate</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" data-toggle="modal" data-target="#" class="nav-link" style="cursor: not-allowed" title="On going module">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Indigency Certificate</p></p>
                    </a>
                </li>
-->


                <!--
                <li class="nav-header font-weight-bold">&nbsp;BARANGAY MANAGEMENT</li>
                <li class="nav-item has-treeview">
                    {{-- <a href="{{ route('master_list') }}" class="nav-link"> --}}
                    <a href="" data-toggle="modal" data-target="#" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>Barangay Official</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    {{-- <a href="{{ route('master_list') }}" class="nav-link"> --}}
                    <a href="" data-toggle="modal" data-target="#" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>Barangay Resident</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    {{-- <a href="{{ route('master_list') }}" class="nav-link"> --}}
                    <a href="" data-toggle="modal" data-target="#" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>Barangay Blotter</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    {{-- <a href="{{ route('master_list') }}" class="nav-link"> --}}
                    <a href="" data-toggle="modal" data-target="#" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>Barangay Household</p></p>
                    </a>
                </li>-->
            </ul>
        </nav>
    </div><!-- Sidebar -->
</aside>