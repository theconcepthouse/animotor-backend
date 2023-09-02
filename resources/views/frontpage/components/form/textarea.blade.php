
<div class="{{ isset($colSize) ? $colSize : 'col-md-12 col-sm-12' }}">
    <div class="input__grp">
        <label for="{{ $fieldName }}">{{ ucfirst($title) }}</label>
        <p>{{ isset($sub_title) ? $sub_title : '' }}</p>
        <div class="form-group mt-2">
            <textarea rows="6"  {!! isset($attributes) ? $attributes : '' !!} class="form-control"  name="{{ $fieldName }}" type="{{ isset($type) ? $type : 'text' }}" id="{{ isset($id) ? $id : $fieldName }}" placeholder="{{ isset($placeholder) ? $placeholder : ucfirst($title).' here' }}">{{ old($fieldName, isset($value) ? $value : '') }}</textarea>
        </div>
    </div>
</div>

