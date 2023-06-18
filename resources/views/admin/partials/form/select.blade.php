<div class="{{ isset($colSize) ? $colSize : 'col-md-4 col-sm-6' }}">
    <div class="form-group">
        <div class="form-control-wrap">
            <select {!! isset($attributes) ? $attributes : '' !!} name="{{ $fieldName }}" class="form-select js-select2" data-ui="xl" id="{{ isset($id) ? $id : $fieldName }}">
                {!! $options !!}
            </select>
            <label class="form-label-outlined" for="{{ isset($id) ? $id : $fieldName }}">{{ ucfirst($title) }}</label>
        </div>
    </div>
</div>
