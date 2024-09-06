<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $formData->name }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f6f6f6;
        }

        .container {
            /*background-color: #b1b1b1;*/
            padding: 5px;
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
            width: 30%;
            vertical-align: bottom; /* Aligns the content at the bottom */
        }

        label {
            display: block;
            font-weight: lighter;
            margin-top: 18px; /* Space above the label */
        }

        .underline {
            display: block;
            border-bottom: 1px solid #444343;
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
            <img height="50" width="120"
                 src="https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motors_Logo.jpg"
                 alt="{{ env('APP_NAME') }}" class="img-fluid">
        </div>
        <div style="font-size: 10px; text-align: right" class="col-md-6">
            <div style="align-items: flex-end; margin-left: 30em">
                <p>Phone: 01753424350</p>
                <p>Email: info@animotor.co.uk</p>
                <p>Web: www.animotor.co.uk</p>
            </div>
        </div>
    </div>
    <br>
    <table>
        <tbody>
        <tr>
            <td colspan="3">
                <strong> IMPORTANT NOTICE:</strong>
               <p>
                    It is an Offence under the Road Traffic Acts to make a false statement or withhold an y material in formation for the purposes of obtaining a Certificate of Motor Insurance. By completing this Proposal Form you hereby consent to us
                    using the Personal In formation provided by you to conduct appropriate anti-fraud and DVLA checks. Personal In formation that you provide may also be disclosed to a credit reference agency, which may keep a record of that in formation.
                    You also consent to this in formation being shared with other outside agencies in the course of investigating an y claim or con f irmin g that the in formation g iven is true and accurate. If you do not report an accident or claim
                    immediately you may have to pay a £1000 Late Reporting Excess plus £ 720 per day late reporting charges You are not insured to drive your vehicle under this fleet policy until such time as we have approved your application and
                    issued a Certificate of Insurance, permission letter stating that you are insured.
                </p>

            </td>
        </tr>
        </tbody>
        <tbody>
        <h4 style="margin-bottom: 0px">Driver Details:</h4>
        <tr style="margin-top: 0px">
            <td>
                <label style="margin-bottom: 25px">First Name</label>
                <span>{{ $formData->personal_details['first_name'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Last Name</label>
                <span>{{ $formData->personal_details['last_name'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px; white-space: nowrap">Email</label>
                <span>{{ $formData->personal_details['email'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>
            <td>
                <label style="margin-bottom: 25px">Phone</label>
                <span>{{ $formData->personal_details['phone'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Work Phone</label>
                <span>{{ $formData->personal_details['work_phone'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Hire Type</label>
                <span>{{ $formData->personal_details['hire_type'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>
            <td>
                <label style="margin-bottom: 25px">Ni Number</label>
                <span>{{ $formData->personal_details['ni_number'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Occupation</label>
                <span>{{ $formData->personal_details['occupation'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">How Long Resident in UK</label>
                <span>{{ $formData->personal_details['how_long_resident_in_uk'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        </tbody>

        <br>
        <tbody>
        <h4 style="margin-bottom: 0px">Address Details:</h4>

        <tr>
            <td>
                <label style="margin-bottom: 25px">Address Line</label>
                <span>{{ $formData->address['address_line'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Address Line 2</label>
                <span>{{ $formData->address['address_line_2'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Country</label>
                <span>{{ $formData->address['country'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>
            <td>
                <label style="margin-bottom: 25px">City</label>
                <span>{{ $formData->address['city'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Postcode</label>
                <span>{{ $formData->address['postcode'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td></td>
        </tr>
        </tbody>

    </table>


    {{--    <div class="page-break"></div>--}}

</div>
</body>
</html>
