@extends('frontend.layouts.app')

@section('title', 'Our Services')

@section('content')

    <div class="our-work-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- work box section start -->
                    <div class="work-box wow fadeInUp" data-wow-delay="0.1s">
                        <div class="work-img">
                            <figure>
                                <img src="{{asset('frontend/images/service-1.jpg')}}" alt="img">
                            </figure>

                            <h3>Oil Changes</h3>
                        </div>

                        <div class="work-content">
                            <h3>Oil Changes</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            <a href="{{route('services.details', ['slug' => 'detail-service'])}}" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- work box section end -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- work box section start -->
                    <div class="work-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="work-img">
                            <figure>
                                <img src="{{asset('frontend/images/service-2.jpg')}}" alt="img">
                            </figure>

                            <h3>Tire Balancing</h3>
                        </div>
                        <div class="work-content">
                            <h3>Tire Balancing</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            <a href="{{route('services.details', ['slug' => 'detail-service'])}}" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- work box section end -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- work box section start -->
                    <div class="work-box wow fadeInUp" data-wow-delay="0.3s">
                        <div class="work-img">
                            <figure>
                                <img src="{{asset('frontend/images/service-3.jpg')}}" alt="img">
                            </figure>

                            <h3>Brake Inspections</h3>
                        </div>
                        <div class="work-content">
                            <h3>Brake Inspections</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            <a href="{{route('services.details', ['slug' => 'detail-service'])}}" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- work box section end -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- work box section start -->
                    <div class="work-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="work-img">
                            <figure>
                                <img src="{{asset('frontend/images/service-4.jpg')}}" alt="img">
                            </figure>

                            <h3>Engine Diagnostics</h3>
                        </div>
                        <div class="work-content">
                            <h3>Engine Diagnostics</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            <a href="{{route('services.details', ['slug' => 'detail-service'])}}" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- work box section end -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- work box section start -->
                    <div class="work-box wow fadeInUp" data-wow-delay="0.5s">
                        <div class="work-img">
                            <figure>
                                <img src="{{asset('frontend/images/service-5.jpg')}}" alt="img">
                            </figure>

                            <h3>Oil Changes</h3>
                        </div>
                        <div class="work-content">
                            <h3>Oil Changes</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            <a href="{{route('services.details', ['slug' => 'detail-service'])}}" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- work box section end -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- work box section start -->
                    <div class="work-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="work-img">
                            <figure>
                                <img src="{{asset('frontend/images/service-6.jpg')}}" alt="img">
                            </figure>

                            <h3>Tire Balancing</h3>
                        </div>
                        <div class="work-content">
                            <h3>Tire Balancing</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            <a href="{{route('services.details', ['slug' => 'detail-service'])}}" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- work box section end -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- work box section start -->
                    <div class="work-box wow fadeInUp" data-wow-delay="0.7s">
                        <div class="work-img">
                            <figure>
                                <img src="{{asset('frontend/images/service-7.jpg')}}" alt="img">
                            </figure>

                            <h3>Brake Inspections</h3>
                        </div>
                        <div class="work-content">
                            <h3>Brake Inspections</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            <a href="{{route('services.details', ['slug' => 'detail-service'])}}" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- work box section end -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- work box section start -->
                    <div class="work-box wow fadeInUp" data-wow-delay="0.8s">
                        <div class="work-img">
                            <figure>
                                <img src="{{asset('frontend/images/service-8.jpg')}}" alt="img">
                            </figure>

                            <h3>Engine Diagnostics</h3>
                        </div>
                        <div class="work-content">
                            <h3>Engine Diagnostics</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            <a href="{{route('services.details', ['slug' => 'detail-service'])}}" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- work box section end -->
                </div>
            </div>
        </div>
    </div>

    @include('frontend.common.appointment')
@endsection
