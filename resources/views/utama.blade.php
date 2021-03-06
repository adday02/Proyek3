<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Loker Disnaker Kabupaten Indramayu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v2.3.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><img src="assets/img/logo.png"><span>   Loker Disnaker Indramayu</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Home</a></li>
          <li><a href="#about">Fitur</a></li>
          <li><a href="#services">Pelatihan</a></li>
          <li><a href="#portfolio">Perusahaan</a></li>
         
          <li><a href="#contact">Kontak</a></li>

          <li class="get-started"><a href="{{URL('/daftar')}}">Daftar</a></li>
          <li class="get-started"><a href="{{URL('/login')}}">Masuk</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
          <h1>Tentang Aplikasi</h1>
            <p align="justify">
                Sistem Informasi Lowongan dan Lamarana Pekerjaan ini dibuat dengan tujuan untuk mempermudah masyarakat
                Kabupaten Indramayu untuk mendapatkan pekerjaan, sehingga nantinya akan mengurangi tingakat pengangguran. 
                Pada Aplikasi ini juga masyarakat bisa mendaftar pelatihan untuk menambah skill <br>
                Tata cara penggunaan Aplikasi : <br>
                1. Login <br>
                2. Pilih Lowongan pekerjaan <br>
                3. Lamar pekerjaan yang sudah dipilih <br>
                4. Tunggu balasan dari perusahaan <br>
            </p>
          <a href="{{URL('/login')}}" class="btn-get-started scrollto">Login</a>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/logo.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">Fitur</h3>
            <p data-aos="fade-up" data-aos-delay="100">
                Terdapat dua fitur yang terdapat pada aplikasi ini diantaranya adalah fitur terkait pekrjaan dan pelatihan
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-briefcase"></i>
                <h4>Pekerjaan</h4>
                <p>Pada fitur pekerjaan, masyarakat dapat mencari dan melamar pekerjaan yang disediakan oleh Dinas Tenaga Kerja Kabupaten Indramayu</p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bxs-school"></i>
                <h4>Pelatihan</h4>
                <p>Pada fitur Pelatihan, masyarakat dapat mendaftar pelatihan yang disediakan oleh Dinas Tenaga Kerja Kabupaten Indramayu<
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Pelatihan</h2>
          <p>Daftar Pelatihan Disnaker Indramayu</p>
        </div>
        <div class="row">
          @foreach($pelatihans as $pelatihan)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <h4 class="title"><a href="">{{$pelatihan->bidang_kejuruan}}</a></h4>
                <p class="description">{{$pelatihan->deskripsi}}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Services Section -->
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <p>Perusahaan</p>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            </div>
        </div>
        <br>
        <br>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          @foreach($perusahaans as $perusahaan)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{URL::to('/')}}/logo/{{$perusahaan->logo}}" class="img-fluid" alt="" >
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus-circle"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="icofont-link"></i></a>
                </div>
                <div class="portfolio-info">
                  <h4>PT. Pertamina Persero</h4>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Team Section ======= -->
    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <p>Kontak</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Lokasi :</h4>
                <p>Jl. Gatot Subroto No.mor 1, Pekandangan, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45216</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email :</h4>
                <p>disnaker.imy.gatsu@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Telepon :</h4>
                <p>0234 274382</p>
              </div>

              <a href="https://goo.gl/maps/LXYJ4FoGYzMWdJNZ9"> <img src="assets/img/1.jpg" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></img> </a>
            </div>
          </div>
          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="{{route('kontak.store')}}" method="post" class="php-email-form" role="alert">
            @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Tujuan</label>
                <input type="text" class="form-control" name="tujuan" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Pesan</label>
                <textarea class="form-control" name="pesan" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="sent-message">Pesan Telah Terkirim</div>
              </div>
              <div class="text-center"><button type="submit" name="btn_simpan">Kirim Pesan</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <!--<div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>-->

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>DISNAKER INDRAMAYU</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
       <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
  if (isset($_POST['btn_simpan'])){
    $a=1;
  }
  </script>

</body>

</html>