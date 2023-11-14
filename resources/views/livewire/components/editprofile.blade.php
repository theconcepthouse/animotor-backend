<div class="personal__infobody">

        <div class="personal__info__box">
            <div class="per__ittle d-flex align-items-center">
                <h5>
                    Edit Personal information
                </h5>
                <a href="{{ route('edit.profile') }}" class="edit d-flex align-items-center gap-2">
                        <span class="icon">
                           <img src="/assets/img/svg/edits.svg" alt="img">
                        </span>
                    <span class="fz-18 fw-600">
                           Edit
                        </span>
                </a>
            </div>

            <form method="post" wire:submit="submit" class="signup__form pt__40">

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
                <label for="address">City</label>
                <input wire:model="city" class="form-control form-control-lg"  type="text" id="city" placeholder="Enter city">
            </div>
            @error('city')
            <div class="error"><span class="text-danger">{{ $message }}</span></div>
            @enderror
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="input__grp">
                <label for="address">Address</label>
                <input wire:model="address" class="form-control form-control-lg"  type="text" id="address" placeholder="Enter Address">
            </div>
            @error('address')
            <div class="error"><span class="text-danger">{{ $message }}</span></div>
            @enderror
        </div>

                <div class="justify-content-end d-flex mt-3">
                    <button type="submit" class="cmn__btn">
                                               <span>
                                                 Update
                                               </span>

                    </button>

                </div>



    </div>
            </form>
        </div>


</div>

