<div class="container">


    @if($total_cars < 1)
        <div class="hotelbooking__categoris__wrap mt-3">

        <div class="row booking-info">
            <div class="col-md-12 col-sm-12">
                <h5>No cars available</h5>
                <p>We’re sorry, but the companies we work with in {{ $location->name }} don’t have any cars available.</p>

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


        @if($total_cars > 0)
            <div class="row g-4 justify-content-center">
        <div class="col-xxl-3 col-xl-3 col-lg-3">
            <div class="common__filter__wrapper">
                <h5 class="filltertext borderb text-start pb__20 mb__20">
                    Filter
                </h5>


                <div class="search__item borderb pb__10 mb__20">
                    <div class="common__sidebar__head">
                        <button class="w-100 fw-400 lato dtext fz-24 d-flex align-items-center justify-content-between">
                            Price per day
                            <img src="assets/img/svg/dropdown.svg" alt="svg">
                        </button>
                    </div>


                    <div class="col-12 mt-2">
                        <input wire:model.live="priceRange" type="range" class="custom-range w-100" id="customRange1" min="{{ $min_price }}" max="{{ $max_price }}">

                        <p>PRICE : {{ amt($priceRange) }} - {{ amt($max_price) }}</p>

                    </div>

                </div>


                @foreach($filters as $filter => $items)
                    <div class="search__item borderb pb__10 mb__20">
                        <div class="common__sidebar__head">
                            <button class="w-100 fw-400 lato dtext fz-24 d-flex text-capitalize align-items-center justify-content-between">
                                {{ convertToWord($filter) }}
                                <img src="assets/img/svg/dropdown.svg" alt="svg">
                            </button>
                        </div>
                        <div class="common__sidebar__content">
                            <div class="common__typeproperty">
                                @foreach($items as $i)
                                <div class="type__radio mb__10 d-flex align-items-center justify-content-between">
                                    <div class="radio__left d-flex align-items-center gap-2">
                                        <input wire:key="{{ $filter }}_{{ $i }}" class="form-check-input" wire:model.live="selected_{{ $filter }}"
                                               type="checkbox" value="{{ $i }}" id="{{ $i }}">
                                        <label class="form-check-label" for="{{ $i }}">
                              <span class="fz-16 lato fw-400 dtext">
                                 {{ convertToWord($i) }}
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
{{--                <div class="col-xxl-9 col-xl-9 col-lg-9" style="position: relative; overflow: hidden;">--}}
                    <!-- Your content here -->

{{--                    <span wire:loading>--}}
{{--                        <div class="d-flex justify-content-end">--}}
{{--                            <div class="spinner-border text-primary" role="status">--}}
{{--                                <span class="sr-only">Loading...</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </span>--}}


            <section class="hotel__bookslider1 pb-5">

                @if($total_cars > 1)
                <div class="mb-4">
                    <h2 class="text-title">{{ $location->name }}: Over {{ $total_cars }} car(s) available in this location</h2>
                </div>
                @endif

                    @if($total_booking > 0)
                        <div class="alert alert-success alert-dismissible mb-4">
                            <p>In the last 24 hours, over {{ $total_booking }} customers have booked a car in this location</p>
                        </div>
                        @endif

                <div class="car_categories owl-theme owl-carousel">
                    @foreach($services as $item)
                        <div class="car_category_item text-center">
                        <img src="{{ $item->image }}" alt="img">
                        <p>{{ $item->name }}</p>
                    </div>
                    @endforeach
                </div>
            </section>

            @if(count($filteredCars) > 0)
            <div class="row">
                @foreach($filteredCars as $car)
                    <div class="col-sm-12 col-md-6">
                        @include('frontpage.partials.car_item',['car' => $car,'days' => $booking_day])
                    </div>
                @endforeach

                <div class="col-12 justify-content-center">
                    <div class="d-flex justify-content-center">
                        {{ $filteredCars->links() }}

                    </div>
                </div>
            </div>
            @else
                <div class="row booking-info">
                    <div class="col-md-12 col-sm-12">
                        <h5>No cars available</h5>
                        <p>We don’t have any cars available for the applied filter.</p>

                        <p class="mt-3">What can I do ?</p>
                        <p class="mt-3">You could try</p>
                        <ul class="ferrari__list d-flex- mx-3">
                            <li class="fz-16 fw-400 pratext lato mt-1">
                                Changing your filter options
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

            @endif

        </div>


    </div>
        @endif


        <div class="modal fade" id="exampleModal0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Important Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <div class="card card-bordered">
                           <div class="card-body">
                               <div id="accordion">
                                   <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingOne">
                                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                               Important Info
                                           </button>
                                       </h2>
                                       <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                           <div class="accordion-body">
                                               <!-- Accordion content here -->
                                               <div class="row">
                                                   <div class="col-4">
                                                       <p>

                                                       </p>
                                                   </div>
                                               </div>
                                            </div>
                                       </div>
                                   </div>
                                   <!-- Other accordion items go here -->
                               </div>
                           </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Title</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Accordion -->
                        <div id="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Accordion Item #1
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <!-- Accordion content here -->
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet animi architecto asperiores autem dolores doloribus, eius, esse laborum magnam maxime minus nihil obcaecati omnis possimus qui quibusdam tempora voluptatem.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet animi architecto asperiores autem dolores doloribus, eius, esse laborum magnam maxime minus nihil obcaecati omnis possimus qui quibusdam tempora voluptatem.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet animi architecto asperiores autem dolores doloribus, eius, esse laborum magnam maxime minus nihil obcaecati omnis possimus qui quibusdam tempora voluptatem.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet animi architecto asperiores autem dolores doloribus, eius, esse laborum magnam maxime minus nihil obcaecati omnis possimus qui quibusdam tempora voluptatem.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet animi architecto asperiores autem dolores doloribus, eius, esse laborum magnam maxime minus nihil obcaecati omnis possimus qui quibusdam tempora voluptatem.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet animi architecto asperiores autem dolores doloribus, eius, esse laborum magnam maxime minus nihil obcaecati omnis possimus qui quibusdam tempora voluptatem.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet animi architecto asperiores autem dolores doloribus, eius, esse laborum magnam maxime minus nihil obcaecati omnis possimus qui quibusdam tempora voluptatem.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Other accordion items go here -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

</div>
