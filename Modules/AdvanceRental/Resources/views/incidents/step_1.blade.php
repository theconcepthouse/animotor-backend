
<div class="col-12 d-flex justify-content-center">
    <h3>Our Driver</h3>
</div>


@include('frontpage.components.form.text', ['attributes' => 'disabled', 'colSize' => 'col-md-6', 'value' => $booking->reference, 'fieldName' => 'ref','title' => 'Auto Generated Reference No.'])
@include('frontpage.components.form.text', ['attributes' => 'disabled', 'colSize' => 'col-md-6', 'value' => $booking?->car?->registration_number, 'fieldName' => 'reg','title' => 'Vehicle Registration No.'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'value' => $incident?->owner_name, 'fieldName' => 'owner_name','title' => 'Owner Name'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $booking?->car?->make, 'fieldName' => 'vehicle_make','title' => 'Vehicle Make'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6',  'value' => $incident?->title, 'fieldName' => 'title','title' => 'Title'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $incident?->first_name, 'fieldName' => 'first_name','title' => 'First Name'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $incident?->last_name, 'fieldName' => 'last_name','title' => 'Last Name'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'type' => 'date', 'value' => $incident?->date_of_birth, 'colSize' => 'col-md-6', 'fieldName' => 'date_of_birth','title' => 'Date of Birth'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $incident?->phone, 'fieldName' => 'phone','title' => 'Phone Number'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $incident?->postal_code, 'fieldName' => 'postal_code','title' => 'Postal code'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $incident?->mobile_number, 'fieldName' => 'mobile_number','title' => 'Mobile Number'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $incident?->email, 'fieldName' => 'email','title' => 'Email'])
@include('frontpage.components.form.textarea', ['attributes' => 'required', 'colSize' => 'col-md-12', 'value' => $incident?->address, 'fieldName' => 'address','title' => 'Address'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'occupation', 'value' => $incident?->occupation, 'title' => 'Occupation'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $incident?->cover_type, 'fieldName' => 'cover_type','title' => 'Type of cover'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $incident?->policy_number, 'fieldName' => 'policy_number','title' => 'Policy Number'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'value' => $incident?->insurer, 'fieldName' => 'insurer','title' => 'Insurer'])
