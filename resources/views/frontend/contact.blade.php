@extends('frontend.layouts.app')

@section('title', 'Contact Us Details')

@section('content')
    <!-- Page header start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Sub page Header box Start -->
                    <div class="page-header-box">
                        <h2 class="text-anime">Contact <span>us.</span></h2>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li><a href="{{route('welcome')}}">Home</a></li>
                                <li>Contact us</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- call to action section start -->
    <div class="contact-call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Contact Box Start -->
                    <div class="header-contact-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="contact-icon-box">
                            <img src="{{asset('frontend/images/icon-location.svg')}}" alt="">
                        </div>

                        <div class="header-contact-info">
                            <h3>address</h3>
                            <p>20 Cooper Square, New York, NY 10003, USA</p>
                        </div>
                    </div>
                    <!-- Contact Box End -->
                </div>

                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Contact Box Start -->
                    <div class="header-contact-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="contact-icon-box">
                            <img src="{{asset('frontend/images/icon-phone.svg')}}" alt="">
                        </div>

                        <div class="header-contact-info">
                            <h3>contact us</h3>
                            <p><a href="#">+ 1 123 456-7890</a></p>
                            <p><a href="#">+ 1 123 456-7890</a></p>
                        </div>
                    </div>
                    <!-- Contact Box End -->
                </div>

                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Contact Box Start -->
                    <div class="header-contact-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="contact-icon-box">
                            <img src="{{asset('frontend/images/icon-watch.svg')}}" alt="">
                        </div>

                        <div class="header-contact-info">
                            <h3>open hours</h3>
                            <p>Monday to Friday 8 AM to 8 PM</p>
                        </div>
                    </div>
                    <!-- Contact Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- call to action section end -->

    <!-- get in touch section start -->
    <div class="get-in-touch contact-us">
        <div class="container">
            <div class="row section-row">
                <div class="col-md-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Contact Form</h3>
                        <h2 class="text-anime"><span>Get In Touch</span> With Us.</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Contact Form start -->
                    <div class="contact-form wow fadeInUp" data-wow-delay="0.25s">
                        <form id="contactForm" action="#" method="post" data-toggle="validator">
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 mb-4">
                                    <label>Your Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter Your Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-4 col-md-4 mb-4">
                                    <label>Your Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter Your Email" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-4 col-md-4 mb-4">
                                    <label>Your Subject</label>
                                    <input type="text" name="subject" class="form-control" id="subject"
                                        placeholder="Subject" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <label>Your Message</label>
                                    <textarea name="msg" class="form-control" id="msg" rows="4" placeholder="Type Your Message" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-default">Submit</button>
                                    <div id="msgSubmit" class="h3 text-left hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- get in touch section end -->
@endsection
