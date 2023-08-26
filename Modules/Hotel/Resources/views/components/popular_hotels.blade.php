
<!-- special booking slider here -->
<section class="hotel__bookslider1 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                <div class="section__header pb__20">
                    <h5>
                        Popular hotels for your stay
                    </h5>
                </div>
            </div>
        </div>
        <div class="row g-4 wow fadeInUp">
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="tab-content hotel_cities_listing" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-homeeurope" role="tabpanel" aria-labelledby="nav-home-tabeurope">
                        <div class="hurray__hotel1 owl-theme owl-carousel">
                            @foreach(\Modules\Hotel\Entities\Hotel::latest()->limit(10)->get() as $item)
                            <a href="{{ route('hotel.show', $item->id) }}" class="hurray__offer">
                                <div class="thumb">
                                    <img src="{{ $item->featured_image_thumb }}" alt="img">
                                </div>

                                <div class="px-1 py-3">
                                    <p class="text-capitalize">
                                        <strong>{{ $item->title }}</strong>
                                        <br/>
                                        {{ $item->region?->name }}
                                    </p>
                                </div>


                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- special booking slider End -->


<!-- special booking slider here -->
<section class="hotel__bookslider1 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                <div class="section__header pb__20">
                    <h5>
                        Popular hotels for your stay
                    </h5>
                </div>
            </div>
        </div>
        <div class="row g-4 wow fadeInUp">
            <div class="col-xxl-12 col-xl-12 col-lg-12">

                <div class="blog__grid__leftwrapper hotel_listing">
                    <div class="blog__related__wrapper owl-theme owl-carousel">
                        @foreach(\Modules\Hotel\Entities\Hotel::latest()->limit(10)->get() as $item)

                        <div class="bits__hotel d-grid align-items-center gap-3">
                            <div class="thumb thumb2">
                                <a href="{{ route('hotel.show', $item->id) }}">
                                    <img  src="{{ $item->featured_image_thumb }}" class="w-100 hotel_image" alt="img">
                                </a>
                            </div>
                            <div class="content content__space">
                                <div class="title gap-3 d-flex justify-content-between mb__10">
                                    <p class="text-capitalize">
                                        {{ $item->title }}
                                    </p>
                                    <span class="rating fz-16 fw-400 lato dtext d-flex align-items-center gap-2">
                        <img src="/assets/img/svg/star.svg" alt="img">
                        4.6
                     </span>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1">
                     <span class="dubay mb__15 gap-2 d-flex align-items-center fz-16 fw-400 lato dtext">
                        <img src="/assets/img/svg/mlocation.svg" alt="svg">
                        {{ $item->region?->name }}
                     </span>
                                    <ul class="bitast__icon mb__15 d-flex align-items-center gap-2">
                                        <li class="p__5">
                                            <img src="assets/img/svg/coffee.svg" alt="img">
                                        </li>
                                        <li class="p__5">
                                            <img src="assets/img/svg/swing.svg" alt="img">
                                        </li>
                                        <li class="p__5">
                                            <img src="assets/img/svg/facilities-bussen.svg" alt="img">
                                        </li>
                                        <li class="p__5">
                                            <img src="assets/img/svg/wifis.svg" alt="img">
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- special booking slider End -->

