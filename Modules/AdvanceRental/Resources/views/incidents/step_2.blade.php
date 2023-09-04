
<div class="col-12 d-flex justify-content-center">
    <h3>Witness Details</h3>
</div>

@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'witnesses.full_name','title' => 'Full Name'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'witnesses.postcode','title' => 'Post code'])
@include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-6', 'fieldName' => 'witnesses.address','title' => 'Address'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'phone_day','title' => 'Phone (Day)'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'phone_eve','title' => 'Phone (Eve)'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'mobile','title' => 'Mobile'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'email','title' => 'Email'])
