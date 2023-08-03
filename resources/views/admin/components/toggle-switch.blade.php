@props(['model', 'field'])

<div class="custom-control custom-switch">
    <input
        data-model-id="{{ $item->id }}" data-model="{{ $model }}" {{ $checked ? 'checked' : '' }} data-field="{{ $field }}" type="checkbox" class="custom-control-input" id="customSwitch{{ $item->id }}">
    <label class="custom-control-label" for="customSwitch{{ $item->id }}"></label>
</div>


