@extends('frontend.layouts.app')

@section('title', 'About Us')

@section('content')

<!-- Cleaning Services Section Start -->
<div class="cleaning-secvices">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- Cleaning Services Image Start -->
                <div class="cleaning-secvices-left">
                    <div class="cleaning-secvices-img">
                        <figure class="image-anime reveal">
                            <img src="{{asset('frontend/images/about-img-1.jpg')}}" alt="">
                        </figure>

                        <figure class="image-anime reveal">
                            <img src="{{asset('frontend/images/about-img-2.jpg')}}" alt="">
                        </figure>
                    </div>
                    <!-- Cleaning Services Counter Start -->
                    <div class="cleaning-secvices-counter">
                        <h3><span class="counter">25</span></h3>
                        <p>Years of Experience</p>
                    </div>
                    <!-- Cleaning Services Counter End -->
                </div>
                <!-- Cleaning Services Image End -->
            </div>

            <div class="col-lg-6">
                <!-- Cleaning Services Content Start -->
                <div class="cleaning-secvices-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Car Cleaning</h3>
                        <h2 class="text-anime"><span>Car </span>Cleaning Service</h2>

                        <div class="about-page-content wow fadeInUp" data-wow-delay="0.25s">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                        </div>
                    </div>
                    <!-- Section Title End -->
                    <div class="cleaning-secvices-content-list wow fadeInUp" data-wow-delay="0.5s">
                        <ul>
                            <li><i class="fa-solid fa-headset"></i> 24/7 Support</li>
                            <li><i class="fa-solid fa-percent"></i> Offer & Car Cares</li>
                            <li><i class="fa-solid fa-user"></i> 50+ Expert Team</li>
                        </ul>
                    </div>
                </div>
                <!-- Cleaning Services Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Cleaning Services Section end -->

{{-- About us Section --}}
@include('frontend.common.about-section')

<!-- We Make Section Start -->
<div class="we-make">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <!-- We Make Content Start -->
                <div class="we-make-content">
                    <div class="we-make-content-heading">
                        <h2 class="wow fadeInUp">we make auto repair more convenient</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                    </div>
                    <!-- We Make Progress Bar Start -->
                    <div class="we-make-progress-bar wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Skill Item Start -->
                        <div class="skillbar" data-percent="98%">
                            <div class="skill-data">
                                <div class="title">highly qualified experts</div>
                            </div>
                            <div class="skill-progress">
                                <div class="count-bar">98%</div>
                            </div>
                        </div>
                        <!-- Skill Item End -->

                        <!-- Skill Item Start -->
                        <div class="skillbar" data-percent="95%">
                            <div class="skill-data">
                                <div class="title">clean, modern facility</div>
                            </div>
                            <div class="skill-progress">
                                <div class="count-bar">95%</div>
                            </div>
                        </div>
                        <!-- Skill Item End -->
                    </div>
                    <!-- We Make Progress Bar End -->
                </div>
                <!-- We Make Content End -->
            </div>

            <div class="col-lg-7">
                <!-- We Make Image Start -->
                <div class="we-make-image">
                    <figure class="image-anime reveal">
                        <img src="{{asset('frontend/images/auto-repair-img.jpg')}}" alt="">
                    </figure>
                </div>
                <!-- We Make Image End -->
            </div>
        </div>
    </div>
</div>
<!-- We Make Section End -->

{{-- Counter --}}
@include('frontend.common.counter-section')

