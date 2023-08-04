<div class="{{ isset($colSize) ? $colSize : 'col-md-4 col-sm-6' }}">
    <label class="form-label" for="">{{ ucfirst($title) }}</label>
    <div
        data-input="{{ $id }}" data-preview="{{ $id }}_holder" class="image-picker dropzone lfm">

        @if(isset($image))
            <div style="background-image: url('{{ $image }}');" class="picker_img"></div>
        @endif
        <input id="{{ $id }}" hidden class="form-control" type="text" name="{{ $field }}">
        <input hidden class="form-control" value="{{ $image ?? '' }}" type="text">

        <div id="{{ $id }}_holder" class="dropzone-placeholder">
            <div class="text-center">
                <i class="bi bi-cloud-upload"></i>
                <p>Click here <br/>

                    to select multiple images</p>

            </div>
        </div>

    </div>


    @if(isset($images))
    <div class="mt-3" id="image-container">
        @foreach($images as $item)
{{--            <span class="image-item">--}}
{{--                <img src="{{ $item }}" style="height: 100px; width: 100px">--}}
{{--                <span class="delete-icon" onclick="removeImage(this)">&times;</span>--}}
{{--                <input type="hidden" name="images[]" value="{{ $item }}">--}}
{{--            </span>--}}

            <div class="image-container">
                <img src="{{ $item }}" style="height: 100px; width: 100px">
                <span class="delete-icon" onclick="removeImage(this)">&times;</span>
                <input type="hidden" name="images_array[]" value="{{ $item }}">
            </div>
        @endforeach
    </div>
    @endif
</div>
