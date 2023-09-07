
<div class="col-12 d-flex justify-content-center">
    <h3>Third Party</h3>
</div>

@php

$form = [
    'title',
    'owner',
    'first_name',
    'last_name',
    'owners_address',
    'postcode',
    'insurance_company',
    'address',
    'tp_vehicle_damage',
    'city',
    'cover_type',
    'mobile_no',
    'policy_no',
    'vehicle_reg',
    'claims_ref',
    'vehicle_makes_and_model',
    'phone',
    'email',
    'number_of_passengers',
    'third_party_description',
    'colour_of_vehicle',
];

@endphp

@foreach($form as $item)
    @if(in_array($item,['owners_address','address','tp_vehicle_damage','third_party_description']))
        @include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-6', 'value' => isset($incident?->third_party[$item]) ? $incident?->third_party[$item] : '', 'fieldName' => "third_party[$item]",'title' => convertToWord($item)])
    @else
        @include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'value' => isset($incident?->third_party[$item]) ? $incident?->third_party[$item] : '', 'fieldName' => "third_party[$item]",'title' => convertToWord($item)])
    @endif
@endforeach
