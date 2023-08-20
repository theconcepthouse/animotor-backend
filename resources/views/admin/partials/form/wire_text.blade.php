<div class="{{ isset($colSize) ? $colSize : 'col-md-4 col-sm-6' }}">
    <div class="form-group">
        <div class="form-control-wrap">
            <input {!! isset($attributes) ? $attributes : '' !!}
                   wire:model="{{ $model }}"
                   type="{{ isset($type) ? $type : 'text' }}" class="form-control @error($model) error @enderror  form-control-xl form-control-outlined" id="{{ $id }}">
            <label class="form-label-outlined" for="{{ $model }}">{{ ucfirst($title) }}</label>
        </div>
    </div>
</div>

