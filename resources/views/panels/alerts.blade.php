<section class="alerts">
@if(Session::has('success'))
    <div class="card-alert card green lighten-5">
        <div class="card-content green-text">
            <p>{{Session::get('success')}}</p>
        </div>
        <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
@if(Session::has('error'))
      <div class="card-alert card red lighten-5">
        <div class="card-content red-text">
          <p>{{Session::get('error')}}</p>
        </div>
        <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
@endif
@if(Session::has('warning'))
      <div class="card-alert card orange lighten-5">
        <div class="card-content orange-text">
          <p>{{Session::get('warning')}}</p>
        </div>
        <button type="button" class="close orange-text" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
@endif
</section>

