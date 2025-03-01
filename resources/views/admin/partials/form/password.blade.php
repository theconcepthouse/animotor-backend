<div class="{{ isset($colSize) ? $colSize : 'col-md-4 col-sm-6' }}">
    <div class="form-group">
        <div class="form-control-wrap">
            <input {!! isset($attributes) ? $attributes : '' !!} value="" name="{{ $fieldName }}" type="{{ isset($type) ? $type : 'password' }}"

                   class="form-control @error($fieldName) error @enderror  form-control-xl form-control-outlined" id="{{ isset($id) ? $id : $fieldName }}">
            <label class="form-label-outlined" for="{{ $fieldName }}">{{ ucfirst($title) }}</label>
        </div>
    </div>
</div>
