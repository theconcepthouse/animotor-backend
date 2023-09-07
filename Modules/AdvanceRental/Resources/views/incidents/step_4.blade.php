
<div class="col-12 d-flex justify-content-center">
    <h3>police Details</h3>
</div>

@php
$form = [
'number_of_passengers',
'officer',
'address',
'ref',
'phone',
];

@endphp

@foreach($form as $item)
    @if($item == 'address')
        @include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-12', 'value' => isset($incident?->police_details[$item]) ? $incident?->police_details[$item] : '', 'fieldName' => "police_details[$item]",'title' => convertToWord($item)])
    @else
        @include('frontpage.components.form.text', ['type' => in_array($item, ['number_of_passengers','phone'])  ? 'number' : 'text', 'colSize' => 'col-md-6', 'value' => isset($incident?->police_details[$item]) ? $incident?->police_details[$item] : '', 'fieldName' => "police_details[$item]",'title' => convertToWord($item)])
    @endif
@endforeach
