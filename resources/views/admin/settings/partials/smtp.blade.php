<div class="card-inner pt-0">
    <h4 class="title nk-block-title">SMTP setting </h4>
    <p>To enable sending email please setup smtp.</p>

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

                    <input name="active_setting" value="smtp" type="hidden" />

                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => env('MAIL_MAILER','smtp'), 'colSize' => 'col-md-12', 'fieldName' => 'MAIL_MAILER','title' => 'MAILER (smtp)'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => env('MAIL_HOST'), 'colSize' => 'col-md-12 mt-4', 'fieldName' => 'MAIL_HOST','title' => 'MAIL_HOST'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12 mt-4', 'type' => 'number', 'value' => env('MAIL_PORT'), 'fieldName' => 'MAIL_PORT','title' => 'MAIL_PORT'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12 mt-4', 'value' => env('MAIL_USERNAME'), 'fieldName' => 'MAIL_USERNAME','title' => 'MAIL_USERNAME'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12 mt-4', 'value' => env('MAIL_PASSWORD'), 'fieldName' => 'MAIL_PASSWORD','title' => 'MAIL_PASSWORD (dont use symbols)'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12 mt-4', 'value' => env('MAIL_ENCRYPTION'), 'fieldName' => 'MAIL_ENCRYPTION','title' => 'MAIL_ENCRYPTION'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12 mt-4', 'value' => env('MAIL_FROM_ADDRESS'), 'fieldName' => 'MAIL_FROM_ADDRESS','title' => 'MAIL_FROM_ADDRESS'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12 mt-4', 'value' => env('MAIL_FROM_NAME'), 'fieldName' => 'MAIL_FROM_NAME','title' => 'MAIL_FROM_NAME'])


                </fiv>
            </div>

            <div class="col-md-6">

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
