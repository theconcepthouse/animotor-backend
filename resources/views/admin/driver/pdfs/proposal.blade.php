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
             <img width="50" src="https://animotor.co.uk/storage/photos/9a9ede47-d4e9-4205-b546-c6437d4914f5/logo-sm.png" alt="">
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
            <td colspan="4">
                <strong> IMPORTANT NOTICE:</strong>
               <p>
                    It is an Offence under the Road Traffic Acts to make a false statement or withhold an y material in formation for the purposes of obtaining a Certificate of Motor Insurance. By completing this Proposal Form you hereby consent to us
                    using the Personal In formation provided by you to conduct appropriate anti-fraud and DVLA checks. Personal In formation that you provide may also be disclosed to a credit reference agency, which may keep a record of that in formation.
                    You also consent to this in formation being shared with other outside agencies in the course of investigating an y claim or con f irmin g that the in formation g iven is true and accurate. If you do not report an accident or claim
                    immediately you may have to pay a £1000 Late Reporting Excess plus £720 per day late reporting charges You are not insured to drive your vehicle under this fleet policy until such time as we have approved your application and
                    issued a Certificate of Insurance, permission letter stating that you are insured.
                   <br>
                   ANI MOTORS reserve the right to decline to any proposal submitted.
                </p>

            </td>
        </tr>
        </tbody>
        <tbody>
        <h4 style="margin-bottom: 0px">Customer Detail:</h4>
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
            <td >
                <label style="margin-bottom: 25px; white-space: nowrap">Email</label>
                <span>{{ $formData->personal_details['email'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
             <td>
                <label style="margin-bottom: 25px">Phone</label>
                <span>{{ $formData->personal_details['phone'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>
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
            <td colspan="2">
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
          <div class="page-break"></div>

    <table>
          <tbody>
        <h4 style="margin-bottom: 0px">Drivers License Details:</h4>
        <tr style="margin-top: 0px">
            <td>
                <label style="margin-bottom: 25px">License Type</label>
                <span>{{ $formData->drivers_license['license_type'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">License Number</label>
                <span>{{ $formData->drivers_license['license_number'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">License Issue Date</label>
                <span>{{ $formData->drivers_license['license_issue_date'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">License Expire Date</label>
                <span>{{ $formData->drivers_license['license_expire_date'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>
            <td>
                <label style="margin-bottom: 25px">Date Driving Test Passed</label>
                <span>{{ $formData->drivers_license['date_driving_test_passed'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">DVLA Check Code</label>
                <span>{{ $formData->drivers_license['dvla_check_code'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td></td>
            <td></td>
        </tr>
        </tbody>

        <tbody>
        <h4 style="margin-bottom: 0px">Vehicle Details:</h4>
        <tr style="margin-top: 0px">
            <td>
                <label style="margin-bottom: 25px">Registration Number</label>
                <span>{{ $formData->vehicle['registration_number'] ?? '' }}</span>
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
             <td>
                <label style="margin-bottom: 25px">Number Of Seat</label>
                <span>{{ $formData->vehicle['number_of_seat'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        <tr>

            <td>
                <label style="margin-bottom: 25px">Year</label>
                <span>{{ $formData->vehicle['year'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Engine Size</label>
                <span>{{ $formData->vehicle['engine_size'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Current value</label>
                <span>{{ $formData->vehicle['current_value'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        </tbody>

        @if(isset($formData->taxi_license) && isset($formData->taxi_license['is_driver_hold_taxi_licence']) && $formData->taxi_license['is_driver_hold_taxi_licence'] == "Yes")

            <tbody>
            <h4 style="margin-bottom: 0px">Taxi License:</h4>
            <tr style="margin-top: 0px">
                <td>
                    <label style="margin-bottom: 25px">Issuing Authority</label>
                    <span>{{ $formData->taxi_license['issuing_authority'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">How Long</label>
                    <span>{{ $formData->taxi_license['how_long'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">How Long Resident In Uk</label>
                    <span>{{ $formData->taxi_license['how_long_resident_in_uk'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
                <td>
                    <label style="margin-bottom: 25px">License Number</label>
                    <span>{{ $formData->taxi_license['license_number'] ?? '' }}</span>
                    <span class="underline"></span>
                </td>
            </tr>
            </tbody>
        @endif
        <tbody>
        <h4 style="margin-bottom: 0px">Level Of Cover Details:</h4>
        <tr style="margin-top: 0px">
            <td>
                <label style="margin-bottom: 25px">Level Of Cover</label>
                <span>{{ $formData->level_of_cover['level_cover'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
            <td>
                <label style="margin-bottom: 25px">Use of vehicle</label>
                <span>{{ $formData->level_of_cover['vehicle_use_cover'] ?? '' }}</span>
                <span class="underline"></span>
            </td>
        </tr>
        </tbody>

    </table>


        <div>
            @if(isset($formData->claim) && isset($formData->claim['accident_claim']) && $formData->claim['accident_claim'] == "Yes")
            @php
                // Check if rate is a string before decoding, else use the existing array or empty array
                $claims = is_string($formData->claim_details) ? json_decode($formData->claim_details, true) : (is_array($formData->claim_details) ? $formData->claim_details : []);
                $claims = $claims ?? [];
            @endphp
            <h4 style="margin-bottom: 5px">Accident Claims:</h4>
             <table style="width:100%; border: 1px solid black; ">
                <tr style="border: 1px solid #868686; border-collapse: collapse; background-color: #d1cbcb">
                    <th style="text-align: left">Claim Type</th>
                    <th style="text-align: left">Claim Date</th>
                    <th style="text-align: left">Claim Time</th>
                    <th style="text-align: left">Status</th>
                    <th style="text-align: left">Incident</th>
                </tr>
                 @forelse($claims as $index => $claim)
                    <tr>
                        <td style="text-align: left">{{ $claim['type_of_claim'] ?? '' }}</td>
                        <td style="text-align: left">{{ date('d M, Y', strtotime($claim['claim_date'])) ?? '' }}</td>
                        <td style="text-align: left">{{ date('h:i A', strtotime($claim['claim_time'])) ?? '' }}</td>
                        <td style="text-align: left">{{ $claim['status'] ?? '' }}</td>
                        <td style="text-align: left">{{ $claim['describe_incident'] ?? '' }}</td>
                    </tr>
                @empty
                @endforelse

            </table>
        @endif
        </div>
        <div>
            @if(isset($formData->convictions) && isset($formData->convictions['motoring_convictions']) && $formData->convictions['motoring_convictions'] == "Yes")
            @php
                // Check if rate is a string before decoding, else use the existing array or empty array
                $convictions = is_string($formData->conviction_details) ? json_decode($formData->conviction_details, true) : (is_array($formData->conviction_details) ? $formData->conviction_details : []);
                $convictions = $convictions ?? [];
            @endphp
            <h4 style="margin-bottom: 5px">Motoring Convictions:</h4>
             <table style="width:100%; border: 1px solid black; ">
                <tr style="border: 1px solid #868686; border-collapse: collapse; background-color: #d1cbcb">
                    <th style="text-align: left">Conviction code</th>
                    <th style="text-align: left">Penalty points</th>
                    <th style="text-align: left">Conviction date</th>
                    <th style="text-align: left">Expiry date</th>
                </tr>
                 @forelse($convictions as $index => $item)
                    <tr>
                        <td style="text-align: left">{{ $item['conviction_code'] ?? '' }}</td>
                        <td style="text-align: left">{{ $item['penalty_points'] ?? '' }}</td>
                        <td style="text-align: left">{{ date('d M, Y', strtotime($item['conviction_date'])) ?? '' }}</td>
                        <td style="text-align: left">{{ date('d M, Y', strtotime($item['expiry_date'])) ?? '' }}</td>
                    </tr>

                     @empty
                  @endforelse

            </table>
        @endif
        </div>
        <div>
            @if(isset($formData->convictions) && isset($formData->convictions['criminal_conviction']) && $formData->convictions['criminal_conviction'] == "Yes")
            @php
                // Check if rate is a string before decoding, else use the existing array or empty array
                $convictions = is_string($formData->conviction_details_2) ? json_decode($formData->conviction_details_2, true) : (is_array($formData->conviction_details_2) ? $formData->conviction_details_2 : []);
                $convictions = $convictions ?? [];
            @endphp
            <h4 style="margin-bottom: 5px">Criminal conviction:</h4>
             <table style="width:100%; border: 1px solid black; ">
                <tr style="border: 1px solid #868686; border-collapse: collapse; background-color: #d1cbcb">
                    <th style="text-align: left; width: 20px" >#</th>
                    <th style="text-align: left" colspan="3">Conviction</th>
                </tr>
                 @forelse($convictions as $index => $item)
                    <tr style="border: 1px solid gray">
                        <td >{{ $index+1 }}</td>
                        <td colspan="3">{{ $item['describe_conviction'] ?? '' }}</td>
                    </tr>
                     @empty
                  @endforelse

            </table>
        @endif
        </div>
        <div>
                @if(isset($formData->convictions) && isset($formData->convictions['criminal_conviction']) && $formData->convictions['criminal_conviction'] == "Yes")
                @php
                    $convictions = is_string($formData->conviction_details_3) ? json_decode($formData->conviction_details_3, true) : (is_array($formData->conviction_details_2) ? $formData->conviction_details_3 : []);
                    $convictions = $convictions ?? [];
                @endphp
                <h4 style="margin-bottom: 5px">Refusal Description:</h4>
                 <table style="width:100%; border: 1px solid black; ">
                    <tr style="border: 1px solid #868686; border-collapse: collapse; background-color: #d1cbcb">
                        <th style="text-align: left; width: 20px" >#</th>
                        <th style="text-align: left" colspan="3">Conviction</th>
                    </tr>
                     @forelse($convictions as $index => $item)
                        <tr style="border: 1px solid gray">
                            <td >{{ $index+1 }}</td>
                            <td colspan="3">{{ $item['describe_refusals_3'] ?? '' }}</td>
                        </tr>
                         @empty
                      @endforelse

                </table>
            @endif
        </div>
     <div class="page-break"></div>

    <table>

        <tbody>
        <h4 style="margin-bottom: 0px">Supporting Documents:</h4>
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
        <tr>
             <td>
                <label style="margin-bottom: 25px">License Summary Sheet</label>
                <img style="height: 200px; width: 200px" src="{{ $formData->documents['license_summery_sheet'] ?? '' }}" alt="">

            </td>
        </tr>
        </tbody>
       <tbody>
        <tr>
            <td colspan="4">
                <strong> IMPORTANT DECLARATION:</strong>
              <p>
                I/we declare that all of the above statements are true and complete in every respect and that no material facts or other in formation has been withheld, misrepresented or suppressed, which may increase the risk or influence the
                granting of insurance cover by Underwriters. I/we undertake that the vehicle/s to be insured shall not be driven by an y other person other than that declared on the Certificate of Motor Insurance and Policy Schedule. I/we further
                undertake that the vehicles/s to be insured shall be kept in a good condition and state of repair. I/we further declare and agree that i f such statements and particulars are in the handwriting of an y person other than
                  myself/ourselves such persons shall be deemed to have been m your agent for the purposes of completing this form and I/we agree that this proposal and declaration shall form the basis of the contract between me/us and ANI MOTORS LTD and
                I/we agree on each renewal to notify the ANI MOTORS LTD of any material facts or chan ges affecting the continuance of the Insurance and I/we are willing to accept an Insurance subject to the terms, exceptions and conditions
                provisionally contained therein for this class of risk and i f the risk is accepted to pay the premium required.
                <br>ANI MOTORS reserve the right to decline to any proposal submitted
            </p>
            <div style="display: flex; ">
                    <div style="margin-right: 10px; margin-top: 10px; font-size: 15px">
                        <span>Date: ......./......./....../</span>
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
