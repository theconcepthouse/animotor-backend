
<div class="col-12 d-flex justify-content-center">
    <h3>Accident Details</h3>
</div>


@php
    $form = [
    'date_time',
    'location',
    'impact_point',
    'description',
    'our_vehicle_damage_images',
    'tp_vehicle_damage_images',
    'images_of_incident_location',
    ];

@endphp



@foreach($form as $item)
    @if(in_array($item, ['images_of_incident_location','our_vehicle_damage_images','tp_vehicle_damage_images']))
        @include('admin.partials.image-m-upload',['field' => "accident_details[$item]",'id' => "accident_details_$item", 'colSize' => 'col-md-6', 'title' => 'Please upload '.convertToWord($item)])

    @elseif($item == 'description')
        @include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-12', 'value' => isset($incident?->accident_details[$item]) ? $incident?->accident_details[$item] : '', 'fieldName' => "accident_details[$item]",'title' => convertToWord($item)])
    @else
        @include('frontpage.components.form.text', ['type' => $item == 'date_time'  ? 'datetime-local' : 'text', 'colSize' => 'col-md-6', 'value' => isset($incident?->accident_details[$item]) ? $incident?->accident_details[$item] : '', 'fieldName' => "accident_details[$item]",'title' => convertToWord($item)])
    @endif
@endforeach

{{--<input type="datetime-local">--}}

{{--@include('frontpage.components.form.text', ['type' => 'datetime', 'colSize' => 'col-md-6', 'fieldName' => 'accident_details.date_time','title' => 'Date / Time'])--}}
{{--@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'accident_details.location','title' => 'Location'])--}}
{{--@include('frontpage.components.form.text', [ 'colSize' => 'col-md-6', 'fieldName' => 'accident_details.impact_point','title' => 'Impact Point'])--}}
{{--@include('frontpage.components.form.textarea', [ 'colSize' => 'col-md-12', 'fieldName' => 'accident_details.description','title' => 'Description'])--}}

{{--@include('admin.partials.image-m-upload',['field' => 'accident_details.damage_images','id' => 'damage_images', 'colSize' => 'col-md-6', 'title' => 'Please upload our vehicle damage images'])--}}
{{--@include('admin.partials.image-m-upload',['field' => 'accident_details.tp_damage_images','id' => 'tp_damage_images', 'colSize' => 'col-md-6', 'title' => 'Please upload TP vehicle damage images'])--}}
{{--@include('admin.partials.image-m-upload',['field' => 'accident_details.incident_location','id' => 'incident_location', 'colSize' => 'col-md-6', 'title' => 'Please upload images of incident location'])--}}

