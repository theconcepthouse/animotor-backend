<div class="card-inner pt-0">

    <h4 class="mt-3 mb-4">Set nav bar style</h4>

    <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            <br/>
        @endif

        <input name="active_setting" value="nav" type="hidden" />
        <input name="type" value="theme" type="hidden" />

        <div class="row g-3 align-center-">

                    <div class="radio-input-form nav">
                        <div class="col-md-12">
                            <label>
                                <input {{ settings('nav_style') == 'nav_fixed' ? 'checked' : '' }} type="radio" name="nav_style" value="nav_fixed" />
                                <img src="{{ asset('admin/assets/nav_fixed.png') }}" alt="nav_fixed" data-value="nav_fixed" />
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label>
                                <input type="radio"  {{ settings('nav_style') == 'nav_inline' ? 'checked' : '' }} name="nav_style" value="nav_inline" />
                                <img src="{{ asset('admin/assets/nav_inline.png') }}" alt="nav_fixed" data-value="nav_inline" />
                            </label>
                        </div>


                        <!-- Add more images and radio inputs as needed -->
                    </div>


        </div>

        <div class="row g-3">
            <div class="col-lg-7">
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

