@extends('frontpage.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif



    <section class="signup__section bluar__shape form_border_10">
        <div class="container ">
            <div class="row align-items-center justify-content-between">


                <div class="col-12 justify-content-center d-flex mb-3">
                    <div class="vehicle p-3">
                        <div class="d-flex justify-content-center">
                            <p class="vehicle_no">{{ $booking?->car?->registration_number }}</p>

                        </div>
                        <h6 class="vehicle_name mt-2">{{ $booking?->car?->title }}</h6>
                    </div>
                </div>


                <div class="col-md-12">

                    <form method="post" action="{{ route('rental.report_defect.store') }}" class="signup__form password__box pt__40">

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

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <div class="row g-4">

                            <input type="hidden" name="car_id" value="{{ $booking->car_id }}">
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            <input type="hidden" name="company_id" value="{{ $booking->company_id }}">

                            @include('frontpage.components.form.text', ['attributes' => 'required', 'type' => 'date', 'colSize' => 'col-md-4', 'value' => $report?->date, 'fieldName' => 'date','title' => 'Date'])
                            @include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-5', 'value' => $report?->location_of_vehicle, 'fieldName' => 'location_of_vehicle','title' => 'Location of vehicle'])
                            @include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'value' => $report?->postal_code, 'fieldName' => 'postal_code','title' => 'Postal code'])

                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'value' => $report?->description,
'sub_title' => 'Please provide a detailed description of the defect or issue observed',
'fieldName' => 'description','title' => 'Description of defect'
])
                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'value' => $report?->location_of_defect,
'sub_title' => 'Specify where the defect was observed, such as the specific part of the vehicle or its location',
'fieldName' => 'location_of_defect','title' => 'Location of defect'
])

                            <div class="col-12">
                                <p>Severity</p>
                                <input {{ $report?->severity == 'low' ? 'checked' : '' }} name="severity" type="radio" value="low" /> Low
                                <input {{ $report?->severity == 'medium' ? 'checked' : '' }} class="ms-3" name="severity" type="radio" value="medium" /> Medium
                                <input {{ $report?->severity == 'high' ? 'checked' : '' }} class="ms-3" name="severity" type="radio" value="high" /> High
                            </div>

                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'value' => $report?->impact,
'sub_title' => 'Explain how the defect affects the normal operation of the vehicle',
'fieldName' => 'impact','title' => 'Impact on vehicle operation  (optional)'
])
                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'value' => $report?->actions_taken,
'sub_title' => 'If any temporary measures were taken to address the defect, please mention them here',
'fieldName' => 'actions_taken','title' => 'Actions taken  (optional)'
])
                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'value' => $report?->recommendations,
'sub_title' => 'Provide suggestions or recommendations for repairs or further actions',
'fieldName' => 'recommendations','title' => 'Recommendations (optional)'
])

                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'value' => $report?->witnesses,
'sub_title' => 'List any witnesses who observed the defect or issue',
'fieldName' => 'witnesses','title' => 'Witnesses (optional)'
])

                            <div class="col-12">
                                <h4>Reporter information</h4>
                            </div>


                            @include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $report?->reporter_name, 'fieldName' => 'reporter_name','title' => 'Name'])
                            @include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $report?->reporter_phone, 'fieldName' => 'reporter_phone','title' => 'Contact number'])
                            @include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $report?->reporter_email, 'fieldName' => 'reporter_email','title' => 'Email'])


                            <div class="col-lg-12">
                                <div class="input__grp mt-3">
                                    <button type="submit" class="cmn__btn">
                               <span>
                                  Submit Now
                               </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>
@endsection
