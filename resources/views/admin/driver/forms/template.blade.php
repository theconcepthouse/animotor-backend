 <div class="row">

                                                    @foreach ($formFieldsJson as $field)
                                                        <div class="form-group col-md-4">
                                                        <label for="{{ $field['fieldName'] }}">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                                                        @if ($field['fieldType'] === 'text')
                                                            <input type="text" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" {{ $field['required'] ? 'required' : '' }}>
                                                        @elseif ($field['fieldType'] === 'email')
                                                            <input type="email" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" {{ $field['required'] ? 'required' : '' }}>
                                                        @elseif ($field['fieldType'] === 'number')
                                                            <input type="number" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" {{ $field['required'] ? 'required' : '' }}>
                                                        @elseif ($field['fieldType'] === 'date')
                                                            <input type="date" class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" {{ $field['required'] ? 'required' : '' }}>
                                                        @elseif ($field['fieldType'] === 'select')
                                                            <select class="form-control" id="{{ $field['fieldName'] }}" name="{{ $field['fieldName'] }}" {{ $field['required'] ? 'required' : '' }}>
                                                                @foreach ($field['options'] as $option)
                                                                    <option value="{{ $option }}">{{ $option }}</option>
                                                                @endforeach
                                                            </select>
                                                        @elseif ($field['fieldType'] === 'radio')
                                                            @foreach ($field['options'] as $option)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="{{ $field['fieldName'] }}" id="{{ $field['fieldName'] . '_' . $option }}" value="{{ $option }}" {{ $field['required'] ? 'required' : '' }}>
                                                                    <label class="form-check-label" for="{{ $field['fieldName'] . '_' . $option }}">
                                                                        {{ $option }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>

                                                    @endforeach

                                             </div>
