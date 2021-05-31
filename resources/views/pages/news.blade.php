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
  {{-- <div class="users-list-filter">
    <div class="card-panel">
      <div class="row">
     
      </div>
    </div>
  </div> --}}
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->
        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>id</th>
                <th>username</th>
                <th>name</th>
                <th>last activity</th>
                <th>verified</th>
                <th>role</th>
                <th>status</th>
                <th>edit</th>
                <th>view</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td>300</td>
                <td><a href="{{asset('page-users-view')}}">dean3004</a>
                </td>
                <td>Dean Stanley</td>
                <td>30/04/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>301</td>
                <td><a href="{{asset('page-users-view')}}">zena0604</a>
                </td>
                <td>Zena Buckley</td>
                <td>06/04/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>302</td>
                <td><a href="{{asset('page-users-view')}}">delilah0301</a>
                </td>
                <td>Delilah Moon</td>
                <td>03/01/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>303</td>
                <td><a href="{{asset('page-users-view')}}">hillary1807</a>
                </td>
                <td>Hillary Rasmussen</td>
                <td>18/07/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>304</td>
                <td><a href="{{asset('page-users-view')}}">herman2003</a>
                </td>
                <td>Herman Tate</td>
                <td>20/03/2020</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>305</td>
                <td><a href="{{asset('page-users-view')}}">kuame3008</a>
                </td>
                <td>Kuame Ford</td>
                <td>30/08/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>306</td>
                <td><a href="{{asset('page-users-view')}}">fulton2009</a>
                </td>
                <td>Fulton Stafford</td>
                <td>20/09/2019</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>307</td>
                <td><a href="{{asset('page-users-view')}}">piper0508</a>
                </td>
                <td>Piper Jordan</td>
                <td>05/08/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>308</td>
                <td><a href="{{asset('page-users-view')}}">neil1002</a>
                </td>
                <td>Neil Sosa</td>
                <td>10/02/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>309</td>
                <td><a href="{{asset('page-users-view')}}">caldwell2402</a>
                </td>
                <td>Caldwell Chapman</td>
                <td>24/02/2020</td>
                <td>Yes</td>
                <td>User </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>310</td>
                <td><a href="{{asset('page-users-view')}}">wesley0508</a>
                </td>
                <td>Wesley Oneil</td>
                <td>05/08/2020</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              <tr>
                <td></td>
                <td>311</td>
                <td><a href="{{asset('page-users-view')}}">tallulah2009</a>
                </td>
                <td>Tallulah Fleming</td>
                <td>20/09/2019</td>
                <td>No</td>
                <td>Staff</td>
                <td><span class="chip red lighten-5"><span class="red-text">Banned</span></span></td>
                <td><a href="{{asset('page-users-edit')}}"><i class="material-icons">edit</i></a></td>
                <td><a href="{{asset('page-users-view')}}"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              
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
  <a class="btn-floating btn-large primary-text gradient-shadow compose-email-trigger" href="#">
    <i class="material-icons">add</i>
  </a>
</div>
<!-- Add new news popup Ends-->

<!-- News compose sidebar -->
<div class="email-compose-sidebar">
  <div class="card quill-wrapper">
    <div class="card-content pt-0">
      <div class="card-header display-flex pb-2">
        <h3 class="card-title">NEW NEWS</h3>
        <div class="close close-icon">
          <i class="material-icons">close</i>
        </div>
      </div>
      <div class="divider"></div>
      <!-- form start -->
      <form class="edit-email-item mt-10 mb-10">
        <div class="input-field">
          <input type="email" class="edit-email-item-title validate" id="edit-item-from" value="user@example.com"
            disabled>
          <label for="edit-item-from">From</label>
        </div>
        <div class="input-field">
          <input type="email" class="edit-email-item-date" id="edit-item-to">
          <label for="edit-item-to">To</label>
        </div>
        <div class="input-field">
          <input type="text" class="edit-email-item-date" id="edit-item-subject">
          <label for="edit-item-subject">Subject</label>
        </div>
        <div class="input-field">
          <input type="email" class="edit-email-item-date" id="edit-item-CC">
          <label for="edit-item-CC">CC</label>
        </div>
        <div class="input-field">
          <input type="email" class="edit-email-item-date" id="edit-item-BCC">
          <label for="edit-item-BCC">BCC</label>
        </div>
        <!-- Compose mail Quill editor -->
        <div class="input-field">
          <div class="snow-container mt-2">
            <div class="compose-editor"></div>
            <div class="compose-quill-toolbar">
              <span class="ql-formats mr-0">
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <button class="ql-underline"></button>
                <button class="ql-link"></button>
                <button class="ql-image"></button>
              </span>
            </div>
          </div>
        </div>
        <div class="file-field input-field">
          <div class="btn btn-file">
            <span>Attach File</span>
            <input type="file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </form>
      <div class="card-action pl-0 pr-0 right-align">
        <button type="reset" class="btn-small waves-effect waves-light cancel-email-item mr-1">
          <i class="material-icons left">close</i>
          <span>Cancel</span>
        </button>
        <button class="btn-small waves-effect waves-light send-email-item">
          <i class="material-icons left">send</i>
          <span>Send</span>
        </button>
      </div>
      <!-- form start end-->
    </div>
  </div>
</div>
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/sortable/jquery-sortable-min.js')}}"></script>
<script src="{{asset('vendors/quill/quill.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
<script src="{{asset('js/scripts/app-email.js')}}"></script>
@endsection