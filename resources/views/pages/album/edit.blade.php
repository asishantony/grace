<form
    class="edit-album"
    id="edit-form"
    name="edit-form"
    enctype="multipart/form-data"
    data-id="{{$album->id}}"
>
<input type="hidden" name="id" id="album_id" value="{{$album->id}}" />
    <div class="modal-content">
        <h4>Edit Album</h4>
            <!-- form start -->

            <div class="input-field">
                <input
                    type="text"
                    class="validate"
                    id="edit_name"
                    name="name"
                    value="{{$album->name}}"
                />
                <label for="edit_name">Name</label>
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
                class="btn-small waves-effect waves-light edit-album-item"
                type="submit"
            >
                <i class="material-icons left">send</i>
                <span>Update</span>
            </button>
        </div>
    </div>
</form>
