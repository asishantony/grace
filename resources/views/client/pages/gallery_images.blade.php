@extends('client.layouts.client')
@section('title','{{$title}}');

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('gallery')}}">Gallery</a></li>
            <li>{{$album}}</li>
          </ol>
            <h2>{{$album}}</h2>
        </div>

    </section><!-- End Breadcrumbs -->

      <section class="inner-page">
        <div class="container message">
            <div class="row">
                <div class="col-12 d-flex justify-content-center ">
                    <a href="{{route('gallery')}}">
                        <button class="btn btn-success" style="margin-bottom: 20px;">
                        Return to Gallery
                        </button>
                    </a>
                </div>
            </div>
          <div class="row">
            @foreach($images as $image)
            <div class="col-md-4">
              <div class="gallery-wrap">
                <div class="gallery-item">
                  <img src="{{asset('storage/'.$image->url)}}" class="testimonial-img" alt="{{$image->name}}" style="width:100%;height:200px">
                  <h3>{{$image->name}}</h3>
                  {{-- <h4>{{$news_item->due_date}}</h4> --}}
                  <p>
                    {{$image->name}}
                  </p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
@endsection
