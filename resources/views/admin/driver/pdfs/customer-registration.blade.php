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
    </style>
</head>
<body>
<div class="container">
    <table>
        <tbody>
            @php $counter = 0; @endphp
            <tr>
            @foreach ($formFieldsJson as $field)
                @if ($counter % 3 == 0 && $counter != 0)
                    </tr><tr> <!-- Close the current row and start a new one every 3 fields -->
                @endif
                <td>
                    <label style="margin-bottom: 23px">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</label>

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
    </table>
</div>
</body>
</html>
