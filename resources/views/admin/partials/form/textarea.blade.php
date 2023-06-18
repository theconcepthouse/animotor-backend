<div class="{{ isset($colSize) ? $colSize : 'col-md-4 col-sm-6' }}">
    <div class="form-group">
        <label class="form-label" for="{{ $fieldName }}">{{ ucfirst($title) }}</label>
        <div class="form-control-wrap">
            <textarea name="{{ $fieldName }}" class="form-control" id="{{ $fieldName }}">{{ old($fieldName, isset($value) ? $value : '') }}</textarea>
        </div>
    </div>
</div>

