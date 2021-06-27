<form
    class="edit-news"
    id="edit-form"
    name="edit-form"
    enctype="multipart/form-data"
    data-id="{{$news->id}}"
>
    <div class="modal-content">
        <h4>Edit News</h4>
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
                    value="21/06/2021"
                    
                />
                <label for="due_date">Due Date</label>
            </div>
            <div class="input-field">
                <div class="col s12">
                    <p>Image</p>
                </div>
                <input type="file" name="image" id="image" class="dropify" data-default-file="{{$news->image}}" value="{{$news->image}}" />
            </div>

            <!-- form start end-->
            {{--
        </div>
        --}}
    </div>
    <div class="modal-footer">
        <div class="card-action pl-0 pr-0 right-align">
            <button
                type="reset"
                class="btn-small waves-effect modal-close waves-light mr-1"
            >
                <i class="material-icons left">close</i>
                <span>Cancel</span>
            </button>
            <button
                class="btn-small waves-effect waves-light edit-news-item"
                type="submit"
            >
                <i class="material-icons left">send</i>
                <span>Update</span>
            </button>
        </div>
    </div>
</form>
