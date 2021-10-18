{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','News and Events')

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

  <a class="waves-effect waves-light btn modal-trigger mb-2 mr-1" href="#modal1">Add News</a>
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->
        <div class="responsive-table">
          <table id="news-table" class="table">
            <thead>
              <tr>
                {{-- <th></th> --}}
                <th>Due Date</th>
                <th>Heading</th>
                <th>Content</th>
                {{-- <th>Priority</th> --}}
                <th>Featured</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @if ($news_data)
              @foreach ($news_data as $news)
              <tr>
                <td>{{$news->due_date}}</td>
                <td>{{\Illuminate\Support\Str::limit($news->heading,10)}}</td>
                <td>{{\Illuminate\Support\Str::limit($news->content,20)}}</td>
                {{-- <td><a href="{{asset('page-users-view')}}">dean3004</a>
                </td> --}}
                {{-- <td>{{$news->priority}}</td> --}}
                <td style="cursor: pointer;">
                  @if ($news->featured == "1")
                    <span class="chip green lighten-5 featured-change" data-id="{{$news->id}}">
                     <span class="green-text">Featured</span>
                    </span>
                  @else
                    <span class="chip red lighten-5 featured-change" data-id="{{$news->id}}">
                      <span class="red-text">Not Featured</span>
                    </span>
                  @endif
                </td>
                <td style="cursor: pointer;"> @if ($news->status == "1")
                  <span class="chip green lighten-5 status-change" data-id="{{$news->id}}">
                   <span class="green-text">Active</span>
                  </span>
                @else
                  <span class="chip red lighten-5 status-change" data-id="{{$news->id}}">
                    <span class="red-text">Inactive</span>
                  </span>
                @endif</td>
                <td>
                    <a href="/admin/news/{{$news->id}}/edit"><span style="cursor: pointer;" data-id="{{$news->id}}" class=""><i
                        class="material-icons">edit</i></span></a>
                        <span style="cursor: pointer;" data-id="{{$news->id}}"class="view-news"><i class="material-icons">remove_red_eye</i></span>
                  <span style="cursor: pointer;" data-id="{{$news->id}}" class="delete" data-id="{{$news->id}}"><i class="material-icons color-red">delete</i></span>
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
<!-- Add new news popup Ends-->

<!-- News compose sidebar -->

<div id="modal1" class="modal">
  <form class="" id="news-form" name="news-form" enctype="multipart/form-data">
  <div class="modal-content">
    <h4>Add News</h4>
          <!-- form start -->

            <div class="input-field">
              <input type="text" class="validate" id="heading" name="heading">
              <label for="heading">Heading</label>
              <div class="input-field" >
                <textarea class="materialize-textarea" id="content" name="content"></textarea>
                <label for="content">Content</label>

            </div>
            </div>
            <div class="input-field">
              <input type="text" class="datepicker" id="due_date" name="due_date">
              <label for="due_date">Due Date</label>
            </div>
            <div class="input-field">
              <div class="col s12">
                <p>Image</p>
              </div>
              <input type="file" name="image" id="image" class="dropify">
            {{-- <input type="file" id="input-file-now" class="" data-default-file="" name="file"/> --}}
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
      <button class="btn-small waves-effect waves-light save-news-item" type="submit">
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
<script src="{{asset('js/scripts/news.js')}}"></script>
@endsection
