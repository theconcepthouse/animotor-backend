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
        label {
            text-transform: capitalize;
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
            <h4 style="margin-bottom: 0px">Hire Agreement:</h4>

            <tr>
                <td>
                    <label style="margin-bottom: 25px">Hire start date</label>
                    <span>{{ date('d M, Y', strtotime($formData->vehicle['date_out'] ?? '')) }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Hire Due Date</label>
                    <span>{{ date('d M, Y', strtotime($formData->vehicle['date_out'] ?? '')) }}</span>
                    <span class="underline"></span>
                </td>
                <td colspan="2">
                    <label style="margin-bottom: 25px">Hire Type</label>
                    <span>{{ $formData->personal_details['hire_type'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
            </tr>

            <tr>
                <td>
                    <label style="margin-bottom: 25px">Payment frequency</label>
                    <span>{{ $formData->payment['payment_frequency'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Duration (in weeks)</label>
                    <span>{{ $formData->hire['duration'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td colspan="2">
                    <label style="margin-bottom: 25px">Deposit</label>
                    <span>{{ $formData->payment['deposit'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>

            </tr>
            <tr>
                <td>
                    <label style="margin-bottom: 25px">Total</label>
                    <span>{{ $formData->rate_total['sub_total'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Total Paid</label>
                    <span>{{ $formData->rate_total['total_paid'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Total Due</label>
                    <span>{{ $formData->rate_total['total_due'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>

            </tr>
            <tr>
                <td>
                    <label style="margin-bottom: 25px">Hire Total</label>
                    <span>{{ $formData->payment['hire_total'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">vehicle condition</label>
                    <span>{{ $formData->rate_total['vehicle_condition'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Total Due</label>
                    <span>{{ $formData->rate_total['total_due'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>

            </tr>
            <tr>
                <td>
                    <label style="margin-bottom: 25px">Road Tax</label>
                    <span>{{ $formData->payment['road_tax'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Road tax Amount</label>
                    <span>{{ $formData->payment['road_tax'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Total Due</label>
                    <span>{{ $formData->rate_total['total_due'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>

            </tr>
        </tbody>

        <tbody>
            <h4 style="margin-bottom: 0px">Additional Fee Detail:</h4>

            <tr>
                <td>
                    <label style="margin-bottom: 25px">Late Payment Per Day</label>
                    <span>{{ $formData->charges['late_payment_per_day'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Late Payment Amount</label>
                    <span>{{ $formData->charges['late_payment_per_day'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Excess Mileage Fee</label>
                    <span>{{ $formData->charges['excess_milage_fee'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Admin PCN Charge</label>
                    <span>{{ $formData->charges['admin_charge_for_pcn_ticket'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
            </tr>

        </tbody>


    </table>


    {{--    <div class="page-break"></div>--}}

</div>
</body>
</html>
