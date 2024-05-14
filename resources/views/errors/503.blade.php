<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Sentriqo IT Solutions Private Limited">

    <!-- Page Title -->
    <title>{{ config('app.name', 'Garage88') }} | Maintaince Going On!</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png') }} ">

    <!-- Google Fonts css-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <!-- SlickNav css -->
    <link href="{{ asset('frontend/css/slicknav.min.css') }}" rel="stylesheet">
    <!-- Swiper css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}">
    <!-- Font Awesome icon css-->
    <link href="{{ asset('frontend/css/all.css') }}" rel="stylesheet" media="screen">
    <!-- Animated css -->
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <!-- Main custom css -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('styles')
</head>

<body class="tt-magic-cursor">
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="{{ asset('frontend/images/loader.svg') }}" alt=""></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Magic Cursor Start -->
    <div id="magic-cursor">
        <div id="ball"></div>
    </div>
    <!-- Magic Cursor End -->


    <!-- error section start -->
    <div class="error-page" style="padding-top: 0px">
        <div class="container">
            <div class="row">
                <div class="error-page-image wow fadeInUp" data-wow-delay="0.25s">
                    <img src="{{asset('frontend/images/503-error-img.png')}}" alt="" height="600" width="900">
                </div>
                <div class="error-page-content">
                    <div class="error-page-content-heading">
                        {{-- <h2 class="text-anime">Maintainance Mode!</h2> --}}
                        <p class="wow fadeInUp" data-wow-delay="0.50s">We apologize, we are doing some maintainance to make your experience better.</p>
                    </div>
                    {{-- <a class="btn-default wow fadeInUp" data-wow-delay="0.75s" href="{{route('welcome')}}">STAY TUNED</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- error section end -->
    

    {{-- CopyRight --}}
    @include('frontend.common.copy-right')

    <!-- Jquery Library File -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js file -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- Validator js file -->
    <script src="{{ asset('frontend/js/validator.min.js') }}"></script>
    <!-- SlickNav js file -->
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <!-- Magnific js file -->
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Swiper js file -->
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <!-- Counter js file -->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <!-- SmoothScroll -->
    <script src="{{ asset('frontend/js/SmoothScroll.js') }}"></script>
    <!-- Parallax js -->
    <script src="{{ asset('frontend/js/parallaxie.js') }}"></script>
    <!-- MagicCursor js file -->
    <script src="{{ asset('frontend/js/gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/magiccursor.js') }}"></script>
    <!-- Text Effect js file -->
    <script src="{{ asset('frontend/js/splitType.js') }}"></script>
    <script src="{{ asset('frontend/js/ScrollTrigger.min.js') }}"></script>
    <!-- YTPlayer js file -->
    <script src="{{ asset('frontend/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <!-- Wow js file -->
    <script src="{{ asset('frontend/js/wow.js') }}"></script>
    <!-- Main Custom js file -->
    <script src="{{ asset('frontend/js/function.js') }}"></script>
</body>

</html>


@section('title', 'Maintaince Going On!')
