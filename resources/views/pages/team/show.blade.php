<div class="modal-content">
    <div class="testimonials">
        <div class="testimonial-item">
            <div class="testimonial-wrap">
                <div class="testimonial-item">
                    <img
                        src="{{asset('storage/'.$team->image)}}"
                        class="testimonial-img"
                        alt="{{$team->name}}"
                    />
                    <h3>{{$team->name}}</h3>
                    <p>{{$team->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="card-action pl-0 pr-0 right-align">
        <button
            type="reset"
            class="btn-small waves-effect modal-close waves-light mr-1"
        >
            <i class="material-icons left">close</i>
            <span>Close</span>
        </button>
    </div>
</div>
