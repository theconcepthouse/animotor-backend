<div class="{{ isset($colSize) ? $colSize : 'col-md-4 col-sm-6' }}">
    <div class="form-group">
        <div class="form-control-wrap">
            <select {!! isset($attributes) ? $attributes : '' !!} name="{{ $fieldName }}" class="form-select js-select2"  data-ui="xl" id="{{ isset($id) ? $id : $fieldName }}">
                @if(isset($key))
                    @foreach($options as $option)
                        <option {{ isset($value) ? $value == $option['id'] ? 'selected' : '' : '' }} value="{{ $option['id'] }}" class="text-capitalize">{{ $option['name'] }}</option>
                    @endforeach
                @else
                @foreach($options as $option)
                    <option {{ isset($value) ? $value == $option ? 'selected' : '' : '' }} value="{{ $option }}" class="text-capitalize">{{ $option }}</option>
                @endforeach
                @endif
            </select>
            <label class="form-label-outlined" for="{{ isset($id) ? $id : $fieldName }}">{{ ucfirst($title) }}</label>
        </div>
    </div>
</div>
