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
                <label style="margin-bottom: 25px; white-space: nowrap">Driver licence issuing country</label>
                <span>{{ $formData->drivers_license['driver_licence_issuing_country'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>

            <td>
                <label style="margin-bottom: 25px">Driver licence number</label>
                <span>{{ $formData->drivers_license['license_number'] ?? '' }}</span>
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

        <tbody>
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

        <tbody>
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
                <label style="margin-bottom: 25px">Time Out</label>
                <span>{{ date('h:i A', strtotime($formData->vehicle['time_out'])) ?? '' }}</span>
                <span class="underline"></span>
            </td> <td>
                <label style="margin-bottom: 25px">Time Back</label>
                <span>{{ date('h:i A', strtotime($formData->vehicle['time_back'])) ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
{{--        <tr>--}}
{{--            <td>--}}
{{--                <label style="margin-bottom: 25px">Number of Seat</label>--}}
{{--                <span>{{ $formData->vehicle['number_of_seat'] ?? '' }}</span>--}}
{{--                <span class="underline"></span>--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                <label style="margin-bottom: 25px">Year</label>--}}
{{--                <span>{{ $formData->vehicle['year'] ?? '' }}</span>--}}
{{--                <span class="underline"></span>--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                <label style="margin-bottom: 25px">Engine Size</label>--}}
{{--                <span>{{ $formData->vehicle['engine_size'] ?? '' }}</span>--}}
{{--                <span class="underline"></span>--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                <label style="margin-bottom: 25px">Current Value</label>--}}
{{--                <span>{{ $formData->vehicle['current_value'] ?? '' }}</span>--}}
{{--                <span class="underline"></span>--}}
{{--            </td>--}}
{{--        </tr>--}}
        </tbody>
        <tbody>
        <h5 style="margin-bottom: 0px; white-space: nowrap">STATEMENT OF LIABILITY: </h5>
        <tr>
            <td colspan="4">
                <p style="text-align: justify; color: #463b3b">
                    I hereby acknowledge that during the currency of this agreement, I shall be Liable as the owner of
                    the vehicle
                    let me there-under in respect of any fixed penalty Offence committed in respect of the vehicle under
                    part III of
                    the Road Traffic Offenders Act 1988 (Section 66) (as amended) and the Local Authorities Act 2000,
                    London Local
                    Authorities Act 1996 (as amended), Road Traffic Act 1991, Road Traffic Offenders Act 1988, Traffic
                    Management
                    Act 2004.
                </p>
                <div style="margin-right: 10px; margin-top: 10px; font-size: 15px">
                    <span> Signature: __________________</span>
                </div>
            </td>
        </tr>
        </tbody>
        <tbody>
        <h5 style="margin-bottom: 0px; white-space: nowrap">DECLARATION: </h5>
        <tr>
            <td colspan="4">
                <p style="text-align: justify; color: #463b3b">
                    declare that the information given in this form is correct and complete. In addition, I hereby
                    acknowledge and
                    confirm that during the duration of the vehicle hire I shall be liable for any penalty charges
                    (PCNs), parking or
                    traffic fines including such penalties or excess charges howsoever issued. It is further agreed that
                    the full cost of
                    repair to the vehicle and replacement costs resulting from the theft or damage of telematics, camera
                    or vehicle
                    tracking equipment will be met by the nominated hirer above, if such theft or damage occurs during
                    the hire
                    period.
                </p>
                <div style="display: flex; ">
                    <div style="margin-right: 10px; margin-top: 10px; font-size: 15px">
                        <span>Date: {{ $formData->declaration['signature_date'] ?? '' }}......./......./....../</span>
                        <span> Signature: <img src="{{ $formData->declaration['signature_2'] ?? '' }}"
                                               alt="Signature Image" style="max-height: 100px; width: auto;">__________________</span>

                    </div>


                </div>

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
        <tr style="margin-top: 0px">
            <td>
                <label style="margin-bottom: 25px">Repossession personal visit minimum</label>
                <span>{{ $formData->charges['repossession_personal_visit_minimum'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Mileage limit</label>
                <span>{{ $formData->charges['mileage_limit'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td></td>
        </tr>
        @if(isset($formData->charges['mileage_limit']) && $formData->charges['mileage_limit'] == 'Yes')
            <tr style="margin-top: 0px">
                <td>
                    <label style="margin-bottom: 25px">Mileage limit type</label>
                    <span>{{ $formData->charges['mileage_limit_type'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Mileage limit Value</label>
                    <span>{{ $formData->charges['mileage_limit_value'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">Excess Mileage Fee</label>
                    <span>{{ $formData->charges['excess_mileage_fee'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
            </tr>
        @endif


        <tr style="margin-top: 0px">
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
        <tr style="margin-top: 0px">
            <td>
                <label style="margin-bottom: 25px">Accident fault-based excess fee</label>
                <span>{{ $formData->charges['accident_fault_based_excess_fee'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td></td>
            <td></td>
        </tr>
        </tbody>

        <tbody>
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
                <label style="margin-bottom: 25px">Policy Number</label>
                <span>{{ $formData->hirer_insurance['policy_number'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr style="margin-top: 0px">
            <td>
                <label style="margin-bottom: 25px">Type of Cover</label>
                <span>{{ $formData->hirer_insurance['type_of_cover'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Issue Date</label>
                <span>{{ $formData->hirer_insurance['issue_date'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Expiry Date</label>
                <span>{{ $formData->hirer_insurance['expiry_date'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr style="margin-top: 0px">
            <td colspan="4">
                <div style="margin-right: 10px; margin-top: 10px; font-size: 15px">
                    <span> Signature: _____________________</span>
                </div>
            </td>
        </tr>
        <tr style="margin-top: 0px">
            <td colspan="3">
                <div style="margin-right: 10px; margin-top: 10px; font-size: 15px">
                    <span>Company Signature: __________________</span>
                </div>
            </td>
        </tr>
        </tbody>

    </table>
    <div class="page-break"></div>
    <table>
        <tbody>
        <h4 style="margin-bottom: 0px">Fleet Insurance Details:</h4>
        <tr style="margin-top: 0px">
            <td>
                <label style="margin-bottom: 25px">Insurance company</label>
                <span>{{ $formData->fleet_insurance['insurance_company'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Policy Number</label>
                <span>{{ $formData->fleet_insurance['policy_number'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Type Of Cover</label>
                <span>{{ $formData->fleet_insurance['type_of_cover'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr style="margin-top: 0px">
           <td>
                <label style="margin-bottom: 25px">Issue Date</label>
                <span>{{ $formData->fleet_insurance['date'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Lease Agreement Number</label>
                <span>{{ $formData->fleet_insurance['lease_agreement_number'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
            </td>
        </tr>
        <tr style="margin-top: 0px">
            <td colspan="4">
                <div style="margin-right: 10px; margin-top: 10px; font-size: 15px">
                    <span> Signature: __________________</span>
                </div>
            </td>
        </tr>
        <tr style="margin-top: 0px">
            <td colspan="3">
                <div style="margin-right: 10px; margin-top: 10px; font-size: 15px">
                    <span>Company Signature: __________________</span>
                </div>
            </td>
        </tr>
        </tbody>

    </table>

    <table>
    <tbody>
    <h4 style="margin-bottom: 0px">Documents:</h4>
    <tr style="margin-top: 0px">
        <td>
            <label style="margin-bottom: 25px">Driving License Front</label>
            <img style="height: 200px; width: 200px" src="{{ $formData->documents['driving_license_front'] ?? '' }}" alt="">

        </td>
        <td>
            <label style="margin-bottom: 25px">Driving License Back</label>
            <img style="height: 200px; width: 200px" src="{{ $formData->documents['driving_license_back'] ?? '' }}" alt="">

        </td>
        <td>
            <label style="margin-bottom: 25px">Proof of Address</label>
            <img style="height: 200px; width: 200px" src="{{ $formData->documents['proof_of_address'] ?? '' }}" alt="">

        </td>
    </tr>
    <tr style="margin-top: 0px">
        <td>
            <label style="margin-bottom: 25px">National Insurance Number</label>
            <img style="height: 200px; width: 200px" src="{{ $formData->documents['national_insurance_number'] ?? '' }}" alt="">

        </td>
        <td>
            <label style="margin-bottom: 25px">DVLA Summary Sheet</label>
            <img style="height: 200px; width: 200px" src="{{ $formData->documents['DVLA_summary_sheet'] ?? '' }}" alt="">

        </td>
    </tr>


    </tbody>

    <tbody>
            <h4 style="margin-bottom: 0px; white-space: nowrap"> Declaration: </h4>
            <tr>
                <td colspan="4">
                    <p style="text-align: justify; color: #463b3b">
                        I
                        MR,{{ $formData->personal_details['first_name'].' '.$formData->personal_details['last_name'] ?? '' }}
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
                            <span>Date: {{ $formData->declaration['signature_date'] ?? '' }}____</span>

                            <span> Company Signature: __________________</span>

                        </div>


                    </div>

                </td>
            </tr>
            </tbody>

    </table>
     <div class="page-break"></div>

    <table>
         <tbody>
        <h4 style="margin-bottom: 0px; white-space: nowrap">Additional Terms: </h4>
{{--       @if(isset($formData->personal_details) && isset($formData->personal_details['hire_type']) && $formData->personal_details['hire_type'] == "Rent to Buy")--}}

           <tr>
            <td colspan="4">
                <p style="text-align: justify; color: #463b3b">
                   {{ $form->agreement ?? '' }}
                </p>
            </td>
        </tr>
{{--       @else--}}
{{--           <h4>No Additional Agreement</h4>--}}
{{--        @endif--}}

        </tbody>

    </table>


</div>
</body>
</html>
