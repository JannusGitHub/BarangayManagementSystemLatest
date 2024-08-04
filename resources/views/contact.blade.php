<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barangay Management System</title>
    @include('shared.css_links.css_links')

</head>
<body>
    @include('shared.pages.index_nav')

    <div class="container d-flex align-items-center" style="height: calc(100vh - 69.375px); margin-top: 69.375px;">
        <div class="row mx-auto align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <img class="svg-images w-75 img-fluid d-none d-lg-block" src="{{ asset('/images/svg/undraw_social_interaction.svg') }}">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h1 class="fw-bold text-left">Contact</h1>
                <p class="text-left mb-5">You may contact us using below details.</p>
                <div class="mb-3">
                    <p for="exampleFormControlInput1" class="form-label"><i class="fa-solid fa-phone"></i>&nbsp;Telephone No.: (049)-502-6234</p>
                </div>
                <div class="mb-3">
                    <p for="exampleFormControlInput1" class="form-label"><i class="fa-solid fa-location-dot"></i>&nbsp;Province of Laguna, City of Calamba, Barangay IV</p>
                </div>
                <div class="mb-3">
                    <p for="exampleFormControlInput1" class="form-label"><i class="fa-solid fa-clock"></i>&nbsp;Working hours - 8AM-5PM </p>
                </div>

                {{-- <p class="text-left">You may contact us by sending an email</p>
                <form id="formContact">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Subject</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Subject">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Message</label>
                        <textarea type="email" class="form-control" id="exampleFormControlInput1" placeholder="Message"></textarea>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
    
</body>
</html>

@include('shared.js_links.js_links')