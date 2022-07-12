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
  <link href="{{asset('vendors/client/animate.css/animate.min.css')}}" rel="stylesheet" async defer>
  <link href="{{asset('vendors/client/aos/aos.css')}}" rel="stylesheet" async defer>
  <link href="{{asset('vendors/client/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" async defer>
  <link href="{{asset('vendors/client/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" async defer>
  <link href="{{asset('vendors/client/boxicons/css/boxicons.min.css')}}" rel="stylesheet" async defer>
  <link href="{{asset('vendors/client/glightbox/css/glightbox.min.css')}}" rel="stylesheet" async defer>
  <link href="{{asset('vendors/client/remixicon/remixicon.css')}}" rel="stylesheet" async defer>
  <link href="{{asset('vendors/client/swiper/swiper-bundle.min.css')}}" rel="stylesheet" async defer>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/quill/quill.snow.css')}}">
<link type="text/css" rel="stylesheet" href="css/lightgallery.css" />


  <!-- Template Main CSS File -->
  <link href="{{asset('css/client/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/custom/custom.css')}}">


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

  @include('client.layouts.footer')

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendors JS Files -->
  <script src="{{asset('vendors/client/aos/aos.js')}}" async defer></script>
  <script src="{{asset('vendors/client/bootstrap/js/bootstrap.bundle.min.js')}}" async defer></script>
  <script src="{{asset('vendors/client/glightbox/js/glightbox.min.js')}}" async defer></script>
  <script src="{{asset('vendors/client/isotope-layout/isotope.pkgd.min.js')}}" async defer></script>
  <script src="{{asset('vendors/client/php-email-form/validate.js')}}" async defer></script>
  <script src="{{asset('vendors/client/purecounter/purecounter.js')}}" async defer></script>
  <script src="{{asset('vendors/client/swiper/swiper-bundle.min.js')}}" async defer></script>

  <!-- Main JS File -->
  <script src="{{asset('/js/client/main.js')}}" async defer></script>

</body>

</html>
