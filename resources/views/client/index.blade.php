<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Grace International School</title>
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

  <!-- Template Main CSS File -->
  <link href="{{asset('css/client/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{route('home')}}"><img src="{{asset('images/client/logo.png')}}" alt="logo" /></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="{{asset('images/client/logo.png')}}" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li class="dropdown"><a href="#"><span>The School</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/page/about">About Us</a></li>
              <li><a href="/page/rules">Rules and Regulations</a></li>
              <li><a href="/page/responsibility">Social Responsibility</a></li>
              <li><a href="/page/accreditation">Accreditation</a></li>
              <li><a href="/page/chairman_message">Chairman's Message</a></li>
              <li><a href="/page/achievement">Achievements</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#services">Facilities</a></li>
          <li><a class="nav-link scrollto " href="#cta">Admission</a></li>
          <li><a class="nav-link scrollto" href="#testimonials">News and Events</a></li>
          <li><a href="#portfolio">Gallery</a></li>
          <li><a class="getstarted scrollto" href="#about">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{asset('images/client/slide/slide-1.jpg')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Grace International School</span></h2>
              <p class="animate__animated animate__fadeInUp">An initiative ofthe Roman Catholic Diocese of Kannur</p>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{asset('images/client/slide/slide-2.jpg')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Grace International School</span></h2>
              <p class="animate__animated animate__fadeInUp">An initiative ofthe Roman Catholic Diocese of Kannur</p>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{asset('images/client/slide/slide-3.jpg')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Grace International School</span></h2>
              <p class="animate__animated animate__fadeInUp">An initiative ofthe Roman Catholic Diocese of Kannur</p>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p>About Grace International School</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <img src="{{asset('images/client/about.jpg')}}" class="w-100"/>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>{{$about}} </p>
            <a href="/page/about" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-lg-6 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box greendk">
              <h3><strong>OUR VISION</strong> </h3>
              <p class="pt-0">{{$vision}}
              </p>
              <a href="{{'/page/vision'}}">Read more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box greenlt">
              <h3><strong>OUR MISSION</strong> </h3>
              <p class="pt-0">{{$mission}} </p>
              <a href="#">Read more &raquo;</a>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Counts Section -->

     <!-- ======= Testimonials Section ======= -->
     <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Latest News</h2>
          <p>News & Events</p>
        </div>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{asset('images/client/news1.jpg')}}" class="testimonial-img" alt="">
                  <h3>News Headline</h3>
                  <h4>20 May 2021</h4>
                  <p>
                    
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                   
                  </p>
                  <a href="#">Read more &raquo;</a>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{asset('images/client/news2.jpg')}}" class="testimonial-img" alt="">
                  <h3>News Headline</h3>
                  <h4>20 May 2021</h4>
                  <p>
                    
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                   
                  </p>
                  <a href="#">Read more &raquo;</a>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{asset('images/client/news3.jpg')}}" class="testimonial-img" alt="">
                  <h3>News Headline</h3>
                  <h4>20 May 2021</h4>
                  <p>
                    
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                   
                  </p>
                  <a href="#">Read more &raquo;</a>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{asset('images/client/news1.jpg')}}" class="testimonial-img" alt="">
                  <h3>News Headline</h3>
                  <h4>20 May 2021</h4>
                  <p>
                    
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                   
                  </p>
                  <a href="#">Read more &raquo;</a>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{asset('images/client/news2.jpg')}}" class="testimonial-img" alt="">
                  <h3>News Headline</h3>
                  <h4>20 May 2021</h4>
                  <p>
                    
                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                   
                  </p>
                  <a href="#">Read more &raquo;</a>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Facilities</h2>
          <p>Our Facilities</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="imgbox">
                <img src="{{asset('images/client/f1.jpg')}}"/>
              </div>
              <h4><a href="">Library</a></h4>
              <a href="#" class="btn-learn-more">Learn More</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="imgbox">
                <img src="{{asset('images/client/f2.jpg')}}"/>
              </div>
              <h4><a href="">Smart Classrooms</a></h4>
              <a href="#" class="btn-learn-more">Learn More</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="imgbox">
                <img src="{{asset('images/client/f3.jpg')}}"/>
              </div>
              <h4><a href="">Open Stage</a></h4>
              <a href="#" class="btn-learn-more">Learn More</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="imgbox">
                <img src="{{asset('images/client/f1.jpg')}}"/>
              </div>
              <h4><a href="">Library</a></h4>
              <a href="#" class="btn-learn-more">Learn More</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="imgbox">
                <img src="{{asset('images/client/f2.jpg')}}"/>
              </div>
              <h4><a href="">Smart Classrooms</a></h4>
              <a href="#" class="btn-learn-more">Learn More</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="imgbox">
                <img src="{{asset('images/client/f3.jpg')}}"/>
              </div>
              <h4><a href="">Open Stage</a></h4>
              <a href="#" class="btn-learn-more">Learn More</a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

   

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta" >
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>The future perfect education</h3>
          <h1 class="text-white"> Grace International School</h1>
          <a class="cta-btn" href="#">Admission</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Photo Album</h2>
          <p>Gallery</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".school">School Environment</li>
              <li data-filter=".filter-facilities">Facilities</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item school">
            <img src="{{asset('images/client/news1.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Auditorium</h4>
              <p>Detail</p>
              <a href="{{asset('images/client/news1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1   "><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-facilities school">
            <img src="{{asset('images/client/f1.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Test</h4>
              <p>Detail</p>
              <a href="{{asset('images/client/f1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="name"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item school">
            <img src="{{asset('images/client/news2.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Name</h4>
              <p>Detail</p>
              <a href="{{asset('images/client/news2.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="name"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-facilities">
            <img src="{{asset('images/client/f3.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Name</h4>
              <p>Detail</p>
              <a href="{{asset('images/client/f3.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="name"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-school">
            <img src="{{asset('images/client/news3.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <a href="{{asset('images/client/news3.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="name"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-facilities">
            <img src="{{asset('images/client/f2.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Name</h4>
              <p>Detail</p>
              <a href="{{asset('images/client/f2.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="name"><i class="bx bx-plus"></i></a>
              <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Administration & Staff</h2>
          <p>Our Team</p>
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="{{asset('images/client/team/team')}}-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Director</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.1s">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img src="{{asset('images/client/team/team')}}-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Principal</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.2s">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="{{asset('images/client/team/team')}}-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>Lecturer - English</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <img src="{{asset('images/client/team/team')}}-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Lecturer - Maths</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    {{-- <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">
        <div class="section-title">
          <h2>Admission</h2>
          <p>New Admission</p>
        </div>
      <div class="col-lg-12">
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row pt-0">
            <div class="col-md-4 form-group mb-3">
              <input type="text" name="name" class="form-control" id="name" placeholder="Name of the Student" required="">
            </div>
            <div class="col-md-4 form-group mb-3 ">
              <input type="email" class="form-control" name="email" id="email" placeholder=" Email" required="">
            </div>
            <div class="col-md-4 form-group mb-3 ">
              <input type="email" class="form-control" name="email" id="email" placeholder=" Address" required="">
            </div>
            <div class="col-md-4 form-group  mb-3 ">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Name of the Parent/Guardian" required="">
            </div>
            <div class="col-md-4 form-group  mb-3 ">
              <input type="email" class="form-control" name="email" id="email" placeholder=" Job title of Parent/Guardian" required="">
            </div>
            <div class="col-md-4 form-group  mb-3 ">
              <input type="email" class="form-control" name="email" id="email" placeholder=" Contact Number" required="">
            </div>
            <div class="col-md-4 form-group  mb-3 ">
              <input type="date" id="Date" name="date" required="" class="form-control">
            </div>
            <div class="col-md-4 form-group  mb-3 ">
            <select name="gender" id="gender" required=""  class="form-control">
              <option value="male">Select Gender</option>
              <option value="female">Male</option>
              <option value="other">Female</option>
            </select>
            </div>
            <div class="col-md-4 form-group  mb-3 ">
            <select name="gender" id="gender" required=""  class="form-control">
              <option value="male">Seeking Admission to Class</option>
              <option value="female">I</option>
              <option value="other">II</option>
              <option value="other">III</option>
            </select>
            </div>
          
         
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
          </div>
          <div class="text-left mt-4"><button type="submit">Submit</button></div>

        </form>
      </div>
    </div>
    </section><!-- End Pricing Section --> --}}


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>{{$address}}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>{{$email}}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>{{$phone1}}<br>{{$phone2}}</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4></h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

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
        
        Designed by <a href="https://bootstrapmade.com/"></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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