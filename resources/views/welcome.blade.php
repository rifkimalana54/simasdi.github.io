<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIMASDI - Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

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
            <i class="icofont-envelope"></i> <a href="mailto:simasdi@gmail.com">{{($setting->email == null ? ' ' : $setting->email)}}</a>
            <i class="icofont-phone"></i> {{($setting->no_telepon == null ? ' ' : $setting->no_telepon)}}
        </div>
        <div class="social-links">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="https://www.instagram.com/masjidpusakagerilya.crb/" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="https://wa.me/625314472422" class="skype"><i class="icofont-whatsapp"></i></a>
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
                    <li class="active"><a href="/">Home</a></li>
                    <li class="drop-down"><a href="#">Informasi</a>
                        <ul>
                            <li><a href="/daftar-agenda">Agenda</a></li>
                            <li><a href="/laporan">Laporan</a></li>
                        </ul>
                    </li>
                    <li class="drop-down"><a href="#">Anggota</a>
                        <ul>
                            <li><a href="/home-anggota-bkm">BKM Masjid</a></li>
                            <li><a href="/daftar-sohibul-kurban">Sohibul Kurban</a></li>
                        </ul>
                    </li>
                    <li><a href="/halaman/galery">Galery</a></li>
                    <li><a href="/waktu-sholat">Waktu Sholat</a></li>
                    <li><a href="/baca-quran">Qur'an Digital</a></li>
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
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Selamat Datang 
                @if (Auth::user())
                    {{Auth::user()->name}}
                @else
                    Di Situs <span>SIMASDI</spa>
                @endif
            </h1>
            <h2>Situs ini akan memberikan berbagai informasi mengenai dana pemasukan/pengeluaran dan juga tentang berbagai kegiatan yang ada di masjid</h2>
            <div class="d-flex">
                @if (Auth::user())
                
                @else
                    <a href="/login" class="btn-get-started scrollto">LogIn</a>
                @endif
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <button id="donasi" onclick="alert('Fitur ini sedang dalam masa pengembangan!')" class="btn btn-success mr-5">DONASI</button>
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Visi & Misi</h2>
                    <p>Tujuan pencapaian SIMASDI ~Sistem Informasi Masjid Digital~</p>
                </div>
                
                <div class="section-title">
                    <h3>Visi</h3>
                    <p>Memakmurkan Masjid Pusaka Gerilya</p>
                </div>

                <div class="section-title">
                    <h3>Misi</h3>
                    <p>Membuat Masjid Pusaka Gerilya semakin maju dengan melakukan kegiatan-kegiatan dan merenovasi bangunan supaya lebih indah</p>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">
                @php
                    $judul1 = 'Sholat Berjamaah';
                    $kotak1 = "Shalat Berjama'ah lebih utama duapuluh tujuh derajat daripada sholat sendirian. ~HR. Muslim~";

                    $judul2 = "Memakmurkan Masjid";
                    $kotak2 = "Seseorang keluar dari rumahnya menuju masjid, maka tiap langkah satu kakinya dicatat satu kebaikan, dan kaki satunya penghapus satu kejelekan.";

                    $judul3 = "Jangan Lupa Sholat";
                    $kotak3 = "Apabila baik Shalatnya, maka akan baik pula amal-amal lainnya, Apabila Shalatnya rusak, maka akan rusak pula amal-amal lainnya.";

                    $judul4 = "Sebaik-baik tempat berlindung ialah Masjid";
                    $kotak4 = "Apabila Allah ta’ala menurunkan penyakit dari langit kepada penduduk bumi maka Allah menjauhkan penyakit itu dari orang-orang yang meramaikan masjid.";
                @endphp
                <div class="section-title">
                    <h2>Kutipan Kalam</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title">{{($setting->judul1 == null || $setting->judul1 == '-' ? $judul1 : $setting->judul1)}}</h4>
                            <p class="description">{{($setting->kotak1 == null || $setting->kotak1 == '-' ? $kotak1 : $setting->kotak1)}}</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title">{{($setting->judul2 == null || $setting->judul2 == '-' ? $judul2 : $setting->judul2)}}</h4>
                            <p class="description">{{($setting->kotak2 == null || $setting->kotak2 == '-' ? $kotak2 : $setting->kotak2)}}</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title">{{($setting->judul3 == null || $setting->judul3 == '-' ? $judul3 : $setting->judul3)}}</h4>
                        <p class="description">{{($setting->kotak3 == null || $setting->kotak3 == '-' ? $kotak3 : $setting->kotak3)}}</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title">{{($setting->judul4 == null || $setting->judul4 == '-' ? $judul4 : $setting->judul4)}}</h4>
                        <p class="description">{{($setting->kotak4 == null || $setting->kotak4 == '-' ? $kotak4 : $setting->kotak4)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                    <i class="icofont-money"></i>
                    <span data-toggle="counter-up">
                        @php
                            use App\Models\Laporan;
                            
                            $pemasukans = Laporan::SUM('pemasukan');
                            $pengeluarans = Laporan::SUM('pengeluaran');
                            $total = $pemasukans - $pengeluarans;
                        @endphp
                        {{number_format($total)}}
                    </span>
                    <p>Total Dana</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="icofont-user"></i>
                        @php
                            use App\Models\SohibulKurban;
                            
                            $skurbans = SohibulKurban::count();
                            
                        @endphp
                        <span data-toggle="counter-up">{{$skurbans}}</span>
                        <p>Sohibul Kurban</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                    <i class="icofont-live-support"></i>
                    @php
                        use App\Models\AnggotaBkm;
                        
                        $anggota_bkm = AnggotaBkm::count();
                        
                    @endphp
                    <span data-toggle="counter-up">{{$anggota_bkm}}</span>
                    <p>Pengurus BKM</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                    <i class="icofont-users-alt-5"></i>
                    <span data-toggle="counter-up">0</span>
                    <p>Pengurus Irmas</p>
                    </div>
                </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Galery</h2>
                </div>
                
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($galerys as $galery)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{url('image/galery/'.$galery->gambar)}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                            <h4>Gambar {{$i++}}</h4>
                            <p>{{$galery->text}}</p>
                            <a href="{{url('image/galery/'.$galery->gambar)}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Pengurus</h2>
                <p>Pengurus <span>SIMASDI ~Sistem Informasi Masjid Digital~</span></p>
            </div>

            <div class="row">
                @foreach ($bkms as $bkm)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{url('image/profile/'.$bkm->foto)}}" width="100%" height="250" alt="">
                                <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{$bkm->nama}}</h4>
                                <span>{{$bkm->jabatan}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="/home-anggota-bkm"><small>lebih banyak</small></a>
        </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak</h2>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Alamat</h3>
                        <p>{{($setting->alamat == null ? ' ' : $setting->alamat)}}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email</h3>
                        <p>{{($setting->email == null ? ' ' : $setting->email)}}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>No. Telepon</h3>
                    <p>{{($setting->no_telepon == null ? ' ' : $setting->no_telepon)}}</p>
                    </div>
                </div>

                </div>

                <div class="alert alert-danger" id="error" style="display:none">
                    <button type="button" class="close err-close" data-dismiss="alert">x</button>
                    <b>Gagal Mengirim Pesan!</b>
                    <ul></ul>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.0184235441207!2d108.49049101414309!3d-6.7676073680596796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1e5933aea81b%3A0x761eb69733a88533!2sMasjid%20Pusaka%20Gerilya!5e0!3m2!1sid!2sid!4v1624508162289!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>
                <div class="col-lg-6">
                    <form action="/send-message" method="post" id="form-send-msg" role="form" class="php-email-form">
                        @csrf
                        <div class="form-row">
                            <div class="col form-group">
                            <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Kamu" />
                            <div class="validate"></div>
                            </div>
                            <div class="col form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Kamu"/>
                            <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"/>
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="text" rows="5" placeholder="Pesan"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container py-4">
            <div class="row">
                <div class="col-lg col-md-6 footer-contact">
                    <h4>Alamat</h4>
                    <p>
                    Jl. Syekh Nurjati Wanasaba Kidul<br>
                    Cirebon, Talun 45171<br>
                    Indonesia <br><br>
                    </p>
                </div>

                <div class="col-lg col-md-6 footer-links">
                    <h4>Hubungi Developer</h4>
                    <p>No.Telepon / WhatsApp : <a target="_blank" href="https://api.whatsapp.com/send?text=Hi Rifki mau dibikinin website dong!&phone=6285314472422"> +6285314472422</a><br>
                    Email : <a href="mailto:mhmdrifki290701@gmail.com">mhmdrifki290701@gmail.com</a></p>
                </div>

                <div class="col-lg col-md-6 footer-links">
                    <h4>Sosial Media</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links mt-1">
                        <a href="#" class="twitter" style="font-size:25px;"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook" style="font-size:25px;"><i class="bx bxl-facebook"></i></a>
                        <a target="_blank" href="https://www.instagram.com/masjidpusakagerilya.crb/" class="instagram" style="font-size:25px;"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus" style="font-size:25px;"><i class="bx bxl-whatsapp"></i></a>
                    </div>
                </div>
            </div>
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
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    {{-- <script src="assets/vendor/php-email-form/validate.js"></script> --}}
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    @yield('js')
    <script>
        $(document).ready(function() {
            $('#form-send-msg').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    url: '/send-message',
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data) {
                        if($.isEmptyObject(data.error)){
                            $('.err-close').click();
                            $("input[name='nama']").val("");
                            $("input[name='email']").val("");
                            $("input[name='subject']").val("");
                            $("textarea[name='text']").val("");
                            swal({
                                title: data.success,
                                text: "Klik Ok untuk melanjutkan!",
                                icon: "success",
                                button: "OK",
                            });
                        } else {
                            swal({
                                title: "Gagal mengirim pesan!",
                                text: "Klik Ok untuk melanjutkan!",
                                icon: "error",
                                button: "OK",
                            });
                            errorMessage(data.error)
                        }
                    }
                });
                function errorMessage(msg){
                    $("#error").find("ul").html('');
                    $("#error").css('display','block');
                    $.each(msg, function( key, value ) {
                        $("#error").find("ul").append('<li>'+value+'</li>');
                    });
                }
            })
        })
    </script>
</body>

</html>