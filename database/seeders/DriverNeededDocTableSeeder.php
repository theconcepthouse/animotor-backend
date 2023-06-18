<?php

namespace Database\Seeders;

use App\Models\Document;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverNeededDocTableSeeder extends Seeder
{
    protected array $documents = [
            [
                'name' => 'Drivers License',
                'is_required' => 1,
                'has_expiry_date' => 1,
                'status' => 1,
            ],
        [
                'name' => 'Vehicle Photo',
                'is_required' => 1,
                'has_expiry_date' => 0,
                'status' => 1,
            ],
        ];

    public function run()
    {
        $count = Document::count();

        if($count < 1)
        {
            foreach ($this->documents as $item)
            {
                Document::create($item);
            }
        }
    }
}
