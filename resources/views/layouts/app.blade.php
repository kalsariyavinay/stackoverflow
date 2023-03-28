<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.envytheme.com/pify/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jan 2023 10:19:48 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links Of CSS File -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/metismenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/editor.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sweetalert2.css') }}" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <!-- Title -->
    <title>Questions & Answers</title>
</head>

<body>
    <div class="preloader" id="loader-style">
        <div class="preloader-wrap">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    @include('inn.nav')
    {{-- @include('inn.banner') --}}
    @include('inn.lsidebar')
    @yield('content')
    @include('inn.rsidebar')
    @include('inn.footer')
    @include('inn.copyright')
    @include('inn.toparea')

    <!-- Links of JS File -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/meanmenu.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/form-validator.min.j') }}"></script>
    <script src="{{ asset('frontend/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('frontend/js/ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/metismenu.js') }}"></script>
    <script src="{{ asset('frontend/js/editor.js') }}"></script>
    <script src="{{ asset('frontend/js/like-dislike.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/all.js') }}"></script>
    <script src="{{ asset('frontend/js/all.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{ asset('frontend/js/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('frontend/js/multiselect-dropdown.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-3.6.3.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>
    <script>
        function showFrontendAlert(type, message) {
            Swal.fire({
                position: 'center',
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
    @if (Session::has('message'))
        <script>
            showFrontendAlert('{{ Session::get('errormsg') }}', '{{ Session::get('message') }}');
        </script>
    @endif
</body>

</html>
