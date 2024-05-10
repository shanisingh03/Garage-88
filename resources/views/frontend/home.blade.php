@extends('frontend.layouts.app')

@section('title', 'Welcome to Garage88')

@section('content')
    <!-- Hero Section Start -->
    <div class="hero parallaxie">
        <div class="hero-section">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-7">
                        <!-- Hero Left Content Start -->
                        <div class="hero-content">
                            <div class="hero-content-title">
                                <h1 class="text-anime">Car Serice & Auto Magic<span> At Your Fingertip.</span></h1>

                                <p class="wow fadeInUp" data-wow-delay="0.25s">Our team of highly skilled technicians
                                    is committed to ensuring the optimal performance and safety of your vehicle. Whether
                                    you need routine maintenance, repairs, or specialized services, we have you covered.
                                </p>
                            </div>

                            <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                                <ul>
                                    <li><i class="fa-solid fa-thumbs-up"></i> Quality Service</li>
                                    <li><i class="fa-solid fa-headphones-simple"></i> 24 X 7 Support</li>
                                </ul>
                            </div>

                            <div class="hero-content-footer wow fadeInUp" data-wow-delay="0.75s">
                                <a href="#" class="btn-default">Book Appointment Now</a>
                            </div>
                        </div>
                        <!-- Hero Left Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Home About Us Section Start -->
    <div class="about-us-wrapper">
        <div class="container">
            <!-- About Us Content Section Start -->
            <div class="row section-row align-items-center">
                <div class="col-md-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Why should you choose Aziland.</h3>
                        <h2 class="text-anime"><span>About</span> Us.</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-md-6">
                    <div class="about-image-box">
                        <!-- Image Box Section Start -->
                        <div class="image-box-wrapper wow fadeInUp" data-wow-delay="0.25s">
                            <figure>
                                <img src="{{ asset('frontend/images/icon-address.svg') }}" alt="map-icon">
                            </figure>
                            <div class="img-box-content">
                                <h3>We are Located in</h3>
                                <p>Gresik United East Java</p>
                            </div>
                        </div>
                        <!-- Image Box Section End -->

                        <!-- Image Box Section Start -->
                        <div class="image-box-wrapper wow fadeInUp" data-wow-delay="0.5s">
                            <figure>
                                <img src="{{ asset('frontend/images/icon-call.svg') }}" alt="phone-icon">
                            </figure>
                            <div class="img-box-content">
                                <h3>contact no</h3>
                                <p><a href="#">123 465 789</a></p>
                            </div>
                        </div>
                        <!-- Image Box Section End -->
                    </div>
                </div>
            </div>
            <!-- About Us Content Section End -->

            <div class="row">
                <div class="col-md-12">
                    <!-- About Us Video Section Start -->
                    <div class="about-us-video">
                        <div class="about-image">
                            <figure class="reveal image-anime">
                                <img src="{{ asset('frontend/images/about-us-img.jpg') }}" alt="">
                            </figure>
                        </div>

                        <div class="video-play-button">
                            <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video">
                                <img src="{{ asset('frontend/images/play.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- About Us Video Section End -->
                </div>
            </div>

        </div>
    </div>
    <!-- Home About Us Section End -->

    <!-- Counter Section Start -->
    <div class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- Counter Box Section Start -->
                    <div class="counter-box-wrapper wow fadeInUp">
                        <div class="counter-icon">
                            <img src="{{ asset('frontend/images/icon-counter-1.svg') }}" alt="">
                        </div>

                        <div class="counter-box-content">
                            <h3><span class="counter">480</span></h3>
                            <p>Crash Recover Car</p>
                        </div>
                    </div>
                    <!-- Counter Box Section End -->
                </div>

                <div class="col-lg-3 col-6">
                    <!-- Counter Box Section Start -->
                    <div class="counter-box-wrapper wow fadeInUp" data-wow-delay="0.25s">
                        <div class="counter-icon">
                            <img src="{{ asset('frontend/images/icon-counter-2.svg') }}" alt="">
                        </div>

                        <div class="counter-box-content">
                            <h3><span class="counter">460</span></h3>
                            <p>Auto Magic</p>
                        </div>
                    </div>
                    <!-- Counter Box Section End -->
                </div>

                <div class="col-lg-3 col-6">
                    <!-- Counter Box Section Start -->
                    <div class="counter-box-wrapper wow fadeInUp" data-wow-delay="0.5s">
                        <div class="counter-icon">
                            <img src="{{ asset('frontend/images/icon-counter-3.svg') }}" alt="">
                        </div>

                        <div class="counter-box-content">
                            <h3><span class="counter">700</span></h3>
                            <p>Auto Magic</p>
                        </div>
                    </div>
                    <!-- Counter Box Section End -->
                </div>

                <div class="col-lg-3 col-6">
                    <!-- Counter Box Section Start -->
                    <div class="counter-box-wrapper wow fadeInUp" data-wow-delay="0.75s">
                        <div class="counter-icon">
                            <img src="{{ asset('frontend/images/icon-counter-4.svg') }}" alt="">
                        </div>

                        <div class="counter-box-content">
                            <h3><span class="counter">970</span></h3>
                            <p>Branch City</p>
                        </div>
                    </div>
                    <!-- Counter Box Section End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Counter Section End -->

    <!-- What We Do Section Start -->
    <div class="what-we-do-section">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-8 col-md-7">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">What We Do</h3>
                        <h2 class="text-anime"><span>Excellence in </span>car care.</h2>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-4 col-md-5">
                    <div class="section-btn wow fadeInUp">
                        <a href="#" class="btn-default">view all service</a>
                    </div>
                </div>
            </div>

            <!-- Cta Content Section Start -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Cta Box Section Start -->
                    <div class="cta-box wow fadeInUp" data-wow-delay="0.25s">
                        <div class="cta-img">
                            <figure>
                                <img src="{{ asset('frontend/images/what-we-do-1.jpg') }}" alt="">
                            </figure>
                        </div>

                        <div class="cta-content">
                            <h3>Crash Recover Car</h3>
                            <p>Lorem ipsum dolor sit t tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            <a href="#" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- Cta Box Section End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Cta Box Section Start -->
                    <div class="cta-box wow fadeInUp" data-wow-delay="0.5s">
                        <div class="cta-img">
                            <figure>
                                <img src="{{ asset('frontend/images/what-we-do-2.jpg') }}" alt="">
                            </figure>
                        </div>

                        <div class="cta-content">
                            <h3>Auto Magic</h3>
                            <p>Lorem ipsum dolor sit t tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            <a href="#" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- Cta Box Section End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Cta Box Section Start -->
                    <div class="cta-box wow fadeInUp" data-wow-delay="0.75s">
                        <div class="cta-img">
                            <figure>
                                <img src="{{ asset('frontend/images/what-we-do-3.jpg') }}" alt="">
                            </figure>
                        </div>

                        <div class="cta-content">
                            <h3>Auto Magic</h3>
                            <p>Lorem ipsum dolor sit t tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            <a href="#" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- Cta Box Section End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Cta Box Section Start -->
                    <div class="cta-box wow fadeInUp" data-wow-delay="1s">
                        <div class="cta-img">
                            <figure>
                                <img src="{{ asset('frontend/images/what-we-do-4.jpg') }}" alt="">
                            </figure>
                        </div>

                        <div class="cta-content">
                            <h3>Crash Recover Car</h3>
                            <p>Lorem ipsum dolor sit t tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            <a href="#" class="btn-default">Read More</a>
                        </div>
                    </div>
                    <!-- Cta Box Section End -->
                </div>
            </div>
            <!-- Cta Content Section End -->
        </div>
    </div>
    <!-- What We Do Section End -->

    <!-- Dry Clean Section Start -->
    <div class="dry-clean-section parallaxie">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-7 col-md-8">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Dry clean</h3>
                        <h2 class="text-anime"><span>Dry cleaning any dirty </span>inside the car.</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-8">
                    <!-- Dry Clean Img Section Start -->
                    <div class="dry-clean-img">
                        <figure class="reveal image-anime">
                            <img src="{{ asset('frontend/images/how-it-work.jpg') }}" alt="">
                        </figure>
                    </div>
                    <!-- Dry Clean Img Section End -->
                </div>

                <div class="col-lg-4">
                    <!-- Dry Clean Content Start -->
                    <div class="dry-clean-content">
                        <div class="dry-clean-img-box wow fadeInUp" data-wow-delay="0.25s">
                            <h3>01.</h3>
                            <h2>Prepping the Vehicle</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus.</p>
                        </div>

                        <div class="dry-clean-img-box wow fadeInUp" data-wow-delay="0.5s">
                            <h3>02.</h3>
                            <h2>Stain Treatment</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus.</p>
                        </div>

                        <div class="dry-clean-img-box wow fadeInUp" data-wow-delay="0.75s">
                            <h3>03.</h3>
                            <h2>Brushing/Agitation</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus.</p>
                        </div>
                    </div>
                    <!-- Dry Clean Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Dry Clean Section End -->

    <!-- Why Choose Us Section Start -->
    <div class="why-choose-us-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-md-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="text-anime"><span>Why</span> Choose Us ?</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 col-6">
                    <!-- Why Choose us Item Start -->
                    <div class="why-choose-us-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon-box">
                            <img src="{{ asset('frontend/images/icon-wcu-1.svg') }}" alt="">
                        </div>

                        <h3>Expertise and Experience</h3>
                    </div>
                    <!-- Why Choose us Item End -->
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <!-- Why Choose us Item Start -->
                    <div class="why-choose-us-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon-box">
                            <img src="{{ asset('frontend/images/icon-wcu-2.svg') }}" alt="">
                        </div>

                        <h3>Shuttle Service Available</h3>
                    </div>
                    <!-- Why Choose us Item End -->
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <!-- Why Choose us Item Start -->
                    <div class="why-choose-us-item wow fadeInUp" data-wow-delay="0.6s">
                        <div class="icon-box">
                            <img src="{{ asset('frontend/images/icon-wcu-3.svg') }}" alt="">
                        </div>

                        <h3>Skilled Technicians</h3>
                    </div>
                    <!-- Why Choose us Item End -->
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <!-- Why Choose us Item Start -->
                    <div class="why-choose-us-item wow fadeInUp" data-wow-delay="0.8s">
                        <div class="icon-box">
                            <img src="{{ asset('frontend/images/icon-wcu-4.svg') }}" alt="">
                        </div>

                        <h3>Finncing Available</h3>
                    </div>
                    <!-- Why Choose us Item End -->
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <!-- Why Choose us Item Start -->
                    <div class="why-choose-us-item wow fadeInUp" data-wow-delay="1s">
                        <div class="icon-box">
                            <img src="{{ asset('frontend/images/icon-wcu-5.svg') }}" alt="">
                        </div>

                        <h3>Vacuum And Hand Car Wash</h3>
                    </div>
                    <!-- Why Choose us Item End -->
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <!-- Why Choose us Item Start -->
                    <div class="why-choose-us-item wow fadeInUp" data-wow-delay="1.2s">
                        <div class="icon-box">
                            <img src="{{ asset('frontend/images/icon-wcu-6.svg') }}" alt="">
                        </div>

                        <h3>Free Pick Up & Drop</h3>
                    </div>
                    <!-- Why Choose us Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us Section End -->


    {{-- Appointment --}}
    @include('frontend.common.appointment')

    {{-- Latest News --}}
    

    {{-- Contact Us --}}
    @include('frontend.common.contact-us')
@endsection
