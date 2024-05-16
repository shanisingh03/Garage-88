@extends('frontend.layouts.app')

@section('title', '404 ! Page not Found')

@section('content')
    <!-- error section start -->
    <div class="error-page">
        <div class="container">
            <div class="row">
                <div class="error-page-image wow fadeInUp" data-wow-delay="0.25s">
                    <img src="{{Storage::disk('s3')->url('frontend/images/404-error-img.png')}}" alt="">
                </div>
                <div class="error-page-content">
                    <div class="error-page-content-heading">
                        <h2 class="text-anime">page not found</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.50s">We apologize, but the page you are looking for could
                            not be found. Please check the URL for any typing errors.</p>
                    </div>
                    <a class="btn-default wow fadeInUp" data-wow-delay="0.75s" href="{{route('welcome')}}">Back To Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- error section end -->
@endsection
