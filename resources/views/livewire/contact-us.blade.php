<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-8">
            <form method="post" wire:submit="save" class="signup__form">
                <div class="row">
                <div class="mt-3 col-md-4">
                    <div class="input__grp">
                        <label for="first_name">First Name </label>
                        <div class="form-group mt-1">
                            <input required class="form-control" wire:model="first_name" name="first_name" type="text" id="first_name" placeholder="First Name">
                            @error('first_name')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-md-4">
                    <div class="input__grp">
                        <label for="last_name">Last Name </label>
                        <div class="form-group mt-1">
                            <input wire:model="last_name" required class="form-control" type="text" id="last_name" placeholder="Last Name">

                            @error('last_name')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="mt-3 col-md-4">
                    <div class="input__grp">
                        <label for="email">Email Address </label>
                        <div class="form-group mt-1">
                            <input required wire:model="email" class="form-control" value="" name="email" type="email" id="email" placeholder="Email Address">

                            @error('email')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="col-md-12 mt-3">
                    <div class="input__grp">
                        <label for="actions_taken">Your message</label>
                        <div class="form-group mt-1">
                            <textarea wire:model="message" rows="6" required class="form-control" name="message" type="text" id="message" placeholder="message"></textarea>

                            @error('message')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">Submit</button>
                    </div>
                </div>

            </div>
            </form>
        </div>


    </div>
</div>
