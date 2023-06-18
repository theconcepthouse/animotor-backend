<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    protected array $data = [
        [
            'name' => 'Lite',
            'region_id' => 'required',
            'is_active' => true,
            'cancellation_fee' => 0,
            'payment_methods' => 'cash,wallet',
            'image' => 'icon/lite.png',
            'capacity' => 4,
            'wait_time_limit' => 5,
            'min_fare' => 1,
            'min_distance' => 0,
            'price' => 20,
            'distance_price' => 5,
            'time_price' => 5,
            'wait_price' => 2,
            'discount' => 5,
            'commission_type' => 'percent',
            'commission' => 5,
        ],[
            'name' => 'Premium',
            'region_id' => 'required',
            'is_active' => true,
            'cancellation_fee' => 0,
            'payment_methods' => 'cash,wallet',
            'image' => 'icon/premium.png',
            'capacity' => 4,
            'wait_time_limit' => 5,
            'min_fare' => 1,
            'min_distance' => 0,
            'price' => 30,
            'distance_price' => 6,
            'time_price' => 6,
            'wait_price' => 3,
            'discount' => 5,
            'commission_type' => 'percent',
            'commission' => 5,
        ]

    ];


    public function run(): void
    {
        $region = Region::first();
        $data = $this->data;
        if(Service::count() < 1 && $region){

            foreach ($data as $item){
                $item['region_id'] = $region->id;
                $item['image'] = $this->getAssetPath($item['image']);
                Service::create($item);
            }

        }
    }


    private function getAssetPath($path): string
    {
        return url('/') .'/'.$path;
    }

}
