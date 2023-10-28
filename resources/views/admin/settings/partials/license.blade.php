<div class="card-inner pt-0">
    <h5 class="title nk-block-title">Application Key setting</h5>

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

                    <p>Application config</p>

                    <input name="active_setting" value="license" type="hidden" />

                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => env('APPLICATION_KEY'), 'colSize' => 'col-md-12', 'fieldName' => 'APPLICATION_KEY','title' => 'APPLICATION KEY'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => env('SOFTWARE_ID'), 'colSize' => 'col-md-12 mt-4', 'fieldName' => 'SOFTWARE_ID','title' => 'Name / Organisation'])

                    <div class="mt-3"></div>


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
