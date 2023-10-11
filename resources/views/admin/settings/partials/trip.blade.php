<div class="card-inner pt-0">
    <h4 class="title nk-block-title">Trip setting</h4>
    <p>Configure the trip settings here.</p>

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
                <fiv class="row">

                    <input name="active_setting" value="trip" type="hidden" />

                    @include('admin.partials.form.select_array', ['attributes' => 'required', 'value' => settings('restrict_rides_to_service_type','no'), 'colSize' => 'col-md-12', 'fieldName' => 'restrict_rides_to_service_type','title' => 'Restrict rides to service type', 'options' => ['yes','no']])
                    @include('admin.partials.form.select_array', ['attributes' => 'required', 'value' => settings('drivers_can_set_radius','no'), 'colSize' => 'col-md-12 mt-3', 'fieldName' => 'drivers_can_set_radius','title' => 'Allow drivers to set radius', 'options' => ['yes','no']])
                    @include('admin.partials.form.select_array', ['attributes' => 'required', 'value' => settings('drivers_can_set_radius','no'), 'colSize' => 'col-md-12 mt-3', 'fieldName' => 'drivers_can_set_service_type','title' => 'Allow drivers to set service type', 'options' => ['yes','no']])
                    @include('admin.partials.form.select_array', ['attributes' => 'required', 'value' => settings('book_without_online_drivers','no'), 'colSize' => 'col-md-12 mt-3', 'fieldName' => 'book_without_online_drivers','title' => 'Allow booking when no drivers is online', 'options' => ['yes','no']])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('set_driver_offline_after', 3600), 'colSize' => 'col-md-12 mt-3', 'type' => 'number', 'fieldName' => 'set_driver_offline_after','title' => 'Set Driver Offline after defined minutes'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('delete_pending_orders_after', 3600), 'colSize' => 'col-md-12 mt-3', 'type' => 'number', 'fieldName' => 'delete_pending_orders_after','title' => 'Delete pending orders after defined minutes'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('max_drivers_notify',2), 'colSize' => 'col-md-12 mt-3', 'type' => 'number', 'fieldName' => 'max_drivers_notify','title' => 'Max No of Drivers to Notify'])
                    @include('admin.partials.form.text', ['attributes' => 'required', 'value' => settings('max_distance_drivers_notify',20), 'colSize' => 'col-md-12 mt-3', 'type' => 'number', 'fieldName' => 'max_distance_drivers_notify','title' => 'Max Distance to notify (this will restrict the system to notify only drivers within this radius)'])

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
