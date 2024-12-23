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
{{--                                    <h4 class="title nk-block-title">Create new {{ $role }}</h4>--}}
                                    <h4 class="title nk-block-title">New Customer Registration</h4>
                                </div>
                                <div class="nk-block-head-content">
                                    <a href="{{ route('admin.form.index', ['driverId' => $driver->id, 'formId' => $form->id]) }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.form.index', ['driverId' => $driver->id, 'formId' => $form->id]) }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                </div>
                                </div>
                                <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.store.driver') }}" method="POST" enctype="multipart/form-data">
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

                                                <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                <input type="hidden" name="form_id" value="{{ $form->id }}">
                                                @include('admin.partials.form.text', ['attributes' => 'disabled', 'colSize' => 'col-md-4', 'value' => $role, 'fieldName' => 'role', 'type' => 'hidden','title' => ''])
                                                    <input name="role" type="hidden" value="{{ $role }}" />

                                                <div class="row">
                                                    @foreach ($formFieldsJson as $field)
                                                        <div class="form-group col-md-4">
                                                            <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                            @php
                                                                // Check if form data exists, then common fields, then field value
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
