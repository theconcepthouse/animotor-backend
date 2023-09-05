<div class="card-inner pt-0">
    <h5 class="title nk-block-title">Firebase setting</h5>
    <p>Configure firebase and api keys settings here.</p>

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

            <div class="col-md-12">
                <div class="row">

                    <p>Firebase config</p>

                    <input name="active_setting" value="api" type="hidden" />

                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => env('FIREBASE_PROJECT_ID'), 'colSize' => 'col-md-12', 'fieldName' => 'FIREBASE_PROJECT_ID','title' => 'FIREBASE PROJECT ID'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => env('FIREBASE_API_KEY'), 'colSize' => 'col-md-12 mt-4', 'fieldName' => 'FIREBASE_API_KEY','title' => 'FIREBASE API KEY'])

                    <div class="mt-3"></div>


                </div>
            </div>
        </div>


        <div class="row g-3 align-center-">

            <div class="col-md-12 mt-4">
                <fiv class="row">

                    <h5 class="title nk-block-title">Map config</h5>
                    <p>Setup your map config here</p>
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => env('MAP_API_KEY',''), 'colSize' => 'col-md-12', 'fieldName' => 'MAP_API_KEY','title' => 'GOOGLE MAP API KEY'])

                </fiv>
            </div>

        </div>

        @if(settings('enable_sendchamp') == 'yes')
        <div class="row g-3 align-center-">

            <div class="col-md-12 mt-5">
                <fiv class="row">

                    <h5 class="title nk-block-title">Sendchamp Config</h5>
                    <p>Setup sendchamp settings</p>

                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => env('SENDCHAM_PUBLIC_KEY'), 'colSize' => 'col-md-6', 'fieldName' => 'SENDCHAM_PUBLIC_KEY','title' => 'Public Access Key'])
                    @include('admin.partials.form.text', [ 'value' => settings('sendcham_sender_name'), 'colSize' => 'col-md-6', 'fieldName' => 'sendcham_sender_name','title' => 'Sender name'])

                </fiv>
            </div>

        </div>
        @endif

        <div class="row g-3">
            <div class="col-lg-7">
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
