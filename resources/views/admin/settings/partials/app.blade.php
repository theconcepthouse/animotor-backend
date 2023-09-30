<div class="card-inner pt-0">
    <h4 class="title nk-block-title">App setting</h4>
    <p>Configure the app settings here.</p>

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

        <div class="row g-3 align-center-">

            <div class="col-md-6">
                <fiv class="row">

                    <input name="active_setting" value="app" type="hidden" />

                    @include('admin.partials.form.select_array', ['attributes' => 'required', 'value' => settings('otp_provider','firebase'), 'colSize' => 'col-md-12', 'fieldName' => 'otp_provider','title' => 'OTP Provider (disabled for testing)', 'options' => isset($otp_providers) ? $otp_providers : []])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('site_name'), 'colSize' => 'col-md-12 mt-3', 'fieldName' => 'site_name','title' => 'Site Name'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('site_logan'), 'colSize' => 'col-md-12 mt-3', 'fieldName' => 'site_logan','title' => 'Site Slogan'])
                    @include('admin.partials.form.text', ['colSize' => 'col-md-12 mt-3', 'value' => settings('contact_email'), 'fieldName' => 'contact_email','title' => 'Contact Email'])
                    @include('admin.partials.form.text', ['colSize' => 'col-md-12 mt-3', 'value' => settings('contact_phone'), 'fieldName' => 'contact_phone','title' => 'Contact Phone'])

                    @include('admin.partials.form.textarea', ['colSize' => 'col-md-12 mt-3 mb-3', 'value' => settings('site_description'), 'fieldName' => 'site_description','title' => 'Site Description'])

                    <h4 class="title nk-block-title">App Custom Messages</h4>
                    <p>Configure app custom messages here.</p>

                    @include('admin.partials.form.text', ['colSize' => 'col-md-12 mt-3', 'value' => settings('unsupported_region_msg', config('app.messages.unsupported_region_msg')), 'fieldName' => 'unsupported_region_msg','title' => 'Unsupported region'])


                </fiv>
            </div>

            <div class="col-md-6">
                <fiv class="row">

                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('term_url'), 'colSize' => 'col-md-12', 'fieldName' => 'term_url','title' => 'Terms & condition link'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('privacy_url'), 'colSize' => 'col-md-12 mt-3', 'fieldName' => 'privacy_url','title' => 'Privacy link'])
                    @include('admin.partials.form.text', ['colSize' => 'col-md-12 mt-3', 'value' => settings('about_url'), 'fieldName' => 'about_url','title' => 'About us link'])
                    @include('admin.partials.form.text', ['colSize' => 'col-md-12 mt-3', 'value' => settings('change_password_url'), 'fieldName' => 'change_password_url','title' => 'Change Password link'])
                    @include('admin.partials.form.text', ['colSize' => 'col-md-12 mt-3', 'value' => settings('faqs_url'), 'fieldName' => 'faqs_url','title' => 'Faqs link'])

                    @include('admin.partials.image-upload',['field' => 'app_logo', 'colSize' => 'col-12 mt-3',  'image' => settings('app_logo'), 'id' => 'app_logo','title' => 'In app logo'])

                </fiv>
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
