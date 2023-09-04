
<div class="col-12 d-flex justify-content-center">
    <h3>Third Party</h3>
</div>

@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.title','title' => 'Title'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.owner','title' => 'Owner (if different)'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.first_name','title' => 'First Name'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.last_name','title' => 'Last Name'])
@include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.owners_address','title' => 'Owners Address'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.postcode','title' => 'Postcode'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.insurance_company','title' => 'Insurance Company'])
@include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.address','title' => 'Address'])
@include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.tp_vehicle_damage','title' => 'TP Vehicle Damage'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.city','title' => 'City'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.cover_type','title' => 'Type of cover'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'type' => 'number', 'fieldName' => 'third_party.mobile_no','title' => 'Mobile No'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6',  'fieldName' => 'third_party.policy_no','title' => 'Policy No'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6',  'fieldName' => 'third_party.vehicle_reg','title' => 'Vehicle Reg'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6',  'fieldName' => 'third_party.claims_ref','title' => 'Claims Ref'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6',  'fieldName' => 'third_party.makes_model','title' => 'Vehicle makes & model'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'type' => 'number', 'fieldName' => 'third_party.phone','title' => 'Phone'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'type' => 'email', 'fieldName' => 'third_party.email','title' => 'Email Address'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.vehicle_color','title' => 'Colour of Vehicle'])
@include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-6', 'fieldName' => 'third_party.third_party_description','title' => 'Third party description'])

