
<aside class="main-sidebar sidebar-dark-navy elevation-4" style="height: 100vh">

    <!-- System title and logo -->
    {{-- <a href="{{ route('dashboard') }}" class="brand-link"> --}}
    <a href="" class="brand-link text-center">
        {{-- <img src="{{ asset('public/images/pricon_logo2.png') }}" --}}
        <img src=""
            class="brand-image img-circle elevation-3"
            style="opacity: .8">

        <span class="brand-text font-weight-light font-size"><a href="{{ route('dashboard') }}">BMS</a></span>
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
                <li class="nav-header font-weight-bold">&nbsp;BARANGAY MANAGEMENT</li>
                <!-- <li class="nav-item has-treeview">
                    <a href="{{ route('resident_management') }}" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>Barangay Resident</p></p>
                    </a>
                </li> -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('blotter_management') }}" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>Barangay Blotter</p></p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview">
                    <a href="{{ route('audit_trail_management') }}" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>Audit Trail</p></p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item has-treeview">
                    <a href="#" data-toggle="modal" data-target="#" class="nav-link" style="cursor: not-allowed" title="On going module">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>Barangay Household</p></p>
                    </a>
                </li> --}}
                <li class="nav-header font-weight-bold">CERTIFICATE ISSUANCE</li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('barangay_clearance_certificate') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Barangay Clearance</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('indigency_certificate') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Indigency</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('residency_certificate') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Residency</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('registration_certificate') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Registration</p></p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('license_permit_certificate') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>License & Permit</p></p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview">
                        <a href="{{ route('cedula_management') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-signature"></i>
                        <p>Cedula</p>
                    </a>
                </li> -->
                <li class="nav-header font-weight-bold">ISSUANCE MANAGEMENT</li>
                <li class="nav-item has-treeview">
                        <a href="{{ route('issuance_configuration_management') }}" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <p>Issuance Configuration</p>
                    </a>
                </li>
                <li class="nav-header font-weight-bold">USER MANAGEMENT</li>
                <li class="nav-item has-treeview">
                        <a href="{{ route('user_management') }}" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
                {{-- <li class="nav-header font-weight-bold">IV DATABASE</li>
                <li class="nav-item has-treeview">
                        <a href="{{ route('resident_database_management') }}" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <p>IV Database</p>
                    </a>
                </li> --}}
                <li class="nav-header font-weight-bold"><i class="fas fa-cogs"></i>&nbsp;PAGE SETTINGS</li>
                <li class="nav-item has-treeview">
                    {{-- <a href="{{ route('product_classification') }}" class="nav-link"> --}}
                    <a href="#" data-toggle="modal" data-target="#" class="nav-link">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <p>About<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('about_management') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('history_management') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>History Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mission_vision_management') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mission-Vision Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('officials_management') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Officials Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('activities_management') }}" class="nav-link">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <p>Activities</p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview">
                    <a href="#" data-toggle="modal" data-target="#" class="nav-link" style="cursor: not-allowed" title="On going module">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <p>Contact</p>
                    </a>
                </li> --}}
                <li class="nav-item has-treeview">
                    <a href="{{ route('announcement_management') }}" class="nav-link">
                    {{-- <a href="#" data-toggle="modal" data-target="#" class="nav-link" > --}}
                        <i class="fa-solid fa-pen-to-square"></i>
                        <p>Announcement</p>
                    </a>
                </li>
                <li class="nav-header font-weight-bold">REPORT MANAGEMENT</li>
                <li class="nav-item has-treeview">
                        <a href="{{ route('reports_management') }}" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <p>Reports & Audit Trail</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div><!-- Sidebar -->
</aside>