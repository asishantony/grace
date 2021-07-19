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
<section class="inner-page">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <img src="{{asset('storage/'.$program->image)}}" class="w-25"/>
        </div>
      </div>
      <h2 class="mt-3">{{$program->name}}</h2><hr>
      <p>{{$program->description}}</p>
    </div>
  </section>
@endsection

