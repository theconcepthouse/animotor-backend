<form class="mt-1" method="post" wire:submit="saveSliders">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    <div class="row gy-4 mt-4">

        @foreach ($sliders as $index => $item)
            <div class="row mt-2">
                <div class="col-4">
                    <label>Image</label>
                    <input class="form-control  form-control-lg" wire:key="image-{{ $index }}" type="text" wire:model="sliders.{{ $index }}.image" placeholder="image">
                    @error("sliders.$index.image") <span class="error">The image is required</span> @enderror

                </div>
                <div class="col-3">
                    <label>Link</label>
                    <input class="form-control form-control-lg" wire:key="link-{{ $index }}" type="text" wire:model="sliders.{{ $index }}.link" placeholder="Link">
                    @error("sliders.$index.link") <span class="error">{{ $message }}</span> @enderror

                </div>
                <div class="col-3">
                    <label>Is External link</label>
                    <select wire:key="is_external_link-{{ $index }}" wire:model="sliders.{{ $index }}.is_external_link"class="mt-1 form-control form-control-lg ">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-2">
                    <button wire:key="remove-{{ $index }}" class="btn btn-warning" wire:click="removeSlider({{ $index }})">Remove</button>
                </div>
            </div>

        @endforeach
        <div class="form-group mt-3">
            <button type="button" wire:click="addSlider" class="btn btn-lg btn-primary">+</button>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-lg btn-success">Save</button>
        </div>
    </div>
</form>

