<!-- Footer Section Start -->
<footer>
    <!-- Mega Footer Start -->
    <div class="mega-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Footer About End -->
                    <div class="footer-about">
                        <!-- Footer About Logo Start -->
                        <div class="footer-logo">
                            <img src="{{ Storage::disk('s3')->url('frontend/images/logo.svg') }}" alt="">
                        </div>
                        <!-- Footer About Logo End -->
                        <!-- Footer About Content Start -->
                        <div class="footer-about-content">
                            <p>Lorem Ipsum is simply dummy text of the printing standard dummy text ever since
                                the 1500s.</p>
                        </div>
                        <!-- Footer About Content End -->
                        <!-- Footer Social Link Start -->
                        <div class="footer-social-links">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Footer Social Link End -->
                    </div>
                    <!-- Footer About End -->
                </div>
                <div class="col-lg-2 col-md-6">
                    <!-- Footer About us Start -->
                    <div class="footer-links">
                        <h2>About Us</h2>
                        <ul>
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="#">Book Appointment</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                            <li>
                                <a href="#" class="btn btn-store">
                                    <span class="fa fa-android fa-3x pull-left"></span> 
                                    <span class="btn-label">Download from</span>
                                    <span class="btn-caption">Google Play</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Footer About us End -->
                </div>
                <div class="col-lg-2 col-md-6">
                    <!-- Footer Links Start -->
                    <div class="footer-links">
                        <h2>Quick Links</h2>
                        <ul>
                            <li><a href="{{route('services')}}">Services</a></li>
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li>
                                <a href="#" class="btn btn-store">
                                    <span class="fa fa-apple fa-3x pull-left"></span> 
                                    <span class="btn-label">Download from</span>
                                    <span class="btn-caption">App Store</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Footer Links End -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- Footer Contact Box Start -->
                    <div class="footer-contact-info">
                        <h2>Contact Info</h2>
                        <div class="footer-info-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <p>+91-(123) 456 7890</p>
                        </div>
                        <div class="footer-info-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <p>tech@garage88.in</p>
                        </div>
                        <div class="footer-info-box">
                            <div class="icon-box">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <p>Tuli Business House 8,  <br>Waddhamna, Nagpur,<br> Maharashtra 440023</p>
                        </div>
                    </div>
                    <!-- Footer Contact Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Mega Footer End -->
</footer>
<!-- Footer Section End -->