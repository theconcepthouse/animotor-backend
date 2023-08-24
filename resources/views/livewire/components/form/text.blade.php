<div class="col-md-6">
    <div class="form-group">
        <label class="form-label" for="{{ $name }}">{{ $label }}  @if($is_live) islive @endif</label>
        <div class="form-control-wrap">
            <input
                type="{{ $type }}"
                class="form-control @error($name) error @enderror"
                id="{{ $name }}"
                name="{{ $name }}"
                wire:model.live="{{ $name }}"
{{--                @if($is_live)--}}
{{--                   --}}
{{--                @else--}}
{{--                    wire:model="{{ $name }}"--}}
{{--                @endif--}}
                {{ $attr }}
            >
            @error($name)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
