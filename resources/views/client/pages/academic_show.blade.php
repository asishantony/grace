@extends('client.layouts.client') @section('title','Programmes');
@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="#">Academics</a></li>
            <li>{{$academic->name}}</li>
        </ol>
        <h2>Academic Section</h2>
    </div>
</section>
<!-- End Breadcrumbs -->
<section class="inner-page">
    <div class="container academic">
        @if ($academic)
      <div class="row">

      </div>
      <h2 class="mt-3">{{$academic->name}}</h2><hr>
      {!!$academic->description!!}

      @if ($academic->organisation != '')
      <h3 class="mt-3">Organisation</h3><hr>
      {!!$academic->organisation!!}
      @endif
      @if ($academic->objectives != '')
      <h3 class="mt-3">Objectives</h3><hr>
      {!!$academic->objectives!!}
      @endif
      @if ($academic->time_table != '')
      <h3 class="mt-3">Time Table</h3><hr>
      {!!$academic->time_table!!}
      @endif
      @else
      <p class="no-data">The academic is not available</p>
      @endif
    </div>
  </section>
@endsection

