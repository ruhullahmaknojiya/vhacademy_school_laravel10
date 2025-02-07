<!DOCTYPE html>
<html lang="en">

<head>
    <title>Academics &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{ asset('front/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{ asset('front/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{ asset('front/css/aos.css')}}">
    <link href="{{ asset('front/css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="mt-3 site-mobile-menu-close">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        @include('front.layouts.header')


        <main>
        @yield('frontend-content')
    </main>


    <div class="footer">
        @include('front.layouts.footer')
    </div>


        <!-- loader -->
        <div id="loader" class="show fullscreen">
            <svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78" /></svg></div>




        <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('front/js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('front/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('front/js/popper.min.js') }}"></script>
        <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('front/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('front/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('front/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('front/js/aos.js') }}"></script>
        <script src="{{ asset('front/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('front/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('front/js/jquery.mb.YTPlayer.min.js') }}"></script>
        <script src="{{ asset('front/js/main.js') }}"></script>

        @stack('js')


</body>

</html>
