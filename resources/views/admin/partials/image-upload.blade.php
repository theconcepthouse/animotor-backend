<div class="{{ isset($colSize) ? $colSize : 'col-md-4 col-sm-6' }}">
    <label class="form-label" for="">{{ ucfirst($title) }}</label>
    <div
         data-input="{{ $id }}" data-preview="{{ $id }}_holder" class="image-picker dropzone lfm">

        @if(isset($image))
            <div style="background-image: url('{{ $image }}');" class="picker_img"></div>
        @endif
        <input id="{{ $id }}" value="{{ $image ?? '' }}" hidden class="form-control" type="text" name="{{ $field }}">


        <div id="{{ $id }}_holder" class="dropzone-placeholder">
            <div class="text-center">
                <i class="bi bi-cloud-upload"></i>
                <p>Click here <br/>

                    to upload image </p>
            </div>
        </div>

    </div>

</div>
