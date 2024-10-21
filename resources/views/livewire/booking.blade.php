<div class="hotelbokking__categoris mt-3">
    <div class="container">

        @if($has_request)
            <div class="hotelbooking__categoris__wrap mt-5">
            <div class="row booking-info">
                <div class="col-md-4 col-sm-6 pickup-address">
                    <h6>Pick-up</h6>
                    <p>{{ $pick_up_location }}</p>
                    <span>Date &amp; time : {{ $pick_up_date }} : {{ $pick_up_time }}</span>
                </div>
                <div class="col-md-4 col-sm-6 drop-address">
                    <h6>Drop Off</h6>
                    <p>{{ $drop_off_location }}</p>
                    <span>Date &amp; time : {{ $drop_off_date }} : {{ $drop_off_time }}</span>
                </div>

                <div class="col-md-4 col-sm-6 d-flex justify-content-end align-items-center">


                        <button wire:click="toggleSearch" type="submit" class="cmn__btn">
                        <span>
                           Edit search
                        </span>
                        </button>


                 </div>
            </div>

        </div>
        @endif

        @if($show_booking)

                <div class="hotelbooking__categoris__wrap mt-3">

            <div class="dating__body">
                <h5 class="hoteltitle">
                    <strong>Book a car</strong>
                </h5>
{{--                @if($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
                <form method="post" wire:submit="save">
                    <div class="dating__body">
                        <div class="dating__body__box justify-content-center">


                            <div class="search-box dating__item">

                                <input placeholder="Pick-up location"
                                       autocomplete="off"
                                       type='text' wire:model.live="pick_up_location"  />

                                @error('pick_up_location')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror

                                <!-- Search result list -->
                                @if(count($this->pickup_locations) > 0)
                                    <ul>
                                        @foreach($this->pickup_locations as $item)


                                            <li wire:click="selectLocation('{{ $item['place_id'] }}', '{{ $item['description'] }}', 'pick_up')">
                                                {{ $item['description'] }}
                                            </li>

{{--                                            <li id="{{ $item->id }}" wire:click="setLocation('{{ 'pick_up' }}', '{{ $item->id }}', '{{ $item->name }}')">{{ $item->name}}</li>--}}

                                        @endforeach
                                    </ul>
                                @endif


                            </div>

                            <div class="search-box dating__item">
                                <input placeholder="Drop-off location" type='text' wire:model.live="drop_off_location"  />


                                @error('drop_off_location')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror


                                <!-- Search result list -->
                                @if(count($this->drop_off_locations) > 0)
                                    <ul >
                                        @foreach($this->drop_off_locations as $item)

                                            <li wire:click="selectLocation('{{ $item['place_id'] }}', '{{ $item['description'] }}', 'drop_off')">
                                            {{ $item['description'] }}
                                            </li>

{{--                                            <li id="{{ $item->id }}" wire:click="setLocation('{{ 'drop_off' }}', '{{ $item->id }}','{{ $item->name }}')">{{ $item->name}}</li>--}}

                                        @endforeach
                                    </ul>
                                @endif
                            </div>


                        </div>


                        <div class="dating__body__box justify-content-center mt-4">

                            <div class="dating__item dating__hidden-">
                                <div class="input-group- date-input-container">
                                    <input  wire:model.live="pick_up_date" class="form-control date- date-input" type="date" placeholder="Pick-up date" />
                                    <span class="date-placeholder">Pick-up date</span>

                                    @error('pick_up_date')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="dating__item select__border">
                                <select class="nice-select" wire:model="pick_up_time" >
                                    @foreach(listTime() as $time)
                                        <option value="{{ $time }}">
                                            {{ $time }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pick_up_time')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>

                            <div class="dating__item dating__hidden-">
                                <div id="datepicker2-" class="input-group- date-input-container">
                                    <input  wire:model="drop_off_date" class="form-control date-input" type="date" placeholder="Drop-off date" />
                                    <span class="date-placeholder">Drop-off date</span>

                                    @error('drop_off_date')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="dating__item select__border" >
                                <select class="nice-select" wire:model="drop_off_time">

                                    @foreach(listTime() as $time)
                                        <option value="{{ $time }}">
                                            {{ $time }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="dating__item">
                                <button type="submit" class="cmn__btn">
                        <span>
                           Search Cars
                        </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="boock__check mt__30">
                        <input class="form-check-input" type="checkbox" value="" id="bcheckbok">
                        <label class="form-check-label" for="bcheckbok">
                            Driver aged between 30 - 65?
                        </label>
                    </div>
                </form>
            </div>

        </div>
        @endif
    </div>
</div>
