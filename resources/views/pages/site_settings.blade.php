{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Site Settings')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert/sweetalert.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-account-settings.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- Account settings -->
<section class="tabs-vertical mt-1 section">
  <div class="row">
    <div class="col l4 s12">
      <!-- tabs  -->
      <div class="card-panel">
        <ul class="tabs">
          <li class="tab">
            <a href="#general">
              <i class="material-icons">brightness_low</i>
              <span>General</span>
            </a>
          </li>
          {{-- <li class="tab">
            <a href="#change-password">
              <i class="material-icons">lock_open</i>
              <span>Change Password</span>
            </a>
          </li> --}}
          <li class="tab">
            <a href="#info">
              <i class="material-icons">error_outline</i>
              <span> Info</span>
            </a>
          </li>
          <li class="tab">
            <a href="#social-link">
              <i class="material-icons">chat_bubble_outline</i>
              <span>Social Links</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col l8 s12">
      <!-- tabs content -->
      <div id="general">
        <div class="card-panel">
          {{-- <div class="display-flex">
            <div class="media">
              <img src="{{asset()}}" class="border-radius-4" alt="logo image"
                height="64" width="64">
            </div>
            <div class="media-body">
              <div class="general-action-btn">
                <button id="select-files" class="btn indigo mr-2">
                  <span>Upload new Logo</span>
                </button>
                <button class="btn btn-light-pink">Reset</button>
              </div>
              <small>Allowed JPG, GIF or PNG. Max size of 800kB</small>
              <div class="upfilewrapper">
                <input id="upfile" type="file" />
              </div>
            </div>
          </div> --}}
          {{-- <div class="divider mb-1 mt-1"></div> --}}
          <form   id="basic-form">
            <div class="row">
              {{-- <div class="col s12">
                <div class="input-field">
                  <label for="uname">Name>
                  <input type="text" id="uname" name="uname" value="hermione007" data-error=".errorTxt1">
                  <small class="errorTxt1"></small>
                </div>
              </div> --}}
              <div class="col s12">
                <div class="input-field">
                  <label for="name">Name</label>
                  <input id="name" name="name" type="text" value="{{$site_data['name']}}" data-error=".errorTxt2">
                  <small class="errorTxt2"></small>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <label for="email">E-mail</label>
                  <input id="email" type="email" name="email" value="{{$site_data['email']}}" data-error=".errorTxt3">
                  <small class="errorTxt3"></small>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <label for="phone1">Phone 1</label>
                  <input id="phone1" type="text" name="phone1" value="{{$site_data['phone1']}}" data-error=".errorTxt3">
                  <small class="errorTxt3"></small>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <label for="phone2">Phone 2</label>
                  <input id="phone2" type="text" name="phone2" value="{{$site_data['phone2']}}" data-error=".errorTxt3">
                  <small class="errorTxt3"></small>
                </div>
              </div>
              {{-- <div class="col s12">
                <div class="card-alert card orange lighten-5">
                  <div class="card-content orange-text">
                    <p>Your email is not confirmed. Please check your inbox.</p>
                    <a href="javascript: void(0);">Resend confirmation</a>
                  </div>
                  <button type="button" class="close orange-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
              </div> --}}
              <div class="col s12">
                <div class="input-field">
                  <textarea class="materialize-textarea" id="address" name="address">{{$site_data['address']}}</textarea>
                  <label for="address">Address</label>
                </div>
              </div>
              <div class="col s12 display-flex justify-content-end form-action">
                <button type="butoon" class="btn indigo waves-effect waves-light mr-2" id="basic-submit">
                  Save changes
                </button>
                <button type="button" class="btn btn-light-pink waves-effect waves-light mb-1">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div id="info">
        <div class="card-panel">
          <form class="infovalidate" id="info-form">
            <div class="row">
              <div class="col s12">
                <div class="input-field">
                  <textarea class="materialize-textarea" id="vision" name="vision"
                    placeholder="Vision" >{{$site_data["vision"]}}</textarea>
                  <label for="vision">Vision</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <textarea class="materialize-textarea" id="mission" name="mission"
                    placeholder="Vision" >{{$site_data["mission"]}}</textarea>
                  <label for="mission">Mission</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <textarea class="materialize-textarea" id="about" name="about"
                    placeholder="About Us" >{{$site_data["about"]}}</textarea>
                  <label for="about">About Us</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <textarea class="materialize-textarea" id="rules" name="rules"
                    placeholder="Rules and Regulations" >{{$site_data["rules"]}}</textarea>
                  <label for="rules">Rules and Regulations</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <textarea class="materialize-textarea" id="responsibility" name="responsibility"
                    placeholder="Vision" >{{$site_data["responsibility"]}}</textarea>
                  <label for="responsibility">Responsibility</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <textarea class="materialize-textarea" id="accreditation" name="accreditation"
                    placeholder="Vision" >{{$site_data["accreditation"]}}</textarea>
                  <label for="accreditation">Accreditation</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <textarea class="materialize-textarea" id="chair_message" name="chairman_message"
                    placeholder="Vision" >{{$site_data["chairman_message"]}}</textarea>
                  <label for="chair_message">Chairman's Message</label>
                </div>
              </div>
              <div class="col s12 display-flex justify-content-end form-action">
                <button type="submit" class="btn indigo waves-effect waves-light mr-2" id="save-info">Save
                  changes</button>
                <button type="button" class="btn btn-light-pink waves-effect waves-light ">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div id="social-link">
        <div class="card-panel">
          <form id="social-form">
            <div class="row">
              <div class="col s12">
                <div class="input-field">
                  <input id="twitter-link" type="text" class="validate" placeholder="Add link" name="twitter"
                    value="{{$site_data['twitter']}}">
                  <label for="twitter-link">Twitter</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="fb-link" type="text" class="validate" placeholder="Add link" name="facebook" value={{$site_data['facebook']}}>
                  <label for="fb-link">Facebook</label>
                </div>
              </div>
              {{-- <div class="col s12">
                <div class="input-field">
                  <input id="google+link" type="text" class="validate" placeholder="Add link">
                  <label for="google+link">Google+</label>
                </div>
              </div> --}}
              <div class="col s12">
                <div class="input-field">
                  <input id="linkedin" type="text" class="validate" placeholder="Add link" name="linkedin"
                    value="{{$site_data['linkedin']}}">
                  <label for="linkedin">LinkedIn</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="instragram-link" type="text" class="validate" placeholder="Add link" name="instagram" value="{{$site_data['instagram']}}">
                  <label for="instragram-link">Instagram</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="skype-link" type="text" class="validate" placeholder="Add link" name="skype" value="{{$site_data['skype']}}">
                  <label for="skype-link">Skype</label>
                </div>
              </div>
              <div class="col s12 display-flex justify-content-end form-action">
                <button type="submit" class="btn indigo waves-effect waves-light mr-2" id="social-submit">Save
                  changes</button>
                <button type="button" class="btn btn-light-pink waves-effect waves-light">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

{{-- page scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>

@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/site_settings.js')}}"></script>
@endsection