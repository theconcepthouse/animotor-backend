<div class="nk-content-body">
    <div class="components-preview wide-xl mx-auto">

        <div class="nk-block nk-block-lg">
            <div class="card card-bordered-">
                <div class="row g-0 col-sep col-sep-md- col-sep-xl-">
                    <div class="col-md-3 col-xl-3">
                        <a class="mt-3 h6" href="{{ route('booking.view', $booking_id ) }}">
                            <img src="{{ asset('assets/img/icons/arrow-left.png') }}" />
                            Back to booking dashboard</a>
                        {{ $companyId }}
                        <div class="card-inner">
                            <ul class="nk-stepper-nav step_menu nk-stepper-nav-s1 s is-vr">

                                @foreach($menu_items as $item)
                                    <li wire:key="{{ $loop->index + 1 }}"
                                        class="{{ $step == $loop->index + 1 ? 'active' : '' }}">
                                        <div class="d-flex menu_item">
                                            @if($step > $menu_index[$loop->index])
                                                <img src="{{ asset('assets/img/icons/right.png') }}"/>
                                            @else
                                                <img src="{{ $menu_logos[$loop->index] }}"/>
                                            @endif
                                            <div class="step-text">
                                                <div class="lead-text">{{ $item }}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div style="padding-left: 20px !important;" class="col-md-10 col-xl-9 step_content">
                        <div class="card-inner">
                            <div  class="nk-stepper-content ">


                                <form method="post" wire:submit="saveUpdate">

