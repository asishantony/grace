{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Gallery Images')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert/sweetalert.css')}}">
{{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
<style>
 .testimonials .testimonial-wrap {
    padding-left: 0px;
}

.testimonials .testimonial-item {
    box-sizing: content-box;
    padding: 20px;
    margin: 0;
    min-height: 200px;
    box-shadow: 0px 0px 20px 0px rgba(11, 35, 65, 0.1);
    position: relative;
    background: #fff;
}

.testimonials .testimonial-item .testimonial-img {
    width: 50%;
    border-radius: 10px;
    border: 6px solid #fff;
    position: relative;
    /* left: -45px; */
}

.testimonials .testimonial-item h3 {
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0 5px 0;
    color: #111;
}

.testimonials .testimonial-item h4 {
    font-size: 14px;
    color: #999;
    margin: 0;
}

.testimonials .testimonial-item .quote-icon-left,
.testimonials .testimonial-item .quote-icon-right {
    color: #fdedea;
    font-size: 26px;
}

.testimonials .testimonial-item .quote-icon-left {
    display: inline-block;
    left: -5px;
    position: relative;
}

.testimonials .testimonial-item .quote-icon-right {
    display: inline-block;
    right: -5px;
    position: relative;
    top: 10px;
}

.testimonials .testimonial-item p {
    font-style: italic;
    margin: 15px auto 15px auto;
}

.testimonials .swiper-pagination {
    margin-top: 20px;
    position: relative;
}

.testimonials .swiper-pagination .swiper-pagination-bullet {
    width: 12px;
    height: 12px;
    background-color: #fff;
    opacity: 1;
    border: 1px solid #034b26;
}

.testimonials .swiper-pagination .swiper-pagination-bullet-active {
    background-color: #97cc10;
}
</style>

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

  {{-- <a class="waves-effect waves-light btn modal-trigger mb-2 mr-1" href="#modal1">Add </a> --}}
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->
        <div class="responsive-table">
          <table id="gallery-table" class="table">
            <thead>
              <tr>
                {{-- <th></th> --}}
                <th>Name</th>
                <th>Description</th>
                <th>Album</th>
                <th>Image</th>
                {{-- <th>Priority</th> --}}
                <th>Featured</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @if ($gallery_images)
              @foreach ($gallery_images as $image)
              <tr>
                <td>{{$image['name'] ?? "-"}}</td>
                <td>{{\Illuminate\Support\Str::limit($image['description'],20) ?? "-"}}</td>
                <td>{{$image['albums']['name']}}

                </td>
                {{-- <td><a href="{{asset('page-users-view')}}">dean3004</a>
                </td> --}}
                {{-- <td>{{$image['priority']}}</td> --}}
                <td style="cursor: pointer;">
                  @if ($image['featured'] == "1")
                    <span class="chip green lighten-5 featured-change" data-id="{{$image['id']}}">
                     <span class="green-text">Featured</span>
                    </span>
                  @else
                    <span class="chip red lighten-5 featured-change" data-id="{{$image['id']}}">
                      <span class="red-text">Not Featured</span>
                    </span>
                  @endif
                </td>
                <td >
                    <img src="{{asset('storage/'.$image['url'])}}" alt="" height="75px" width="75px">
                </td>
                <td style="cursor: pointer;"> @if ($image['status'] == "1")
                  <span class="chip green lighten-5 status-change" data-id="{{$image['id']}}">
                   <span class="green-text">Active</span>
                  </span>
                @else
                  <span class="chip red lighten-5 status-change" data-id="{{$image['id']}}">
                    <span class="red-text">Inactive</span>
                  </span>
                @endif</td>
                <td>
                  {{-- <span style="cursor: pointer;" data-id="{{$image['id']}}" class="edit-image"><i class="material-icons">edit</i></span> --}}
                  {{-- <span style="cursor: pointer;" data-id="{{$image['id']}}"class="view-image"><i class="material-icons">remove_red_eye</i></span> --}}
                  <span style="cursor: pointer;" data-id="{{$image['id']}}" class="delete" data-id="{{$image['id']}}"><i class="material-icons color-red">delete</i></span>
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
<!-- Add News popup -->
<div style="bottom: 54px; right: 19px;" class="fixed-action-btn direction-top">
  <a class="btn-floating btn-large primary-text gradient-shadow modal-trigger" href="#modal1">
    <i class="material-icons">add</i>
  </a>
</div>
<!-- Add new image popup Ends-->

<!-- News compose sidebar -->

<div id="modal1" class="modal">
  <form class="" id="gallery-form" name="gallery-form" enctype="multipart/form-data">
  <div class="modal-content">
    <h4>Add Image</h4>
          <!-- form start -->

            <div class="input-field">
              <input type="text" class="validate" id="name" name="name">
              <label for="heading">Name</label>
              <div class="input-field" >
                <textarea class="materialize-textarea" id="description" name="description"></textarea>
                <label for="description">Description</label>

            </div>
            </div>
            <div class="input-field">
                    <select name="album_id" id="album" class=" browser-default" data-placeholder="Select an Album"  >
                        <option value="" disabled selected>Select an Album</option>
                        @foreach($albums as $album)
                        <option value="{{ $album->id}}">{{$album->name}}</option>
                        @endforeach
                    </select>

            </div>
            <div class="input-field">
              <div class="col s12">
                <p>Image</p>
              </div>
              <!-- <input type="file" name="image[]" id="image" class="dropify" multiple> -->
             <input type="file" name="image[]" id="image" class="" data-default-file="" name="file"/> 
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
      <button class="btn-small waves-effect waves-light save-image-item" type="submit">
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
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>

@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
<script src="{{asset('vendors/dropify/js/dropify.min.js')}}"></script>
{{-- <script src="{{asset('js/scripts/app-email.js')}}"></script> --}}
<script src="{{asset('js/scripts/gallery.js')}}"></script>
@endsection
