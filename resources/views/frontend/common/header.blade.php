<!-- main Header Start -->
<header class="main-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo Start -->
                <a class="navbar-brand" href="{{route('welcome')}}">
                    <img src="{{ asset('frontend/images/logo.svg') }}" alt="Logo">
                </a>
                <!-- Logo End -->

                <div class="nav-menu-wrapper">
                    <!--Menu Start-->
                    <div class="collapse navbar-collapse main-menu">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-items"><a class="nav-link {{ (Route::currentRouteName() == 'welcome') ? 'active' : ''}}" href="{{ route('welcome') }}">Home</a></li>
                            <li class="nav-items"><a class="nav-link {{ (Route::currentRouteName() == 'about') ? 'active' : ''}}" href="{{ route('about') }}">About Us</a></li>
                            <li class="nav-items"><a class="nav-link {{ ((Route::currentRouteName() == 'services') || (Route::currentRouteName() == 'services.details')) ? 'active' : ''}}" href="{{route('services')}}">Services</a></li>
                            <li class="nav-items"><a class="nav-link {{ (Route::currentRouteName() == 'contact') ? 'active' : ''}}" href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="navbar-toggle"></div>
                    <!--Menu End-->
                    <!--Get Free Quote btn Start-->
                    <div class="get-btn-wrap">
                        <a href="#" class="btn-get">BOOK APPOINTMENT</a>
                    </div>
                    <!--Get Free Quote btn Start-->
                </div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>
<!-- main Header end -->