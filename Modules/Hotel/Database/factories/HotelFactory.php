<?php

namespace Modules\Hotel\Database\factories;

use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Hotel\Entities\Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        $large_images = $this->largeImages();
//        $user_id = User::whereHasRole('rider')->inRandomOrder()->first()->id;
        $region = Region::inRandomOrder()->first();
        $names = $this->names();
        shuffle($names);
        return [
            'title' => $names[0],
            'slug' => $faker->slug,
            'region_id' => $region->id,
//            'user_id' => $user_id,
            'address' => $faker->address,
            'map_lat' => $faker->latitude,
            'map_lng' => $faker->longitude,
            'featured_image_thumb' => $faker->randomElement($this->thumbImages()),
            'featured_image' => $faker->randomElement($this->largeImages()), // Replace with image generation logic
            'description' => $faker->paragraphs(3, true),
            'short_description' => $faker->sentence,
            'facilities' => json_encode($this->facilities()),
            'images' => json_encode($faker->randomElements($large_images, $faker->numberBetween(1, 5))),
        ];
    }

    public function largeImages(): array
    {
        return [
            'https://cf.bstatic.com/xdata/images/hotel/max1024x768/475578116.jpg?k=4e940f52127c658ce2b5d512d9c5ef22c1ee1bcdd8060e9ef673d6486334faf5&o=&hp=1',
            'https://cf.bstatic.com/xdata/images/hotel/max1024x768/475578109.jpg?k=692e2965b8bf36fa65fc31f427fa14d823ab193e70547023686cd98b0317bbf6&o=&hp=1',
            'https://cf.bstatic.com/xdata/images/hotel/max1024x768/475578106.jpg?k=ee4d0bfd71fafc2e1218b6adfdf97633df900891ceb7823b8f2a6a05b0a66b6e&o=&hp=1',
            'https://cf.bstatic.com/xdata/images/hotel/max1024x768/475578124.jpg?k=0879e28cb484c9dfc13d07ea90587b8261384e312b93dae230e01c2986a4dce2&o=&hp=1',
            'https://cf.bstatic.com/xdata/images/hotel/max1024x768/476049812.jpg?k=dc8a0bcceeee242cdfdf6a7d066424d7f11f83dc3505276349dc99108af6be32&o=&hp=1',
            'https://cf.bstatic.com/xdata/images/hotel/max1024x768/475578131.jpg?k=6d0c5daa0dec1168572b290bfffdf3693a5cd49edad524715c26757cf7fb4962&o=&hp=1',
        ];
    }
    public function facilities(): array
    {
        return [
            '24-hour security',
            'Room service',
            '24-hour front desk',
            'Ironing service',
            'Concierge service',
            'Free WiFi',
            'Non-smoking rooms',
            'Air conditioning',
            'Designated smoking area',
            'Free parking',
        ];
    }
    public function thumbImages(): array
    {
        return [
            'https://cf.bstatic.com/xdata/images/hotel/square200/306150858.webp?k=9fddf6af9c48085821c8e1e638b1be1cf8196b84beaf104468b32a2b1f41c482&o=',
            'https://cf.bstatic.com/xdata/images/hotel/square200/435799344.webp?k=2ea101c35c048116f1251ee45b681cc3e7583f09505366acd98b5bb17098c2fc&o=',
            'https://cf.bstatic.com/xdata/images/hotel/square200/318110349.webp?k=e8758bb8104e228e64cc5380c0828f7c8badce7eda036e98b89ffcf29549a240&o=',
            'https://cf.bstatic.com/xdata/images/hotel/square200/476626887.webp?k=355d2993fb1208862c729c06dd2e5d1835b65d4f071408cba7643ce4f178dbe1&o=',
            'https://cf.bstatic.com/xdata/images/hotel/square200/428684545.webp?k=3a0c380909c317156d98273555e4f991477a535b4667d3aead239f2d22192d47&o=',
            'https://cf.bstatic.com/xdata/images/hotel/square250/293888001.webp?k=141181817c09b1f8a14538ed33d02007a8e1ee0a9474de2dcc2e89b245855da4&o=',

            ];
    }

    public function names(): array
    {
        return [
            "Eko Hotels & Suites",
            "Transcorp Hilton Abuja",
            "Sheraton Lagos Hotel",
            "Radisson Blu Anchorage Hotel",
            "Federal Palace Hotel",
            "Southern Sun Ikoyi",
            "Protea Hotel Victoria Island",
            "Lagos Continental Hotel",
            "Four Points by Sheraton",
            "Le Meridien Ogeyi Place",
            "Protea Hotel Ikeja",
            "Oriental Hotel",
            "Sheraton Abuja Hotel",
            "Intercontinental Lagos ",
            "Ibom Hotel & Golf Resort",
            "Wheatbaker Lagos",
            "Nike Lake Resort",
            "Golden Tulip Festac",
            "Grand Tower Hotel ",
            "Beni Gold Hotel & Apartments "
        ];
    }
}

