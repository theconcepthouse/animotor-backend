<div class="col-xl-4 col-lg-4">
    <div class="hotel__confirm__invocie bg-primary car__confirmdetails__right">
        <p class="text-heading">Pick-up and drop-off</p>
        <div class="carferrari__item flex-wrap mt-3 d-flex align-items-center-">
            <img style="height: 100%" src="/assets/img/icons/dot_v.png" />
            <div class="carferrari__content">
                <p class="m2">{{ request()->query('pick_up_date').', '.request()->query('pick_up_time') }}</p>
                <p class="mt-1">{{ request()->query('pick_up_location') }}</p>
                <p class="mt-2"><a href="">View pick-up instructions</a> </p>

                <p class="mt-2">{{ request()->query('drop_off_date').', '.request()->query('drop_off_time') }}</p>
                <p class="mt-1">{{ request()->query('drop_off_location') }}</p>
                <p class="mt-2"><a href="">View Drop-off instructions</a> </p>
            </div>
        </div>

    </div>
    <div class="hotel__confirm__invocie bg-primary mt-4 car__confirmdetails__right">
        <p class="text-heading">Car price breakdown</p>
        <div class="carferrari__item flex-wrap mt-3 align-items-center-">
            <div class="carferrari__content">
                <div class="d-flex justify-content-between">
                    <p class="m2">Car hire charge</p>
                    <p class="">{{ amt($car->price_per_day) }}</p>
                </div>

                <div class="d-flex mt-2 justify-content-between">
                    <p class="m2">Price for {{ request()->query('booking_day') }}days</p>
                    <p class="text-heading">{{ amt(request()->query('booking_day') * $car->price_per_day) }}</p>
                </div>


            </div>
        </div>

    </div>
    <div class="hotel__confirm__invocie bg-primary mt-4 car__confirmdetails__right">
        <p class="text-heading mt-2">This car is costing you just {{ amt(request()->query('booking_day') * $car->price_per_day) }} - a real bargain...</p>

    </div>
</div>
