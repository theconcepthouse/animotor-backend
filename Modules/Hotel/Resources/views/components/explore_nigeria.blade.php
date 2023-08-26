
<!-- special booking slider here -->
<section class="hotel__bookslider1 pb__30">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-7 col-lg-7 wow fadeInDown">
                <div class="section__header pb__10">
                    <h5>
                        Explore hotels by cities
                    </h5>
                    <p>
                        These popular destinations have a lot to offer
                    </p>
                </div>
            </div>
        </div>
        <div class="row g-4 wow fadeInUp">
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="tab-content hotel_cities_listing" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-homeeurope" role="tabpanel" aria-labelledby="nav-home-tabeurope">
                        <div class="hurray__hotel1 owl-theme owl-carousel">
                            @foreach(\App\Models\Region::latest()->limit(10)->get() as $item)

                                <a href="{{ route('hotels') }}?region={{ $item->id }}" class="hurray__offer">
                                    <div class="thumb">
                                        <img src="{{ $item->image }}" alt="img">
                                    </div>

                                    <div class="px-1 py-3">
                                        <p class="text-capitalize">
                                            <strong>{{ $item->name }}</strong>

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

