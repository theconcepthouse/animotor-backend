<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $commonFields = json_decode(file_get_contents(database_path('seeds/CommonFields.json')), true);

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
                'Address' => $commonFields['address'],
                'Vehicle1' => [
                    [
                        'fieldName' => 'registration_number',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 1
                    ],
                    [
                        'fieldName' => 'insurance_group',
                        'fieldType' => 'text',
                        'required' => false,
                        'order' => 2
                    ],
                    [
                        'fieldName' => 'car_model',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 3
                    ],
                    [
                        'fieldName' => 'car_make',
                        'fieldType' => 'text',
                        'required' => true,
                        'order' => 4
                    ],
                    [
                        'fieldName' => 'date_out',
                        'fieldType' => 'datetime',
                        'required' => true,
                        'order' => 5
                    ],
                    [
                        'fieldName' => 'date_due',
                        'fieldType' => 'datetime',
                        'required' => true,
                        'order' => 6
                    ],
                ],
            ]),
        ]);

        // Add other forms similarly...

    }

}
