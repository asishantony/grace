{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Dashboard')

{{-- page content --}}
@section('content')
<div class="section">
    <div class="card">
        <div class="card-content">
            <p class="caption mb-0">
                <p>
                    <label>
                      <input type="checkbox" id="launch-switch" @if ($launch) checked @endif />
                      <span>Launch</span>
                    </label>
                  </p>
               <input type="checkbox" name="launch-switch" id="launch-switch" @if ($launch) checked @endif>

            </p>
        </div>
    </div>
</div>
@endsection
