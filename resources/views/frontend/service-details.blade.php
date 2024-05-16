@extends('frontend.layouts.app')

@section('title', 'Service Details')

@section('content')

    <!-- Service Single Section Start -->
    <div class="service-single-archive">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <!-- service featured image start -->
                    <div class="service-featured-image wow fadeInUp" data-wow-delay="0.1s">
                        <figure class="image-anime">
                            <img src="{{Storage::disk('s3')->url('frontend/images/service-3.jpg')}}" alt="">
                        </figure>
                    </div>
                    <!-- service featured image end -->

                    <!-- service single content start -->
                    <div class="service-single-content wow fadeInUp" data-wow-delay="0.2s">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book.</p>
                        <p>t is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum</p>
                    </div>
                    <!-- service single content end -->

                    <!-- service related content start -->
                    <div class="service-related-content align-items-center wow fadeInUp" data-wow-delay="0.3s">
                        <!-- service related image start -->
                        <div class="service-img">
                            <figure>
                                <img src="{{Storage::disk('s3')->url('frontend/images/service-2.jpg')}}" alt="">
                            </figure>
                        </div>
                        <!-- service related image end -->

                        <!-- service content list start -->
                        <div class="service-content-list">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <ul>
                                <li>Tire Rotation and Balancing</li>
                                <li>Wheel Alignment</li>
                                <li>Battery Replacement</li>
                                <li>Air Filter Replacement</li>
                                <li>Cooling System Service</li>
                            </ul>
                        </div>
                        <!-- service content list end -->
                    </div>
                    <!-- service related content end -->

                    <!-- service price section start -->
                    <div class="service-price-section wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2><span>Price </span>List.</h2>
                        </div>
                        <!-- Section Title End -->
                        <ul>
                            <li><a href="#"> service type<span>price</span></a></li>
                            <li><a href="#"> Engine oil change<span>$40</span></a></li>
                            <li><a href="#"> Replacing air filters and oil filters<span>$30</span></a></li>
                            <li><a href="#"> Brake pad check and clean<span>$50</span></a></li>
                            <li><a href="#"> Top up Brake fluid<span>$45</span></a></li>
                        </ul>
                    </div>
                    <!-- service price section end -->
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="service-sidebar">
                        <!--  Contact Box Start -->
                        <div class="header-contact-box wow fadeInUp" data-wow-delay="0.1s">
                            <div class="contact-icon-box">
                                <img src="{{Storage::disk('s3')->url('frontend/images/icon-location.svg')}}" alt="">
                            </div>

                            <div class="header-contact-info">
                                <h3>address</h3>
                                <p>20 Cooper Square, New York, NY 10003, USA</p>
                            </div>
                        </div>
                        <!--  Contact Box End -->

                        <!--  Contact Box Start -->
                        <div class="header-contact-box wow fadeInUp" data-wow-delay="0.2s">
                            <div class="contact-icon-box">
                                <img src="{{Storage::disk('s3')->url('frontend/images/icon-phone.svg')}}" alt="">
                            </div>

                            <div class="header-contact-info">
                                <h3>contact us</h3>
                                <p><a href="#">+ 1 123 456-7890</a></p>
                                <p><a href="#">+ 1 123 456-7890</a></p>
                            </div>
                        </div>
                        <!--  Contact Box End -->

                        <!--  Contact Box Start -->
                        <div class="header-contact-box wow fadeInUp" data-wow-delay="0.3s">
                            <div class="contact-icon-box">
                                <img src="{{Storage::disk('s3')->url('frontend/images/icon-watch.svg')}}" alt="">
                            </div>

                            <div class="header-contact-info">
                                <h3>open hours</h3>
                                <p>Monday to Friday 8 AM to 8 PM</p>
                            </div>
                        </div>
                        <!--  Contact Box End -->

                        <!--  Contact Box Start -->
                        <div class="get-started-section wow fadeInUp" data-wow-delay="0.4s">

                            <div class="get-started-img">
                                <figure>
                                    <img src="{{Storage::disk('s3')->url('frontend/images/get-started-bg')}}-img.jpg" alt="">
                                </figure>
                            </div>

                            <div class="get-started-contact">
                                <h3><span>Get started</span></h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <a href="#" class="btn-default">GET FREE QUOTE</a>
                            </div>
                        </div>
                        <!--  Contact Box End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Single Section End -->

    <!-- Service Benefit Section Start -->
    <div class="service-benefit-section">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Why Us</h3>
                        <h2 class="text-anime"><span>Benefits </span>Of Autofix Service</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="section-btn wow fadeInUp">
                        <a href="#" class="btn-default">view all services</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!--benefit service box start-->
                    <div class="benefit-service-box wow fadeInUp" data-wow-delay="0.2s">
                        <!-- service icon start -->
                        <div class="service-icon">
                            <img src="{{Storage::disk('s3')->url('frontend/images/benefit-service-1')}}.svg" alt="">
                        </div>
                        <!-- service icon end -->
                        <div class="service-body-content">
                            <h3>Economical Pricing</h3>
                            <p>Lorem Ipsum is simpl text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <!--benefit service box end-->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!--benefit service box start-->
                    <div class="benefit-service-box wow fadeInUp" data-wow-delay="0.4s">
                        <!-- service icon start -->
                        <div class="service-icon">
                            <img src="{{Storage::disk('s3')->url('frontend/images/benefit-service-2')}}.svg" alt="">
                        </div>
                        <!-- service icon end -->

                        <!-- service body content start -->
                        <div class="service-body-content">
                            <h3>Spare Parts</h3>
                            <p>Lorem Ipsum is simpl text of the printing and typesetting industry.</p>
                        </div>
                        <!-- service body content end -->
                    </div>
                    <!--benefit service box end-->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!--benefit service box start-->
                    <div class="benefit-service-box wow fadeInUp" data-wow-delay="0.6s">
                        <!-- service icon start -->
                        <div class="service-icon">
                            <img src="{{Storage::disk('s3')->url('frontend/images/benefit-service-3')}}.svg" alt="">
                        </div>
                        <!-- service icon end -->

                        <!-- service body content start -->
                        <div class="service-body-content">
                            <h3>Full Warranty</h3>
                            <p>Lorem Ipsum is simpl text of the printing and typesetting industry.</p>
                        </div>
                        <!-- service body content end -->
                    </div>
                    <!--benefit service box end-->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!--benefit service box start-->
                    <div class="benefit-service-box wow fadeInUp" data-wow-delay="0.8s">
                        <!-- service icon start -->
                        <div class="service-icon">
                            <img src="{{Storage::disk('s3')->url('frontend/images/benefit-service-4')}}.svg" alt="">
                        </div>
                        <!-- service icon end -->

                        <!-- service body content start -->
                        <div class="service-body-content">
                            <h3>Professional Service</h3>
                            <p>Lorem Ipsum is simpl text of the printing and typesetting industry.</p>
                        </div>
                        <!-- service body content end -->
                    </div>
                    <!--benefit service box end-->
                </div>
            </div>
        </div>
    </div>
    <!-- Service Benefit Section End -->

    @include('frontend.common.appointment')

@endsection
