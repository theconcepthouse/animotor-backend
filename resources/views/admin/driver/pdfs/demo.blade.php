<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $form->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }
        .col-md-6, .col-md-4, .col-12 {
            padding: 0 15px;
            box-sizing: border-box;
        }
        .col-md-6 {
            width: 50%;
        }
        .col-md-4 {
            width: 33.333%;
        }
        .col-12 {
            width: 100%;
        }
        .text-right {
            text-align: right;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        .important-notice {
            background-color: #f8f9fa;
            padding: 15px;
            border-left: 4px solid #007bff;
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: bold;
            margin-top: 20px;
        }
        .form-field {
            margin-bottom: 10px;
        }
        .form-field strong {
            display: inline-block;
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="path/to/logo.png" alt="Company Logo" class="img-fluid">
            </div>
            <div class="col-md-6 text-right">
                <p>Phone: 01753424350</p>
                <p>Email: info@animotor.co.uk</p>
                <p>Web: www.animotor.co.uk</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>ANI Motors Ltd, Office 7 Albion House, 6 Albion Close, Slough SL2 5DT</p>
            </div>
        </div>
        <div class="important-notice">
            <p>Lorem ipsum dolor sit amet consectetur. Et ipsum enim semper faucibus enim neque volutpat. At consectetur id potenti libero. Ipsum felis maecenas nulla nunc condimentum mauris. Dolor vel justo porta in elit eget. At diam ultricies posuere dignissim ultrices tristique quam. Elit metus proin viverra nec penatibus. Vitae nec nunc phasellus turpis.</p>
        </div>
        <div class="row">
            <div class="col-12 section-title">
                Client Details:
            </div>
        </div>
        <div class="row">
            @foreach ($formFieldsJson as $field)
                 <div class="col-md-4 form-field">
                    <strong>{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}:</strong> {{ $submittedData[$field['fieldName']] ?? '______________' }}
                </div>
            @endforeach
        </div>
        <div class="section">
        <h2>Hirer Details</h2>
        @foreach ($formFieldsJson['Hirer'] as $field)
            <p><strong>{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}:</strong> {{ $submittedData[$field['fieldName']] ?? '' }}</p>
        @endforeach
        </div>

        <div class="section">
            <h2>Address</h2>
            @foreach ($formFieldsJson['Address'] as $field)
                <p><strong>{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}:</strong> {{ $submittedData[$field['fieldName']] ?? '' }}</p>
            @endforeach
        </div>

        <div class="section">
            <h2>Vehicle Details</h2>
            @foreach ($formFieldsJson['Vehicle'] as $field)
                <p><strong>{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}:</strong> {{ $submittedData[$field['fieldName']] ?? '' }}</p>
            @endforeach
        </div>

        <div class="section">
            <h2>Statement of Liability</h2>
            <p>{{ $submittedData['statement_of_liability'] ?? '' }}</p>
        </div>

        <div class="signature">
            <span>Signature:</span>
            @if(isset($submittedData['signature']))
                <img src="{{ public_path('uploads/' . $submittedData['signature']) }}" alt="Signature">
            @endif
        </div>

        <div class="section">
            <h2>Declaration</h2>
            <p>{{ $submittedData['declaration'] ?? '' }}</p>
        </div>
    </div>

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
</body>
</html>
