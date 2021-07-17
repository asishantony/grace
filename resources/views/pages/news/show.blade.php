<div class="modal-content">
    <div class="testimonials">
        <div class="testimonial-item">
            <div class="testimonial-wrap">
                <div class="testimonial-item">
                    <img
                        src="{{asset($news->image)}}"
                        class="testimonial-img"
                        alt="{{$news->heading}}"
                    />
                    <h3>{{$news->heading}}</h3>
                    <h4>{{$news->due_date}}</h4>
                    <p>{{$news->content}}{{$news->id}}</p>
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
