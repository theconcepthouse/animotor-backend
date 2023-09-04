@extends('frontpage.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif



    <section class="signup__section bluar__shape form_border_10">
        <div class="container ">
            <div class="row align-items-center justify-content-between">
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

                        <div class="row g-4">

                            @include('frontpage.components.form.text', ['attributes' => 'required', 'type' => 'date', 'colSize' => 'col-md-4', 'fieldName' => 'date','title' => 'Date'])
                            @include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-5', 'fieldName' => 'location_of_vehicle','title' => 'Location of vehicle'])
                            @include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'postal_code','title' => 'Postal code'])

                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'sub_title' => 'Please provide a detailed description of the defect or issue observed',
'fieldName' => 'description','title' => 'Description of defect'
])
                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'sub_title' => 'Specify where the defect was observed, such as the specific part of the vehicle or its location',
'fieldName' => 'location_of_defect','title' => 'Location of defect'
])
                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'sub_title' => 'Explain how the defect affects the normal operation of the vehicle',
'fieldName' => 'impact','title' => 'Impact on vehicle operation  (optional)'
])
                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'sub_title' => 'If any temporary measures were taken to address the defect, please mention them here',
'fieldName' => 'actions_taken','title' => 'Actions taken  (optional)'
])
                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'sub_title' => 'Provide suggestions or recommendations for repairs or further actions',
'fieldName' => 'recommendations','title' => 'Recommendations (optional)'
])

                            @include('frontpage.components.form.textarea',
['attributes' => 'required', 'colSize' => 'col-md-12',
'sub_title' => 'List any witnesses who observed the defect or issue',
'fieldName' => 'witnesses','title' => 'Witnesses (optional)'
])

                            <div class="col-12">
                                <h4>Reporter information</h4>
                            </div>


                            @include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'reporter_name','title' => 'Name'])
                            @include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'reporter_phone','title' => 'Contact number'])
                            @include('frontpage.components.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'reporter_email','title' => 'Email'])


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
