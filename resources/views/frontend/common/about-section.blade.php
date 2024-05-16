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
                            <img src="{{ Storage::disk('s3')->url('frontend/images/icon-address.svg') }}" alt="map-icon">
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
                            <img src="{{ Storage::disk('s3')->url('frontend/images/icon-call.svg') }}" alt="phone-icon">
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
                            <img src="{{ Storage::disk('s3')->url('frontend/images/about-us-img.jpg') }}" alt="">
                        </figure>
                    </div>

                    <div class="video-play-button">
                        <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video">
                            <img src="{{ Storage::disk('s3')->url('frontend/images/play.svg') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- About Us Video Section End -->
            </div>
        </div>

    </div>
</div>
<!-- Home About Us Section End -->