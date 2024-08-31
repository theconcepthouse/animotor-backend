<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $form->name }}</title>
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
            <img height="50" width="120" src="https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/ANI_Motors_Logo.jpg" alt="{{ env('APP_NAME') }}"  class="img-fluid">
        </div>
       <div style="font-size: 10px; text-align: right" class="col-md-6">
            <div style="align-items: flex-end; margin-left: 30em" >
            <p>Phone: 01753424350</p>
            <p>Email: info@animotor.co.uk</p>
            <p>Web: www.animotor.co.uk</p>
            </div>
       </div>
   </div>
    <br>
    <table>
        <tbody>
        <h5 style="margin-bottom: 0px">Hirer Details:</h5>
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
                <label style="margin-bottom: 25px; white-space: nowrap">Driver licence issuing country</label>
                <span>{{ $formData->personal_details['driver_licence_issuing_country'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>

            <td>
                <label style="margin-bottom: 25px">Driver licence number</label>
                <span>{{ $formData->personal_details['driver_licence_number'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Date of birth</label>
                <span>{{ $formData->personal_details['date_of_birth'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td></td> <!-- Leave this empty to keep the alignment consistent -->
        </tr>
    </tbody>

        <tbody >
            <h4 style="margin-bottom: 0px">Address:</h4>
            <tr style="margin-top: 0px">
                <td>
                    <label style="margin-bottom: 25px">Street Name</label>
                    <span>{{ $formData->address['address_line'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">City</label>
                    <span>{{ $formData->address['city'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">County</label>
                    <span>{{ $formData->address['country'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Postcode</label>
                    <span>{{ $formData->address['postcode'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
            </tr>
        </tbody>

        <tbody >
            <h5 style="margin-bottom: 0px">Vehicle Details: </h5>
            <tr style="margin-top: 0px">
                <td>
                    <label style="margin-bottom: 25px">Registration number</label>
                    <span>{{ $formData->vehicle['registration_number'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Insurance group</label>
                    <span>{{ $formData->vehicle['insurance_group'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Car Make/Model</label>
                    <span>{{ $formData->vehicle['car_make'] ?? '' }}{{ $submittedData['car_model'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label style="margin-bottom: 25px">Date out</label>
                    <span>{{ $formData->vehicle['date_out'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Date Due</label>
                    <span>{{ $formData->vehicle['date_due'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
            </tr>
        </tbody>
        <tbody >
            <h5 style="margin-bottom: 0px; white-space: nowrap">STATEMENT OF LIABILITY: </h5>
            <tr >
                <td colspan="4">
                    <p style="text-align: justify; color: #463b3b">
                        I hereby acknowledge that during the currency of this agreement, I shall be Liable as the owner of the vehicle
                        let me there-under in respect of any fixed penalty Offence committed in respect of the vehicle under part III of
                        the Road Traffic Offenders Act 1988 (Section 66) (as amended) and the Local Authorities Act 2000, London Local
                        Authorities Act 1996 (as amended), Road Traffic Act 1991, Road Traffic Offenders Act 1988, Traffic Management
                        Act 2004.
                    </p>
                     <label style="margin-bottom: 25px">Signature</label>
                     <img src="{{ $formData->signature['signature'] ?? '' }}" alt="Signature Image" style="max-height: 70px; width: auto;">
                    <span class="underline"></span>
                </td>
            </tr>
        </tbody>
        <tbody >
            <h5 style="margin-bottom: 0px; white-space: nowrap">DECLARATION: </h5>
            <tr >
                <td colspan="4">
                    <p style="text-align: justify; color: #463b3b">
                        declare that the information given in this form is correct and complete. In addition, I hereby acknowledge and
                        confirm that during the duration of the vehicle hire I shall be liable for any penalty charges (PCNs), parking or
                        traffic fines including such penalties or excess charges howsoever issued. It is further agreed that the full cost of
                        repair to the vehicle and replacement costs resulting from the theft or damage of telematics, camera or vehicle
                        tracking equipment will be met by the nominated hirer above, if such theft or damage occurs during the hire
                        period.
                    </p>
                     <div style="display: flex; ">
                        <div style="margin-right: 10px; margin-top: 10px; font-size: 15px">
                            <span>Date: {{ $formData->declaration['signature_date'] ?? '' }}......./......./....../</span>
                            <span> Signature: <img src="{{ $formData->declaration['signature_2'] ?? '' }}" alt="Signature Image" style="max-height: 100px; width: auto;">__________________</span>

                        </div>


                    </div>

                </td>
            </tr>
        </tbody>

    </table>

{{--    <div class="page-break"></div>--}}

</div>
</body>
</html>
