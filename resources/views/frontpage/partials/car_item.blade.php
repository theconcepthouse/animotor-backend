<div class="carferrari__item mb__30 car_item d-flex-  bgwhite p-3 {{ isset($is_highlighted) && $is_highlighted ? 'highlighted-car' : '' }}" style="{{ isset($is_highlighted) && $is_highlighted ? 'border: 2px solid #007bff; box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);' : '' }}">
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

                           @if($car->mileage < 1)
                               Unlimited Mileage
                           @else
                               {{ $car->mileage }} miles per rental
                           @endif
                      </p>
                   </div>


                   <div class="col-6 mt-3">
                       <p>Price for {{ $days }} day(s)</p>
                       <p class="mt-2 text-title">{{ amt($car->price_per_day * $days) }}</p>
                   </div>

                   <div class="col-6 mt-3">
                       <p class="text-primary text-truncate"><a href="">{{ $car?->pick_up_location ?? 'Pick-up Not set' }}</a></p>
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
                        0.0
                    </div>
                    <div class="review_text">
                        <p>Good</p>
                        <p>No review yet</p>
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
                <a href="#" class=" text-bold text-primary" data-bs-toggle="modal" data-bs-target="#importantInfoModal{{ $car->id }}">
                    <img src="assets/img/icons/info.png" class="me-3-" alt="cars" /> Important info
                </a>
            </div>

            <div>
                <a href="#" class="text-bold text-primary" data-bs-toggle="modal" data-bs-target="#emailQuoteModal{{ $car->id }}">
                    <img src="assets/img/icons/email.png" class="me-2" alt="cars">
                    Email quote
                </a>
            </div>
        </div>


    </div>


</div>




{{--Important text modal--}}
<div class="modal fade" id="importantInfoModal{{ $car->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Important Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($car->important_text)
                    {!! $car->important_text !!}
                @else
                    <p>No important information available for this car.</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{--Email Quote modal--}}
<div class="modal fade" id="emailQuoteModal{{ $car->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Email Quote</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('send_quote') }}" method="POST">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car->id }}">
                <input type="hidden" name="days" value="{{ $days }}">

                <div class="modal-body">
                    <div class="car-details mb-4">
                        <h5>{{ $car->title }} or similar car</h5>
                        <div class="row">
                            <div class="col-6">
                                <p><strong>Make:</strong> {{ $car->make }}</p>
                                <p><strong>Model:</strong> {{ $car->model }}</p>
                                <p><strong>Type:</strong> {{ $car->type }}</p>
                                <p><strong>Seats:</strong> {{ $car->seats }}</p>
                            </div>
                            <div class="col-6">
                                <p><strong>Gear:</strong> {{ $car->gear }}</p>
                                <p><strong>Price per day:</strong> {{ amt($car->price_per_day) }}</p>
                                <p><strong>Total for {{ $days }} day(s):</strong> {{ amt($car->price_per_day * $days) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="emailInput{{ $car->id }}" class="form-label">Your Email Address</label>
                        <input type="email" class="form-control" id="emailInput{{ $car->id }}" name="email" placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="modal-footer flex-column align-items-stretch">
                    <button type="submit" class="btn btn-primary">Send Quote</button>
                    <p class="mt-2 small text-muted">
                        We'll only use this to send you your quote - no spam. Our Privacy Statement explains how we use and protect your personal information.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
