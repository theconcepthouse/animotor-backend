@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                           <div class="nk-block">

                               <div class="nk-block-between g-3">
                                <div class="nk-block-head-content mb-5">
                                    <h4 class="title nk-block-title">Hire Agreement Form</h4>
                                </div>
                               <div class="nk-block-head-content">
                                    <a href="{{ route('admin.form.index', ['driverId' => $driver->id, 'formId' => $form->id]) }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.form.index', ['driverId' => $driver->id, 'formId' => $form->id]) }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                </div>
                                </div>
{{--                               {{ dd($formFieldsJson['Customer Detail']) }}--}}
                                <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.submitForm') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="container">
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
                                                </div>
                                                <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                <input type="hidden" name="form_id" value="{{ $form->id }}">

                                                <div class="container-fluid">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Hirer Detail</h4>
                                                    </div>
{{--                                                    {{ dd($formFieldsJson) }}--}}

                                                    <div class="row">
                                                        @foreach ($formFieldsJson['Hirer'] as $field)
                                                            @php
                                                                $shouldHide = in_array($field['fieldName'], ['work_phone', 'hire_type']);
                                                            @endphp

                                                            <div class="form-group col-md-4" id="form-group-{{ $field['fieldName'] }}" style="{{ $shouldHide ? 'display:none;' : '' }}">
                                                                <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                                 @php
                                                                    $value = $formData[$field['fieldName']] ?? $commonFields[$field['fieldName']] ?? $field['value'] ?? '';
                                                                @endphp
{{--                                                                @php--}}
{{--                                                                     $value = $formData ? json_decode($formData->field_data, true)[$field['fieldName']] ?? $commonFields[$field['fieldName']] ?? '' : $commonFields[$field['fieldName']] ?? '';--}}
{{--                                                                 @endphp--}}

                                                                @if ($field['fieldType'] === 'text')
                                                                    <input  type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                                @elseif ($field['fieldType'] === 'number')
                                                                    <input  type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                                @elseif ($field['fieldType'] === 'email')
                                                                    <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                                @elseif ($field['fieldType'] === 'date')
                                                                    <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                                @elseif ($field['fieldType'] === 'select')
                                                                <select class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" {{ $field['required'] ? 'required' : '' }}>
                                                                     <option selected disabled>Select Option</option>
                                                                    @foreach ($field['options'] as $option)
                                                                        <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @endif
                                                            </div>

                                                        @endforeach
                                                    </div>

                                                </div>
                                                <div class="container-fluid mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Address Detail</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Address'] as $field)
                                                        @php
                                                            // Determine if the field should be hidden
                                                            $shouldHide = in_array($field['fieldName'], ['email', 'phone']);
                                                        @endphp
                                                        <div class="form-group col-md-4" id="form-group-{{ $field['fieldName'] }}" style="{{ $shouldHide ? 'display:none;' : '' }}">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                    $value = $formData['field_data'][$field['fieldName']] ?? $commonFieldsData[$field['fieldName']] ?? '';
                                                                @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}"
                                                            @elseif ($field['fieldType'] === 'select')
                                                                <select class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" >
                                                                    @foreach ($field['options'] as $option)
                                                                        <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                    @endforeach
                                                                </select>
                                                            @elseif ($field['fieldType'] === 'radio')
                                                                @foreach ($field['options'] as $option)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} >
                                                                        <label class="form-check-label" for="{{ $field['fieldName'] . '_' . $option }}">
                                                                            {{ $option }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                </div>

                                                <div class="container-fluid mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Vehicle Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Vehicle'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $formData[$field['fieldName']] ?? $commonFields[$field['fieldName']] ?? $field['value'] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'time')
                                                                <input type="time" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'select')
                                                                <select class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" {{ $field['required'] ? 'required' : '' }}>
                                                                    @if (isset($field['options']) && !empty($field['options']))
                                                                        @foreach ($field['options'] as $option)
                                                                            <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="" disabled selected>No options available</option>
                                                                    @endif
                                                                </select>
                                                            @elseif ($field['fieldType'] === 'radio')
                                                                @foreach ($field['options'] as $option)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} >
                                                                        <label class="form-check-label" for="{{ $field['fieldName'] . '_' . $option }}">
                                                                            {{ $option }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                </div>

                                                <div class="container-fluid mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Signature</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Signature'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $commonFields[$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'file')
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => $field['fieldName'],
                                                                    'image' => $value,
                                                                    'id' => $field['fieldName'] . '_' . $form->id,
                                                                    'title' => '',
                                                                ])
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                </div>

                                                <div class="container-fluid mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Declaration</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Declaration'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $commonFields[$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >

                                                            @elseif ($field['fieldType'] === 'file')
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => $field['fieldName'],
                                                                    'image' => $value,
                                                                    'id' => $field['fieldName'] . '_' . $form->id,
                                                                    'title' => '',
                                                                ])
                                                            @elseif ($field['fieldType'] === 'select')
                                                                <select class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" >
                                                                    @if (isset($field['options']) && !empty($field['options']))
                                                                        @foreach ($field['options'] as $option)
                                                                            <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="" disabled selected>No options available</option>
                                                                    @endif
                                                                </select>
                                                            @elseif ($field['fieldType'] === 'radio')
                                                                @foreach ($field['options'] as $option)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} >
                                                                        <label class="form-check-label" for="{{ $field['fieldName'] . '_' . $option }}">
                                                                            {{ $option }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                </div>

                                                <div class="container-fluid mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Additional fees and charges applicable to this agreement</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Additional Fee'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                             @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}">

                                                            @elseif ($field['fieldType'] === 'file')
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => $field['fieldName'],
                                                                    'image' => $value,
                                                                    'id' => $field['fieldName'] . '_' . $form->id,
                                                                    'title' => '',
                                                                ])
                                                            @elseif ($field['fieldType'] === 'select')
                                                                <select class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" >
                                                                    @if (isset($field['options']) && !empty($field['options']))
                                                                        @foreach ($field['options'] as $option)
                                                                            <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="" disabled selected>No options available</option>
                                                                    @endif
                                                                </select>
                                                            @elseif ($field['fieldType'] === 'radio')
                                                                @foreach ($field['options'] as $option)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} >
                                                                        <label class="form-check-label" for="{{ $field['fieldName'] . '_' . $option }}">
                                                                            {{ $option }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                </div>

                                                <div class="container-fluid mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Hirer Insurance Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Hirer Insurance'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                             @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >

                                                            @elseif ($field['fieldType'] === 'file')
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => $field['fieldName'],
                                                                    'image' => $value,
                                                                    'id' => $field['fieldName'] . '_' . $form->id,
                                                                    'title' => '',
                                                                ])
                                                            @elseif ($field['fieldType'] === 'select')
                                                                <select class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" >
                                                                    @if (isset($field['options']) && !empty($field['options']))
                                                                        @foreach ($field['options'] as $option)
                                                                            <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="" disabled selected>No options available</option>
                                                                    @endif
                                                                </select>
                                                            @elseif ($field['fieldType'] === 'radio')
                                                                @foreach ($field['options'] as $option)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} >
                                                                        <label class="form-check-label" for="{{ $field['fieldName'] . '_' . $option }}">
                                                                            {{ $option }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                </div>

                                                <div class="container-fluid mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Fleet Insurance Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Fleet Insurance'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                             @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >

                                                            @elseif ($field['fieldType'] === 'file')
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => $field['fieldName'],
                                                                    'image' => $value,
                                                                    'id' => $field['fieldName'] . '_' . $form->id,
                                                                    'title' => '',
                                                                ])
                                                            @elseif ($field['fieldType'] === 'select')
                                                                <select class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" >
                                                                    @if (isset($field['options']) && !empty($field['options']))
                                                                        @foreach ($field['options'] as $option)
                                                                            <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="" disabled selected>No options available</option>
                                                                    @endif
                                                                </select>
                                                            @elseif ($field['fieldType'] === 'radio')
                                                                @foreach ($field['options'] as $option)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} >
                                                                        <label class="form-check-label" for="{{ $field['fieldName'] . '_' . $option }}">
                                                                            {{ $option }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                </div>

                                                <div class="container-fluid mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Documents Details</h4>
                                                    </div>


                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Documents'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                             @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'file')

{{--                                                                <input type="file" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>--}}

                                                                @include('admin.partials.image-upload', [
                                                                    'field' => $field['fieldName'],
                                                                    'image' => $value,
                                                                    'id' => $field['fieldName'] . '_' . $form->id,
                                                                    'title' => '',
                                                                ])

                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" >
                                                            @elseif ($field['fieldType'] === 'select')
                                                                <select class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" >
                                                                    @if (isset($field['options']) && !empty($field['options']))
                                                                        @foreach ($field['options'] as $option)
                                                                            <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="" disabled selected>No options available</option>
                                                                    @endif
                                                                </select>
                                                            @elseif ($field['fieldType'] === 'radio')
                                                                @foreach ($field['options'] as $option)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} >
                                                                        <label class="form-check-label" for="{{ $field['fieldName'] . '_' . $option }}">
                                                                            {{ $option }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                </div>


                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-lg btn-primary">Submit </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>



@endsection
