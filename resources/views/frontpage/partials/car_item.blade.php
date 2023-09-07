<div class="carferrari__item mb__30 car_item d-flex-  bgwhite p-3">
   <div class="row d-flex p__10 align-items-center car_section">
       <div class="justify-content-center text-center thumb">
           <a href="{{ url('deal') }}?{{ http_build_query(['car_id' => $car->id] + request()->query()) }}" class=" align-items-center">
               <img style=" max-width: 350px" src="{{ $car->image }}" alt="{{ $car->title }}">
           </a>
       </div>

       <div class="carferrari__content">
           <div class="d-flex- carferari__box justify-content-between">

               <div class="row">
                   <div class="col-12">
                       <p class=" text-truncate"><span class="text-title">{{ $car->title  }} </span>or similar car</p>
                   </div>

                   <div class="col-6 mt-3">
                       <p><img src="/assets/img/icons/profile.png" />
                           {{ $car?->seats }} seats </p>
                   </div>

                   <div class="col-6 mt-3">
                       <p class="text-capitalize"><img src="/assets/img/icons/gear.png" />
                           {{ $car?->gear }}</p>
                   </div>

                   <div class="col-6 mt-3">
                       <p><img src="/assets/img/icons/bag.png" />
                           {{ $car?->bags ?? 'Not allowed' }}</p>
                   </div>

                   <div class="col-6 mt-3">
                       <p><img src="/assets/img/icons/signpost.png" />
                           {{ $car?->mileage }} miles per rental</p>
                   </div>


                   <div class="col-6 mt-3">
                       <p>Price for {{ $days }} day(s)</p>
                       <p class="mt-2 text-title">{{ amt($car->price_per_day * $days) }}</p>
                   </div>

                   <div class="col-6 mt-3">
                       <p class="text-primary text-truncate"><a href="">{{ $car?->pick_up_location ?? 'Pickup Not set' }}</a></p>
                       <p class="mt-2">{{ $car?->type }}</p>
                   </div>





               </div>


           </div>

       </div>

   </div>
    <div class="row mt-3" >
        <div  class="col-12 d-flex justify-content-between">
            <div class="">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="review_count">
                        7.7
                    </div>
                    <div class="review_text">
                        <p>Good</p>
                        <p>30 reviews</p>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ url('deal') }}?{{ http_build_query(['car_id' => $car->id] + request()->query()) }}" class="cmn__btn">
                                               <span>
                                                 View deal
                                               </span>
                </a>
            </div>
        </div>


        <div  class="col-12 d-flex justify-content-between mt-2">
            <div class="">
                <img style="max-height: 30px" src="{{ $car?->company?->logo ?? '/assets/img/icons/compony.png' }}" alt="{{ $car?->company->name }}">
            </div>
            <div>
                <p>
                    @if($car->cancellation_fee > 0)
                        Cancellation Fee : {{ $car->cancellation_fee }}
                    @else
                        <img src="/assets/img/icons/tick.png" /> Free cancellation
                    @endif
                </p>
            </div>
        </div>

        <div style="border-top: 1px solid rgba(167, 164, 156, 0.59);" class="col-12 d-flex justify-content-between mt-3 p-3">
            <div>
                <a href="#" class=" text-bold text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="assets/img/icons/info.png" class="me-3-" alt="cars" /> Important info
                </a>
            </div>

            <div>
                <p class="text-primary">
                    <img src="assets/img/icons/route.png" class="mx-2" alt="cars">
                    Map</p>
            </div>
        </div>

        <div class="col-12 mt-2">
            <div class="">

                <p class="text-primary">
                    <img src="assets/img/icons/email.png" class="me-2" alt="cars">
                    Email quote</p>
            </div>
        </div>

    </div>


</div>



