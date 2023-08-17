<div class="col-xxl-8 col-xl-8 col-lg-8">
    <div class="alert alert-success alert-dismissible mb-4">
        <p class="text-heading">What if my plans change?</p>
        <p>You’ll get a full refund if you cancel at least 48 hours before pick-up.</p>
    </div>

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

                        <div style="height: 50px"></div>


                    </div>

                </div>
            </div>

        </div>
        <div class="d-flex justify-content-between mt-3">
            <div class="">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="assets/img/icons/compony.png" alt="cars">
                    <div class="review_count">
                        7.7
                    </div>
                    <div class="review_text">
                        <p>Good</p>
                        <p>30 reviews</p>
                    </div>
                </div>
            </div>


            <div class="">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="assets/img/icons/info.png" class="mx-3" alt="cars">
                    <p class="text-primary">Important info</p>
                </div>
            </div>
        </div>


    </div>


    <div class="car__driverdetails mb__40">
        <h5 class="dtext border__bottom pb__24">
            Main driver's details
        </h5>
        <p>As they appear on driving license</p>
        <form method="post" wire:submit="checkout" class="signup__form pt__40">

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
        <div class="row g-4 justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="fname">First Name</label>
                        <input wire:model="first_name" class="form-control form-control-lg" type="text"  id="fname" placeholder="Enter First Name">
                    </div>
                    @error('first_name')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="last">Last Name</label>
                        <input wire:model="last_name" class="form-control form-control-lg"  type ="text" id="last"  placeholder="Enter Last Name">
                    </div>
                    @error('last_name')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="phone">Contact Number</label>
                        <input wire:model="phone" class="form-control form-control-lg"  type="text" id="phone" placeholder="Enter Phone Number">
                    </div>
                    @error('phone')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label>Country</label>
                        <select wire:model="country" class="form-control form-control-lg" >
                            @foreach($countries as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('country')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="address">Address</label>
                        <input wire:model="address" class="form-control form-control-lg"  type="text" id="address" placeholder="Enter Address">
                    </div>
                    @error('address')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="address">City</label>
                        <input wire:model="city" class="form-control form-control-lg"  type="text" id="city" placeholder="Enter city">
                    </div>
                    @error('city')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <p for="address">is this business booking?</p>
                        <input wire:model="is_business" type="checkbox" name="is_business" value="yes"> yes
                        <input wire:model="is_business" type="checkbox" name="is_business" value="no"> No
                    </div>
                </div>


            </div>

            @guest()
            <div class="row mt-5">
                <div class="col-12 mb-3">
                    <p class="text-heading">Create an account</p>
                    <p>enter email and password to create {{ settings('site_name') }} account</p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="email">Email address</label>
                        <input  class="form-control form-control-lg" wire:model="email" type="email" id="email" placeholder="Enter Email">
                    </div>
                    @error('email')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="last">Password</label>
                        <input class="form-control form-control-lg"  wire:model="password" type="password" id="last" name="password" placeholder="Enter password">
                    </div>
                    @error('password')
                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
            </div>
            @endguest

            <div class="row">
                <div class="pt-5">
                    <div class="d-flex justify-content-between">
                        <p class="text-heading">Ready for some money-saving ideas?</p>
                    </div>
                    <div class="mt-3">
                        <p>
                            We can send you discounts and other car rental offers,
                            saving you even more money in the future.
                        </p>

                        <p class="mt-2">
                            <input type="checkbox" name="money_idea">
                            No thanks, count me out.
                        </p>
                        <p class="mt-2">
                            Our <a href="/privacy">Privacy Statement</a> tells you how to Subscribe .
                            It also explains how we use and protect your personal information.
                        </p>
                    </div>

                    <div class="mt-3">
                        <p class="text-heading">Terms and conditions</p>
                        <p>
                            By clicking ‘Book now’, you are confirming that you have read,
                            understood and accepted our Terms of service,
                            <a href="/policy"> Policy Terms </a> and the Drivalia rental terms.
                        </p>
                    </div>
                </div>
            </div>


            <div class="justify-content-end d-flex mt-3">
                <button type="submit" class="cmn__btn">
                                               <span>
                                                 Book now
                                               </span>

                </button>

            </div>

        </form>
    </div>





{{--    </form>--}}




</div>
