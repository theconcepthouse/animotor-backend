<div class="card-inner pt-0">
    <h4 class="title nk-block-title">General setting</h4>
    <p>Configure your application general settings here.</p>

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

        <div class="row g-3 align-center-">

            <div class="col-md-6">
                <fiv class="row">

                    <input name="active_setting" value="general" type="hidden" />

                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('site_name'), 'colSize' => 'col-md-12', 'fieldName' => 'site_name','title' => 'Site Name'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('site_logan'), 'colSize' => 'col-md-12 mt-3', 'fieldName' => 'site_logan','title' => 'Site Slogan'])
                    @include('admin.partials.form.text', ['colSize' => 'col-md-12 mt-3', 'value' => settings('contact_email'), 'fieldName' => 'contact_email','title' => 'Contact Email'])
                    @include('admin.partials.form.text', ['colSize' => 'col-md-12 mt-3', 'value' => settings('contact_phone'), 'fieldName' => 'contact_phone','title' => 'Contact Phone'])

                    @include('admin.partials.form.textarea', ['colSize' => 'col-md-12 mt-3 mb-3', 'value' => settings('site_description'), 'fieldName' => 'site_description','title' => 'Site Description'])

                    @include('admin.partials.form.text', ['colSize' => 'col-md-12 mt-3', 'value' => settings('live_chat_link'), 'fieldName' => 'live_chat_link','title' => 'Live Chat Link'])

                </fiv>
            </div>

            <div class="col-md-6">
                @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'colSize' => 'col-md-12 mb-2','value' => settings('country_id'), 'fieldName' => 'country_id','title' => 'Default country','options' => $countries])
                <a class="mt-2" href="{{ route('admin.countries.index') }}">{{ count($countries) }} active countries (enable supported countries only)</a>



                <div class="row">

                    @if(settings('currency_code'))
                        @include('admin.partials.form.text', ['attributes' => 'disabled', 'value' => settings('currency_symbol'), 'colSize' => 'col-md-6 mt-2', 'fieldName' => 'currency_id', 'title' => 'Currency Symbol'])
                        @include('admin.partials.form.text', ['attributes' => 'disabled', 'value' => settings('currency_code'), 'colSize' => 'col-md-6 mt-2', 'fieldName' => 'currency_id', 'title' => 'Currency Code'])

                    @endif

                    @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'colSize' => 'col-md-12 mb-2 mt-2','value' => settings('currency_id'), 'fieldName' => 'currency_id','title' => 'Default currency','options' => \App\Models\Currency::all()])



                    @include('admin.partials.image-upload',['field' => 'front_logo', 'colSize' => 'col-md-6 mb-2', 'image' => settings('front_logo'), 'id' => 'front_logo','title' => 'Frontend logo'])
                    @include('admin.partials.image-upload',['field' => 'front_sm_logo', 'colSize' => 'col-md-6 mb-2', 'image' => settings('front_sm_logo'), 'id' => 'front_sm_logo','title' => 'Frontend logo (sm)'])

                    @include('admin.partials.image-upload',['field' => 'light_logo', 'colSize' => 'col-md-6 mb-2', 'image' => settings('light_logo'), 'id' => 'light_logo','title' => 'Light mode logo'])
                    @include('admin.partials.image-upload',['field' => 'dark_logo', 'colSize' => 'col-md-6 mb-2', 'image' => settings('dark_logo'), 'id' => 'dark_logo','title' => 'Dark mode logo'])
                    @include('admin.partials.image-upload',['field' => 'favicon',  'image' => settings('favicon'), 'id' => 'favicon','title' => 'Favicon'])

                </div>

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
