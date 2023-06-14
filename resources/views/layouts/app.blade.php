<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Medicio
    * Updated: May 30 2023 with Bootstrap v5.3.0
    * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top" style="background-color: #22A699">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
        <div class="align-items-center d-none d-md-flex">
            <i class="bi bi-clock"></i> AVAILABLE ALL WEEK
        </div>
        <div class="d-flex align-items-end" style="width: 40%; display: flex; flex-direction: row; justify-content: end">
            @if(auth()->user())
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color: #f0f0f0">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


            @endif
            <div class="soc" style="margin-left: 10px">
                <i class="fa-brands fa-twitter"></i>
                <i class="bi-facebook"></i>
                <i class="bi-instagram"></i>
                <i class="bi-linkedin"></i>
            </div>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
            <a class="nav-link" href="#"><img src="/assets/img/logo.png" alt="" style="width: 80px; height: 50px"></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->
        <div style="width: 95%; display: flex; justify-content: flex-end">
        <nav id="navbar" class="navbar order-last order-lg-0">
<ul>
            <li><a class="nav-link scrollto " href="{{route('patient.home.view')}}">Home</a></li>
</ul>
        </nav><!-- .navbar -->
        </div>


    </div>
</header><!-- End Header -->

{{--<!-- ======= Hero Section ======= -->--}}
{{--<section id="hero">--}}
{{--    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">--}}

{{--        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>--}}

{{--        <div class="carousel-inner" role="listbox">--}}

{{--            <!-- Slide 1 -->--}}
{{--            <div class="carousel-item active" style="background-image: url('/assets/img/slide/slide-1.jpg')">--}}
{{--                <div class="container">--}}
{{--                    <h2>Welcome to <span>Online Appointment System</span></h2>--}}
{{--                    <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</section><!-- End Hero -->--}}

<main id="main" style="height: 90vh">


    <!-- ======= Appointment Section ======= -->

    @yield('content')

</main><!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top" style="height: 20vh">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>ONLINE APPOINTMENT SYSTEM</h3>

                        <div class="social-links mt-3">
                            <a href="#" class="twitter" style="background-color: #22A699"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook" style="background-color: #22A699"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram" style="background-color: #22A699"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus" style="background-color: #22A699"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin" style="background-color: #22A699"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 footer-links">
                    <h4>Useful Links</h4>
                    <ul style="display: flex; justify-content: space-around">
                        <li style="padding: 0px"><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Online Appointment System</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
            Have a healthy life
        </div>
    </div>
</footer><!-- End Footer -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
{{--<script src="/assets/vendor/php-email-form/validate.js"></script>--}}

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

</body>

</html>
