
<div class="col-12 d-flex justify-content-center">
    <h3>Our Driver</h3>
</div>


@include('frontpage.components.form.text', ['attributes' => 'disabled', 'colSize' => 'col-md-6', 'fieldName' => 'ref','title' => 'Auto Generated Reference No.'])
@include('frontpage.components.form.text', ['attributes' => 'disabled', 'colSize' => 'col-md-6', 'fieldName' => 'reg','title' => 'Vehicle Registration No.'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'owner_name','title' => 'Owner Name'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'vehicle_make','title' => 'Vehicle Make'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'title','title' => 'Title'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'first_name','title' => 'First Name'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'last_name','title' => 'Last Name'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'type' => 'date', 'colSize' => 'col-md-6', 'fieldName' => 'date_of_birth','title' => 'Date of Birth'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'phone','title' => 'Phone Number'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'postal_code','title' => 'Postal code'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'mobile_number','title' => 'Mobile Number'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'email','title' => 'Email'])
@include('frontpage.components.form.textarea', ['attributes' => 'required', 'colSize' => 'col-md-12', 'fieldName' => 'address','title' => 'Address'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'occupation','title' => 'Occupation'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'cover_type','title' => 'Type of cover'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'policy_number','title' => 'Policy Number'])
@include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-6', 'fieldName' => 'insurer','title' => 'Insurer'])
