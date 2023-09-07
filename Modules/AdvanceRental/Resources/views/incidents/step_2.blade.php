
<div class="col-12 d-flex justify-content-center">
    <h3>Witness Details</h3>
</div>

@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'value' => isset($incident?->witnesses['full_name']) ? $incident?->witnesses['full_name'] : '', 'fieldName' => 'witnesses[full_name]','title' => 'Full Name'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'value' => isset($incident?->witnesses['postcode']) ? $incident?->witnesses['postcode'] : '','fieldName' => 'witnesses[postcode]','title' => 'Post code'])
@include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-6', 'value' => isset($incident?->witnesses['address']) ? $incident?->witnesses['address'] : '','fieldName' => 'witnesses[address]','title' => 'Address'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'value' => isset($incident?->witnesses['phone_day']) ? $incident?->witnesses['phone_day'] : '','fieldName' => 'witnesses[phone_day]','title' => 'Phone (Day)'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'value' => isset($incident?->witnesses['phone_eve']) ? $incident?->witnesses['phone_eve'] : '','fieldName' => 'witnesses[phone_eve]','title' => 'Phone (Eve)'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'value' => isset($incident?->witnesses['mobile']) ? $incident?->witnesses['mobile'] : '','fieldName' => 'witnesses[mobile]','title' => 'Mobile'])
@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'value' => isset($incident?->witnesses['email']) ? $incident?->witnesses['email'] : '','fieldName' => 'witnesses[email]','title' => 'Email'])
