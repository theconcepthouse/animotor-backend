<div class="nk-block nk-block-lg">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content ">
            <h4 class="title nk-block-title">{{ 'Editing ' .$car->title  }} {{ $steps[$step - 1] }}</h4>
            @if($step > 1)
                <h4 wire:click.prevent="goBack" class="title nk-block-title" style="cursor: pointer">
                    <img src="{{ asset('assets/img/icons/arrow-left.png') }}"/>
                    {{ $steps[$step - 1] }}
                </h4>
            @endif


            <div class="mt-2">
                {{--                <p><span class="btn btn-warning me-5">{{ $car->registration_number }}</span> Make : {{ $car->make }}</p>--}}
            </div>
        </div>

        <div class="nk-block-head-content">
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.cars.index') }}"
               wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                    class="icon ni ni-arrow-left"></em><span>Back</span></a>
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.cars.index') }}"
               wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                    class="icon ni ni-arrow-left"></em></a>
        </div>

    </div>
    <div class="row g-gs">

        <div class="col-lg-12">
            <div class="card card-bordered- h-100">
                <div class="card-inner">

                    <form method="post" wire:submit="saveUpdate">
                        <div class="row">
                            <div class="step-form">
                                @foreach($steps as $item)
                                    @if($loop->index == 9)
                            </div>
                            <div class="step-form">
                                @endif
                                <div wire:key="{{ $item }}" wire:click.prevent="setStep({{ $loop->index + 1 }})"
                                     class="step {{ $step > $loop->index + 1 ? 'prev' : '' }} {{ $step == $loop->index + 1 ? 'active' : '' }}">
                                    @if($step > $loop->index + 1)
                                        <img class="step_img" src="{{ asset('admin/assets/images/mark.png') }}"
                                             style="height: 30px"/>
                                    @else
                                        <p>{{ $item }}</p>
                                    @endif
                                </div>
                                @endforeach
                            </div>

                        </div>

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

                        {{--    {{ $step }}--}}

                        <div class="container">

                            @if($step == 1)
                                <div wire:key="1" class="row mt-3">

                                    <div class="col-md-4 mt-3">

                                        <div class="form-group">
                                            <label class="form-label" for="engine_size">Vehicle name</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="title" type="text"
                                                       class="form-control @error('title') error @enderror  form-control-xl"
                                                       id="title"/>
                                                @error("title") <span class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="registration_number">Registration
                                                Number</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="registration_number" type="text"
                                                       class="form-control @error('registration_number') error @enderror  form-control-xl"
                                                       id="registration_number"/>
                                                @error("registration_number") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-4 mt-3">

                                        <div class="form-group">
                                            <label class="form-label" for="license_no">License Number</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="license_no" type="text"
                                                       class="form-control @error('license_no') error @enderror  form-control-xl"
                                                       id="license_no"/>
                                                @error("license_no") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>


                                    </div>

                                    @if($regions)
                                        <div class="col-md-4 mt-3">

                                            <div class="form-group">
                                                <label class="form-label-outlined-" for="region">Service Area</label>

                                                <div class="form-control-wrap">
                                                    <select wire:model.live="region_id"
                                                            class="form-select form-control-lg" data-ui="xl"
                                                            id="region">
                                                        @foreach($regions as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                        </div>

                                    @endif

                                    <div class="col-md-4 mt-3">

                                        <div class="form-group">
                                            <label class="form-label-outlined-" for="type">Vehicle Type</label>

                                            <div class="form-control-wrap">
                                                <select wire:model.live="type" class="form-select form-control-lg"
                                                        data-ui="xl" id="type">
                                                    @foreach($car_types as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label-outlined-" for="make">Vehicle Make</label>

                                            <div class="form-control-wrap">
                                                <select wire:model.live="make" class="form-select form-control-lg"
                                                        data-ui="xl" id="make">
                                                    @foreach($car_makes as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label-outlined-" for="model">Vehicle Model</label>

                                            <div class="form-control-wrap">
                                                <select wire:model="model" class="form-select form-control-lg"
                                                        data-ui="xl" id="model">
                                                    @foreach($car_models as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="mileage">Vehicle Mileage</label>

                                            <div class="form-control-wrap">
                                                <input wire:model="mileage" type="text"
                                                       class="form-control @error('mileage') error @enderror  form-control-xl"
                                                       id="mileage" step="any">
                                                @error("mileage") <span class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="mileage">Cancellation Fee</label>

                                            <div class="form-control-wrap">
                                                <input wire:model="cancellation_fee" type="text"
                                                       class="form-control @error('cancellation_fee') error @enderror  form-control-xl"
                                                       id="cancellation_fee" step="any">
                                                @error("cancellation_fee") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="insurance_fee">Insurance Fee (For Full Protection)</label>

                                            <div class="form-control-wrap">
                                                <input wire:model="insurance_fee" type="text"
                                                       class="form-control @error('insurance_fee') error @enderror  form-control-xl"
                                                       id="insurance_fee">
                                                @error("insurance_fee") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    @if(floatval($insurance_fee) > 0)
                                    <div class="col-12 mt-3">
                                        <div class="form-group">
                                            <h6>Insurance Coverage</h6>

                                            @foreach ($car->insurance_coverage ?? [] as $index => $coverage)
                                                <div class="row mt-2">
                                                    <div class="col-5">
                                                        <input disabled class="form-control form-control-lg" type="text"
                                                               value="{{ $coverage['title'] }}"
                                                               placeholder="Title">
                                                    </div>
                                                    <div class="col-5">
                                                        <input value="{{ $coverage['value'] }}" disabled
                                                               class="form-control form-control-lg"
                                                               placeholder="Value">
                                                    </div>
                                                    <div class="col-2">
                                                        <button wire:key="remove-coverage-{{ $index }}" class="btn btn-warning"
                                                                wire:click.prevent="removeInsuranceCoverage({{ $index }})">Remove
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <input class="form-control form-control-lg" type="text"
                                                           wire:model="insurance_coverage.title"
                                                           placeholder="Title">
                                                    @error("insurance_coverage.title") <span
                                                        class="error">This title is required</span> @enderror
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control form-control-lg" type="text"
                                                           wire:model="insurance_coverage.value"
                                                           placeholder="Value">
                                                    @error("insurance_coverage.value") <span
                                                        class="error">This value is required</span> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mt-3">
                                                <button type="button" wire:click.prevent="addInsuranceCoverage" class="btn btn-lg btn-success">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="tracker_no">Tracker Number </label>

                                            <div class="form-control-wrap">
                                                <input wire:model="tracker_no" type="text"
                                                       class="form-control @error('tracker_no') error @enderror  form-control-xl"
                                                       id="tracker_no">
                                                @error("tracker_no") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Vehicle Description</label>
                                            <div class="form-control-wrap">
                        <textarea class="form-control form-control-lg" id="description" wire:model="description"
                                  placeholder="Vehicle description"></textarea>
                                                @error("description") <span
                                                    class="invalid">{{ $message }}</span>@enderror

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @endif

                            @if($step == 2)
                                <div wire:key="2" class="row justify-content-center">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select wire:model.live="gear" name="type"
                                                        class="form-select form-control form-control-lg js-select2"
                                                        data-ui="xl" id="gear">
                                                    <option value="Manual">Manual</option>
                                                    <option value="Automatic">Automatic</option>

                                                </select>

                                                <label class="form-label-outlined" for="gear">Gear Type</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($step == 3)
                                <div wire:key="3" class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="engine_size">Engine size</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="engine_size" type="text"
                                                       class="form-control @error('engine_size') error @enderror  form-control-xl"
                                                       id="engine_size"/>
                                                @error("engine_size") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="fuel_type">Fuel Type</label>
                                            <div class="form-control-wrap">
                                                <select wire:model="fuel_type"
                                                        class="form-select form-control form-control-lg" id="fuel_type">
                                                    @foreach($full_types as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach

                                                </select>
                                                @error("fuel_type") <span class="invalid">{{ $message }}</span>@enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="fuel_type">Body Type</label>
                                            <div class="form-control-wrap">
                                                <select wire:model="body_type"
                                                        class="form-select form-control form-control-lg" id="body_type">
                                                    @foreach($car_types as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error("body_type") <span class="invalid">{{ $message }}</span>@enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">

                                        <div class="form-group">
                                            <label class="form-label" for="door">No. of doors</label>

                                            <div class="form-control-wrap">
                                                <input wire:model="door" type="number"
                                                       class="form-control @error('door') error @enderror  form-control-xl"
                                                       id="door"/>
                                                @error("door") <span class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">

                                            <label class="form-label" for="seats">No. of seats</label>

                                            <div class="form-control-wrap">
                                                <input wire:model="seats" type="number"
                                                       class="form-control @error('seats') error @enderror  form-control-xl"
                                                       id="seats"/>
                                                @error("seats") <span class="invalid">{{ $message }}</span>@enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">

                                        <div class="form-group">
                                            <label class="form-label" for="year">Year</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="year" type="number"
                                                       class="form-control @error('year') error @enderror  form-control-xl"
                                                       id="year"/>

                                                @error("year") <span class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="color">Color</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="color" type="text"
                                                       class="form-control @error('color') error @enderror  form-control-xl "
                                                       id="color"/>
                                                @error("color") <span class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="air_condition">Air Conditioning</label>
                                            <div class="form-control-wrap">
                                                <select wire:model="air_condition"
                                                        class="form-select form-control form-control-lg "
                                                        id="air_condition">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @endif

                            @if($step == 4)
                                <div class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="mot.test_date">Test date</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="mots.test_date" type="date"
                                                       class="form-control @error('mots.test_date') error @enderror  form-control-xl"
                                                       id="mot.test_date"/>
                                                @error("mot.test_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="expiry_date">Expiry date</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="mots.expiry_date" type="date"
                                                       class="form-control @error('mots.expiry_date') error @enderror  form-control-xl"
                                                       id="expiry_date"/>
                                                @error("mots.expiry_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="result">Result</label>
                                            <div class="form-control-wrap">
                                                <select wire:model="mots.result"
                                                        class="form-select form-control form-control-lg " id="result">
                                                    <option value="pass">Pass</option>
                                                    <option value="fail">Fail</option>
                                                </select>
                                                @error("mots.result") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="details">Failure Details</label>
                                            <div class="form-control-wrap">
                            <textarea class="form-control form-control-lg" id="details"
                                      wire:model="mots.details"></textarea>
                                                @error("mots.details") <span
                                                    class="invalid">{{ $message }}</span>@enderror

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center-">
                                        <div class="col-4">
                                            <div class="form-group mt-3 w-100">
                                                <button wire:click.prevent="addMOT" type="button"
                                                        class="btn btn-lg btn-primary  text-center">Add MOT
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                @if(count($car->carExtra->mots) > 0)
                                    <div class="col-md-12 mt-4 mb-2">
                                        <h5>MOTS</h5>

                                        <table class="nowrap table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>{{ __('admin.test_date') }}</th>
                                                <th>{{ __('admin.expiry_date') }}</th>
                                                <th>{{ __('admin.result') }}</th>
                                                {{--                        <th>{{ __('admin.next_service_mileage') }}</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($car->carExtra->mots as $item)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item['test_date'] }}</td>
                                                    <td>{{ $item['expiry_date'] }}</td>
                                                    <td class="text-capitalize">{{ $item['result'] }}</td>
                                                    {{--                            <td>{{ $item['next_service_mileage'] }}</td>--}}
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif
                            @endif

                            @if($step == 5)
                                <div wire:key="3" class="row mt-3">

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="is_taxed">Is vehicle taxed</label>
                                            <div class="form-control-wrap">
                                                <select wire:model.live="is_taxed"
                                                        class="form-select form-control form-control-lg " id="is_taxed">
                                                    <option value="1">yes</option>
                                                    <option value="0">no</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    @if($is_taxed == 1)
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="tax_expiry_date">Expiry Date</label>
                                                <div class="form-control-wrap">
                                                    <input wire:model.live="tax_expiry_date" type="date"
                                                           class="form-control @error('tax_expiry_date') error @enderror  form-control-xl"
                                                           id="tax_expiry_date"/>
                                                    @error("tax_expiry_date") <span
                                                        class="invalid">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="tax_type">Tax type</label>
                                                <div class="form-control-wrap">
                                                    <select wire:model="tax_type"
                                                            class="form-select form-control form-control-lg "
                                                            id="tax_type">
                                                        <option value="yearly">Yearly</option>
                                                        <option value="monthly">Monthly</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="tax_amount">Tax Amount</label>
                                                <div class="form-control-wrap">
                                                    <input wire:model="tax_amount" type="number" step="any"
                                                           class="form-control @error('tax_amount') error @enderror  form-control-xl"
                                                           id="tax_amount"/>
                                                    @error("tax_amount") <span
                                                        class="invalid">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if($step == 6)
                                <div wire:key="3" class="row mt-3">

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="last_service_date">Last Service Date</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="service.last_service_date" type="date"
                                                       class="form-control @error('service.last_service_date') error @enderror  form-control-xl"
                                                       id="last_service_date"/>
                                                @error("service.last_service_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="next_service_date">Next Service Date</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="service.next_service_date" type="date"
                                                       class="form-control @error('service.next_service_date') error @enderror  form-control-xl"
                                                       id="next_service_date"/>
                                                @error("service.next_service_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="last_service_mileage">Last Service
                                                Mileage</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="service.last_service_mileage" type="number"
                                                       step="any"
                                                       class="form-control @error('service.last_service_mileage') error @enderror  form-control-xl"
                                                       id="last_service_mileage"/>
                                                @error("service.last_service_mileage") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="next_service_mileage">Next Service
                                                Mileage</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="service.next_service_mileage" type="number"
                                                       step="any"
                                                       class="form-control @error('service.next_service_mileage') error @enderror  form-control-xl"
                                                       id="next_service_mileage"/>
                                                @error("service.next_service_mileage") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center-">
                                        <div class="col-4">
                                            <div class="form-group mt-3 w-100">
                                                <button wire:click.prevent="addService" type="button"
                                                        class="btn btn-lg btn-primary  text-center">Add
                                                    Service
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                @if(count($car->carExtra->service) > 0)
                                    <div class="col-md-12 mt-4 mb-2">
                                        <h5>Service History</h5>

                                        <table class="nowrap table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>{{ __('admin.last_service_date') }}</th>
                                                <th>{{ __('admin.next_service_date') }}</th>
                                                <th>{{ __('admin.last_service_mileage') }}</th>
                                                <th>{{ __('admin.next_service_mileage') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($car->carExtra->service as $item)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item['last_service_date'] }}</td>
                                                    <td>{{ $item['next_service_date'] }}</td>
                                                    <td>{{ $item['last_service_mileage'] }}</td>
                                                    <td>{{ $item['next_service_mileage'] }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif
                            @endif
                            @if($step == 7)
                                <div wire:key="7" class="mt-4">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="driverName" class="form-label">Driver Name</label>
                                            {{--                                            <select wire:model="driver.name" id="" class="form-control">--}}
                                            {{--                                                @foreach($drivers as $item)--}}
                                            {{--                                                    <option value="{{ $item->fullname() }}">{{ $item->fullname() }}</option>--}}
                                            {{--                                                @endforeach--}}
                                            {{--                                            </select>--}}
                                            <input type="text" class="form-control" id="driverName"
                                                   wire:model="driver.name" placeholder="John Doe">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="driverPhoto" class="form-label">Photo</label>
                                            <input type="file" class="form-control" id="driverPhoto"
                                                   wire:model="driver.photo">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="yearsExperience" class="form-label">Years of Experience</label>
                                            <input type="number" class="form-control" id="yearsExperience"
                                                   wire:model="driver.years_experience" placeholder="15 years">
                                        </div>
                                    </div>

                                    <!-- Experience -->
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="specialSkills" class="form-label">Special Skills</label>
                                            <input type="text" class="form-control" id="specialSkills"
                                                   wire:model="driver.special_skills"
                                                   placeholder="Defensive driving, off-road driving">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="primaryLanguage" class="form-label">Primary Language</label>
                                            <input type="text" class="form-control" id="primaryLanguage"
                                                   wire:model="driver.primary_language" placeholder="English">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="additionalLanguages" class="form-label">Additional
                                                Languages</label>
                                            <input type="text" class="form-control" id="additionalLanguages"
                                                   wire:model="driver.additional_languages"
                                                   placeholder="Spanish, French">
                                        </div>
                                    </div>

                                    <!-- Local Knowledge -->
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="areaExpertise" class="form-label">Area Expertise</label>
                                            <input type="text" class="form-control" id="areaExpertise"
                                                   wire:model="driver.area_expertise" placeholder="New York City">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="tourGuideExperience" class="form-label">Tour Guide
                                                Experience</label>
                                            <input type="text" class="form-control" id="tourGuideExperience"
                                                   wire:model="driver.tour_guide_experience" placeholder="5 years">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="drivingLicenses" class="form-label">Driving Licenses</label>
                                            <input type="text" class="form-control" id="drivingLicenses"
                                                   wire:model="driver.driving_licenses"
                                                   placeholder="CDL, motorcycle license">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="certifications" class="form-label">Certifications</label>
                                            <input type="text" class="form-control" id="certifications"
                                                   wire:model="driver.certifications"
                                                   placeholder="First Aid Certified, Advanced Defensive Driving">
                                        </div>
                                    </div>


                                    <!-- Reviews and Ratings -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="customerReviews" class="form-label">Customer Reviews</label>
                                                <textarea class="form-control" id="customerReviews" rows="4"
                                                          wire:model="driver.customer_reviews"
                                                          placeholder='"John was an excellent driver and guide..."'></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="overallRating" class="form-label">Overall Rating</label>
                                                <input type="text" class="form-control" id="overallRating"
                                                       wire:model="driver.overall_rating"
                                                       placeholder="★★★★☆ (4.8 out of 5)">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Availability -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="workHours" class="form-label">Work Hours</label>
                                            <input type="text" class="form-control" id="workHours"
                                                   wire:model="driver.work_hours" placeholder="8:00 AM to 8:00 PM">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="daysOff" class="form-label">Days Off</label>
                                            <input type="text" class="form-control" id="daysOff"
                                                   wire:model="driver.days_off"
                                                   placeholder="Sundays and public holidays">
                                        </div>
                                    </div>

                                    <!-- Contact Information -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="phoneNumber" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" id="phoneNumber"
                                                   wire:model="driver.phone_number" placeholder="(555) 123-4567">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="emailAddress" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="emailAddress"
                                                   wire:model="driver.email_address" placeholder="john.doe@example.com">
                                        </div>
                                    </div>

                                    <!-- Terms and Conditions -->
                                    <h4 class="mt-4">Terms and Conditions</h4>

                                    <div class="mb-3">
                                        <label for="workingHours" class="form-label">Driver's Working Hours</label>
                                        <textarea class="form-control" id="workingHours" rows="3"
                                                  wire:model="driver.working_hours"
                                                  placeholder="Standard Hours, Overtime..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="driverBreaks" class="form-label">Driver Breaks</label>
                                        <textarea class="form-control" id="driverBreaks" rows="3"
                                                  wire:model="driver.driver_breaks"
                                                  placeholder="Mandatory Breaks, Extended Trips..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="accommodation" class="form-label">Accommodation for Overnight
                                            Stays</label>
                                        <textarea class="form-control" id="accommodation" rows="3"
                                                  wire:model="driver.accommodation"
                                                  placeholder="Customer Responsibility, Additional Charges..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="food" class="form-label">Driver’s Food</label>
                                        <textarea class="form-control" id="food" rows="3" wire:model="driver.food"
                                                  placeholder="During Standard Hours, Overtime and Overnight..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tollTax" class="form-label">Toll Tax</label>
                                        <textarea class="form-control" id="tollTax" rows="3"
                                                  wire:model="driver.toll_tax"
                                                  placeholder="Customer Responsibility, Reimbursement..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dropoffLocation" class="form-label">Drop-off Location</label>
                                        <textarea class="form-control" id="dropoffLocation" rows="3"
                                                  wire:model="driver.dropoff_location"
                                                  placeholder="Different Drop-off Location..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="miscellaneous" class="form-label">Miscellaneous</label>
                                        <textarea class="form-control" id="miscellaneous" rows="3"
                                                  wire:model="driver.miscellaneous"
                                                  placeholder="Traffic Violations, Personal Belongings, Cancellation Policy..."></textarea>
                                    </div>
                                </div>

                            @endif

                            @if($step == 8)
                                <div class="row">


                                    <div class="col-12 mb-2 mt-2">
                                        <h6>Extras (Booking addons)</h6>
                                    </div>

                                    @foreach ($car->extras as $index => $extra)
                                        <div class="row mt-2">
                                            <div class="col-5">
                                                <input disabled class="form-control  form-control-lg" type="text"
                                                       value="{{ $extra['title'] }}"
                                                       placeholder="Title">

                                            </div>
                                            <div class="col-5">
                                                <input value="{{ $extra['price'] }}" disabled
                                                       class="form-control form-control-lg"
                                                       placeholder="Price">

                                            </div>
                                            <div class="col-2">
                                                <button wire:key="remove-{{ $index }}" class="btn btn-warning"
                                                        wire:click.prevent="removeExtra({{ $index }})">Remove
                                                </button>
                                            </div>
                                        </div>

                                    @endforeach
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <input class="form-control  form-control-lg" type="text"
                                                   wire:model="extras.title"
                                                   placeholder="Title">
                                            @error("extras.title") <span
                                                class="error">This title is required</span> @enderror

                                        </div>
                                        <div class="col-6">
                                            <input class="form-control form-control-lg" type="number"
                                                   wire:model="extras.price"
                                                   placeholder="Price">
                                            @error("extras.price") <span
                                                class="error">This price is required</span> @enderror

                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <button type="button" wire:click.prevent="addExtras" class="btn btn-lg btn-success">
                                            Save
                                        </button>
                                    </div>
                                </div>

                            @endif
                            @if($step == 9)
                                <div class="row mt-3">
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="requirements">Booking requirements (separate
                                                with comma)</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg"
                                                       id="requirements"
                                                       wire:model="requirements" placeholder="Enter requirements">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="security_deposit">Security Deposit
                                                Message</label>
                                            <div class="form-control-wrap">
                            <textarea class="form-control form-control-lg" id="security_deposit"
                                      wire:model="security_deposit" placeholder="Enter security_deposit"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="damage_excess">Damage Excess info</label>
                                            <div class="form-control-wrap">
                            <textarea class="form-control form-control-lg" id="damage_excess" wire:model="damage_excess"
                                      placeholder="Enter damage excess"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="mileage_text">Mileage text info</label>
                                            <div class="form-control-wrap">
                            <textarea class="form-control form-control-lg" id="mileage_text" wire:model="mileage_text"
                                      placeholder="Enter mileage text"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="important_text">Important Text</label>
                                            <div class="form-control-wrap">
                            <textarea class="form-control form-control-lg" id="important_text" wire:model="important_text"
                                      placeholder="Enter important text for booking"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            @if($step == 10)
                                <div class="my-3">
                                    <h4 class="text-center">Documents</h4>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.document_type">{{ __('admin.document_type') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.document_type" type="text"
                                                       class="form-control @error('document.document_type') error @enderror  form-control-xl"
                                                       id="document.document_type"/>
                                                @error("document.document_type") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.document_name">{{ __('admin.document_name') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.document_name" type="text"
                                                       class="form-control @error('document.document_name') error @enderror  form-control-xl"
                                                       id="document.document_name"/>
                                                @error("document.document_name") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.upload_date">{{ __('admin.upload_date') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.upload_date" type="date"
                                                       class="form-control @error('document.upload_date') error @enderror  form-control-xl"
                                                       id="document.upload_date"/>
                                                @error("document.upload_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.expiry_date">{{ __('admin.expiry_date') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.expiry_date" type="date"
                                                       class="form-control @error('document.expiry_date') error @enderror  form-control-xl"
                                                       id="document.expiry_date"/>
                                                @error("document.expiry_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.action_type">{{ __('admin.action_type') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.action_type" type="text"
                                                       class="form-control @error('document.action_type') error @enderror  form-control-xl"
                                                       id="document.action_type"/>
                                                @error("document.action_type") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.action_date">{{ __('admin.action_date') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.action_date" type="date"
                                                       class="form-control @error('document.action_date') error @enderror  form-control-xl"
                                                       id="document.action_date"/>
                                                @error("document.action_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="document.file">{{ __('admin.file') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.file" type="file"
                                                       class="form-control @error('document.file') error @enderror  form-control-xl"
                                                       id="document.file"/>
                                                @error("document.file") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center-">
                                        <div class="col-4">
                                            <div class="form-group mt-3 w-100">
                                                <button wire:click.prevent="updateDocument" type="button"
                                                        class="btn btn-lg btn-primary  text-center">
                                                    Add Document
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                @if(count($car->carExtra->documents) > 0)
                                    <div class="col-md-12 mt-4 mb-2">
                                        <h5>Documents</h5>

                                        <table class="nowrap table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>{{ __('admin.document_type') }}</th>
                                                <th>{{ __('admin.document_name') }}</th>
                                                <th>{{ __('admin.upload_date') }}</th>
                                                <th>{{ __('admin.expiry_date') }}</th>
                                                <th>{{ __('admin.action_type') }}</th>
                                                <th>{{ __('admin.action_date') }}</th>
                                                <th>{{ __('admin.file') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($car->carExtra->documents as $item)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item['document_type'] }}</td>
                                                    <td>{{ $item['document_name'] }}</td>
                                                    <td>{{ $item['upload_date'] }}</td>
                                                    <td>{{ $item['expiry_date'] }}</td>
                                                    <td>{{ $item['action_type'] }}</td>
                                                    <td>{{ $item['action_date'] }}</td>
                                                    <td>
                                                        @if($item['file'])
                                                            <img src="{{ $item['file'] }}"
                                                                 style="height: 50px; width: 50px"/>
                                                        @else
                                                            No file
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif

                            @endif
                            @if($step == 11)
                                <div class="my-3">
                                    <h4 class="text-center">Finance</h4>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.finance_type">{{ __('admin.finance_type') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.finance_type" type="text"
                                                       class="form-control @error('finance.finance_type') error @enderror  form-control-xl"
                                                       id="finance.finance_type"/>
                                                @error("finance.finance_type") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.purchase_price">{{ __('admin.purchase_price') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.purchase_price" type="number" step="any"
                                                       class="form-control @error('finance.purchase_price') error @enderror  form-control-xl"
                                                       id="finance.finance_type"/>
                                                @error("finance.purchase_price") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.agreement_number">{{ __('admin.agreement_number') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.agreement_number" type="text"
                                                       class="form-control @error('finance.agreement_number') error @enderror  form-control-xl"
                                                       id="finance.agreement_number"/>
                                                @error("finance.agreement_number") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.funder_name">{{ __('admin.funder_name') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.funder_name" type="text"
                                                       class="form-control @error('finance.funder_name') error @enderror  form-control-xl"
                                                       id="finance.funder_name"/>
                                                @error("finance.funder_name") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.agreement_start_date">{{ __('admin.agreement_start_date') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.agreement_start_date" type="date"
                                                       class="form-control @error('finance.agreement_start_date') error @enderror  form-control-xl"
                                                       id="finance.agreement_start_date"/>
                                                @error("finance.agreement_start_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.agreement_end_date">{{ __('admin.agreement_end_date') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.agreement_end_date" type="date"
                                                       class="form-control @error('finance.agreement_end_date') error @enderror  form-control-xl"
                                                       id="finance.agreement_end_date"/>
                                                @error("finance.agreement_end_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.loan_amount">{{ __('admin.loan_amount') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.loan_amount" type="number" step="any"
                                                       class="form-control @error('finance.loan_amount') error @enderror  form-control-xl"
                                                       id="finance.loan_amount"/>
                                                @error("finance.loan_amount") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.repayment_frequency">{{ __('admin.repayment_frequency') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.repayment_frequency" type="number" step="any"
                                                       class="form-control @error('finance.repayment_frequency') error @enderror  form-control-xl"
                                                       id="finance.repayment_frequency"/>
                                                @error("finance.repayment_frequency") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.amount">{{ __('admin.amount') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.amount" type="number" step="any"
                                                       class="form-control @error('finance.amount') error @enderror  form-control-xl"
                                                       id="finance.amount"/>
                                                @error("finance.amount") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endif

                            @if($step == 12)
                                <div class="my-3">
                                    <h4 class="text-center">Damage History</h4>
                                </div>
                                <div wire:key="3" class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="damage.reported_Date">{{ __('admin.reported_date') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="damage.reported_date" type="date"
                                                       class="form-control @error('damage.reported_date') error @enderror  form-control-xl"
                                                       id="damage.reported_date"/>
                                                @error("damage.reported_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="damage.incident_date">{{ __('admin.incident_date') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="damage.incident_date" type="date"
                                                       class="form-control @error('damage.incident_date') error @enderror  form-control-xl"
                                                       id="damage.incident_date"/>
                                                @error("damage.incident_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="damage.insurance_reference_no">{{ __('admin.insurance_reference_no') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="damage.insurance_reference_no" type="text"
                                                       class="form-control @error('damage.insurance_reference_no') error @enderror  form-control-xl"
                                                       id="damage.insurance_reference_no"/>
                                                @error("damage.insurance_reference_no") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="damage.total_claim_cost">{{ __('admin.total_claim_cost') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="damage.total_claim_cost" type="number" step="any"
                                                       class="form-control @error('damage.total_claim_cost') error @enderror  form-control-xl"
                                                       id="damage.total_claim_cost"/>
                                                @error("damage.total_claim_cost") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="status">Status</label>
                                            <div class="form-control-wrap">
                                                <select wire:model="damage.status"
                                                        class="form-select form-control form-control-lg "
                                                        id="status">
                                                    <option value="open">Open</option>
                                                    <option value="settled">Settled</option>
                                                    <option value="closed">Closed</option>
                                                </select>
                                                @error("damage.status") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center-">
                                        <div class="col-4">
                                            <div class="form-group mt-3 w-100">
                                                <button wire:click.prevent="updateDamage" type="button"
                                                        class="btn btn-lg btn-primary  text-center">Add
                                                    Damage History
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                @if(count($car->carExtra->damage_history) > 0)
                                    <div class="col-md-12 mt-4 mb-2">
                                        <h5>Damage Histories</h5>

                                        <table class="nowrap table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>{{ __('admin.reported_date') }}</th>
                                                <th>{{ __('admin.incident_date') }}</th>
                                                <th>{{ __('admin.insurance_reference_no') }}</th>
                                                <th>{{ __('admin.total_claim_cost') }}</th>
                                                <th>{{ __('admin.status') }}</th>
                                                {{--                        <th>{{ __('admin.next_service_mileage') }}</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($car->carExtra->damage_history as $item)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item['reported_date'] }}</td>
                                                    <td>{{ $item['incident_date'] }}</td>
                                                    <td>{{ $item['insurance_reference_no'] }}</td>
                                                    <td>{{ $item['total_claim_cost'] }}</td>
                                                    <td>{{ $item['status'] }}</td>
                                                    {{--                            <td>{{ $item['next_service_mileage'] }}</td>--}}
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif

                            @endif

                            @if($step == 13)
                                <div class="my-3">
                                    <h4 class="text-center">Add Repair</h4>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.booking_id">{{ __('admin.booking_id') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.booking_id" type="text"
                                                       class="form-control @error('repair.booking_id') error @enderror  form-control-xl"
                                                       id="repair.booking_id"/>
                                                @error("repair.booking_id") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.booking_date">{{ __('admin.booking_date') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.booking_date" type="date"
                                                       class="form-control @error('repair.booking_date') error @enderror  form-control-xl"
                                                       id="repair.booking_date"/>
                                                @error("repair.booking_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.date_time">{{ __('admin.date_time') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.date_time" type="datetime-local"
                                                       class="form-control @error('repair.date_time') error @enderror  form-control-xl"
                                                       id="damage.insurance_reference_no"/>
                                                @error("repair.date_time") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.mileage_at_repair">{{ __('admin.mileage_at_repair') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.mileage_at_repair" type="number" step="any"
                                                       class="form-control @error('repair.mileage_at_repair') error @enderror  form-control-xl"
                                                       id="repair.mileage_at_repair"/>
                                                @error("repair.mileage_at_repair") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.workshop_name">{{ __('admin.workshop_name') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.workshop_name" type="text"
                                                       class="form-control @error('repair.workshop_name') error @enderror  form-control-xl"
                                                       id="repair.mileage_at_repair"/>
                                                @error("repair.workshop_name") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.repair_type">{{ __('admin.repair_type') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.repair_type" type="text"
                                                       class="form-control @error('repair.repair_type') error @enderror  form-control-xl"
                                                       id="repair.repair_type"/>
                                                @error("repair.repair_type") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.total_cost">{{ __('admin.total_cost') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.total_cost" type="number" step="any"
                                                       class="form-control @error('repair.total_cost') error @enderror  form-control-xl"
                                                       id="repair.total_cost"/>
                                                @error("repair.total_cost") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="repair.vat">{{ __('admin.vat') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.vat" type="number" step="any"
                                                       class="form-control @error('repair.vat') error @enderror  form-control-xl"
                                                       id="repair.vat"/>
                                                @error("repair.vat") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.invoice">{{ __('admin.invoice') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.invoice" type="file"
                                                       class="form-control @error('repair.invoice') error @enderror  form-control-xl"
                                                       id="repair.invoice"/>
                                                @error("repair.invoice") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center-">
                                        <div class="col-4">
                                            <div class="form-group mt-3 w-100">
                                                <button wire:click.prevent="updateRepair" type="button"
                                                        class="btn btn-lg btn-primary  text-center">Add
                                                    Repair
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                @if(count($car->carExtra->repairs) > 0)
                                    <div class="col-md-12 mt-4 mb-2">
                                        <h5>Repairs Histories</h5>

                                        <table class="nowrap table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>{{ __('admin.booking_id') }}</th>
                                                <th>{{ __('admin.booking_date') }}</th>
                                                <th>{{ __('admin.date_time') }}</th>
                                                <th>{{ __('admin.mileage_at_repair') }}</th>
                                                <th>{{ __('admin.workshop_name') }}</th>
                                                <th>{{ __('admin.repair_type') }}</th>
                                                <th>{{ __('admin.total_cost') }}</th>
                                                <th>{{ __('admin.vat') }}</th>
                                                <th>{{ __('admin.invoice') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($car->carExtra->repairs as $item)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item['booking_id'] }}</td>
                                                    <td>{{ $item['booking_date'] }}</td>
                                                    <td>{{ $item['date_time'] }}</td>
                                                    <td>{{ $item['mileage_at_repair'] }}</td>
                                                    <td>{{ $item['workshop_name'] }}</td>
                                                    <td>{{ $item['repair_type'] }}</td>
                                                    <td>{{ $item['total_cost'] }}</td>
                                                    <td>{{ $item['vat'] }}</td>
                                                    <td>
                                                        @if(isset($item['invoice']))
                                                            <a target="_blank" href="{{ $item['invoice'] }}">View
                                                                Invoice</a>
                                                        @else
                                                            No Invoice
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif

                            @endif
                            @if($step == 14)
                                <div class="my-3">
                                    <h4 class="text-center">PCN Histories</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>{{ __('admin.sn') }}</th>
                                            <th>Created On</th>
                                            <th>Driver</th>
                                            <th>{{ __('admin.vrm') }}</th>
                                            <th>{{ __('admin.pcn_no') }}</th>
                                            <th>Issue Date</th>
                                            <th>Deadline Date</th>
                                            <th>Issuing Authority</th>
                                            <th>{{ __('admin.status') }}</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($pcns as $item)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $item->created_at->format('d M, Y') }}</td>
                                                <td><a href="{{ route('admin.driverPcn', $item->driver->id ?? '') }}" class="btn btn-sm btn-primary">{{ $item->driver->first_name ?? '' }} {{ $item->driver->last_name ?? '' }}</a></td>
                                                <td><a href="#"> {{ $item->vrm }}</a></td>
                                                <td>{{ $item->pcn_no }}</td>
                                                <td>{{ $item?->date_of_issue }}</td>
                                                <td>{{ $item->deadline_date }}</td>
                                                <td>{{ $item->issuing_authority }}</td>
                                                <td>{{ $item->status }}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            @endif
                            @if($step == 15)
                                <div class="my-3">
                                    <h4 class="text-center">Reports</h4>
                                </div>

                                @if(count($car->bookings) < 1)
                                    <h6 class="text-center mt-5">{{ __('admin.no_booking_history') }}</h6>
                                @endif

                                @if(count($car->bookings) > 0)
                                    <div class="dataTables_wrapper dt-bootstrap4 no-footer mt-4">
                                        <div class="datatable-wrap- my-3">
                                            <table class="nowrap table"
                                                   data-export-title="{{ __('admin.export_title') }}">
                                                <thead>

                                                <tr>
                                                    <th>{{ __('admin.sn') }}</th>
                                                    <th>{{ __('admin.booking_no') }}</th>
                                                    <th>{{ __('admin.booking_date') }}</th>
                                                    <th>{{ __('admin.pickup_date_time') }}</th>
                                                    {{--                            <th>{{ __('admin.dropoff_date_time') }}</th>--}}
                                                    <th>{{ __('admin.period') }}</th>
                                                    <th>{{ __('admin.customer_name') }}</th>
                                                    <th>{{ __('admin.service_area') }}</th>
                                                    <th>{{ __('admin.booking_status') }}</th>
                                                    <th>{{ __('admin.total_cost') }}</th>
                                                    <th>{{ __('admin.payment_status') }}</th>
                                                    <th>{{ __('admin.booking_type') }}</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($car->bookings as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>

                                                        <td>
                                                            <a href="{{ route('admin.bookings.show', $item->id) }}">{{ $item->booking_number }}</a>
                                                        </td>
                                                        <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                                        <td>{{ $item->pick_up_date }} {{ $item->pick_up_time }}</td>
                                                        <td>{{ $item->days }} {{ __('admin.booking_days') }}</td>


                                                        <td>
                                                            @if($item?->customer)
                                                                <a href="{{ route('admin.user.show',$item?->customer?->id) }}"> {{ $item?->customer?->name }} </a>
                                                            @else
                                                                {{ "not found" }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $item?->region?->name }}</td>

                                                        <td>{{ $item->status }}</td>
                                                        <td>{{ number_format($item->grand_total, 2) }}</td>


                                                        {{--    <td></td>--}}
                                                        <td>{{ $item->status }}</td>

                                                        <td>{{ $item->payment_status }}</td>

                                                        <td>{{ $item->booking_type }}</td>


                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            @if($step == 16)
                                <div class="my-3">

                                    <h4 class="text-center">Subscription</h4>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <span class="me-4">{{ __('admin.tfl_congestion_charge') }}</span>
                                                <input id="tfl_congestion_charge"
                                                       wire:model="subscription.tfl_congestion_charge" value="yes"
                                                       type="radio"/> <span class="me-3">Yes</span>
                                                <input id="tfl_congestion_charge"
                                                       wire:model="subscription.tfl_congestion_charge" value="no"
                                                       type="radio"/> No

                                            </div>
                                            @error("subscription.tfl_congestion_charge") <span
                                                class="invalid">{{ $message }}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <span class="me-4">{{ __('admin.dartford_charge') }}</span>
                                                <input id="dartford_charge" wire:model="subscription.dartford_charge"
                                                       value="yes" type="radio"/> <span class="me-3">Yes</span>
                                                <input id="dartford_charge" wire:model="subscription.dartford_charge"
                                                       value="no" type="radio"/> No

                                            </div>
                                            @error("subscription.dartford_charge") <span
                                                class="invalid">{{ $message }}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <span class="me-4">{{ __('admin.heathrow_airport') }}</span>
                                                <input id="heathrow_airport" wire:model="subscription.heathrow_airport"
                                                       value="yes" type="radio"/> <span class="me-3">Yes</span>
                                                <input id="heathrow_airport" wire:model="subscription.heathrow_airport"
                                                       value="no" type="radio"/> No

                                            </div>
                                            @error("subscription.heathrow_airport") <span
                                                class="invalid">{{ $message }}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <span class="me-4">{{ __('admin.gatwick_airport') }}</span>
                                                <input id="gatwick_airport" wire:model="subscription.gatwick_airport"
                                                       value="yes" type="radio"/> <span class="me-3">Yes</span>
                                                <input id="gatwick_airport" wire:model="subscription.gatwick_airport"
                                                       value="no" type="radio"/> No

                                            </div>
                                            @error("subscription.gatwick_airport") <span
                                                class="invalid">{{ $message }}</span>@enderror

                                        </div>
                                    </div>


                                </div>

                            @endif


                            <div class="row justify-content-center-">
                                <div class="col-4">
                                    <div class="form-group mt-3 w-100">
                                        <button type="submit"
                                                class="btn btn-lg btn-primary  text-center">{{ $step > 7 ? 'Save' : 'Next' }}</button>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block -->
