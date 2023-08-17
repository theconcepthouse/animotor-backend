<div class="card-inner pt-0">
    <h4 class="title nk-block-title">Home banner</h4>
    <p>Configure home banner here.</p>

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

                    <input name="active_setting" value="back" type="hidden" />

                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('home_banner_component','frontpage.component.banner_default'), 'colSize' => 'col-md-12 mt-3', 'fieldName' => 'home_banner_component','title' => 'Home Banner Component'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('home_banner_title'), 'colSize' => 'col-md-12 mt-3', 'fieldName' => 'home_banner_title','title' => 'Home Banner Title'])

                    @include('admin.partials.form.textarea', ['colSize' => 'col-md-12 mt-3 mb-3', 'value' => settings('home_banner_description'), 'fieldName' => 'home_banner_description','title' => 'Home Banner Description'])


                    @include('admin.partials.image-upload',['field' => 'home_banner_image', 'image' => settings('home_banner_image'), 'id' => 'home_banner_image','title' => 'Home banner image'])


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
