<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                'name' => 'United States Dollar',
                'symbol' => '$',
                'code' => 'USD',
                'rate' => 1.00,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Euro',
                'symbol' => '€',
                'code' => 'EUR',
                'rate' => 0.85,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Japanese Yen',
                'symbol' => '¥',
                'code' => 'JPY',
                'rate' => 110.50,
                'no_of_decimal' => 0,
            ],
            [
                'name' => 'British Pound Sterling',
                'symbol' => '£',
                'code' => 'GBP',
                'rate' => 0.72,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Australian Dollar',
                'symbol' => 'A$',
                'code' => 'AUD',
                'rate' => 1.32,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Canadian Dollar',
                'symbol' => 'C$',
                'code' => 'CAD',
                'rate' => 1.25,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Swiss Franc',
                'symbol' => 'CHF',
                'code' => 'CHF',
                'rate' => 0.92,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Chinese Yuan',
                'symbol' => '¥',
                'code' => 'CNY',
                'rate' => 6.42,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Indian Rupee',
                'symbol' => '₹',
                'code' => 'INR',
                'rate' => 74.50,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'South Korean Won',
                'symbol' => '₩',
                'code' => 'KRW',
                'rate' => 1154.00,
                'no_of_decimal' => 0,
            ],
            [
                'name' => 'Brazilian Real',
                'symbol' => 'R$',
                'code' => 'BRL',
                'rate' => 5.35,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Mexican Peso',
                'symbol' => 'Mex$',
                'code' => 'MXN',
                'rate' => 20.10,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Singapore Dollar',
                'symbol' => 'S$',
                'code' => 'SGD',
                'rate' => 1.33,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Hong Kong Dollar',
                'symbol' => 'HK$',
                'code' => 'HKD',
                'rate' => 7.77,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'New Zealand Dollar',
                'symbol' => 'NZ$',
                'code' => 'NZD',
                'rate' => 1.44,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'South African Rand',
                'symbol' => 'R',
                'code' => 'ZAR',
                'rate' => 15.00,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Russian Ruble',
                'symbol' => '₽',
                'code' => 'RUB',
                'rate' => 72.80,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Norwegian Krone',
                'symbol' => 'kr',
                'code' => 'NOK',
                'rate' => 8.73,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Swedish Krona',
                'symbol' => 'kr',
                'code' => 'SEK',
                'rate' => 8.61,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'UAE Dirham',
                'symbol' => 'د.إ',
                'code' => 'AED',
                'rate' => 3.67,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Saudi Riyal',
                'symbol' => 'ر.س',
                'code' => 'SAR',
                'rate' => 3.75,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Malaysian Ringgit',
                'symbol' => 'RM',
                'code' => 'MYR',
                'rate' => 4.14,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Turkish Lira',
                'symbol' => '₺',
                'code' => 'TRY',
                'rate' => 8.27,
                'no_of_decimal' => 2,
            ],
            [
                'name' => 'Indonesian Rupiah',
                'symbol' => 'Rp',
                'code' => 'IDR',
                'rate' => 14225.00,
                'no_of_decimal' => 0,
            ],
            [
                'name' => 'Argentine Peso',
                'symbol' => '$',
                'code' => 'ARS',
                'rate' => 115.00,
                'no_of_decimal' => 2,
            ]
        ];

        if(Currency::count() < 3){
            foreach ($currencies as $item){
                Currency::create($item);
            }
        }
    }
}
