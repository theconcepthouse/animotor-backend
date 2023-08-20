<div class="{{ $custom_class ?? 'col-12 mb-2' }}">
    <div class="form-group">
        <label class="form-label" for="{{ $id }}">{{ $label }}</label>
        <div class="form-control-wrap">
            <textarea class="form-control form-control-lg" id="{{ $id }}" wire:model="value" placeholder="{{ $placeholder }}">
            </textarea>
        </div>
    </div>
</div>
