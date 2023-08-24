<form method="post" wire:submit="saveUpdate">
    <div class="row">
        <div class="step-form">
            @foreach($steps as $item)
                <div wire:key="{{ $item }}" class="step {{ $step > $loop->index + 1 ? 'prev' : '' }} {{ $step == $loop->index + 1 ? 'active' : '' }}">
                    @if($step > $loop->index + 1)<img class="step_img" src="{{ asset('admin/assets/images/mark.png') }}" style="height: 30px" />
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

    @if($step == 1)
        <div wire:key="1" class="row mt-3">


        <div class="col-md-4 mt-3">
            <div class="form-group">
                <div class="form-control-wrap">
                    <input wire:model="title" type="text"
                           class="form-control @error('title') error @enderror  form-control-xl form-control-outlined"
                           id="title">
                    <label class="form-label-outlined" for="title">Vehicle name</label>
                    @error("title") <span class="invalid">{{ $message }}</span>@enderror
                </div>
            </div>

        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <div class="form-control-wrap">
                    <input wire:model="registration_number" type="text"
                           class="form-control @error('registration_number') error @enderror  form-control-xl form-control-outlined"
                           id="registration_number" />
                    <label class="form-label-outlined" for="registration_number">Registration Number</label>
                    @error("registration_number") <span class="invalid">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>


        <div class="col-md-4 mt-3">
            <div class="form-group">
                <div class="form-control-wrap">
                    <input wire:model="license_no" type="text"
                           class="form-control @error('license_no') error @enderror  form-control-xl form-control-outlined"
                           id="license_number">
                    <label class="form-label-outlined" for="license_number">License Number </label>
                    @error("license_no") <span class="invalid">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <div class="form-control-wrap">
                    <select name="type" class="form-select js-select2" data-ui="xl" id="type">

                            @foreach($car_types as $type)
                                <option  value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach

                    </select>
                    <label class="form-label-outlined" for="type">Vehicle Type</label>
                </div>
            </div>
        </div>


        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label-outlined-" for="make">Vehicle Make</label>

                <div class="form-control-wrap">
                    <select wire:model.live="make" class="form-select form-control-lg" data-ui="xl" id="make">
                        @foreach($car_makes as $item)
                            <option  value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label-outlined-" for="model">Vehicle Model</label>

                <div class="form-control-wrap">
                    <select wire:model="model" class="form-select form-control-lg" data-ui="xl" id="model">
                        @foreach($car_models as $item)
                            <option  value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
        </div>



        <div class="col-md-4 mt-3">
            <div class="form-group">
                <div class="form-control-wrap">
                    <input wire:model="mileage" type="text"
                           class="form-control @error('mileage') error @enderror  form-control-xl form-control-outlined"
                           id="mileage">
                    <label class="form-label-outlined" for="make">Vehicle Mileage</label>
                    @error("mileage") <span class="invalid">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>


        <div class="col-md-4 mt-3">
            <div class="form-group">
                <div class="form-control-wrap">
                    <input wire:model="tracker_no" type="text"
                           class="form-control @error('tracker_no') error @enderror  form-control-xl form-control-outlined"
                           id="tracker_no">
                    <label class="form-label-outlined" for="tracker_no">Tracker Number </label>
                    @error("tracker_no") <span class="invalid">{{ $message }}</span>@enderror
                </div>

            </div>

        </div>

        <div class="col-12 mt-3">
            <div class="form-group">
                <label class="form-label" for="description">Vehicle Description</label>
                <div class="form-control-wrap">
                    <textarea class="form-control form-control-lg" id="description" wire:model="description" placeholder="Vehicle description"></textarea>
                    @error("description") <span class="invalid">{{ $message }}</span>@enderror

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
                        <select wire:model.live="gear" name="type" class="form-select form-control form-control-lg js-select2" data-ui="xl" id="gear">
                                <option  value="Manual">Manual</option>
                                <option  value="Automatic">Automatic</option>

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
                               id="engine_size" />
                        @error("engine_size") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>




            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label class="form-label" for="fuel_type">Fuel Type</label>
                    <div class="form-control-wrap">
                        <select wire:model="fuel_type" class="form-select form-control form-control-lg" id="fuel_type">
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
                        <select wire:model="body_type" class="form-select form-control form-control-lg" id="body_type">
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
                               id="door" />
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
                               id="seats" />
                        @error("seats") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label class="form-label" for="year">Year</label>
                    <div class="form-control-wrap">
                        <input wire:model="year" type="number"
                               class="form-control @error('year') error @enderror  form-control-xl "
                               id="year" />

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
                               id="color" />
                        @error("color") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>


            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label class="form-label" for="air_condition">Air Conditioning</label>
                    <div class="form-control-wrap">
                        <select wire:model="air_condition" class="form-select form-control form-control-lg " id="air_condition">
                            <option  value="1">Yes</option>
                            <option  value="0">No</option>

                        </select>
                    </div>
                </div>
            </div>


        </div>
    @endif

    @if($step == 4)
        <div wire:key="3" class="row mt-3">

            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label class="form-label" for="mot.test_date">Test date</label>
                    <div class="form-control-wrap">
                        <input wire:model="mots.test_date" type="date"
                               class="form-control @error('mots.test_date') error @enderror  form-control-xl"
                               id="mot.test_date" />
                        @error("mot.test_date") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label class="form-label" for="expiry_date">Expiry date</label>
                    <div class="form-control-wrap">
                        <input wire:model="mots.expiry_date" type="date"
                               class="form-control @error('mots.expiry_date') error @enderror  form-control-xl"
                               id="expiry_date" />
                        @error("mots.expiry_date") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>


            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label class="form-label" for="result">Result</label>
                    <div class="form-control-wrap">
                        <select wire:model="mots.result" class="form-select form-control form-control-lg " id="result">
                            <option  value="pass">Pass</option>
                            <option  value="fail">Fail</option>
                        </select>
                        @error("mots.result") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="form-group">
                    <label class="form-label" for="details">Failure Details</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control form-control-lg" id="details" wire:model="mots.details"></textarea>
                        @error("mots.details") <span class="invalid">{{ $message }}</span>@enderror

                    </div>
                </div>
            </div>


            <div class="row justify-content-center-">
                <div class="col-4">
                    <div class="form-group mt-3 w-100">
                        <button wire:click="addMOT" type="button" class="btn btn-lg btn-primary  text-center">Add MOT </button>
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
                            <td>{{ $item['result'] }}</td>
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
                        <select wire:model="is_taxed" class="form-select form-control form-control-lg " id="is_taxed">
                            <option  value="1">yes</option>
                            <option  value="0">no</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label class="form-label" for="tax_expiry_date">Expiry Date</label>
                    <div class="form-control-wrap">
                        <input wire:model.live="tax_expiry_date" type="date"
                               class="form-control @error('tax_expiry_date') error @enderror  form-control-xl"
                               id="tax_expiry_date" />
                        @error("tax_expiry_date") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label class="form-label" for="tax_type">Tax type</label>
                    <div class="form-control-wrap">
                        <select wire:model="tax_type" class="form-select form-control form-control-lg " id="tax_type">
                            <option  value="yearly">Yearly</option>
                            <option  value="monthly">Monthly</option>
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
                               id="tax_amount" />
                        @error("tax_amount") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

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
                               id="last_service_date" />
                        @error("service.last_service_date") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label class="form-label" for="next_service_date">Next Service Date</label>
                    <div class="form-control-wrap">
                        <input wire:model="service.next_service_date" type="date"
                               class="form-control @error('service.next_service_date') error @enderror  form-control-xl"
                               id="next_service_date" />
                        @error("service.next_service_date") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>


            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label class="form-label" for="last_service_mileage">Last Service Mileage</label>
                    <div class="form-control-wrap">
                        <input wire:model="service.last_service_mileage" type="number" step="any"
                               class="form-control @error('service.last_service_mileage') error @enderror  form-control-xl"
                               id="last_service_mileage" />
                        @error("service.last_service_mileage") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label class="form-label" for="next_service_mileage">Next Service Mileage</label>
                    <div class="form-control-wrap">
                        <input wire:model="service.next_service_mileage" type="number" step="any"
                               class="form-control @error('service.next_service_mileage') error @enderror  form-control-xl"
                               id="next_service_mileage" />
                        @error("service.next_service_mileage") <span class="invalid">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>


            <div class="row justify-content-center-">
                <div class="col-4">
                    <div class="form-group mt-3 w-100">
                        <button wire:click="addService" type="button" class="btn btn-lg btn-primary  text-center">Add Service </button>
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
        <div class="row">

            <div class="col-12 mb-2 mt-2">
                <h6>Extras (Booking addons)</h6>
            </div>

            @foreach ($car->extras as $index => $extra)
                <div class="row mt-2">
                    <div class="col-5">
                        <input disabled class="form-control  form-control-lg" type="text" value="{{ $extra['title'] }}" placeholder="Title">

                    </div>
                    <div class="col-5">
                        <input value="{{ $extra['price'] }}" disabled class="form-control form-control-lg" placeholder="Price">

                    </div>
                    <div class="col-2">
                        <button wire:key="remove-{{ $index }}" class="btn btn-warning" wire:click="removeExtra({{ $index }})">Remove</button>
                    </div>
                </div>

            @endforeach
            <div class="row mt-2">
                <div class="col-6">
                    <input class="form-control  form-control-lg" type="text" wire:model="extras.title" placeholder="Title">
                    @error("extras.title") <span class="error">This title is required</span> @enderror

                </div>
                <div class="col-6">
                    <input class="form-control form-control-lg" type="number" wire:model="extras.price" placeholder="Price">
                    @error("extras.price") <span class="error">This price is required</span> @enderror

                </div>
            </div>

            <div class="form-group mt-3">
                <button type="button" wire:click="addExtras" class="btn btn-lg btn-success">Save</button>
            </div>
        </div>
    @endif
    @if($step == 8)
        <div class="row mt-3">
            <div class="col-12 mb-2">
                <div class="form-group">
                    <label class="form-label" for="requirements">Booking requirements (separate with comma)</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control form-control-lg" id="requirements" wire:model="requirements" placeholder="Enter requirements">
                    </div>
                </div>
            </div>

            <div class="col-12 mb-2">
                <div class="form-group">
                    <label class="form-label" for="security_deposit">Security Deposit Message</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control form-control-lg" id="security_deposit" wire:model="security_deposit" placeholder="Enter security_deposit"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-2">
                <div class="form-group">
                    <label class="form-label" for="damage_excess">Damage Excess info</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control form-control-lg" id="damage_excess" wire:model="damage_excess" placeholder="Enter damage excess"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-2">
                <div class="form-group">
                    <label class="form-label" for="mileage_text">Mileage text info</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control form-control-lg" id="mileage_text" wire:model="mileage_text" placeholder="Enter mileage text"></textarea>
                    </div>
                </div>
            </div>

        </div>
    @endif


    <div class="row justify-content-center-">
        <div class="col-4">
            <div class="form-group mt-3 w-100">
                <button  type="submit" class="btn btn-lg btn-primary  text-center">Next </button>
            </div>
        </div>

    </div>
</form>
