<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Grace International School|@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('images/client/favicon.png')}}" rel="icon">
  <link href="{{asset('images/client/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendors/client/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/client/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/client/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/client/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/client/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/client/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/client/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('vendors/client/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/quill/quill.snow.css')}}">


  <!-- Template Main CSS File -->
  <link href="{{asset('css/client/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{route('home')}}"><img src="{{asset('images/client/logo.png')}}" alt="logo" /></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="{{asset('image/logo.png')}}" alt="" class="img-fluid"></a>-->
    @include('client.layouts.menu')

    </div>
  </header><!-- End Header -->

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3><img src="{{asset('images/client/logo.png')}}"/></h3>
                            <p>
                              Valayal ,Keezhallur - 670612<br>

                              Kannur ,kerala ,india<br>

                              5km from Kannur Airport<br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/admin/dashboard">Admin Panel</a></li>
            </ul>
          </div>

          {{-- <div class="col-lg-2 col-md-6 footer-links">
            <h4></h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> --}}

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Reach Us</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.1368699652567!2d75.52450951481111!3d11.895556391568164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba43aa0913a4ad7%3A0x11af6eb21f713752!2sGrace%20International%20School!5e0!3m2!1sen!2sin!4v1621838755533!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Grace International School</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

        {{-- Designed by <a href="#"></a> --}}
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendors JS Files -->
  <script src="{{asset('vendors/client/aos/aos.js')}}"></script>
  <script src="{{asset('vendors/client/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendors/client/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendors/client/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendors/client/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendors/client/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('vendors/client/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('/js/client/main.js')}}"></script>

</body>

</html>
