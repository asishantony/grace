@extends('client.layouts.client')
@section('title','{{$title}}');

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Gallery</li>
          </ol>
            <h2>Gallery</h2>
        </div>

    </section><!-- End Breadcrumbs -->

      <section class="inner-page">
        <div class="container message">
          <div class="row">
            @foreach($albums as $album)
            <div class="col-md-4">
              <div class="gallery-wrap" onclick="window.location = '/gallery/{{$album->id}}'">
                <div class="gallery-item">
                  <img src="{{asset('storage/'.$album->latestImage->url)}}" class="testimonial-img" alt="{{$album->name}}" style="width:100%;height:200px">
                  <h3>{{$album->name}}</h3>
                  {{-- <h4>{{$news_item->due_date}}</h4> --}}
                  <p>
                    {{$album->name}}
                  </p>
                  <a href="#">View more &raquo;</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
@endsection
