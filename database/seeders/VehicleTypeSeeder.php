<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    protected array $data = [
        [ "name" => "Convertibles", "icon" => 'icon/convertibles.jpg'],
        [ "name" => "Coupes", "icon" => 'icon/couple.jpg'],
        [ "name" => "Hatchback", "icon" => 'icon/hatchback.jpg'],
        [ "name" => "Sedan", "icon" => 'icon/sedan.jpg'],
        [ "name" => "Wagon", "icon" => 'icon/wagons.jpg'],
        [ "name" => "Truck", "icon" => 'icon/trucks.jpg'],
    ];

    public function run(): void
    {
        if(VehicleType::count() < 1){
            foreach ($this->data as $item) {
                VehicleType::create([
                    'icon' => $this->getAssetPath($item['icon']),
                    'name' => $item['name']
                ]);
            }
        }

    }

    private function getAssetPath($path): string
    {
        return url('/') .'/'.$path;
    }

}
