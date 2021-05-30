@extends('client.layouts.client')
@section('title','About Us');

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li>{{$title}}</li>
          </ol>
          <h2>{{$title}}</h2>
  
        </div>
    </section><!-- End Breadcrumbs -->
  
      <section class="inner-page">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img src="{{ asset('image/slide/slide-1.jpg')}}" class="w-100"/>
            </div>
            <div class="col-md-6">
              <img src="{{ asset('image/slide/slide-2.jpg')}}" class="w-100"/>
            </div>
          </div>
          <h2 class="mt-3">Grace International School</h2><hr>
          <p>
            {{$content}}
         </p>
  
          
        </div>
      </section>
@endsection