<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3><img src="{{asset('images/client/logo.png')}}"/></h3>
                            <p>
                             {{$address}}<br>
                <strong>Phone: </strong> {{$phone1}}<br>
                <strong>Email: </strong>{{$email}}<br>
              </p>
              <div class="social-links mt-3">
                @if($twitter != null)<a href="{{$twitter}}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>@endif
                @if($facebook != null)<a href="{{$facebook}}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>@endif
                @if($instagram != null)<a href="{{$instagram}}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>@endif
                @if($skype != null)<a href="{{$skype}}" target="_blank" class="skype"><i class="bx bxl-skype"></i></a>@endif
                @if($linkedin != null)<a href="{{$linkedin}}" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>@endif
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

          <div class="col-lg-6 col-md-6 footer-newsletter ">
            <h4>Reach Us</h4>
            <div class="map-responsive">
             <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1629.2723407995695!2d75.53314879749713!3d11.894406240334076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba431a6cbae4fdb%3A0xebdf27f95601cf19!2sGrace%20International%20School!5e1!3m2!1sen!2sin!4v1626542715556!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Grace International School</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

        {{-- Designed by <a href=""></a> --}}
      </div>
    </div>
  </footer><!-- End Footer -->
