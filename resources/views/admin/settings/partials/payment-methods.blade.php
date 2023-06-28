<div class="card-inner pt-0">
    <h4 class="title nk-block-title">Payment methods </h4>
    <p>Configure your payment methods here.</p>

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

            <input name="active_setting" value="payment-methods" type="hidden" />

        @foreach(config('app.payment_methods') as $item)
            <div class="col-md-6 mt-3 border-1 border-info">
                <h5 class="title -nk-block-title text-capitalize">{{ $item }} setup

                </h5>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" {{ in_array($item, $active_methods) ? 'checked' : '' }} name="active_methods[]" value="{{ $item }}" class="custom-control-input" id="{{ $item }}-enable">
                                            <label class="custom-control-label" for="{{ $item }}-enable">Enable method</label>
                </div>
                <div class="row mt-2">


                    @include('admin.partials.form.text', ['value' => env(strtoupper($item).'_PUBLIC_KEY'), 'colSize' => 'col-md-12', 'fieldName' => strtoupper($item).'_PUBLIC_KEY','title' => 'PUBLIC KEY'])
                    @include('admin.partials.form.text', ['value' => env(strtoupper($item).'_SECRET_KEY'), 'colSize' => 'col-md-12 mt-4', 'fieldName' => strtoupper($item).'_SECRET_KEY','title' => 'SECRET KEY'])

                </div>
            </div>

            @endforeach

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
