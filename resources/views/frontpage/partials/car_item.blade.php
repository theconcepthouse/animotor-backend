<div class="carferrari__item mb__30 car_item d-flex-  bgwhite p-3">
   <div class="row- d-flex p__10 align-items-center car_section">
       <a href="#0" class="thumb">
           <img src="assets/img/cars/big_car.png" alt="cars">
       </a>
       <div class="carferrari__content">
           <div class="d-flex- carferari__box justify-content-between">

               <div class="row">
                   <div class="col-12">
                       <p><span class="text-title">Fiat 500 </span>or similar car</p>
                   </div>

                   <div class="col-6 mt-2">
                       <p><img src="/assets/img/icons/profile.png" />
                           4 seats </p>
                   </div>

                   <div class="col-6 mt-2">
                       <p><img src="/assets/img/icons/gear.png" />
                           Manual</p>
                   </div>

                   <div class="col-6 mt-2">
                       <p><img src="/assets/img/icons/bag.png" />
                           1 large bag</p>
                   </div>

                   <div class="col-6 mt-2">
                       <p><img src="/assets/img/icons/signpost.png" />
                           300 miles per rental</p>
                   </div>

                   <div class="col-6 mt-3">
                       <p class="text-primary">Heathrow Airport</p>
                       <p class="mt-2">Shuttle Bus</p>
                   </div>


                   <div class="col-6 mt-3">
                       <p>Price for 3days</p>
                       <p class="mt-2 text-title">US$90.22</p>
                   </div>

                   <div class="col-6 mt-4">
                       <a href="{{ url('deal') }}?{{ http_build_query(['car_id' => $car->id] + request()->query()) }}" class="cmn__btn">
                                               <span>
                                                 View deal
                                               </span>
                       </a>
                   </div>

                   <div class="col-6 mt-4">
                       <img src="/assets/img/icons/tick.png" /> Free cancellation
                   </div>


               </div>




               {{--            <div class="farrari__left">--}}
               {{--                <div class="d-flex mb__24 align-items-center gap-4">--}}
               {{--                    <a href="#0">--}}
               {{--                        <h5 class="dtext">--}}
               {{--                            Ferrari--}}
               {{--                        </h5>--}}
               {{--                    </a>--}}
               {{--                    <span class="suv fz-16 fw-400 lato d-block gratext">--}}
               {{--                              <span class="gratext">--}}
               {{--                                 Suv--}}
               {{--                              </span>--}}
               {{--                           </span>--}}
               {{--                </div>--}}
               {{--                <ul class="ferrari__list- d-flex">--}}
               {{--                    <li class="fz-16 fw-400 pratext lato">--}}
               {{--                        <i style="font-size: 15px; padding-top: 2px;" class="fa fa-user m-2"--}}
               {{--                           aria-hidden="true"></i>   Free Cancellation--}}
               {{--                    </li>--}}
               {{--                    <li class="fz-16 fw-400 pratext lato">--}}
               {{--                        <i style="font-size: 15px; padding-top: 2px;" class="fa fa-user m-2"--}}
               {{--                           aria-hidden="true"></i>  Price Guarantee--}}
               {{--                    </li>--}}
               {{--                </ul>--}}
               {{--                <ul class="ferrari__list- d-flex">--}}
               {{--                    <li class="fz-16 fw-400 pratext lato">--}}
               {{--                        <i style="font-size: 15px; padding-top: 2px;" class="fa fa-user m-2"--}}
               {{--                           aria-hidden="true"></i>   Free Cancellation--}}
               {{--                    </li>--}}
               {{--                    <li class="fz-16 fw-400 pratext lato">--}}
               {{--                        <i style="font-size: 15px; padding-top: 2px;" class="fa fa-user m-2"--}}
               {{--                           aria-hidden="true"></i>  Price Guarantee--}}
               {{--                    </li>--}}
               {{--                </ul>--}}
               {{--            </div>--}}



               {{--            <div class="farrari__carbook">--}}
               {{--                <div class="d-flex mb-1 pratext gap-3">--}}
               {{--                    <span class="gratext fz-16 lato">20% off</span>--}}
               {{--                    Per day--}}
               {{--                </div>--}}
               {{--                <div class="d-flex align-items-end mb__20 pratext gap-3">--}}
               {{--                    <span class="gratext fz-18 fw-500 lato">$312</span>--}}
               {{--                    <span class="troth3">--}}
               {{--                              $332--}}
               {{--                          </span>--}}
               {{--                </div>--}}
               {{--                <a href="car-confirm-details.html" class="cmn__btn">--}}
               {{--                           <span>--}}
               {{--                              Book Now--}}
               {{--                           </span>--}}
               {{--                </a>--}}
               {{--            </div>--}}
           </div>

           @section('hod')
               <ul class="ferrari__pats justify-content-between d-flex align-items-center">
                   <li class="d-grid justify-content-center text-center">
                        <span class="icon mb__10">
                           <img src="assets/img/svg/person.svg" alt="icon">
                        </span>
                       <span class="dtext fz-16 fw-400 lato d-block">
                           5 Pass
                        </span>
                   </li>
                   <li class="d-grid justify-content-center text-center">
                        <span class="icon mb__10">
                           <img src="assets/img/svg/lock.svg" alt="icon">
                        </span>
                       <span class="dtext fz-16 fw-400 lato d-block">
                           3 Big Bag
                        </span>
                   </li>
                   <li class="d-grid justify-content-center text-center">
                        <span class="icon mb__10">
                           <img src="assets/img/svg/setting.svg" alt="icon">
                        </span>
                       <span class="dtext fz-16 fw-400 lato d-block">
                          Auto
                        </span>
                   </li>
                   <li class="d-grid justify-content-center text-center">
                        <span class="icon mb__10">
                           <img src="assets/img/svg/speeder.svg" alt="icon">
                        </span>
                       <span class="dtext fz-16 fw-400 lato d-block">
                           100+ Km
                        </span>
                   </li>
                   <li class="d-grid justify-content-center text-center">
                        <span class="icon mb__10">
                           <img src="assets/img/svg/acs.svg" alt="icon">
                        </span>
                       <span class="dtext fz-16 fw-400 lato d-block">
                           A/C
                        </span>
                   </li>
               </ul>
           @endsection
       </div>

   </div>
    <div class="row no-gutters mt-3">
        <div class="col">
            <img src="assets/img/icons/compony.png" alt="cars">
        </div>
        <div class="col">
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
        <div class="col">
            <div class="d-flex align-items-center justify-content-center">
                <img src="assets/img/icons/info.png" class="mx-3" alt="cars">
                <p class="text-primary">Important info</p>
            </div>
        </div>
        <div class="col">
            <div class="d-flex align-items-center justify-content-center">
                <img src="assets/img/icons/route.png" class="mx-2" alt="cars">
                <p class="text-primary">Map</p>
            </div>
        </div>
        <div class="col">
            <div class="d-flex align-items-center justify-content-center">
                <img src="assets/img/icons/email.png" class="mx-2" alt="cars">
                <p class="text-primary">Email quote</p>
            </div>
        </div>
    </div>


</div>
