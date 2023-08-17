<div class="container">


    @if(count($filteredCars) < 1)
        <div class="hotelbooking__categoris__wrap mt-3">

        <div class="row booking-info">
            <div class="col-md-12 col-sm-12">
                <h5>No cars available</h5>
                <p>We’re sorry, but the companies we work with in Nigeria don’t have any cars available.</p>

                <p class="mt-3">What can I do ?</p>
                <p class="mt-3">You could try</p>
                <ul class="ferrari__list d-flex- mx-3">
                    <li class="fz-16 fw-400 pratext lato mt-1">
                        Changing your pick-up time or date
                    </li>
                    <li class="fz-16 fw-400 pratext lato mt-1">
                        Changing your drop-off time or date
                    </li>
                    <li class="fz-16 fw-400 pratext lato mt-1">
                        Searching for a car in a nearby location
                    </li>
                </ul>

            </div>

        </div>

    </div>
    @endif

        @if(count($filteredCars) > 0)
            <div class="row g-4 justify-content-center">
        <div class="col-xxl-3 col-xl-3 col-lg-3">
            <div class="common__filter__wrapper">
                <h3 class="filltertext borderb text-start pb__20 mb__20">
                    Filter
                </h3>
                <div class="search__item borderb pb__10 mb__20">
                    {{ $loading }}
                    @if($loading)
                        <p>Loading</p>
                    @else
                        Not loading
                    @endif
                    <div class="common__sidebar__head">
                        <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                            Car Name
                            <img src="assets/img/svg/dropdown.svg" alt="svg">
                        </button>
                    </div>
                    <div class="common__sidebar__content">
                        <form action="#" class="d-flex align-items-center justify-content-between">
                            <input wire:model.live="search" type="text" placeholder="Search by Flight name">
                            <button class="search">
                                <i class="material-symbols-outlined">
                                    search
                                </i>
                            </button>
                        </form>
                    </div>
                </div>


                <div class="search__item borderb pb__10 mb__20">
                    <div class="common__sidebar__head">
                        <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                            Price per day
                            <img src="assets/img/svg/dropdown.svg" alt="svg">
                        </button>
                    </div>
                    <div class="common__sidebar__content">
                        <div class="range__barcustom">
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input mb__10">
                                <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                                <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                            </div>
                            <div class="price-input">
                                <div class="field">
                                    <span>$</span>
                                    <input type="number" class="input-min" value="2500">
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                    <span>$</span>
                                    <input type="number" class="input-max" value="7500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @foreach($filters as $filter => $items)
                    <div class="search__item borderb pb__10 mb__20">
                        <div class="common__sidebar__head">
                            <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                                {{ $filter }}
                                <img src="assets/img/svg/dropdown.svg" alt="svg">
                            </button>
                        </div>
                        <div class="common__sidebar__content">
                            <div class="common__typeproperty">
                                @foreach($items as $i)
                                <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                    <div class="radio__left d-flex align-items-center gap-2">
                                        <input class="form-check-input"

                                               wire:model.live="selectedFilters.{{ $filter }}.{{ $i }}"
                                               type="checkbox" id="{{ $i }}">
                                        <label class="form-check-label" for="{{ $i }}">
                              <span class="fz-16 lato fw-400 dtext">
                                 {{ $i }}
                              </span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                             </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>

        <div class="col-xxl-9 col-xl-9 col-lg-9">

            <section class="hotel__bookslider1 pb-5">

                <div class="mb-4">
                    <h2 class="text-title">London Heathrow Airport: 12 cars available</h2>
                </div>

                <div class="alert alert-success alert-dismissible mb-4">
                    <p>In the last 24 hours, over 20 customers have booked a car in this location</p>
                </div>

                <div class="car_categories owl-theme owl-carousel">
                    @foreach($services as $item)
                        <div class="car_category_item text-center">
                        <img src="{{ $item->image }}" alt="img">
                        <p>{{ $item->name }}</p>
                    </div>
                    @endforeach
                </div>
            </section>

        @foreach($filteredCars as $car)
                @include('frontpage.partials.car_item',['car' => $car])
            @endforeach

            <div class="carferrari__item mb__30 d-flex align-items-center bgwhite p__10">
                <a href="#0" class="thumb">
                    <img src="assets/img/cars/cadillac.jpg" alt="cars">
                </a>
                <div class="carferrari__content">
                    <div class="d-flex carferari__box justify-content-between">
                        <div class="farrari__left">
                            <div class="d-flex mb__24 align-items-center gap-4">
                                <a href="#0">
                                    <h5 class="dtext">
                                        Cadillac
                                    </h5>
                                </a>
                                <span class="suv fz-16 fw-400 lato d-block gratext">
                              <span class="gratext">
                                 Suv
                              </span>
                           </span>
                            </div>
                            <ul class="ferrari__list d-flex">
                                <li class="fz-16 fw-400 pratext lato">
                                    Free Cancellation
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Price Guarantee
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Instantly Confirmed
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Third Party Liability
                                </li>
                            </ul>
                        </div>
                        <div class="farrari__carbook">
                            <div class="d-flex mb-1 pratext gap-3">
                                <span class="gratext fz-16 lato">20% off</span>
                                Per day
                            </div>
                            <div class="d-flex align-items-end mb__20 pratext gap-3">
                                <span class="gratext fz-18 fw-500 lato">$312</span>
                                <span class="troth3">
                              $332
                          </span>
                            </div>
                            <a href="car-confirm-details.html" class="cmn__btn">
                           <span>
                              Book Now
                           </span>
                            </a>
                        </div>
                    </div>
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
                </div>
            </div>
            <div class="carferrari__item mb__30 d-flex align-items-center bgwhite p__10">
                <a href="#0" class="thumb">
                    <img src="assets/img/cars/chevrolet.jpg" alt="cars">
                </a>
                <div class="carferrari__content">
                    <div class="d-flex carferari__box justify-content-between">
                        <div class="farrari__left">
                            <div class="d-flex mb__24 align-items-center gap-4">
                                <a href="#0">
                                    <h5 class="dtext">
                                        Chevrolet
                                    </h5>
                                </a>
                                <span class="suv fz-16 fw-400 lato d-block gratext">
                              <span class="gratext">
                                 Suv
                              </span>
                           </span>
                            </div>
                            <ul class="ferrari__list d-flex">
                                <li class="fz-16 fw-400 pratext lato">
                                    Free Cancellation
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Price Guarantee
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Instantly Confirmed
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Third Party Liability
                                </li>
                            </ul>
                        </div>
                        <div class="farrari__carbook">
                            <div class="d-flex mb-1 pratext gap-3">
                                <span class="gratext fz-16 lato">20% off</span>
                                Per day
                            </div>
                            <div class="d-flex align-items-end mb__20 pratext gap-3">
                                <span class="gratext fz-18 fw-500 lato">$312</span>
                                <span class="troth3">
                              $332
                          </span>
                            </div>
                            <a href="car-confirm-details.html" class="cmn__btn">
                           <span>
                              Book Now
                           </span>
                            </a>
                        </div>
                    </div>
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
                </div>
            </div>
            <div class="carferrari__item mb__30 d-flex align-items-center bgwhite p__10">
                <a href="#0" class="thumb">
                    <img src="assets/img/cars/datsun.jpg" alt="cars">
                </a>
                <div class="carferrari__content">
                    <div class="d-flex carferari__box justify-content-between">
                        <div class="farrari__left">
                            <div class="d-flex mb__24 align-items-center gap-4">
                                <a href="#0">
                                    <h5 class="dtext">
                                        Datsun
                                    </h5>
                                </a>
                                <span class="suv fz-16 fw-400 lato d-block gratext">
                              <span class="gratext">
                                 Suv
                              </span>
                           </span>
                            </div>
                            <ul class="ferrari__list d-flex">
                                <li class="fz-16 fw-400 pratext lato">
                                    Free Cancellation
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Price Guarantee
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Instantly Confirmed
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Third Party Liability
                                </li>
                            </ul>
                        </div>
                        <div class="farrari__carbook">
                            <div class="d-flex mb-1 pratext gap-3">
                                <span class="gratext fz-16 lato">20% off</span>
                                Per day
                            </div>
                            <div class="d-flex align-items-end mb__20 pratext gap-3">
                                <span class="gratext fz-18 fw-500 lato">$312</span>
                                <span class="troth3">
                              $332
                          </span>
                            </div>
                            <a href="car-confirm-details.html" class="cmn__btn">
                           <span>
                              Book Now
                           </span>
                            </a>
                        </div>
                    </div>
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
                </div>
            </div>
            <div class="carferrari__item d-flex align-items-center bgwhite p__10">
                <a href="#0" class="thumb">
                    <img src="assets/img/cars/bmw.jpg" alt="cars">
                </a>
                <div class="carferrari__content">
                    <div class="d-flex carferari__box justify-content-between">
                        <div class="farrari__left">
                            <div class="d-flex mb__24 align-items-center gap-4">
                                <a href="#0">
                                    <h5 class="dtext">
                                        BMW Creta
                                    </h5>
                                </a>
                                <span class="suv fz-16 fw-400 lato d-block gratext">
                              <span class="gratext">
                                 Suv
                              </span>
                           </span>
                            </div>
                            <ul class="ferrari__list d-flex">
                                <li class="fz-16 fw-400 pratext lato">
                                    Free Cancellation
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Price Guarantee
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Instantly Confirmed
                                </li>
                                <li class="fz-16 fw-400 pratext lato">
                                    Third Party Liability
                                </li>
                            </ul>
                        </div>
                        <div class="farrari__carbook">
                            <div class="d-flex mb-1 pratext gap-3">
                                <span class="gratext fz-16 lato">20% off</span>
                                Per day
                            </div>
                            <div class="d-flex align-items-end mb__20 pratext gap-3">
                                <span class="gratext fz-18 fw-500 lato">$312</span>
                                <span class="troth3">
                              $332
                          </span>
                            </div>
                            <a href="car-confirm-details.html" class="cmn__btn">
                           <span>
                              Book Now
                           </span>
                            </a>
                        </div>
                    </div>
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
                </div>
            </div>
            <div class="pagination justify-content-center pt__40">
                <a href="javascript:void(0)">
                  <span>
                     <i class="material-symbols-outlined">
                     navigate_before
                  </i>
                  </span>
                </a>
                <a href="javascript:void(0)">
                    1
                </a>
                <a href="javascript:void(0)">
                    2
                </a>
                <a href="javascript:void(0)">
                    3
                </a>
                <a href="javascript:void(0)">
                    ....
                </a>
                <a href="javascript:void(0)">
                    30
                </a>
                <a href="javascript:void(0)">
                  <span>
                     <i class="material-symbols-outlined">
                     chevron_right
                     </i>
                  </span>
                </a>
            </div>
        </div>
    </div>
        @endif

</div>
