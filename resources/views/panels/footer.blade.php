<!-- BEGIN: Footer-->
<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; 2021 <a href="#"
          target="_blank">Grace International School</a> All rights reserved.
      </span>
      <span class="right hide-on-small-only">
        Design and Developed by <a href="#">CodeGarages</a>
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->