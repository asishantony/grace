@extends('client.layouts.client') @section('title','Programmes');
@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="/programmes">Programmes</a></li>
            <li>Program</li>
        </ol>
        <h2>Programmes</h2>
    </div>
</section>
<!-- End Breadcrumbs -->
<section class="inner-page">
    <div class="container">
        @if ($program)
      <div class="row">
        <div class="col-md-12">
          <img src="{{asset('storage/'.$program->image)}}" class="w-75"/>
        </div>

      </div>
      <h2 class="mt-3">{{$program->name}}</h2><hr>
      <p>{{$program->description}}</p>
      @else
      <p class="no-data">The program is not available</p>
      @endif
    </div>
  </section>
@endsection

