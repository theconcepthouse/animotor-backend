<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Hirer Details</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f6f6f6;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            font-size: 14px;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            width: 33%;
            vertical-align: bottom; /* Aligns the content at the bottom */
        }
        label {
            display: block;
            font-weight: bold;
            margin-top: 18px; /* Space above the label */
        }
        .underline {
            display: block;
            border-bottom: 1px solid black;
            margin-top: 4px; /* Space between the text and the underline */
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row ">
        <div class="col-md-6">
            <img height="70" width="160" src="https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motors_Logo.jpg" alt="{{ env('APP_NAME') }}"  class="img-fluid">
        </div>
        <div style="align-items: flex-end; margin-left: 30em" >
            <p>Phone: 01753424350</p>
            <p>Email: info@animotor.co.uk</p>
            <p>Web: www.animotor.co.uk</p>
        </div>
   </div>
    <br>
    <table>
        <tbody>
            <h3>Hirer Details </h3>
            @php $counter = 0; @endphp
            <tr>
            @foreach ($formFieldsJson['Hirer'] as $field)
                @if ($counter % 3 == 0 && $counter != 0)
                    </tr><tr> <!-- Close the current row and start a new one every 3 fields -->
                @endif
                <td>
                    <label style="margin-bottom: 25px">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>

                    <span>{{ $submittedData[$field['fieldName']] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                @php $counter++; @endphp
            @endforeach
            @while ($counter % 3 != 0) <!-- Ensure the last row has three cells for consistent styling -->
                <td></td>
                @php $counter++; @endphp
            @endwhile
            </tr>
        </tbody>
        <br>
         <tbody style="margin-top: 20em;">
            <h3>Address Details </h3>
            @php $counter = 0; @endphp
            <tr>
            @foreach ($formFieldsJson['Address'] as $field)
                @if ($counter % 3 == 0 && $counter != 0)
                    </tr><tr> <!-- Close the current row and start a new one every 3 fields -->
                @endif
                <td>
                    <label style="margin-bottom: 25px">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>

                    <span>{{ $submittedData[$field['fieldName']] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                @php $counter++; @endphp
            @endforeach
            @while ($counter % 3 != 0) <!-- Ensure the last row has three cells for consistent styling -->
                <td></td>
                @php $counter++; @endphp
            @endwhile
            </tr>
        </tbody>
        <br>
        <tbody >
            <h3>Vehicle Details </h3>
            @php $counter = 0; @endphp
            <tr>
            @foreach ($formFieldsJson['Vehicle'] as $field)
                @if ($counter % 3 == 0 && $counter != 0)
                    </tr><tr> <!-- Close the current row and start a new one every 3 fields -->
                @endif
                <td>
                    <label style="margin-bottom: 25px">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>

                    <span>{{ $submittedData[$field['fieldName']] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                @php $counter++; @endphp
            @endforeach
            @while ($counter % 3 != 0) <!-- Ensure the last row has three cells for consistent styling -->
                <td></td>
                @php $counter++; @endphp
            @endwhile
            </tr>
        </tbody>
        <br>
           <tbody>
            <h3>Signature Details</h3>
            @php $counter = 0; @endphp
            <tr>
            @foreach ($formFieldsJson['Signature'] as $field)
                @if ($counter % 3 == 0 && $counter != 0)
                    </tr><tr> <!-- Close the current row and start a new one every 3 fields -->
                @endif
                <td>
                    <label style="display: block; margin-bottom: 25px;">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                    @if (isset($submittedData[$field['fieldName']]) && filter_var($submittedData[$field['fieldName']], FILTER_VALIDATE_URL))
                        <!-- Check if it's a valid URL, and assume it's an image -->
                        <img src="{{ $submittedData[$field['fieldName']] }}" alt="Signature Image" style="max-height: 100px; width: auto;">
                    @else
                        <!-- Display text or a placeholder if no image is available -->
                        <span>{{ $submittedData[$field['fieldName']] ?? '' }}</span>
                    @endif
                    <span class="underline"></span>
                </td>
                @php $counter++; @endphp
            @endforeach
            @while ($counter % 3 != 0) <!-- Ensure the last row has three cells for consistent styling -->
                <td></td>
                @php $counter++; @endphp
            @endwhile
            </tr>
        </tbody>

        <br>
        <tbody>
            <h3>Declaration Details</h3>
            @php $counter = 0; @endphp
            <tr>
            @foreach ($formFieldsJson['Declaration'] as $field)
                @if ($counter % 3 == 0 && $counter != 0)
                    </tr><tr> <!-- Close the current row and start a new one every 3 fields -->
                @endif
                <td>
                    <label style="display: block; margin-bottom: 25px;">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                    @if (isset($submittedData[$field['fieldName']]) && filter_var($submittedData[$field['fieldName']], FILTER_VALIDATE_URL))
                        <!-- Check if it's a valid URL, and assume it's an image -->
                        <img src="{{ $submittedData[$field['fieldName']] }}" alt="Signature Image" style="max-height: 100px; width: auto;">
                    @else
                        <!-- Display text or a placeholder if no image is available -->
                        <span>{{ $submittedData[$field['fieldName']] ?? '' }}</span>
                    @endif
                    <span class="underline"></span>
                </td>
                @php $counter++; @endphp
            @endforeach
            @while ($counter % 3 != 0) <!-- Ensure the last row has three cells for consistent styling -->
                <td></td>
                @php $counter++; @endphp
            @endwhile
            </tr>
        </tbody>

        <br>
        <tbody >
            <h3>Additional Fee </h3>
            @php $counter = 0; @endphp
            <tr>
            @foreach ($formFieldsJson['Additional Fee'] as $field)
                @if ($counter % 3 == 0 && $counter != 0)
                    </tr><tr> <!-- Close the current row and start a new one every 3 fields -->
                @endif
                <td>
                    <label style="margin-bottom: 25px">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>

                    <span>{{ $submittedData[$field['fieldName']] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                @php $counter++; @endphp
            @endforeach
            @while ($counter % 3 != 0) <!-- Ensure the last row has three cells for consistent styling -->
                <td></td>
                @php $counter++; @endphp
            @endwhile
            </tr>
        </tbody>
        <br>
        <tbody>
            <h3>Hirer Insurance</h3>
            @php $counter = 0; @endphp
            <tr>
            @foreach ($formFieldsJson['Hirer Insurance'] as $field)
                @if ($counter % 3 == 0 && $counter != 0)
                    </tr><tr> <!-- Close the current row and start a new one every 3 fields -->
                @endif
                <td>
                    <label style="display: block; margin-bottom: 25px;">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                    @if (isset($submittedData[$field['fieldName']]) && filter_var($submittedData[$field['fieldName']], FILTER_VALIDATE_URL))
                        <!-- Check if it's a valid URL, and assume it's an image -->
                        <img src="{{ $submittedData[$field['fieldName']] }}" alt="Signature Image" style="max-height: 100px; width: auto;">
                    @else
                        <!-- Display text or a placeholder if no image is available -->
                        <span>{{ $submittedData[$field['fieldName']] ?? '' }}</span>
                    @endif
                    <span class="underline"></span>
                </td>
                @php $counter++; @endphp
            @endforeach
            @while ($counter % 3 != 0) <!-- Ensure the last row has three cells for consistent styling -->
                <td></td>
                @php $counter++; @endphp
            @endwhile
            </tr>
        </tbody>
        <br>

        <tbody>
            <h3>Fleet Insurance</h3>
            @php $counter = 0; @endphp
            <tr>
            @foreach ($formFieldsJson['Fleet Insurance'] as $field)
                @if ($counter % 3 == 0 && $counter != 0)
                    </tr><tr> <!-- Close the current row and start a new one every 3 fields -->
                @endif
                <td>
                    <label style="display: block; margin-bottom: 25px;">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                    @if (isset($submittedData[$field['fieldName']]) && filter_var($submittedData[$field['fieldName']], FILTER_VALIDATE_URL))
                        <!-- Check if it's a valid URL, and assume it's an image -->
                        <img src="{{ $submittedData[$field['fieldName']] }}" alt="Signature Image" style="max-height: 100px; width: auto;">
                    @else
                        <!-- Display text or a placeholder if no image is available -->
                        <span>{{ $submittedData[$field['fieldName']] ?? '' }}</span>
                    @endif
                    <span class="underline"></span>
                </td>
                @php $counter++; @endphp
            @endforeach
            @while ($counter % 3 != 0) <!-- Ensure the last row has three cells for consistent styling -->
                <td></td>
                @php $counter++; @endphp
            @endwhile
            </tr>
        </tbody>
        <br>
        <tbody>
            <h3>Documents</h3>
            @php $counter = 0; @endphp
            <tr>
            @foreach ($formFieldsJson['Documents'] as $field)
                @if ($counter % 3 == 0 && $counter != 0)
                    </tr><tr> <!-- Close the current row and start a new one every 3 fields -->
                @endif
                <td>
                    <label style="display: block; margin-bottom: 25px;">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>
                    @if (isset($submittedData[$field['fieldName']]) && filter_var($submittedData[$field['fieldName']], FILTER_VALIDATE_URL))
                        <!-- Check if it's a valid URL, and assume it's an image -->
                        <img src="{{ $submittedData[$field['fieldName']] }}" alt="Signature Image" style="max-height: 100px; width: auto;">
                    @else
                        <!-- Display text or a placeholder if no image is available -->
                        <span>{{ $submittedData[$field['fieldName']] ?? '' }}</span>
                    @endif
                    <span class="underline"></span>
                </td>
                @php $counter++; @endphp
            @endforeach
            @while ($counter % 3 != 0) <!-- Ensure the last row has three cells for consistent styling -->
                <td></td>
                @php $counter++; @endphp
            @endwhile
            </tr>
        </tbody>
    </table>

{{--    <div class="page-break"></div>--}}

</div>
</body>
</html>
