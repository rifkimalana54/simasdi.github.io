<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIMASDI - @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <style>
        #box {
        
        background: white; 
        border-radius: 10px; 
        box-shadow: 0.5px 0.5px 3px 3px rgba(0,0,0,0.4);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }
        #box:hover {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        /*animation-name: example;*/
        animation-duration: 0.25s;
        margin: -4px 0 0 -4px;
        border-right: 5px solid blue;
        border-bottom: 5px solid blue;      
        }

        .link{
        text-decoration: none;
        }

        #detail {
        width: 60%;
        margin:0 auto;
        min-width: 380px;
        text-align: justify;
        }

    </style>

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: BizLand - v1.2.1
    * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
        <div class="contact-info mr-auto">
            @php
                use App\Models\Setting;
                $setting = Setting::first();
            @endphp
            <i class="icofont-envelope"></i> <a href="mailto:simasdi@gmail.com">{{($setting->email == null ? ' ' : $setting->email)}}</a>
            <i class="icofont-phone"></i> 089 623 032 892
        </div>
        <div class="social-links">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="https://www.instagram.com/masjidpusakagerilya.crb/" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="https://wa.me/6289623032892" class="skype"><i class="icofont-whatsapp"></i></a>
        </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="/">SIMASDI</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li @yield('nav-home')><a href="/">Home</a></li>
                    <li @yield('nav-informasi') class="drop-down"><a href="#">Informasi</a>
                        <ul>
                            <li><a href="/daftar-agenda">Agenda</a></li>
                            <li><a href="/laporan">Laporan</a></li>
                        </ul>
                    </li>
                    <li @yield('nav-anggota') class="drop-down"><a href="#">Anggota</a>
                        <ul>
                            <li><a href="/home-anggota-bkm">BKM Masjid</a></li>
                            <li><a href="/daftar-sohibul-kurban">Sohibul Kurban</a></li>
                        </ul>
                    </li>
                    <li @yield('nav-galery')><a href="/halaman/galery">Galery</a></li>
                    <li  @yield('nav-sholat')><a href="/waktu-sholat">Waktu Sholat</a></li>
                    <li @yield('nav-quran')><a href="/baca-quran">Qur'an Digital</a></li>

                    @if (Auth::user() == null)
                    
                    @elseif(Auth::user()->hasRole('admin'))
                        <li><a href="/dashboard-admin">Panel</a></li>
                    @elseif(Auth::user()->hasRole('sekretaris'))
                        <li><a href="/dashboard-sekretaris">Panel</a></li>
                    @endif
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    

    <main id="main">
        <section class="d-flex align-items-center">
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                
            </div>
        </section><!-- End Hero -->
        @yield('content')
        @yield('modal')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    @yield('js')

</body>

</html>