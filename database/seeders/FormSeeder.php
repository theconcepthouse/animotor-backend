<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {

         $commonFields = json_decode(file_get_contents(database_path('seeders/CommonFields.json')), true);

        Form::create([
            'name' => 'Customer Registration',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 0,
            'fields' => json_encode($commonFields['personal_details'])
        ]);

        Form::create([
            'name' => 'Onboarding Form',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 0,
            'fields' => json_encode([
                'Customer' => $commonFields['personal_details'],
                'Vehicle' => $commonFields['vehicle'],
                'Rate' => [
                    [
                        'fieldName' => 'item',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 1,
                        'options' => ['Per Hour', "Per Day", 'Per Week']
                    ],
                    [
                        'fieldName' => 'rate',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'unit',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'price',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'sub_total',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'total_paid',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 6
                    ],
                    [
                        'fieldName' => 'total_due',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 7
                    ],
                ],
                'Charges' => [
                    [
                        'fieldName' => 'late_payment_per_day',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'admin_charge_for_pcn_ticket',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'admin_charge_for_speeding_ticket',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'admin_charge_for_bus_lane_tickets',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'returning_vehicle_dirty_minor',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'returning_vehicle_dirty_major',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 6
                    ],
                    [
                        'fieldName' => 'repossession_personal_visit_minimum',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 7
                    ],
                    [
                        'fieldName' => 'milage_limit',
                        'fieldType' => 'radio',
                        'required' => false,
                        'order' => 8,
                        'options' => ["Yes", "No"],
                    ],
                    [
                        'fieldName' => 'milage_limit_type',
                        'fieldType' => 'select',
                        'required' => false,
                        'order' => 9,
                        'options' => ['Per Day', 'Per Week', 'Per Month'],
                    ],
                    [
                        'fieldName' => 'milage_limit_value',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 10
                    ],
                    [
                        'fieldName' => 'excess_milage_fee',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 11
                    ],
                    [
                        'fieldName' => 'lost_damaged_key_charges',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 12
                    ],
                    [
                        'fieldName' => 'vehicle_recovery_charges',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 13
                    ],
                    [
                        'fieldName' => 'accident_non_fault_excess_fee',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 14
                    ],
                    [
                        'fieldName' => 'accident_fault_based_excess_fee',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 15
                    ],
                ]
            ]),
        ]);

        Form::create([
            'name' => 'Hire Agreement',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 0,
            'fields' => json_encode([
                'Hirer' => array_merge(
                    $commonFields['personal_details'],
                    [
                        [
                            'fieldName' => 'driver_licence_issuing_country',
                            'fieldType' => 'select',
                            'required' => true,
                            'order' => 3,
                            'options' => [
                                "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia",
                                "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium",
                                "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria",
                                "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad",
                                "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the",
                                "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
                                "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini",
                                "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada",
                                "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India",
                                "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan",
                                "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia",
                                "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi",
                                "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia",
                                "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru",
                                "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway", "Oman",
                                "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal",
                                "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
                                "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone",
                                "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Sudan", "Spain",
                                "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania",
                                "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan",
                                "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan",
                                "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                            ]
                        ],
                        [
                            'fieldName' => 'driver_licence_number',
                            'fieldType' => 'text',
                            'required' => true,
                            'order' => 4
                        ],
                        [
                            'fieldName' => 'date_of_birth',
                            'fieldType' => 'date',
                            'required' => true,
                            'order' => 5
                        ]
                    ]
                ),
                'Address' => $commonFields['address'],
                'Vehicle' => $commonFields['vehicle'],
                'Signature' => [
                    [
                        'fieldName' => 'signature',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 1
                    ],
                ],
                'Declaration' => [
                    [
                        'fieldName' => 'signer',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'signature_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'signature_2',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 4
                    ],
                ],
                'Additional Fee' => [
                    [
                        'fieldName' => 'late_payment_per_day',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'admin_charge_for_pcn_ticket',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'admin_charge_for_speeding_ticket',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'admin_charge_for_bus_lane_tickets',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'returning_vehicle_dirty_minor',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'returning_vehicle_dirty_major',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 6
                    ],
                    [
                        'fieldName' => 'repossession_personal_visit_minimum',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 7
                    ],
                    [
                        'fieldName' => 'milage_limit',
                        'fieldType' => 'radio',
                        'required' => true,
                        'order' => 8,
                        'options' => ['Yes', 'No']
                    ],
                    [
                        'fieldName' => 'milage_limit_text',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 9
                    ],
                    [
                        'fieldName' => 'excess_mileage_fee_per_mile',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 10
                    ],
                    [
                        'fieldName' => 'lost_damaged_key_charges',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 11
                    ],
                    [
                        'fieldName' => 'vehicle_recovery_charges',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 12
                    ],
                    [
                        'fieldName' => 'accident_non_fault_excess_fee',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 13
                    ],
                    [
                        'fieldName' => 'accident_fault_based_excess_fee',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 14
                    ],
                ],
                'Hirer Insurance' => [
                    [
                        'fieldName' => 'own_insurance',
                        'fieldType' => 'radio',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No']
                    ],
                    [
                        'fieldName' => 'insurance_company',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'policy_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'type_of_cover',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 4,
                        'options' => ['Fully comprehensive', 'Third party', 'Third party, fire and theft']
                    ],
                    [
                        'fieldName' => 'terms_and_conditions',
                        'fieldType' => 'checkbox',
                        'required' => true,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 6
                    ],
                    [
                        'fieldName' => 'lease_agreement_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 7
                    ],
                    [
                        'fieldName' => 'hirer_signature',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 8
                    ],
                    [
                        'fieldName' => 'company_signature',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 9
                    ],
                ],
                'Fleet Insurance' => [
                    [
                        'fieldName' => 'insurance_company',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'policy_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'type_of_cover',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 3,
                        'options' => ['Fully comprehensive', 'Third party', 'Third party, fire and theft']
                    ],
                    [
                        'fieldName' => 'terms_and_conditions',
                        'fieldType' => 'checkbox',
                        'required' => true,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'lease_agreement_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 6
                    ],
                    [
                        'fieldName' => 'hirer_signature',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 7
                    ],
                    [
                        'fieldName' => 'company_signature',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 8
                    ],
                ],
                'Documents' => [
                    [
                        'fieldName' => 'driving_license_front',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'driving_license_back',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'proof_of_address',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'national_insurance_number ',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'DVLA_summary_sheet ',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'passport_id',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 6
                    ],

                ],
            ]),
        ]);

        Form::create([
            'name' => 'Proposal Form',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 0,
            'fields' => json_encode([
                'Customer' => array_merge(
                    $commonFields['personal_details'],
                    [
                        [
                            'fieldName' => 'ni_number',
                            'fieldType' => 'text',
                            'required' => false,
                            'order' => 7
                        ],
                        [
                            'fieldName' => 'occupation',
                            'fieldType' => 'text',
                            'required' => false,
                            'order' => 8
                        ],
                        [
                            'fieldName' => 'how_long_resident_in_uk',
                            'fieldType' => 'text',
                            'required' => false,
                            'order' => 9
                        ]
                    ]
                ),
                'Address' => $commonFields['address'],
                'Drivers License' => [
                    [
                        'fieldName' => 'license_type',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Full UK', 'Provisional UK', 'EU', 'International'],
                    ],
                    [
                        'fieldName' => 'license_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'license_issue_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'license_expire_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'date_driving_test_passed',
                        'fieldType' => 'date',
                        'required' => false,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'dvla_check_code',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 6
                    ],
                ],
                'Taxi License' => [
                    [
                        'fieldName' => 'is_driver_hold_taxi_licence',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'issuing_authority',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'how_long',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'how_long_resident_in_uk',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'license_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 5
                    ],

                ],
                'Claim' => [
                    [
                        'fieldName' => 'accident_claim',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'number_of_claim',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'type_of_claim',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 3,
                        'options' => ['Fault']
                    ],
                    [
                        'fieldName' => 'status',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 4,
                        'options' => ['Open', 'Closed'],
                    ],
                    [
                        'fieldName' => 'claim_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 5,
                    ],
                    [
                        'fieldName' => 'claim_time',
                        'fieldType' => 'time',
                        'required' => true,
                        'order' => 6,
                    ],
                    [
                        'fieldName' => 'describe_incident_circumstances',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 6,
                    ],
                ],
                'Convictions' => [
                    [
                        'fieldName' => 'motoring_convictions',
                        'fieldType' => 'radio',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'number_of_motoring_convictions',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'conviction_code',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 3,
                    ],
                    [
                        'fieldName' => 'penalty_points',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 4,
                    ],
                    [
                        'fieldName' => 'conviction_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 5,
                    ],
                    [
                        'fieldName' => 'expiry_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 6,
                    ],
                    [
                        'fieldName' => 'criminal_conviction',
                        'fieldType' => 'radio',
                        'required' => true,
                        'order' => 7,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'number_of_criminal_convictions',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 8,
                    ],
                    [
                        'fieldName' => 'describe_conviction',
                        'fieldType' => 'textarea',
                        'required' => false,
                        'order' => 9,
                    ],
                    [
                        'fieldName' => 'ever_been_refused_motor_insurance',
                        'fieldType' => 'radio',
                        'required' => false,
                        'order' => 10,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'number_of_refusals',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 11,
                    ],
                    [
                        'fieldName' => 'describe_refusals',
                        'fieldType' => 'textarea',
                        'required' => true,
                        'order' => 12,
                    ],

                ],
                'Vehicle' => [
                    [
                        'fieldName' => 'vehicle_reg_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 1,
                    ],
                    [
                        'fieldName' => 'vehicle_make',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'vehicle_model',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 3,
                    ],
                    [
                        'fieldName' => 'number_of_seat',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 4,
                    ],
                    [
                        'fieldName' => 'year',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 5,
                    ],
                    [
                        'fieldName' => 'engine_size',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 6,
                    ],
                    [
                        'fieldName' => 'current_value',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 6,
                    ],
                ],
                'Level of cover' => [
                    [
                        'fieldName' => 'level_of_cover',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Fully comprehensive', 'Third part only', 'Third party fire and theft', 'Social domestic and pleasure', 'Credit hire'],
                    ]
                ],
                'Use of vehicle' => [
                    [
                        'fieldName' => 'level_of_cover',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Fully comprehensive', 'Third part only', 'Third party fire and theft', 'Social domestic and pleasure', 'Credit hire'],
                    ]
                ],
                'Supporting Documents' => [
                    [
                        'fieldName' => 'driver_license_front',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 1,
                    ],
                    [
                        'fieldName' => 'driver_license_back',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'proof_of_address',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 3,
                    ],
                    [
                        'fieldName' => 'license_summery_sheet',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 4,
                    ],
                ],
            ]),
        ]);

        Form::create([
            'name' => 'Checklist Form',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 0,
            'fields' => json_encode([
                'Client Details' => [
                            [
                                'fieldName' => 'hirer_name',
                                'fieldType' => 'text',
                                'required' => true,
                                'order' => 1,
                            ],
                            [
                                'fieldName' => 'hirer_address',
                                'fieldType' => 'text',
                                'required' => true,
                                'order' => 2,
                            ],
                            [
                                'fieldName' => 'vehicle_out_date',
                                'fieldType' => 'date',
                                'required' => true,
                                'order' => 3,
                            ],
                            [
                                'fieldName' => 'vehicle_reg_number',
                                'fieldType' => 'text',
                                'required' => true,
                                'order' => 4,
                            ],
                            [
                                'fieldName' => 'vehicle_make',
                                'fieldType' => 'text',
                                'required' => true,
                                'order' => 5,
                            ],
                            [
                                'fieldName' => 'vehicle_model',
                                'fieldType' => 'text',
                                'required' => true,
                                'order' => 6,
                            ],
                            [
                                'fieldName' => 'next_service',
                                'fieldType' => 'text',
                                'required' => false,
                                'order' => 7,
                            ],
                        ],
                'Bodywork' => [
                   [
                       'fieldName' => 'is_damage',
                       'fieldType' => 'radio',
                       'required' => true,
                       'order' => 1,
                       'options' => ['Yes', 'No'],
                   ]
                ],
                'Damage Assessment' => [
                            [
                                'fieldName' => 'how_many_damaged_panel',
                                'fieldType' => 'number',
                                'required' => false,
                                'order' => 1,
                            ],
                            [
                                'fieldName' => 'type_of_damage',
                                'fieldType' => 'select',
                                'required' => false,
                                'order' => 2,
                                'options' => [
                                    'Stone chips (more than 5)',
                                    'Small scratch or dent (less than 3cm)',
                                    'Scratch - long',
                                    'Small dent (between 3 and 30cm)',
                                    'Large dent - below door (sill)',
                                    'Large dent - roof',
                                    'Large dent - other',
                                    'Cracked or insecure bumper',
                                    'Rust',
                                    'Previous poor repair'
                                ]
                            ],
                            [
                                'fieldName' => 'images',
                                'fieldType' => 'file',
                                'required' => false,
                                'order' => 1,
                            ],
                            [
                                'fieldName' => 'damage_description',
                                'fieldType' => 'file',
                                'required' => false,
                                'order' => 1,
                            ],
                        ],
                'Wheels & tyres' => [
                    [
                        'fieldName' => 'is_wheel_damaged',
                        'fieldType' => 'radio',
                        'required' => false,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'how_many_alloys_are_scuffed',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'how_many_replacing_tyre',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 3,
                    ],
                    [
                        'fieldName' => 'image_title',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 4,
                    ],
                    [
                        'fieldName' => 'images',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 5,
                    ],

                ],
                'Windscreens' => [
                    [
                        'fieldName' => 'is_windscreen_damaged',
                        'fieldType' => 'radio',
                        'required' => false,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'what_damage',
                        'fieldType' => 'checkbox',
                        'required' => false,
                        'order' => 2,
                        'options' => [
                            'Chipped or cracked driver side', 'No',
                            'Chipped or cracked passenger side',
                            'Chipped or cracked rear window'
                        ],
                    ],
                    [
                        'fieldName' => 'image_title',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 3,
                    ],
                    [
                        'fieldName' => 'images',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 4,
                    ],
                ],
                'Mirrors' => [
                    [
                        'fieldName' => 'is_mirror_damaged',
                        'fieldType' => 'radio',
                        'required' => false,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'mirror_electronics',
                        'fieldType' => 'checkbox',
                        'required' => false,
                        'order' => 2,
                        'options' => ['Faulty'],
                    ],
                    [
                        'fieldName' => 'mirror_glass',
                        'fieldType' => 'radio',
                        'required' => false,
                        'order' => 3,
                        'options' => ['One scratched or missing', 'Both scratched or missing'],
                    ],
                    [
                        'fieldName' => 'mirror_cover',
                        'fieldType' => 'radio',
                        'required' => false,
                        'order' => 3,
                        'options' => ['One scratched or missing', 'Both scratched or missing'],
                    ]
                ],
                'Dash' => [
                    [
                        'fieldName' => 'any_warning_lights',
                        'fieldType' => 'radio',
                        'required' => true,
                        'order' => 1,
                        'options' => ['yes', 'No'],
                    ],
                    [
                        'fieldName' => 'millage',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'which_dash_light',
                        'fieldType' => 'checkbox',
                        'required' => true,
                        'order' => 3,
                        'options' => ['Service due', 'Oil warning', 'Engine management', 'Airbag warning', 'ABS'],
                    ],
                    [
                        'fieldName' => 'images',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 4,
                    ],
                ],
                'Interior' => [
                    [
                        'fieldName' => 'interior_damage',
                        'fieldType' => 'radio',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', "No"],
                    ],
                    [
                        'fieldName' => 'what_damage',
                        'fieldType' => 'checkbox',
                        'required' => true,
                        'order' => 2,
                        'options' => ['Has stains', 'Has tears', 'Has burns']
                    ],
                    [
                        'fieldName' => 'images',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 3,
                    ],
                ],
                'Exterior' => [
                    [
                        'fieldName' => 'exterior_is_clean',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'images',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'image_description',
                        'fieldType' => 'textarea',
                        'required' => true,
                        'order' => 3,
                    ],
                ],
                'Handbook' => [
                    [
                        'fieldName' => 'is_handbook',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'images',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'image_description',
                        'fieldType' => 'textarea',
                        'required' => false,
                        'order' => 3,
                    ],
                ],
                'Spare wheel' => [
                    [
                        'fieldName' => 'is_spare_wheel',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'images',
                        'fieldType' => 'file',
                        'required' => false,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'image_description',
                        'fieldType' => 'textarea',
                        'required' => false,
                        'order' => 3,
                    ],
                ],
                'Fuel cap' => [
                    [
                        'fieldName' => 'is_fuel_cap',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'images',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'image_description',
                        'fieldType' => 'textarea',
                        'required' => false,
                        'order' => 3,
                    ],
                ],
                'Aerial' => [
                    [
                        'fieldName' => 'is_aerial',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'images',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'image_description',
                        'fieldType' => 'textarea',
                        'required' => false,
                        'order' => 3,
                    ],
                ],
                'Floor mats' => [
                    [
                        'fieldName' => 'is_floor_mats',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'images',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'image_description',
                        'fieldType' => 'textarea',
                        'required' => true,
                        'order' => 3,
                    ],
                ],
                'Tools' => [
                    [
                        'fieldName' => 'tools',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 1,
                        'options' => ['Yes', 'No'],
                    ],
                    [
                        'fieldName' => 'tools_image',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'image_description',
                        'fieldType' => 'textarea',
                        'required' => true,
                        'order' => 3,
                    ],
                ],
                'Signature' => [
                    [
                        'fieldName' => 'signature',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 1,
                    ],
                    [
                        'fieldName' => 'document_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 2,
                    ]
                ],
            ]),
        ]);

        Form::create([
            'name' => 'Payment Sheet',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 0,
            'fields' => json_encode([
                'Hire Agreement' => [
                    [
                        'fieldName' => 'hire_start_date',
                        'fieldType' => 'date',
                        'required' => false,
                        'order' => 1,
                    ],
                    [
                        'fieldName' => 'hire_end_date',
                        'fieldType' => 'date',
                        'required' => false,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'hire_type',
                        'fieldType' => 'select',
                        'required' => false,
                        'order' => 3,
                        "options" => ["Social Domestic", "Rent to Buy", "Credit Hire", "Insurance"],
                    ],
                    [
                        'fieldName' => 'payment_frequency',
                        'fieldType' => 'select',
                        'required' => false,
                        'order' => 4,
                        "options" => [""],
                    ],
                    [
                        'fieldName' => 'duration',
                        'fieldType' => 'select',
                        'required' => false,
                        'order' => 5,
                        "options" => [""],
                    ],
                    [
                        'fieldName' => 'deposit',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 6,
                    ],
                    [
                        'fieldName' => 'total',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 7,
                    ],
                    [
                        'fieldName' => 'you_paid',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 8,
                    ],
                    [
                        'fieldName' => 'outstanding_balance',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 9,
                    ],
                    [
                        'fieldName' => 'hire_total',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 10,
                    ],
                    [
                        'fieldName' => 'vehicle_condition',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 11,
                    ],
                    [
                        'fieldName' => 'road_tax',
                        'fieldType' => 'select',
                        'required' => false,
                        'order' => 12,
                        'options' => [''],
                    ],
                    [
                        'fieldName' => 'road_tax_amount',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 13,
                    ],
                ],
                'Additional Fee' => [
                    [
                        'fieldName' => 'late_payment',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 1,
                    ],
                    [
                        'fieldName' => 'late_payment_amount',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 2,
                    ],
                    [
                        'fieldName' => 'excess_miles',
                        'fieldType' => 'select',
                        'required' => false,
                        'order' => 3,
                        'options' => ['']
                    ],
                    [
                        'fieldName' => 'excess_mile_amount',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 4,
                    ],
                    [
                        'fieldName' => 'pcn_admin',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 5,
                    ],
                ],
                'Payment' => [
                    [
                        'fieldName' => 'due_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'amount',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'received_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'received_amount',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'late_payment_days',
                        'fieldType' => 'number',
                        'required' => false,
                        'order' => 5
                    ]
                ],
            ]),
        ]);

        Form::create([
            'name' => 'Return Vehicle',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 1,
            'fields' => json_encode([
                [
                    'fieldName' => 'return_date',
                    'fieldType' => 'date',
                    'required' => true,
                    'order' => 1
                ],
                [
                    'fieldName' => 'return_time',
                    'fieldType' => 'time',
                    'required' => true,
                    'order' => 2
                ],
                [
                    'fieldName' => 'return_reason',
                    'fieldType' => 'textarea',
                    'required' => true,
                    'order' => 3
                ]
            ])
        ]);

        Form::create([
            'name' => 'Report Vehicle Defect',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 1,
            'fields' => json_encode([
                'Basic Info' => [
                        [
                            'fieldName' => 'return_date',
                            'fieldType' => 'date',
                            'required' => true,
                            'order' => 1
                        ],
                        [
                            'fieldName' => 'return_time',
                            'fieldType' => 'time',
                            'required' => true,
                            'order' => 2
                        ],
                        [
                            'fieldName' => 'return_reason',
                            'fieldType' => 'textarea',
                            'required' => true,
                            'order' => 3
                        ],
                        [
                            'fieldName' => 'location_of_vehicle',
                            'fieldType' => 'text',
                            'required' => true,
                            'order' => 4
                        ],
                        [
                            'fieldName' => 'post_code',
                            'fieldType' => 'text',
                            'required' => true,
                            'order' => 5
                        ],
                        [
                            'fieldName' => 'description_of_defect',
                            'fieldType' => 'textarea',
                            'required' => true,
                            'order' => 6
                        ],
                        [
                            'fieldName' => 'location_of_defect',
                            'fieldType' => 'textarea',
                            'required' => true,
                            'order' => 7
                        ],
                        [
                            'fieldName' => 'severity',
                            'fieldType' => 'radio',
                            'required' => true,
                            'order' => 8,
                            'options' => ['Low', 'Medium', 'High']
                        ],
                        [
                            'fieldName' => 'impact_on_vehicle_operation',
                            'fieldType' => 'textarea',
                            'required' => false,
                            'order' => 9
                        ],
                        [
                            'fieldName' => 'actions_taken',
                            'fieldType' => 'textarea',
                            'required' => false,
                            'order' => 10
                        ],
                        [
                            'fieldName' => 'recommendation',
                            'fieldType' => 'textarea',
                            'required' => false,
                            'order' => 11
                        ],
                        [
                            'fieldName' => 'witnesses',
                            'fieldType' => 'textarea',
                            'required' => false,
                            'order' => 12
                        ],
                ],
                "Reporter Information" => [
                    [
                        'fieldName' => 'name',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 13
                    ],
                    [
                        'fieldName' => 'contact_number',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 13
                    ],
                    [
                        'fieldName' => 'email',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 13
                    ],
                ]
            ])
        ]);

        Form::create([
            'name' => 'Report Accident',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 1,
            'fields' => json_encode([
                "Driver Details" => [
                    [
                        'fieldName' => 'reference_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'first_name',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'last_name',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'driver_license_issuing_country',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 4,
                        'options' => [
                            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia",
                            "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium",
                            "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria",
                            "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad",
                            "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the",
                            "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
                            "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini",
                            "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada",
                            "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India",
                            "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan",
                            "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia",
                            "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi",
                            "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia",
                            "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru",
                            "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway", "Oman",
                            "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal",
                            "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
                            "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone",
                            "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Sudan", "Spain",
                            "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania",
                            "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan",
                            "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan",
                            "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                        ]
                    ],
                    [
                        'fieldName' => 'driver_license_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'date_of_birth',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 6
                    ],
                    [
                        'fieldName' => 'occupation',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 7
                    ],
                    [
                        'fieldName' => 'phone_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 8
                    ],
                    [
                        'fieldName' => 'email',
                        'fieldType' => 'email',
                        'required' => true,
                        'order' => 9
                    ]
                ],
                "Address" => [
                    [
                        'fieldName' => 'address_line_1',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 10
                    ],
                    [
                        'fieldName' => 'address_line_2',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 11
                    ],
                    [
                        'fieldName' => 'city',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 12
                    ],
                    [
                        'fieldName' => 'country',
                        'fieldType' => 'select',
                        'required' => true,
                        'order' => 13,
                        'options' => [
                            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia",
                            "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium",
                            "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria",
                            "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad",
                            "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the",
                            "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
                            "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini",
                            "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada",
                            "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India",
                            "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan",
                            "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia",
                            "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi",
                            "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia",
                            "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru",
                            "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway", "Oman",
                            "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal",
                            "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
                            "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone",
                            "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Sudan", "Spain",
                            "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania",
                            "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan",
                            "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan",
                            "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                        ]
                    ],
                    [
                        'fieldName' => 'postcode',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 14
                    ]
                ],
                "Vehicle Details" => [
                    [
                        'fieldName' => 'registration_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'make',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'model',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'color_of_vehicle',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'number_of_passengers',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 5
                    ]
                ],
                "Insurance" => [
                    [
                        'fieldName' => 'issuer',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'type_of_cover',
                        'fieldType' => 'select',
                        'required' => false,
                        'order' => 2,
                        'options' => ['Fully Responsive']
                    ],
                    [
                        'fieldName' => 'policy_number',
                        'fieldType' => 'number',
                        'required' => true,
                        'order' => 3
                    ],
                ]
            ])
        ]);

        Form::create([
            'name' => 'Change of Address',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 1,
            'fields' => json_encode([
                "Address" => [
                    [
                        'fieldName' => 'address_line_01',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'address_line_02',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'town_city',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'postcode',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'effective_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 5
                    ],
                ],
                "Phone Number" => [
                    [
                        'fieldName' => 'telephone_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'effective_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 2
                    ],
                ],
                "Email" => [
                    [
                        'fieldName' => 'email',
                        'fieldType' => 'email',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'effective_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 2
                    ],
                ],
                "Emergency Contact" => [
                    [
                        'fieldName' => 'contact_name',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'address_line_01',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'address_line_02',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'town_city',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'postcode',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'effective_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 6
                    ],
                ],
            ])
        ]);

        Form::create([
            'name' => 'Monthly Maintenance',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 1,
            'fields' => json_encode([
                "Monthly Maintenance" => [
                    [
                    'fieldName' => 'inspection_mileage',
                    'fieldType' => 'text',
                    'required' => true,
                    'order' => 1
                    ],
                    [
                        'fieldName' => 'inspection_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'last_inspection_mileage',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'last_inspection_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'last_service_mileage',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'last_service_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 6
                    ],
                    [
                        'fieldName' => 'odometer_picture',
                        'fieldType' => 'file',
                        'required' => true,
                        'order' => 7
                    ],
                ],
                'Issues/Repairs' => [
                    [
                        'fieldName' => 'repair_date',
                        'fieldType' => 'date',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'garage_name',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'cost',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'garage_details',
                        'fieldType' => 'textarea',
                        'required' => true,
                        'order' => 4
                    ]
                ],
                [
                    'fieldName' => 'invoice_image',
                    'fieldType' => 'file',
                    'required' => true,
                    'order' => 8
                ],
                [
                    'fieldName' => 'additional_comments',
                    'fieldType' => 'textarea',
                    'required' => false,
                    'order' => 9
                ]

            ])
        ]);

        Form::create([
            'name' => 'Submit Mileage',
            'state' => 'Generated',
            'status' => 'in-progress',
            'action' => 1,
            'fields' => json_encode([
                [
                    'fieldName' => 'last_recorded_mileage',
                    'fieldType' => 'text',
                    'required' => true,
                    'order' => 1
                ],
                [
                    'fieldName' => 'submitted_by',
                    'fieldType' => 'text',
                    'required' => true,
                    'order' => 2
                ],
                [
                    'fieldName' => 'submission_date',
                    'fieldType' => 'date',
                    'required' => true,
                    'order' => 3
                ],
                [
                    'fieldName' => 'enter_mileage',
                    'fieldType' => 'text',
                    'required' => true,
                    'order' => 4
                ],
                [
                    'fieldName' => 'upload_photo',
                    'fieldType' => 'file',
                    'required' => true,
                    'order' => 5
                ]
            ])
        ]);






    }


}
