<div class="row">

    <div class="col-6">
        <div class="row  gy-3">
            @include('admin.partials.form.text', ['attributes' => 'required', 'value' => $car?->title, 'colSize' => 'col-md-12', 'fieldName' => 'title','title' => 'Car title'])
            @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'value' => $car?->type, 'option_name' => 'name', 'colSize' => 'col-md-12', 'fieldName' => 'type','title' => 'Car Type','options' => $car_types])
            @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'value' => $car?->make, 'option_name' => 'name', 'colSize' => 'col-md-12', 'fieldName' => 'make','title' => 'Car make','options' => $car_makes])
            @include('admin.partials.form.select_w_object', ['attributes' => 'required','value' => $car?->model, 'colSize' => 'col-md-12', 'fieldName' => 'model','title' => 'Car model','options' => $car_models])
            @include('admin.partials.form.select_array', [ 'colSize' => 'col-md-12', 'fieldName' => 'gear', 'value' => $car?->gear, 'title' => 'Gear type', 'options' => ['Automatic','Manual']])

            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12', 'value' => $car?->color, 'fieldName' => 'color','title' => 'Car Color'])
            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'colSize' => 'col-md-12', 'value' => $car?->year, 'fieldName' => 'year','title' => 'Car Year'])

            @include('admin.partials.form.text', ['attributes' => 'required',  'colSize' => 'col-md-12', 'value' => $car?->vehicle_no, 'fieldName' => 'vehicle_no','title' => 'Car Number'])
            @include('admin.partials.form.text', [ 'colSize' => 'col-md-12', 'fieldName' => 'door', 'value' => $car?->door,'title' => 'Door count'])

        </div>
    </div>

    <div class="col-6">
        <div class="row  gy-3">

            @include('admin.partials.form.text', [ 'colSize' => 'col-md-12', 'fieldName' => 'youtube_link', 'value' => $car?->youtube_link,'title' => 'Youtube Link'])

            @include('admin.partials.image-upload',['field' => 'image','id' => 'car_image', 'colSize' => 'col-md-12', 'image' => $car?->image,'title' => 'Car Featured Image'])
            @include('admin.partials.image-m-upload',['field' => 'photos','id' => 'car_photos', 'colSize' => 'col-md-12', 'images' => $car?->photos_array, 'image' => $car?->photos,'title' => 'Car Other Images (select multiple images)'])



        </div>
    </div>
</div>

{{--<div class="row gy-3">--}}

{{--    <h5>Other car attributes</h5>--}}

{{--    @foreach($attributesList as $attribute)--}}
{{--        <div class="form-group">--}}
{{--            <label for="{{ $attribute['name'] }}">{{ $attribute['name'] }}</label>--}}
{{--            <input type="text" name="attributes[{{ $attribute['name'] }}]" id="{{ $attribute['name'] }}" class="form-control" value="{{ $car->attributes[$attribute['name']] ?? '' }}">--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}