{{--                                    {{ $step }}--}}

                                    <div class="s== stepper-steps==">
                                        @if($step > 1)
                                            <div wire:click="prev" class="d-flex menu_item back mb-5">
                                                <img src="{{ asset('assets/img/icons/arrow-left.png') }}"/>
                                                <p class="step-text">
                                                <p>BACK TO PREVIOUS</p>
                                            </div>
                                        @endif

                                    </div>


                                    @if($step == 1)
                                        <div>
                                            <h3 class="nk-block-title fw-bold">Is there any damage to the paint <br>
                                                or bodywork</h3>
                                            <p>Damage includes rust, dent, holes, chips and scratches of any size
                                                <br>
                                                Make sure to check all bodywork panels, including:
                                            </p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a><em class="icon ni ni-check"></em><span>Bumpers</span></a>
                                                        </li>
                                                        <li><a><em class="icon ni ni-check"></em><span>Doors</span></a>
                                                        </li>
                                                        <li>
                                                            <a><em class="icon ni ni-check"></em><span>Doors Pillars</span></a>
                                                        </li>
                                                    </ul>
                                                    <button type="button" wire:click="paintDamage('yes')"
                                                            class="btn {{ $any_damage  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a><em class="icon ni ni-check"></em><span>Bumpers</span></a>
                                                        </li>
                                                        <li><a><em class="icon ni ni-check"></em><span>Doors</span></a>
                                                        </li>
                                                        <li>
                                                            <a><em class="icon ni ni-check"></em><span>Doors Pillars</span></a>
                                                        </li>
                                                    </ul>

                                                    <button type="button" wire:click="paintDamage('no')"
                                                            class="btn {{ !$any_damage ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>

                                                </div>
                                            </div>
                                            <br>

                                        </div>
                                    @endif
                                    @if($step == 2)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">How many panel is damaged</h4>
                                            <p>Panels include: Door pillars (between doors), roof, bonnet, bumpers, etc
                                            </p>


                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-control-wrap number-spinner-wrap">

                                                        <button type="button" wire:click="decreaseDamaged"
                                                                class="btn btn-icon btn-outline-light number-spinner-btn number-minus"
                                                                data-number="minus"><em class="icon ni ni-minus"></em>
                                                        </button>
                                                        <input type="number" class="form-control number-spinner"
                                                               wire:model.live="damaged_panel">
                                                        <button type="button" wire:click="increaseDamaged"
                                                                class="btn btn-icon btn-outline-light number-spinner-btn number-plus"
                                                                data-number="plus"><em class="icon ni ni-plus"></em>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="form-label">Type Of Damage</label>
                                                        <p>Largest damage for panel 1*</p>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="default-06">
                                                                    <option value="default_option">Default Option
                                                                    </option>
                                                                    <option value="option_select_name">Option select
                                                                        name
                                                                    </option>
                                                                    <option value="option_select_name">Option select
                                                                        name
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <p>Largest damage for panel 2*</p>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="default-07">
                                                                    <option value="default_option">Default Option
                                                                    </option>
                                                                    <option value="option_select_name">Option select
                                                                        name
                                                                    </option>
                                                                    <option value="option_select_name">Option select
                                                                        name
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-5">
                                                <button type="button" wire:click="next"
                                                        class="btn btn-secondary full_button btn-lg mt-3">Next
                                                </button>

                                            </div>


                                        </div>
                                    @endif
                                    @if($step == 3)
                                        <div>

                                            <h4 class="nk-block-title fw-bold">Any damage to your alloy wheels. wheels
                                                trim or tyres?</h4>

                                            <p>
                                                Let us know if the alloys or wheel trims are scuffled or the tyres are
                                                worn/punctured
                                            </p>

                                            <div class="row">

                                                <div class="col-6">
                                                    <button type="button" wire:click="alloyWheelDamage('yes')"
                                                            class="btn {{ $alloy_wheels_damage  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>
                                                </div>
                                                <div class="col-6">

                                                    <button type="button" wire:click="alloyWheelDamage('no')"
                                                            class="btn {{ !$alloy_wheels_damage ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    @if($step == 4)
                                        <div>

                                            <h4 class="nk-block-title fw-bold mt-3">What's the damage?</h4>
                                            <div class="row">

                                                <div class="col-sm-12 mt-2">
                                                    <div class="form-group">
                                                        <p><strong>Scuffed alloys</strong> <br/>
                                                            How many alloy are scuffed
                                                        </p>
                                                        <div class="form-control-wrap number-spinner-wrap">
                                                            <button
                                                                type="button"
                                                                wire:click="decreaseAllow('scuffed_alloys')"
                                                                class="btn btn-icon btn-outline-light number-spinner-btn number-minus"
                                                                data-number="minus"><em class="icon ni ni-minus"></em>
                                                            </button>
                                                            <input type="number" class="form-control number-spinner"
                                                                   wire:model="alloy_damages.scuffed_alloys"/>
                                                            <button type="button"
                                                                    wire:click="increaseAllow('scuffed_alloys')"
                                                                    class="btn btn-icon btn-outline-light number-spinner-btn number-plus"
                                                                    data-number="plus"><em class="icon ni ni-plus"></em>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-3">
                                                    <div class="form-group">
                                                        <p><strong>Worn Tyre</strong> <br/>
                                                            How many tyres are blow the 1.6mm tyre tread limit and need
                                                            replacing
                                                        </p>
                                                        <div class="form-control-wrap number-spinner-wrap">
                                                            <button wire:click="decreaseAllow('worn_tyres')"
                                                                    class="btn btn-icon btn-outline-light number-spinner-btn number-minus"
                                                                    data-number="minus"><em
                                                                    class="icon ni ni-minus"></em>
                                                            </button>
                                                            <input type="number" class="form-control number-spinner"
                                                                   wire:model="alloy_damages.worn_tyres"/>
                                                            <button wire:click="increaseAllow('worn_tyres')"
                                                                    class="btn btn-icon btn-outline-light number-spinner-btn number-plus"
                                                                    data-number="plus"><em class="icon ni ni-plus"></em>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 mt-5">
                                                    <button type="button" wire:click="next"
                                                            class="btn btn-secondary full_button btn-lg mt-3">Next
                                                    </button>

                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    @if($step == 5)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">I there any windscreen or rear window
                                                damage?</h4>
                                            <p>
                                                This include anything from a small stone chip to a large crack
                                            </p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="windscreenDamage('yes')"
                                                            class="btn {{ $windscreen_damage  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="windscreenDamage('no')"
                                                            class="btn {{ !$windscreen_damage ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    @endif

                                    @if($step == 6)
                                        <div>

                                            <h4 class="nk-block-title fw-bold mt-3">What's the damage?</h4>
                                            <p class="mt-4">Please select from the following : </p>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="preview-block">
                                                    @foreach($windscreen_damages as $item => $key)
                                                    <div wire:key="windscreen_{{ $loop->index }}" class="custom-control- mt-2">
                                                        <input wire:model="windscreen_damages.{{ $item }}" type="checkbox"
                                                               id="windscreen_{{ $loop->index }}">
                                                        <label class="" for="windscreen_{{ $loop->index }}">
                                                            {{ $item }}
                                                        </label>
                                                    </div>
                                                    <br>
                                                    @endforeach

                                                </div>
                                            </div>

                                            <div class="col-12 mt-5">
                                                <button type="button" wire:click="next"
                                                        class="btn btn-secondary full_button btn-lg mt-3">Next
                                                </button>

                                            </div>

                                        </div>
                                    @endif
                                    @if($step == 7)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">Are there any problems with the
                                                mirrors?</h4>
                                            <p>
                                                This includes electrical faults or if the glass or cover is scratched
                                                and/ or missing.
                                            </p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="mirrorDamage('yes')"
                                                            class="btn {{ $mirror_damage  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="mirrorDamage('no')"
                                                            class="btn {{ !$mirror_damage ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    @if($step == 8)
                                        <div>
                                            <h4 class="nk-block-title fw-bold mt-3">What's the damage?</h4>
                                            <p class="mt-3">Please select from the following:</p>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="preview-block">
                                                    <strong class="mb-3">Mirror electronics</strong><br>
                                                    <div class="custom-control">
                                                        <input wire:model="mirror_damages.faulty_mirror_electronics" type="checkbox" class="" />
                                                        <label class="">Faulty</label>
                                                    </div>
                                                </div>
                                                <div class="preview-block mt-4">
                                                    <strong class="mb-3">Mirror glass</strong><br>
                                                    <div class="custom-control mt-2">
                                                        <input type="checkbox" wire:model="mirror_damages.mirror_glass_one_scratch_or_missing" class="custom-control-input-" />
                                                        <label>One scratched or missing</label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control mt-2">
                                                        <input type="checkbox" wire:model="mirror_damages.mirror_glass_both_scratch_or_missing" class="" />
                                                        <label class="custom-control-label-">
                                                            Both scratched or missing</label>
                                                    </div>
                                                </div>
                                                <div class="preview-block mt-4">
                                                    <strong class="mb-3">Mirror Cover</strong><br>
                                                    <div class="custom-control  mt-2">
                                                        <input type="checkbox" wire:model="mirror_damages.mirror_cover_one_scratch_or_missing" class="" />
                                                        <label class="custom-control-label-">
                                                            One scratched or missing</label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control mt-2">
                                                        <input type="checkbox" wire:model="mirror_damages.mirror_cover_both_scratch_or_missing" class="" />
                                                        <label class="custom-control-label-">
                                                            Both scratched or missing</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-5">
                                                <button type="button" wire:click="next"
                                                        class="btn btn-secondary full_button btn-lg mt-3">Next
                                                </button>

                                            </div>

                                        </div>
                                    @endif
                                    @if($step == 9)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">Are any of the following warning lights
                                                on?</h4>
                                            <p>
                                                Check your dashboard (while the engine is running ) for the following
                                                warnings:
                                            </p>
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a><em class="icon ni ni-check"></em><span>Service due</span></a>
                                                        </li>
                                                        <li>
                                                            <a><em class="icon ni ni-check"></em><span>Oil warning</span></a>
                                                        </li>
                                                        <li>
                                                            <a><em class="icon ni ni-check"></em><span>Engine management</span></a>
                                                        </li>
                                                        <li>
                                                            <a><em class="icon ni ni-check"></em><span>Airbag warning</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="warningLights('yes')"
                                                            class="btn {{ $warning_lights  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="warningLights('no')"
                                                            class="btn {{ !$warning_lights ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($step == 10)
                                        <div>

                                            <h4 class="nk-block-title fw-bold mt-3">Which lights are still on?</h4>
                                            <p>
                                                Please select from the following:
                                            </p>

                                                <div class="preview-block mt-4">
                                                    @foreach($lights_on as $item => $key)
                                                    <div wire:key="{{ $item }}" class="custom-control mt-2">
                                                        <input type="checkbox" wire:model="lights_on.{{ $item }}" class="" />
                                                        <label>{{ $item }}</label>
                                                    </div>
                                                    <br>
                                                    @endforeach
                                                </div>


                                            <div class="col-12 mt-5">
                                                <button type="button" wire:click="next"
                                                        class="btn btn-secondary full_button btn-lg mt-3">Next
                                                </button>

                                            </div>

                                        </div>
                                    @endif
                                    @if($step == 11)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">Any seat, carpet or upholstery
                                                damage?</h4>
                                            <p>
                                                Let us know if there are any stains, tears or burns to the interior.
                                            </p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="setDamage('yes')"
                                                            class="btn {{ $seat_damage  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="setDamage('no')"
                                                            class="btn {{ !$seat_damage ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($step == 12)
                                        <div>
                                            <h4 class="nk-block-title fw-bold mt-3">What’s the damage?</h4>
                                            <p>
                                                Please select from the following:
                                            </p>

                                            <div class="preview-block mt-4">

                                                @foreach($seat_damages as $item => $key)
                                                    <div class="custom-control custom-checkbox checked mt-2">
                                                        <input wire:model="seat_damages.{{ $item }}" type="checkbox" />
                                                        <label>{{ $item }}</label>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>


                                            <div class="col-12 mt-5">
                                                <button type="button" wire:click="next"
                                                        class="btn btn-secondary full_button btn-lg mt-3">Next
                                                </button>

                                            </div>

                                        </div>
                                    @endif
                                    @if($step == 13)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">Exterior is clean?</h4>

                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="setExteriorClean('yes')"
                                                            class="btn {{ $clean_exterior  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="setExteriorClean('no')"
                                                            class="btn {{ !$clean_exterior ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    @endif

                                    @if($step == 14)

                                        <div>
                                            <h4 class="nk-block-title fw-bold mt-3">Upload images and write your
                                                description?</h4>

                                                <div class="preview-block mt-4" wire:ignore>


                                                    @include('admin.partials.livewire_image_uploader', ['name' => 'Upload images', 'images' => $exterior_images, 'field' => 'exterior_images'])

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Description</label>
                                                            <div class="form-control-wrap">
                                                                <textarea wire:model="exterior_description" class="form-control no-resize"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            <div class="col-12 mt-5">
                                                <button type="button" wire:click="next"
                                                        class="btn btn-secondary full_button btn-lg mt-3">Next
                                                </button>

                                            </div>

                                        </div>

                                    @endif

                                    @if($step == 15)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">Handbook?</h4>

                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="setHandbook('yes')"
                                                            class="btn {{ $handbook  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="setHandbook('no')"
                                                            class="btn {{ !$handbook ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    @endif

                                    @if($step == 16)

                                        <h4 class="nk-block-title fw-bold mt-3">Upload images and write your
                                            description?</h4>


                                        <div class="preview-block mt-4">


                                            @include('admin.partials.livewire_image_uploader', ['name' => 'Upload images', 'images' => $handbook_images, 'field' => 'handbook_images'])

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea wire:model="handbook_description" class="form-control no-resize"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 mt-5">
                                            <button type="button" wire:click="next"
                                                    class="btn btn-secondary full_button btn-lg mt-3">Next
                                            </button>

                                        </div>

                                    @endif

                                    @if($step == 17)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">Spare Wheels?</h4>

                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="setSpareWheel('yes')"
                                                            class="btn {{ $spare_wheel  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="setSpareWheel('no')"
                                                            class="btn {{ !$spare_wheel ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    @endif

                                    @if($step == 18)
                                        <h4 class="nk-block-title fw-bold mt-3">Upload images and write your
                                            description?</h4>

                                        <div class="preview-block mt-4">


                                            @include('admin.partials.livewire_image_uploader', ['name' => 'Upload images', 'images' => $spare_wheel_images, 'field' => 'spare_wheel_images'])

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea wire:model="spare_wheel_images" class="form-control no-resize"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 mt-5">
                                            <button type="button" wire:click="next"
                                                    class="btn btn-secondary full_button btn-lg mt-3">Next
                                            </button>

                                        </div>
                                    @endif

                                    @if($step == 19)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">Fuel cap?</h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="setFuelCap('yes')"
                                                            class="btn {{ $spare_wheel  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="setFuelCap('no')"
                                                            class="btn {{ !$spare_wheel ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($step == 20)

                                        <h4 class="nk-block-title fw-bold mt-3">Upload images and write your
                                            description?</h4>

                                        <div class="preview-block mt-4">


                                            @include('admin.partials.livewire_image_uploader', ['name' => 'Upload images', 'images' => $fuel_cap_images, 'field' => 'fuel_cap_images'])

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea wire:model="fuel_cap_description" class="form-control no-resize"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 mt-5">
                                            <button type="button" wire:click="next"
                                                    class="btn btn-secondary full_button btn-lg mt-3">Next
                                            </button>

                                        </div>
                                    @endif



                                    @if($step == 21)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">Aerial?</h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="setAerial('yes')"
                                                            class="btn {{ $aerial  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="setAerial('no')"
                                                            class="btn {{ !$aerial ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($step == 22)

                                        <h4 class="nk-block-title fw-bold mt-3">Upload images and write your
                                            description?</h4>

                                        <div class="preview-block mt-4">


                                            @include('admin.partials.livewire_image_uploader', ['name' => 'Upload images', 'images' => $aerial_images, 'field' => 'aerial_images'])

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea wire:model="aerial_description" class="form-control no-resize"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 mt-5">
                                            <button type="button" wire:click="next"
                                                    class="btn btn-secondary full_button btn-lg mt-3">Next
                                            </button>

                                        </div>
                                    @endif




                                    @if($step == 23)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">Floor mat?</h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="setFloorMat('yes')"
                                                            class="btn {{ $floor_mat  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="setFloorMat('no')"
                                                            class="btn {{ !$floor_mat ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($step == 24)

                                        <h4 class="nk-block-title fw-bold mt-3">Upload images and write your
                                            description?</h4>

                                        <div class="preview-block mt-4">


                                            @include('admin.partials.livewire_image_uploader', ['name' => 'Upload images', 'images' => $floor_mat_images, 'field' => 'floor_mat_images'])

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea wire:model="floor_mat_description" class="form-control no-resize"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 mt-5">
                                            <button type="button" wire:click="next"
                                                    class="btn btn-secondary full_button btn-lg mt-3">Next
                                            </button>

                                        </div>
                                    @endif


                                    @if($step == 25)
                                        <div class="">
                                            <h4 class="nk-block-title fw-bold">Tools?</h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" wire:click="setTools('yes')"
                                                            class="btn {{ $tools  ? 'btn-secondary' : 'btn-outline-secondary' }} nxt_button btn-lg mt-3">
                                                        yes
                                                    </button>

                                                </div>
                                                <div class="col-6">
                                                    <button type="button" wire:click="setTools('no')"
                                                            class="btn {{ !$tools ? 'btn-secondary' : 'btn-outline-secondary' }} prev_button btn-lg mt-3">
                                                        No
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($step == 26)

                                        <h4 class="nk-block-title fw-bold mt-3">Upload images and write your
                                            description?</h4>

                                        <div class="preview-block mt-4">


                                            @include('admin.partials.livewire_image_uploader', ['name' => 'Upload images', 'images' => $tools_images, 'field' => 'tools_mat_images'])

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea wire:model="tools_description" class="form-control no-resize"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 mt-5">
                                            <button type="button" wire:click="next"
                                                    class="btn btn-secondary full_button btn-lg mt-3">Next
                                            </button>

                                        </div>
                                    @endif





                                </form>


                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- .nk-block -->
</div><!-- .components-preview -->
</div>


@section('js')
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Livewire.dispatch('file-added', 'Helllllllllll')
        });
    </script>
@endsection
