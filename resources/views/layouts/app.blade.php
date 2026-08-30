<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>@yield('title', 'Lakshadweep Matrimony')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg bg-white sticky-top main-navbar">

        <div class="container-fluid px-lg-5">

            <!-- LOGO -->
            <a class="navbar-brand brand-logo" href="{{ route('home') }}">

                <img src="{{ asset('images/logo/dolphin-logo.png') }}" alt="Lakshadweep Matrimony" class="main-logo">

                <div class="logo-text">

                    <div class="logo-name">
                        Lakshadweep
                    </div>

                    <div class="logo-matrimony">
                        Matrimony
                    </div>

                    <div class="logo-tagline">
                        Connecting hearts across Lakshadweep and beyond.
                    </div>

                </div>

            </a>


            <!-- MOBILE MENU BUTTON -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation"
                aria-controls="mainNavigation" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>


            <!-- NAVIGATION -->

            <div class="collapse navbar-collapse" id="mainNavigation">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <!-- HOME -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>


                    <!-- ABOUT US -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#about-us">
                            About Us
                        </a>
                    </li>


                    <!-- HOW IT WORKS -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#how-it-works">
                            How It Works
                        </a>
                    </li>


                    <!-- SEARCH -->
                    <li class="nav-item">

                        @auth

                            @if (auth()->user()->role !== 'admin')
                                <a class="nav-link" href="{{ route('search') }}">
                                    Search
                                </a>
                            @else
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    Admin
                                </a>
                            @endif
                        @else
                            <a class="nav-link" href="{{ route('login') }}">
                                Search
                            </a>

                        @endauth

                    </li>


                    <!-- SUCCESS STORIES -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#success-stories">
                            Success Stories
                        </a>
                    </li>


                    <!-- CONTACT US -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#contact-us">
                            Contact Us
                        </a>
                    </li>


                    @auth

                        <!-- DASHBOARD -->
                        @if (auth()->user()->role !== 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                        @endif


                        <!-- LOGOUT -->
                        <li class="nav-item">

                            <form method="POST" action="{{ route('logout') }}" class="logout-form">

                                @csrf

                                <button type="submit" class="btn btn-outline-primary nav-login-btn">

                                    Logout

                                </button>

                            </form>

                        </li>
                    @else
                        <!-- LOGIN -->
                        <li class="nav-item">

                            <a class="btn btn-outline-primary nav-login-btn" href="{{ route('login') }}">

                                Login

                            </a>

                        </li>


                        <!-- REGISTER -->
                        <li class="nav-item">

                            <a class="btn btn-primary nav-register-btn" href="{{ route('register') }}">

                                Register

                            </a>

                        </li>

                    @endauth

                </ul>

            </div>

        </div>

    </nav>

    {{-- Customer Menu --}}
@auth
    @if(!auth()->user()->is_admin)
        <div class="customer-menu">
            <div class="container">
                <div class="customer-menu-inner">
                     @auth
                        <span class="ms-4 fw-semibold text-primary">
                            👤 {{ auth()->user()->name }}
                        </span>
                    @endauth

                    <a href="{{ route('dashboard') }}"
                       class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('profile.show') }}"
                    class="{{ request()->routeIs('profile.show') ? 'active' : '' }}">
                        My Profile
                    </a>

                    <a href="{{ route('search') }}"
                       class="{{ request()->routeIs('search') ? 'active' : '' }}">
                        Browse Profiles
                    </a>

                    <a href="{{ route('matches') }}"
                       class="{{ request()->routeIs('matches') ? 'active' : '' }}">
                        Matched Profiles
                    </a>

                    <a href="{{ route('shortlist') }}"
                       class="{{ request()->routeIs('shortlist') ? 'active' : '' }}">
                        Shortlist
                    </a>
                   

                </div>
            </div>
        </div>
    @endif
@endauth


    <!-- SUCCESS MESSAGE -->
    @if (session('success'))
        <div class="container mt-3">

            <div class="alert alert-success shadow-sm">

                {{ session('success') }}

            </div>

        </div>
    @endif


    <!-- PAGE CONTENT -->

    @yield('content')


    <!-- FOOTER -->
    <footer class="site-footer">

        <div class="container">

            <div class="footer-main">

                <!-- BRAND -->
                <div class="footer-brand-section">

                    <div class="footer-brand-top">

                        <img src="{{ asset('images/logo/dolphin-logo.png') }}" alt="Lakshadweep Matrimony"
                            class="footer-logo">

                        <div class="footer-brand-text">

                            <h3>
                                Lakshadweep
                            </h3>

                            <h4>
                                Matrimony
                            </h4>

                            <p>
                                Connecting hearts across
                                Lakshadweep and beyond.
                            </p>

                        </div>

                    </div>


                    <p class="footer-description">

                        A trusted matrimonial platform created
                        for people and families from Lakshadweep
                        and other states.

                    </p>


                    <!-- SOCIAL ICONS -->
                    <div class="footer-social">

                        <a href="#" aria-label="Facebook">
                            f
                        </a>

                        <a href="#" aria-label="Instagram">
                            ◎
                        </a>

                        <a href="#" aria-label="WhatsApp">
                            ☎
                        </a>

                        <a href="#" aria-label="YouTube">
                            ▶
                        </a>

                    </div>

                </div>


                <!-- QUICK LINKS -->
                <div class="footer-column">

                    <h5>
                        Quick Links
                    </h5>

                    <span class="footer-heading-line"></span>


                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <a href="#about-us">
                        About Us
                    </a>

                    <a href="#how-it-works">
                        How It Works
                    </a>

                    <a href="{{ route('search') }}">
                        Search
                    </a>

                    <a href="#success-stories">
                        Success Stories
                    </a>

                    <a href="#contact-us">
                        Contact Us
                    </a>

                </div>


                <!-- HELP & SUPPORT -->
                <div class="footer-column">

                    <h5>
                        Help & Support
                    </h5>

                    <span class="footer-heading-line"></span>


                    <a href="#">
                        Privacy Policy
                    </a>

                    <a href="#">
                        Terms & Conditions
                    </a>

                    <a href="#">
                        Refund Policy
                    </a>

                    <a href="#">
                        Safety Tips
                    </a>

                    <a href="#">
                        Help Center
                    </a>

                </div>


                <!-- CONTACT -->
                <div class="footer-column contact-column">

                    <h5>
                        Contact Us
                    </h5>

                    <span class="footer-heading-line"></span>


                    <div class="contact-item">

                        <span class="contact-icon">
                            ☎
                        </span>

                        <span>
                            +91 12345 67890
                        </span>

                    </div>


                    <div class="contact-item">

                        <span class="contact-icon">
                            ✉
                        </span>

                        <span>
                            info@lakshadweepmatrimony.com
                        </span>

                    </div>


                    <div class="contact-item">

                        <span class="contact-icon">
                            📍
                        </span>

                        <span>
                            Kavaratti, Lakshadweep<br>
                            India - 682555
                        </span>

                    </div>

                </div>

            </div>


            <!-- FOOTER BOTTOM -->

            <div class="footer-bottom">

                <div>
                    © {{ date('Y') }}
                    Lakshadweep Matrimony.
                    All rights reserved.
                </div>

                <div>
                    Made for Lakshadweep
                    <span class="footer-heart">♥</span>
                </div>

            </div>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>
