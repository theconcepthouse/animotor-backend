<div class="col-xl-4 col-lg-4">
    <div class="hotel__confirm__invocie bg-primary car__confirmdetails__right">
        <p class="text-heading">Pick-up and drop-off</p>
        <div class="carferrari__item flex-wrap mt-3 d-flex align-items-center-">
{{--            <img style="height: 100%" src="/assets/img/icons/dot_v.png" />--}}
            <div class="carferrari__content">
                <p class="m2">{{ request()->query('pick_up_date').', '.request()->query('pick_up_time') }}</p>
                <p class="mt-1">{{ request()->query('pick_up_location') }}</p>
                <p class="mt-2"><a href="#" data-bs-toggle="modal" data-bs-target="#pickup_instructions">View pick-up instructions</a> </p>

                <p class="mt-2">{{ request()->query('drop_off_date').', '.request()->query('drop_off_time') }}</p>
                <p class="mt-1">{{ request()->query('drop_off_location') }}</p>
                <p class="mt-2"><a href="#" data-bs-toggle="modal" data-bs-target="#dropoff_instructions">View Drop-off instructions</a> </p>
            </div>
        </div>

    </div>
    <div class="hotel__confirm__invocie bg-primary mt-4 car__confirmdetails__right">
        <p class="text-heading">Car price breakdown</p>
        <div class="carferrari__item flex-wrap mt-3 align-items-center-">
            <div class="carferrari__content">
                <div class="d-flex justify-content-between">
                    <p class="m2">Car hire charge per day</p>
                    <p class="">{{ amt($car->price_per_day) }}</p>
                </div>

                <div class="d-flex mt-2 justify-content-between">
                    <p class="m2">Price for {{ request()->query('booking_day') }}days</p>
                    <p class="text-heading_">{{ amt(request()->query('booking_day') * $car->price_per_day) }}</p>
                </div>

                @if(request()->get('book_type') == 'with_full_protection')
                <div class="d-flex mt-2 justify-content-between">
                    <p class="m2">Full protection fee </p>
                    <p class="text-heading_">{{ amt($car->insurance_fee ) }}</p>
                </div>
                @endif


                @if($car->tax)
                    <div class="d-flex mt-2 justify-content-between">
                        <p class="m2">Tax </p>
                        <p class="text-heading_">{{ amt($car->tax) }}</p>
                    </div>

                @endif



                @if($car->total)
                    <div class="d-flex mt-2 justify-content-between">
                        <p class="m2 text-heading">Total </p>
                        <p class="text-heading">{{ amt($car->total) }}</p>
                    </div>

                @endif



            </div>
        </div>

    </div>
    @if($car->total)
    <div class="hotel__confirm__invocie bg-primary mt-4 car__confirmdetails__right">
        <p class="text-heading mt-2">This car is costing you just {{ amt($car->total) }} - a real bargain...</p>

    </div>
    @endif
</div>


<div class="modal fade" id="pickup_instructions">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pickup instruction</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Accordion -->
                <p>
                    {!! $car->pickup_instruction !!}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="dropoff_instructions">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Drop-off instruction</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Accordion -->
                <p>
                    {!! $car->drop_off_instruction !!}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
