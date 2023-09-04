
<div class="col-12 d-flex justify-content-center">
    <h3>police Details</h3>
</div>

@include('frontpage.components.form.text', ['type' => 'number', 'colSize' => 'col-md-6', 'fieldName' => 'police_details.passengers','title' => 'No of passengers'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'police_details.officer','title' => 'Officer'])
@include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-12', 'fieldName' => 'police_details.address','title' => 'Address'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'police_details.ref','title' => 'Ref'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'police_details.phone','title' => 'Phone'])
