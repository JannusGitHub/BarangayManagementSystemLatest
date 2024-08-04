<nav class="navbar navbar-expand-xl navbar-light bg-white shadow rounded py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand text-success" href="{{ route('index') }}"><i class="lni lni-lg lni-laravel"></i></span> BMS - IV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('about') }}">About</a></li>
                        <li><a class="dropdown-item" href="{{ route('history') }}">History</a></li>
                        <li><a class="dropdown-item" href="{{ route('vision_mission') }}">Vision-Mission</a></li>
                        <li><a class="dropdown-item" href="{{ route('officials') }}">Barangay Officials</a></li>
                        <li><a class="dropdown-item" href="{{ route('officials_sk') }}">Barangay Officials-SK</a></li>
                        <li><a class="dropdown-item" href="{{ route('officials_bpso') }}">Barangay Officials-BPSO</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('activities') }}">Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transaction_process') }}">Transaction Process</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
            <form class="">
                <a class="btn btn-primary" href="{{ route('register') }}">Request Access Here</a>
                <a class="btn btn-success" href="{{ route('signin_page') }}">Login Here</a>
            </form>
        </div>
    </div>
</nav>