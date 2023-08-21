<div class="row">

    <div class="col-6">
        <div class="row  gy-3">
            @include('admin.partials.form.text', ['attributes' => 'required', 'value' => $car?->title, 'colSize' => 'col-md-12', 'fieldName' => 'title','title' => 'Car title'])
            @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'value' => $car?->type, 'option_name' => 'name', 'colSize' => 'col-md-12', 'fieldName' => 'type','title' => 'Car Type','options' => $car_types])
            @include('admin.partials.form.select_p_object', ['attributes' => 'required', 'value' => $car?->make, 'option_name' => 'name', 'colSize' => 'col-md-12', 'fieldName' => 'make','title' => 'Car make','options' => $car_makes])
            @include('admin.partials.form.select_p_object', ['attributes' => 'required','value' => $car?->model, 'colSize' => 'col-md-12', 'fieldName' => 'model','option_name' => 'name','title' => 'Car model','options' => $car_models])
            @include('admin.partials.form.select_array', [ 'colSize' => 'col-md-12', 'fieldName' => 'gear', 'value' => $car?->gear, 'title' => 'Gear type', 'options' => ['Automatic','Manual']])
            @include('admin.partials.form.select', [ 'colSize' => 'col-md-12', 'fieldName' => 'air_condition', 'value' => $car?->air_condition, 'title' => 'Has Air conditioner', 'options' => ['1' => 'Yes','0' => "No"]])

            @include('admin.partials.form.text', [ 'colSize' => 'col-md-12', 'value' => $car?->cancellation_fee ?? 0, 'fieldName' => 'cancellation_fee','title' => 'Cancellation Fee (0 for free cancellation)'])
            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12', 'value' => $car?->color, 'fieldName' => 'color','title' => 'Car Color'])
            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'colSize' => 'col-md-12', 'value' => $car?->year, 'fieldName' => 'year','title' => 'Car Year'])

            @include('admin.partials.form.text', ['attributes' => 'required',  'colSize' => 'col-md-12', 'value' => $car?->vehicle_no, 'fieldName' => 'vehicle_no','title' => 'Car Number'])
            @include('admin.partials.form.text', [ 'colSize' => 'col-md-12', 'type' => 'number', 'fieldName' => 'door', 'value' => $car?->door,'title' => 'Door count'])
            @include('admin.partials.form.text', [ 'colSize' => 'col-md-12', 'type' => 'number', 'fieldName' => 'seats', 'value' => $car?->seats,'title' => 'How many seats'])
            @include('admin.partials.form.text', [ 'colSize' => 'col-md-12', 'fieldName' => 'bags', 'value' => $car?->bags,'title' => 'Allowed bags'])

        </div>
    </div>

    <div class="col-6">
        <div class="row  gy-3">

            @include('admin.partials.form.text', ['attributes' => 'required', 'id' => 'autocomplete', 'colSize' => 'col-md-12', 'fieldName' => 'autocomplete', 'value' => $car?->pick_up_location,'title' => 'Pickup location'])


            <input type="hidden" id="origin" value="{{ $car?->pick_up_location }}" name="pick_up_location" />
            <input type="hidden" id="latitude" value="{{ $car?->map_lat }}" name="map_lat" />
            <input type="hidden" id="longitude" value="{{ $car?->map_lng }}" name="map_lng" />

            <img src="{{ asset('admin/assets/images/yt.png') }}" />
            @include('admin.partials.form.text', [ 'colSize' => 'col-md-12', 'fieldName' => 'youtube_link', 'value' => $car?->youtube_link,'title' => 'Youtube Video ID (make sure its correct)'])
            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12', 'type' => 'number', 'fieldName' => 'mileage', 'value' => $car?->mileage ?? 0,'title' => 'Mileage (0 for unlimited)'])
            @include('admin.partials.form.text', [ 'attributes' => 'required', 'type' => 'number', 'colSize' => 'col-md-12', 'fieldName' => 'price_per_mileage', 'value' => $car?->price_per_mileage ?? 0,'title' => 'Price per exceeded mileage'])
            @include('admin.partials.form.text', [ 'attributes' => 'required',  'type' => 'number', 'colSize' => 'col-md-12', 'fieldName' => 'deposit', 'value' => $car?->deposit,'title' => 'Security Deposit'])

            @include('admin.partials.image-upload',['field' => 'image','id' => 'car_image', 'colSize' => 'col-md-12', 'image' => $car?->image,'title' => 'Car Featured Image'])
            @include('admin.partials.image-m-upload',['field' => 'photos','id' => 'car_photos', 'colSize' => 'col-md-12', 'images' => $car?->photos_array, 'image' => $car?->photos,'title' => 'Car Other Images (select multiple images)'])



        </div>
    </div>
</div>


<script>
    var autocomplete;

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('autocomplete'),
            { types: ['geocode'] }
        );

        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();

        if (!place.geometry) {
            return;
        }

        var originInput = document.getElementById('origin');
        var latitudeInput = document.getElementById('latitude');
        var longitudeInput = document.getElementById('longitude');

        originInput.value = place.name;
        latitudeInput.value = place.geometry.location.lat();
        longitudeInput.value = place.geometry.location.lng();
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}&libraries=places&callback=initAutocomplete" async defer></script>


{{--<div class="row gy-3">--}}

{{--    <h5>Other car attributes</h5>--}}

{{--    @foreach($attributesList as $attribute)--}}
{{--        <div class="form-group">--}}
{{--            <label for="{{ $attribute['name'] }}">{{ $attribute['name'] }}</label>--}}
{{--            <input type="text" name="attributes[{{ $attribute['name'] }}]" id="{{ $attribute['name'] }}" class="form-control" value="{{ $car->attributes[$attribute['name']] ?? '' }}">--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}

