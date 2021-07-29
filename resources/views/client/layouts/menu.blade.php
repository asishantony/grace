@inject('academics', "App\Models\Academics")
<nav id="navbar" class="navbar order-last order-lg-0">
    <ul>
      <li><a class="nav-link scrollto active" href="/#hero">Home</a></li>
      <li><a class="nav-link scrollto active" href="/page/about">About Us</a></li>
      <li class="dropdown"><a href="#"><span>The School</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          {{-- <li><a href="/page/about">About Us</a></li> --}}
          <li><a href="/page/rules">Rules and Regulations</a></li>
          <li><a href="/page/responsibility">Social Responsibility</a></li>
          <li><a href="/page/accreditation">Accreditation</a></li>
          <li><a href="/message/patron">Patron's Message</a></li>
          <li><a href="/message/chairman">Chairman's Message</a></li>
          <li><a href="/message/principal">Principal's Message</a></li>
          <li><a href="/page/achievements">Achievements</a></li>
        </ul>
      </li>


      @if($academics->menuCheck()['academics'])
      <li class="dropdown"><a href="#"><span>Academic</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
            @foreach ($academics->getMenu() as $academic)
          {{-- <li><a href="/page/about">About Us</a></li> --}}
          <li><a href="/academics/{{$academic->id}}">{{$academic->name}}</a></li>
          @endforeach
        </ul>
      </li>
      @endif
      <li><a class="nav-link" href="/programmes">Programmes</a></li>
      @if ($academics->menuCheck()['facility'])
      <li><a class="nav-link scrollto" href="/#services">Facilities</a></li>
      @endif
      {{-- <li><a class="nav-link scrollto " href="#cta">Admission</a></li> --}}
      @if($academics->menuCheck()['news'])
      <li><a class="nav-link scrollto" href="/#testimonials">News and Events</a></li>
      @endif
      @if($academics->menuCheck()['gallery'])

      <li><a href="/#portfolio">Gallery</a></li>
      @endif
      {{-- <li><a class="getstarted scrollto" href="#about">Contact Us</a></li> --}}
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->