<!-- About service section start -->
<div class="about-our-service">
    <div class="container">
        <div class="row section-row">
            <!-- Section Title Start -->
            <div class="section-title">
                <h3 class="wow fadeInUp">What We Provide</h3>
                <h2 class="text-anime"><span>Our </span> Services.</h2>
            </div>
            <!-- Section Title End -->
        </div>

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- service box start -->
                <div class="our-service-item wow fadeInUp" data-wow-delay="0.1s">
                    <div class="icon-box">
                        <img src="{{asset('frontend/images/icon-service-1.svg')}}" alt="">
                    </div>
                    <h2>Timing Belt</h2>
                </div>
                <!-- service box end -->
            </div>

            <div class="col-lg-3 col-6">
                <!-- service box start -->
                <div class="our-service-item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="icon-box">
                        <img src="{{asset('frontend/images/icon-service-2.svg')}}" alt="">
                    </div>
                    <h2>Steering</h2>
                </div>
                <!-- service box end -->
            </div>

            <div class="col-lg-3 col-6">
                <!-- service box start -->
                <div class="our-service-item wow fadeInUp" data-wow-delay="0.3s">
                    <div class="icon-box">
                        <img src="{{asset('frontend/images/icon-service-3.svg')}}" alt="">
                    </div>
                    <h2>Car Diagnostics</h2>
                </div>
                <!-- service box end -->
            </div>

            <div class="col-lg-3 col-6">
                <!-- service box start -->
                <div class="our-service-item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon-box">
                        <img src="{{asset('frontend/images/icon-service-4.svg')}}" alt="">
                    </div>
                    <h2>Clutch Replace</h2>
                </div>
                <!-- service box end -->
            </div>

            <div class="col-lg-3 col-6">
                <!-- service box start -->
                <div class="our-service-item wow fadeInUp" data-wow-delay="0.5s">
                    <div class="icon-box">
                        <img src="{{asset('frontend/images/icon-service-5.svg')}}" alt="">
                    </div>
                    <h2>Batteries</h2>
                </div>
                <!-- service box end -->
            </div>

            <div class="col-lg-3 col-6">
                <!-- service box start -->
                <div class="our-service-item wow fadeInUp" data-wow-delay="0.6s">
                    <div class="icon-box">
                        <img src="{{asset('frontend/images/icon-service-6.svg')}}" alt="">
                    </div>
                    <h2>Brake Repair</h2>
                </div>
                <!-- service box end -->
            </div>

            <div class="col-lg-3 col-6">
                <!-- service box start -->
                <div class="our-service-item wow fadeInUp" data-wow-delay="0.7s">
                    <div class="icon-box">
                        <img src="{{asset('frontend/images/icon-service-7.svg')}}" alt="">
                    </div>
                    <h2>Engine Repair</h2>
                </div>
                <!-- service box end -->
            </div>

            <div class="col-lg-3 col-6">
                <!-- service box start -->
                <div class="our-service-item wow fadeInUp" data-wow-delay="0.8s">
                    <div class="icon-box">
                        <img src="{{asset('frontend/images/icon-service-8.svg')}}" alt="">
                    </div>
                    <h2>Tire Repair</h2>
                </div>
                <!-- service box end -->
            </div>
        </div>
    </div>
</div>
<!-- About service section end -->

{{-- What We Do --}}
@include('frontend.common.wedo-section')

{{-- Appoinment --}}
@include('frontend.common.appointment')

<!-- Our Team Section Start -->
<div class="our-team">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-md-8">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">Our Team Members</h3>
                    <h2 class="text-anime"><span>Expert</span> team members.</h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="col-md-4">
                <div class="section-btn wow fadeInUp" data-wow-delay="0.25s">
                    <a href="#" class="btn-default">view all Member</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <!-- Team Member Section Start -->
                <div class="our-team-box wow fadeInUp" data-wow-delay="0.2s">
                    <div class="our-team-img">
                        <figure class="image-anime">
                            <img src="{{asset('frontend/images/team-1.jpg')}}" alt="">
                        </figure>
                    </div>
                    <div class="our-team-content">
                        <p>Service Manager</p>
                        <h3><a href="#">Sophia Martinez</a></h3>
                    </div>					
                </div>
                <!-- Team Member Section End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Team Member Section Start -->
                <div class="our-team-box wow fadeInUp" data-wow-delay="0.4s">
                    <div class="our-team-img">
                        <figure class="image-anime">
                            <img src="{{asset('frontend/images/team-2.jpg')}}" alt="">
                        </figure>
                    </div>
                    <div class="our-team-content">
                        <p>Technician/Mechanic</p>
                        <h3><a href="#">Daniel Garcia</a></h3>
                    </div>
                </div>
                <!-- Team Member Section End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Team Member Section Start -->
                <div class="our-team-box wow fadeInUp" data-wow-delay="0.6s">
                    <div class="our-team-img">
                        <figure class="image-anime">
                            <img src="{{asset('frontend/images/team-3.jpg')}}" alt="">
                        </figure>
                    </div>
                    <div class="our-team-content">
                        <p>Parts Specialist</p>
                        <h3><a href="#">Chris Miller</a></h3>
                    </div>
                </div>
                <!-- Team Member Section End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Team Member Section Start -->
                <div class="our-team-box wow fadeInUp" data-wow-delay="0.8s">
                    <div class="our-team-img">
                        <figure class="image-anime">
                            <img src="{{asset('frontend/images/team-4.jpg')}}" alt="">
                        </figure>
                    </div>
                    <div class="our-team-content">
                        <p>Technician</p>
                        <h3><a href="#">Michael Brown</a></h3>
                    </div>
                </div>
                <!-- Team Member Section End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Team Section End -->

@endsection