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
             <img width="50" src="https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/logo-sm.png" alt="">
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
    </tbody>
        <br>
 <tbody>
    <h4 style="margin-bottom: 0px">Vehicle Details:</h4>
    <tr style="margin-top: 0px">
        <td>
            <label style="margin-bottom: 25px">Registration Number</label>
            <span>{{ $form->vehicle['registration_number'] ?? '' }}</span>
            <span class="underline"></span>
        </td>
        <td>
            <label style="margin-bottom: 25px">Insurance Group</label>
            <span>{{ $form->vehicle['insurance_group'] ?? '' }}</span>
            <span class="underline"></span>
        </td>
        <td>
            <label style="margin-bottom: 25px">Car Model</label>
            <span>{{ $form->vehicle['car_model'] ?? '' }}</span>
            <span class="underline"></span>
        </td>
    </tr>
    <tr>
        <td>
            <label style="margin-bottom: 25px">Car Make</label>
            <span>{{ $form->vehicle['car_make'] ?? '' }}</span>
            <span class="underline"></span>
        </td>
        <td>
            <label style="margin-bottom: 25px">Date Out</label>
            <span>{{ $form->vehicle['date_out'] ?? '' }}</span>
            <span class="underline"></span>
        </td>
        <td>
            <label style="margin-bottom: 25px">Date Due</label>
            <span>{{ $form->vehicle['date_due'] ?? '' }}</span>
            <span class="underline"></span>
        </td>
    </tr>
    <tr>
        <td>
            <label style="margin-bottom: 25px">Time Out</label>
            <span>{{ $form->vehicle['time_out'] ?? '' }}</span>
            <span class="underline"></span>
        </td>
        <td>
            <label style="margin-bottom: 25px">Time Back</label>
            <span>{{ $form->vehicle['time_back'] ?? '' }}</span>
            <span class="underline"></span>
        </td>
        <td>
        </td>
    </tr>
</tbody>



    </table>

{{--    <div class="page-break"></div>--}}

</div>
</body>
</html>
