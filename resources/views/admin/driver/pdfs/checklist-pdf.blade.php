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
            text-transform: capitalize;
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
        <h4 style="margin-bottom: 0px">Hirer Details:</h4>
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
                <label style="margin-bottom: 25px">Email</label>
                <span>{{ $formData->personal_details['email'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Phone</label>
                <span>{{ $formData->personal_details['phone'] ?? '' }}</span>
                <span class="underline"></span>
            </td>

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
            <h4 style="margin-bottom: 0px">Vehicle Details: </h4>
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
                    <label style="margin-bottom: 25px">Car Make</label>
                    <span>{{ $formData->vehicle['car_make'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Car Model</label>
                    <span>{{ $formData->vehicle['car_model'] ?? '' }}</span>
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
                <td>
                    <label style="margin-bottom: 25px">Next Service</label>
                    <span>{{ $formData->vehicle['next_service'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
            </tr>
        </tbody>

    </table>
    <div class="page-break"></div>

    <table>

       <tbody>
        <h4 style="margin-bottom: 0px">Charges Details:</h4>
        <tr style="margin-top: 0px">
            <td>
                <label style="margin-bottom: 25px">Late payment per day</label>
                <span>£ {{ $formData->charges['late_payment_per_day'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Admin charge for PCN</label>
                <span>£ {{ $formData->charges['admin_charge_for_pcn_ticket'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Admin charge for speeding ticket</label>
                <span>£ {{ $formData->charges['admin_charge_for_speeding_ticket'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>
            <td>
                <label style="margin-bottom: 25px">Admin charge for bus lane tickets</label>
                <span>£ {{ $formData->charges['admin_charge_for_bus_lane_tickets'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Returning vehicle dirty minor</label>
                <span>£ {{ $formData->charges['returning_vehicle_dirty_minor'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Returning vehicle dirty major</label>
                <span>£ {{ $formData->charges['returning_vehicle_dirty_major'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>
            <td>
                <label style="margin-bottom: 25px">Repossession personal visit minimum</label>
                <span>{{ $formData->charges['repossession_personal_visit_minimum'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Milage limit</label>
                <span>{{ $formData->charges['milage_limit'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <label style="margin-bottom: 25px">Lost damaged key charges</label>
                <span>£ {{ $formData->charges['lost_damaged_key_charges'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Vehicle recovery charges</label>
                <span>£ {{ $formData->charges['vehicle_recovery_charges'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Accident non-fault excess fee</label>
                <span>£ {{ $formData->charges['accident_non_fault_excess_fee'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>
            <td>
                <label style="margin-bottom: 25px">Accident fault-based excess fee</label>
                <span>{{ $formData->charges['accident_fault_based_excess_fee'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td></td>
            <td></td>
        </tr>
    </tbody>

        <tbody >
            <h4 style="margin-bottom: 0px">Hire Insurance:</h4>
            <tr>
                <td colspan="4">
                    <p>
                        Hirer shall be fully liable for all
                        collision damage, third party liability arising out of the use of
                        the vehicle, any resultant loss of hire charges, and all
                        damage to the vehicle, whether interior/exterior, including
                        damage to wind screens and /or tyres however caused. It is
                        strictly the hirer’s duty to ensure that his own insurers have
                        been notified of the foregoing terms and relevant cover
                        obtained.
                    </p>
                </td>

            </tr>
            <h4 style="margin-bottom: 0px">Hire Insurance Details:</h4>
            <tr style="margin-top: 0px">
                <td>
                    <label style="margin-bottom: 25px">Own company</label>
                    <span>{{ $formData->hirer_insurance['own_insurance'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Insurance company</label>
                    <span>{{ $formData->hirer_insurance['insurance_company'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Insurance company</label>
                    <span>{{ $formData->hirer_insurance['policy_number'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>


            </tr>
        </tbody>

        <tbody >
            <h4 style="margin-bottom: 0px; white-space: nowrap">DECLARATION: </h4>
            <tr >
                <td colspan="4">
                    <p style="text-align: justify; color: #463b3b">
                         I MR,{{ $formData->personal_details['first_name'].' '.$formData->personal_details['last_name'] ?? '' }}
                    declare that the information given in this form is correct and
                    complete. In addition, I hereby acknowledge and confirm
                    that during the duration of the vehicle hire I shall be liable
                    for any penalty charges (PCNs), parking or traffic fines
                    including such penalties or excess charges howsoever
                    issued. It is further agreed that the full cost of repair to the
                    vehicle and replacement costs resulting from the theft or
                    damage of telematics, camera or vehicle tracking equipment
                    will be met by the nominated hirer above, if such theft or
                    damage occurs during the hire period.
                    </p>
                     <div style="display: flex; ">
                        <div style="margin-right: 10px; margin-top: 10px; font-size: 15px">
                            <span>Date: {{ $formData->declaration['signature_date'] ?? '' }}......./......./....../</span>
                            <span> Company Signature: <img src="{{ $formData->declaration['signature_2'] ?? '' }}" alt="Signature Image" style="max-height: 100px; width: auto;">__________________</span>

                        </div>


                    </div>

                </td>
            </tr>
        </tbody>


  </table>



</div>
</body>
</html>
