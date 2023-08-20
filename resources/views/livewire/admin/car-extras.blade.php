<form method="post" wire:submit="saveExtras">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
{{--        @if ($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}
<div class="row gy-4">



    <div class="col-12">
        <div id="accordion" class="accordion">
            <div class="accordion-item">
                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#item_2" aria-expanded="false">
                    <h6 class="title">Booking Requirements</h6>
                    <span class="accordion-icon"></span>
                </a>
                <div class="accordion-body collapse" id="item_2" data-bs-parent="#accordion" style="">
                    <div class="accordion-inner">
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="requirements">Booking requirements (separate with comma)</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control form-control-lg" id="requirements" wire:model="requirements" placeholder="Enter requirements">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#item_security_deposit" aria-expanded="false">
                    <h6 class="title">Security Deposit Info</h6>
                    <span class="accordion-icon"></span>
                </a>
                <div class="accordion-body collapse" id="item_security_deposit" data-bs-parent="#accordion" style="">
                    <div class="accordion-inner">
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="security_deposit">Security Deposit Message</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-control-lg" id="security_deposit" wire:model="security_deposit" placeholder="Enter security_deposit"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#item_3" aria-expanded="false">
                    <h6 class="title">Damage Excess info</h6>
                    <span class="accordion-icon"></span>
                </a>
                <div class="accordion-body collapse" id="item_3" data-bs-parent="#accordion" style="">
                    <div class="accordion-inner">
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="damage_excess">Damage Excess info</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-control-lg" id="damage_excess" wire:model="damage_excess" placeholder="Enter damage excess"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#item_4" aria-expanded="false">
                    <h6 class="title">Mileage info</h6>
                    <span class="accordion-icon"></span>
                </a>
                <div class="accordion-body collapse" id="item_4" data-bs-parent="#accordion" style="">
                    <div class="accordion-inner">
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="mileage_text">Mileage text info</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-control-lg" id="mileage_text" wire:model="mileage_text" placeholder="Enter mileage text"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-12 mb-2">
        <h6>Extras (Booking addons)</h6>
    </div>
@foreach ($extras as $index => $extra)
        <div class="row">
            <div class="col-5">
                <input class="form-control  form-control-lg" wire:key="title-{{ $index }}" type="text" wire:model="extras.{{ $index }}.title" placeholder="Title">
                @error("extras.$index.title") <span class="error">This title is required</span> @enderror

            </div>
            <div class="col-5">
                <input class="form-control form-control-lg" wire:key="price-{{ $index }}" type="number" wire:model="extras.{{ $index }}.price" placeholder="Price">
                @error("extras.$index.price") <span class="error">This price is required</span> @enderror

            </div>
            <div class="col-2">
                <button wire:key="remove-{{ $index }}" class="btn btn-warning" wire:click="removeExtra({{ $index }})">Remove</button>
            </div>
        </div>

    @endforeach
    <div class="form-group mt-3">
        <button  wire:click="addExtra" class="btn btn-lg btn-primary">+</button>
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-lg btn-success">Save</button>
    </div>
</div>
</form>
