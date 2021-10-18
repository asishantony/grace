{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','News')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
{{--
<link rel="stylesheet" type="text/css" href="{{asset('vendors/quill/quill.snow.css')}}"> --}}
<link rel="stylesheet" type="text/css" href="{{asset('vendors/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert/sweetalert.css')}}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


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
    <div class="users-list-table">
        <div class="card">
            <div class="card-content">
                <form  enctype="multipart/form-data" method="POST" action="/admin/news/{{$news->id}}"
                    >
                   @method("PUT")
                    @csrf
                        <!-- form start -->

                        <div class="input-field">
                            <input
                                type="text"
                                class="validate"
                                id="heading"
                                name="heading"
                                value="{{$news->heading}}"
                            />
                            <label for="heading">Heading</label>
                            <div class="input-field">
                                <textarea
                                    class="materialize-textarea"
                                    id="content"
                                    name="content"
                                >{{$news->content}}</textarea>
                                <label for="content">Content</label>
                            </div>
                        </div>
                        <div class="input-field">
                            <input
                                type="text"
                                class="datepicker"
                                id="due_date"
                                name="due_date"
                                value="{{$news->due_date}}"

                            />
                            <label for="due_date">Due Date</label>
                        </div>
                        <div class="input-field">
                            <div class="col s12">
                                <p>Image</p>
                            </div>
                            <input type="file" name="image" id="image" class="dropify" data-default-file="{{asset('storage/'.$news->image)}}" value="{{asset('storage/'.$news->image)}}" />
                        </div>
                <div class="card-action pl-0 pr-0 right-align">
                    <button type="reset" class="btn-small waves-effect modal-close waves-light mr-1">
                        <i class="material-icons left">close</i>
                        <span>Cancel</span>
                    </button>
                    <button class="btn-small waves-effect waves-light edit-program-item" type="submit">
                        <i class="material-icons left">send</i>
                        <span>Update</span>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/sortable/jquery-sortable-min.js')}}"></script>
{{--
<script src="{{asset('vendors/quill/quill.min.js')}}"></script> --}}
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('vendors/dropify/js/dropify.min.js')}}"></script>


@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>

{{--
<script src="{{asset('js/scripts/app-email.js')}}"></script> --}}
<script src="{{asset('js/scripts/news.js')}}"></script>
@endsection


