<div class="col-md-12 col-sm-12" wire:key="{{ $field }}">
    <label class="form-label" for="">{{ isset($name) ? $name : "Uploaded images" }}</label>
    <div class="file_uploader d-flex justify-content-between align-items-center">
        <div class="d-flex uploaded_images">
            @if($images)
                <div @click="$dispatch('file-uploader-clear',['{{ $field }}'])" type="button">
                    <img src="{{ asset('assets/img/icons/cancel.png') }}">
                </div>
            @foreach(imageStringArray($images) as $img)
                    <div class="img">
                        <img src="{{ $img }}" />
                    </div>
                @endforeach
            @endif
        </div>
        <div class="uploader lfm"  data-event="{{ $field }}">
            <img src="{{ asset('assets/img/export.png') }}" />
        </div>
    </div>

</div>
