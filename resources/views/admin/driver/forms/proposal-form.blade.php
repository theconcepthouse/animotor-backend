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
                                    <h4 class="title nk-block-title">Proposal Form</h4>
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

                                            <form action="{{ route('admin.submitForm', $form->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                  <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                <input type="hidden" name="form_id" value="{{ $form->id }}">

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

                                                <div class="container-fluid">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Customer Detail</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Customer'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $formData[$field['fieldName']] ?? $commonFields[$field['fieldName']] ?? $field['value'] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'select')
                                                                <select class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" {{ $field['required'] ? 'required' : '' }}>
                                                                    @foreach ($field['options'] as $option)
                                                                        <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                    @endforeach
                                                                </select>
                                                            @elseif ($field['fieldType'] === 'radio')
                                                                @foreach ($field['options'] as $option)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} {{ $field['required'] ? 'required' : '' }}>
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
                                                        <h4 class="title nk-block-title">Address Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Address'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $formData[$field['fieldName']] ?? $commonFields[$field['fieldName']] ?? $field['value'] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
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
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} {{ $field['required'] ? 'required' : '' }}>
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
                                                        <h4 class="title nk-block-title">Drivers License Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Drivers License'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
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
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} {{ $field['required'] ? 'required' : '' }}>
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
                                                        <h4 class="title nk-block-title">Taxi License Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Taxi License'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
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
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} {{ $field['required'] ? 'required' : '' }}>
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
                                                        <h4 class="title nk-block-title">Claim Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Claim'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'time')
                                                                <input type="time" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
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
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} {{ $field['required'] ? 'required' : '' }}>
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
                                                        <h4 class="title nk-block-title">Convictions Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Convictions'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'textarea')
                                                                <textarea class="form-control" name="{{ $field['fieldName'] }}" cols="10" rows="5">
                                                                    {{ $value }}
                                                                </textarea>
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
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
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} {{ $field['required'] ? 'required' : '' }}>
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
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
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
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} {{ $field['required'] ? 'required' : '' }}>
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
                                                        <h4 class="title nk-block-title">Level of cover Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Level of cover'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
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
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} {{ $field['required'] ? 'required' : '' }}>
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
                                                        <h4 class="title nk-block-title">Use of vehicle Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Use of vehicle'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                           @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
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
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} {{ $field['required'] ? 'required' : '' }}>
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
                                                        <h4 class="title nk-block-title">Supporting Documents</h4>
                                                    </div>

                                                    <div class="row">
                                                    @foreach ($formFieldsJson['Supporting Documents'] as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                $value = $formData['field_data'][$field['fieldName']] ?? '';
                                                            @endphp
                                                            @if ($field['fieldType'] === 'text')
                                                                <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'email')
                                                                <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'number')
                                                                <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
                                                            @elseif ($field['fieldType'] === 'file')
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => $field['fieldName'],
                                                                    'image' => $value,
                                                                    'id' => $field['fieldName'] . '_' . $form->id,
                                                                    'title' => '',
                                                                ])
                                                            @elseif ($field['fieldType'] === 'date')
                                                                <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" value="{{ $value }}" {{ $field['required'] ? 'required' : '' }}>
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
                                                                        <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $value == $option ? 'checked' : '' }} {{ $field['required'] ? 'required' : '' }}>
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
