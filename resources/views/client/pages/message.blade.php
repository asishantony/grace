@extends('client.layouts.client')
@section('title','{{$title}}');

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li>{{$data['title']}}</li>
          </ol>
            <h2>{{$data['title']}}</h2>

        </div>

    </section><!-- End Breadcrumbs -->

      <section class="inner-page">
        <div class="container message">
          <div class="row">
            <div class="col-md-4">
              <img src="{{ $data['image']}}" class="w-75"/><br>
              <p class="name">{{$data['name']}}</p>
            </div>
            <div class="col-md-8">
            <p>
                {{$data['message']}}
             </p>
            </div>
          </div>
        </div>
      </section>
@endsection
