
<div class="{{ isset($colSize) ? $colSize : 'col-md-12 col-sm-12' }}">
    <div class="input__grp">
        <label for="{{ $fieldName }}">{{ ucfirst($title) }}</label>
        <div class="form-group mt-2">
            <input  {!! isset($attributes) ? $attributes : '' !!} class="form-control" value="{{ old($fieldName, isset($value) ? $value : '') }}" name="{{ $fieldName }}" type="{{ isset($type) ? $type : 'text' }}" id="{{ isset($id) ? $id : $fieldName }}" placeholder="{{ isset($placeholder) ? $placeholder : ucfirst($title).' here' }}" />
        </div>
    </div>
</div>

