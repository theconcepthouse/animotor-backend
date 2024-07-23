<!DOCTYPE html>
<html>
<head>
    <title>Hire Agreement</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            margin-bottom: 10px;
        }
        .section p {
            margin: 0;
        }
        .signature {
            margin-top: 40px;
        }
        .signature span {
            display: block;
            margin-bottom: 5px;
        }
        .signature img {
            width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="path/to/your/logo.png" alt="Company Logo">
        <h1>Hire Agreement</h1>
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
        @foreach ($formFieldsJson['Vehicle Details'] as $field)
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
</body>
</html>
