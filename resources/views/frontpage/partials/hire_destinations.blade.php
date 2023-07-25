<div class="container mt-5">

    <div class="section-heading" data-aos="fade-down">
        <h4 class="title">Popular car hire destinations</h4>
        <p class="description ">Explore more options to hire a car for cheap</p>
    </div>

    <div class="counter-group">
        <div class="row">
            @foreach([[],[],[],[],[],[],[],[],[]] as $item)
                <div class="col-lg-4 col-md-6 mt-3 col-12 d-flex" data-aos="fade-down">
                    <div class="count-group flex-fill">
                        <div class="customer-count d-flex align-items-center">
                            <div class="popular_hire">
                                <img style="height: 50px; width: 50px" src="/assets/img/gallery/gallery-01.jpg" alt>
                            </div>
                            <div class="count-content mx-2">
                                <p class="title">Phonex</p>
                                <p>Happy Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 text-center">
            <a href="" class="btn btn-primary">Load more</a>
        </div>
    </div>
</div>
