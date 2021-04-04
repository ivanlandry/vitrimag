<!doctype html>
<html lang="fr">
<head>
    <title>@section('title') Vitrimag @show</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <meta name="author" content="Free-Template.co"/>
    <link rel="shortcut icon" href="ftco-32x32.png">

    <link rel="stylesheet" href="{{ asset('css/custom-bs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/line-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quill.snow.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .loading {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background: rgba(255, 255, 255, 0.8) url("{{ asset('images/spinner.gif') }}") center no-repeat;
        }

    </style>
</head>
<body id="top">

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>


<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    @include('partials.header')

    @yield('banner_page')

    @yield('content')


    @include('partials.footer')

</div>

<!-- SCRIPTS -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/stickyfill.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>

<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/quill.min.js') }}"></script>

<script src="{{asset('js/bootstrap-select.min.js')}}"></script>

<script src="{{asset('js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script !src="">
    $(document).on({
        ajaxStart: function () {
            $(".loading").css('display', 'block');
        },
        ajaxStop: function () {
            $(".loading").css('display', 'none');
        }
    });



</script>
@yield('extra-script')

<div class="loading"></div>
</body>
</html>
