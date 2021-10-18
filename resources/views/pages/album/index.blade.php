{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Album')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert/sweetalert.css')}}">
{{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}

@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-email.css')}}">
@endsection

{{-- page content --}}
@section('content')
{{-- //Datatable --}}
<section class="users-list-wrapper section">

  <a class="waves-effect waves-light btn modal-trigger mb-2 mr-1" href="#modal1">Add Album</a>
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->
        <div class="responsive-table">
          <table id="album-table" class="table">
            <thead>
              <tr>
                {{-- <th></th> --}}
                <th>No</th>
                <th>Name</th>

                <th>Featured</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @if ($album_data)
              @foreach ($album_data as $album)
              <tr>
                  <td>{{ $loop->index + 1}}</td>
                <td>{{$album->name}}</td>
                {{-- <td><a href="{{asset('page-users-view')}}">dean3004</a>
                </td> --}}
                {{-- <td>{{$album->priority}}</td> --}}
                <td style="cursor: pointer;">
                  @if ($album->featured == "1")
                    <span class="chip green lighten-5 featured-change" data-id="{{$album->id}}>
                     <span class="green-text">Featured</span>
                    </span>
                  @else
                    <span class="chip red lighten-5 featured-change" data-id="{{$album->id}}>
                      <span class="red-text">Not Featured</span>
                    </span>
                  @endif
                </td>
                <td style="cursor: pointer;"> @if ($album->status == "1")
                  <span class="chip green lighten-5 status-change" data-id="{{$album->id}}">
                   <span class="green-text">Active</span>
                  </span>
                @else
                  <span class="chip red lighten-5 status-change" data-id="{{$album->id}}">
                    <span class="red-text">Inactive</span>
                  </span>
                @endif</td>
                <td>
                  <span style="cursor: pointer;" data-id="{{$album->id}}" class="edit-album"><i class="material-icons">edit</i></span>
                  <span style="cursor: pointer;" data-id="{{$album->id}}" class="delete" data-id="{{$album->id}}"><i class="material-icons color-red">delete</i></span>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>
<!-- Add Album popup -->
<div style="bottom: 54px; right: 19px;" class="fixed-action-btn direction-top">
  <a class="btn-floating btn-large primary-text gradient-shadow modal-trigger" href="#modal1">
    <i class="material-icons">add</i>
  </a>
</div>
<!-- Add new album popup Ends-->

<!-- News compose sidebar -->

<div id="modal1" class="modal">
  <form class="" id="album-form" name="album-form" enctype="multipart/form-data">
  <div class="modal-content">
    <h4>Add Album</h4>
          <!-- form start -->

            <div class="input-field">
              <input type="text" class="validate" id="name" name="name">
              <label for="heading">Name</label>
            </div>

          <!-- form start end-->
        {{-- </div> --}}
  </div>
  <div class="modal-footer">
    <div class="card-action pl-0 pr-0 right-align">
      <button type="reset" class="btn-small waves-effect modal-close waves-light  mr-1">
        <i class="material-icons left">close</i>
        <span>Cancel</span>
      </button>
      <button class="btn-small waves-effect waves-light save-album-item" type="submit">
        <i class="material-icons left">send</i>
        <span>Save</span>
      </button>
    </div>
  </div>
</form>

</div>
<div id="show-modal" class="modal">
</div>
<div id="edit-modal" class="modal">
</div>
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/sortable/jquery-sortable-min.js')}}"></script>
<script src="{{asset('vendors/quill/quill.min.js')}}"></script>
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>

@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
<script src="{{asset('vendors/dropify/js/dropify.min.js')}}"></script>
{{-- <script src="{{asset('js/scripts/app-email.js')}}"></script> --}}
<script src="{{asset('js/scripts/album.js')}}"></script>
@endsection
