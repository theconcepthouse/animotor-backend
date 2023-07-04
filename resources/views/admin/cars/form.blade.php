<div class="row gy-4">

        @include('admin.partials.form.text', ['attributes' => 'required', 'value' => $car?->title, 'colSize' => 'col-md-3', 'fieldName' => 'title','title' => 'Car title'])
        @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'value' => $car?->type, 'option_name' => 'name', 'colSize' => 'col-md-3', 'fieldName' => 'type','title' => 'Car Type','options' => $car_types])
        @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'value' => $car?->make, 'option_name' => 'name', 'colSize' => 'col-md-3', 'fieldName' => 'make','title' => 'Car make','options' => $car_makes])
        @include('admin.partials.form.select_w_object', ['attributes' => 'required','value' => $car?->model, 'colSize' => 'col-md-3', 'fieldName' => 'model','title' => 'Car model','options' => $car_models])
        @include('admin.partials.form.select_array', [ 'colSize' => 'col-md-3', 'fieldName' => 'gear', 'value' => $car?->gear, 'title' => 'Gear type', 'options' => ['Automatic','Manual']])

        @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'value' => $car?->color, 'fieldName' => 'color','title' => 'Car Color'])
        @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'colSize' => 'col-md-3', 'value' => $car?->year, 'fieldName' => 'year','title' => 'Car Year'])
        @include('admin.partials.form.text', ['attributes' => 'required',  'colSize' => 'col-md-3', 'value' => $car?->vehicle_no, 'fieldName' => 'vehicle_no','title' => 'Car Number'])
        @include('admin.partials.form.text', [ 'colSize' => 'col-md-3', 'fieldName' => 'door', 'value' => $car?->door,'title' => 'Door count'])

        @include('admin.partials.image-upload',['field' => 'image','id' => 'car_image', 'image' => $car?->image,'title' => 'Car Image'])

</div>

