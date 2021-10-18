@extends('client.layouts.client') @section('title','Programmes');
@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Programmes</li>
        </ol>
        <h2>Programmes</h2>
    </div>
</section>
<!-- End Breadcrumbs -->
<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container" data-aos="fade-up">
        <div class="row">@if (count($programmes)> 0)
            @foreach($programmes as $program)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100" onclick="redirectTo('/programmes/{{$program->id}}')">
                    <img
                        src="{{ asset('storage/'.$program->image) }}"
                        class="img-fluid prog-img"
                        alt="{{$program->name}}"
                    />
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{{$program->name}}</h4>
                            <span>{{$program->description}}</span
                            >s
                        </div>

                        {{--
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class="no-data">There is no program available right now.</p>
            @endif
        </div>
    </div>
</section>
<!-- End Team Section -->
@endsection
