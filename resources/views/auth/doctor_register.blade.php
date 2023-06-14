<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
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
</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top" style="background-color: #22A699">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
        <div class="align-items-center d-none d-md-flex">
            <i class="bi bi-clock"></i> Online Appointment Sytsem
        </div>
        <div class="soc" style="margin-left: 10px">
            <i class="fa-brands fa-twitter"></i>
            <i class="bi-facebook"></i>
            <i class="bi-instagram"></i>
            <i class="bi-linkedin"></i>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center" style="display: flex; justify-content: space-between">
        <a class="nav-link" href="{{route('main.home')}}"><img src="/assets/img/logo.png" alt="" style="width: 80px; height: 40px"></a>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="{{ route('login') }}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>

<!-- ======= Login Section ======= -->

<!-- ======= Login Section ======= -->
<!-- ======= Register Section ======= -->
<section id="register" class="d-flex align-items-center py-5" style="margin-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <h2 class="text-center mb-4">Register Doctor</h2>

                <form method="POST" action="{{route('doctor.createDoctor')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name" autofocus>
                    </div>
                   @if($errors->has('name'))
                       <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                    </div>
                    @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif

                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <input id="department" type="text" class="form-control" name="department">
                    </div>
                    @if($errors->has('department'))
                        <span class="text-danger">{{$errors->first('department')}}</span>
                    @endif

                    <div class="mb-3">
                        <label for="license_no" class="form-label">License</label>
                        <input id="license_no" type="number" class="form-control" name="license_no">
                    </div>
                    @if($errors->has('license_no'))
                        <span class="text-danger">{{$errors->first('license_no')}}</span>
                    @endif
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" style="background-color: #22A699; color: #FFFFFF">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top" style="height: 20vh">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>ONLINE APPOINTMENT SYSTEM</h3>

                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter" style="background-color: #22A699"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook" style="background-color: #22A699"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram" style="background-color: #22A699"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype" style="background-color: #22A699"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin" style="background-color: #22A699"></i></a>
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

<script>
    $(document).ready(function (e) {
        $('#image').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });
</script>
<!-- Vendor JS Files -->
<script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>


</body>
</html>
